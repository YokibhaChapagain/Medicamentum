@include('user.menubar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

</head>
<body>

    <div class="mt-20 mr-4 md:ml-64">
        <div class="p-3 mb-4 bg-teal-300 rounded-lg">
            <h1 class="flex text-2xl">
                <div class="mr-2 font-bold">Welcome,</div>  <div class="text-white">{{$user->name}}</div>
            </h1>
        </div>
        @if(session('success'))
            <div class=" mb-4 text-[#318ECB] font-bold alert alert-success" id="add-success">{{session('success')}}</div>
        @endif
        <div class="flex flex-wrap -mx-2">
            @foreach ($medicines as $medicine)

                <div class="w-full px-2 mb-4 md:w-1/2 lg:w-1/4">
                    <div class="flex flex-col items-center justify-center h-full p-2 bg-white rounded-lg shadow-md">
                        <!-- Medicine Photo -->
                        <div class="flex items-center justify-center w-40 h-32">
                            <img src="{{ $medicine->image ? asset('storage/' . $medicine->image) : '' }}" alt="{{ $medicine->name }} Image" class="object-contain max-w-full max-h-full">
                        </div>

                        <!-- Medicine Name -->
                        <h2 class="mt-2 text-lg font-semibold">{{ $medicine->name }}</h2>

                        <!-- Medicine Price -->
                        <p class="text-gray-600">Rs. {{ $medicine->price }}</p>

                        <!-- Related Pharmacy -->
                        @if ($medicine->pharmacy)
                            <p class="mt-2 text-sm text-gray-500">Pharmacy: {{ $medicine->pharmacy->pharmacyUser->name ?? 'N/A'}}</p>
                        @else
                            <p class="mt-2 text-sm text-gray-500">Related Pharmacy: N/A</p>
                        @endif
                         @if($medicine->prescription_required==0)
                         <form action="{{route('add_to_cart',$medicine->id)}}">
                            @csrf

                            <div class="flex mt-2">
                                <button  class="px-2 text-white bg-teal-400 rounded-md hover:bg-green-600">
                                    Add to Cart
                                </button>
                        </form>


                        @else
                        <div class="flex mt-2">
                            <button onclick="addToCart({{ $medicine->prescription_required }})" class="px-2 text-white bg-teal-400 rounded-md hover:bg-green-600">
                                Add to Cart
                            </button>
                        @endif

                            <button onclick="window.location.href='/user/medicine/{{ $medicine->id }}'" class="px-2 py-2 ml-4 text-white bg-[#318ECB] rounded-md hover:bg-blue-600">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div id="prescriptionModal" class="fixed top-0 left-0 items-center justify-center hidden w-full h-full">
        <div class="absolute w-full h-full bg-gray-200 opacity-25 modal-overlay"></div>
        <div class="z-50 w-5/6 mx-auto overflow-y-auto bg-white border-gray-400 rounded shadow-lg modal-container md:max-w-md border-1">
            <div class="px-6 py-4 text-left modal-content">
                <div class="flex items-center justify-between pb-3">
                    <p class="text-2xl font-bold text-red-500">Prescription Required</p>
                    <button onclick="closeModal()" class="z-50 cursor-pointer modal-close">
                        <svg class="text-black fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M10.293 9l5.146-5.147a1 1 0 10-1.414-1.414L8.88 7.293l-5.147-5.147a1 1 0 10-1.414 1.414L7.293 9l-5.147 5.147a1 1 0 101.414 1.414L9 10.707l5.147 5.146a1 1 0 001.414-1.414L10.707 9z"/>
                        </svg>
                    </button>
                </div>
                <p class="pb-3">Prescription is required to add this item to your cart.</p>
            </div>
        </div>
    </div>

    <script>
        function addToCart(prescriptionRequired) {
            if (prescriptionRequired === 1) {
                openModal();
            } else {
                window.location.href = '/user/order';
            }
        }

        function openModal() {
            document.getElementById('prescriptionModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('prescriptionModal').style.display = 'none';
        }
    </script>
</body>
</html>

<script>
    setTimeout(function() {
        var successMessage = document.getElementById('add-success');
        if (successMessage) {
            successMessage.style.display = 'none';
        }
    }, 2000);
</script>
