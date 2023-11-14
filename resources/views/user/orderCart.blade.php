@include('user.menubar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    @php $total = 0 @endphp
    <div class="flex justify-center mt-20">
        <div class="w-full md:w-2/3 lg:w-1/2">
            @if(session('cart'))
                @foreach (session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                    <div class="flex items-center p-4 mb-4 ml-32 bg-white rounded-lg shadow-md">
                        <div class="w-24 h-24 mr-4">
                            <img src="{{ asset('storage/' . $details['image'])}}" alt="{{ $details['name'] }} Image" class="object-contain w-full h-full">
                        </div>
                        <div class="flex flex-col justify-between flex-grow">
                            <h2 class="text-xl font-semibold text-teal-600">{{ $details['name'] }}</h2>

                            <p class="text-gray-600">Rs. {{ $details['price'] }}</p>
                            <p class="text-gray-600">Quantity: {{ $details['quantity'] }}</p>

                            @if (isset($details['pharmacy']) && isset($details['pharmacy']['pharmacyUser']['name']))
                                <p class="mt-2 text-sm text-gray-500">Pharmacy: {{ $details['pharmacy']['pharmacyUser']['name'] }}</p>
                            @else
                                <p class="mt-2 text-sm text-gray-500">Pharmacy: N/A</p>
                            @endif

                        </div>
                        <div class="flex flex-row items-end space-x-4 mt-14">
                            <p class="text-lg text-teal-600">Subtotal: Rs {{ $details['quantity'] * $details['price'] }}</p>
                        </div>
                        {{-- <div class="flex flex-row items-end mt-4 space-x-4">
                            <button class="px-3 py-1 bg-gray-300 rounded-l" onclick="decreaseQuantity({{ $id }})">-</button>
                            <input type="number" class="w-16 mx-2 text-center" id="quantity_{{ $id }}" value="0" readonly>
                            <button class="px-3 py-1 bg-gray-300 rounded-r" onclick="increaseQuantity({{$id  }})">+</button>

                        </div> --}}
                        <button class="mt-10 ml-6 text-danger cart_remove" onclick="removeItem({{$id}})">
                            <svg xmlns="http://www.w3.org/2000/svg"  fill="red" class="w-8 h-8 bi bi-trash " viewBox="0 0 16 16">
                                <path d="M1.5 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2V3h2a1 1 0 0 1 0 2H1a1 1 0 0 1 0-2h2V2zm12 2V2a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v2h10zM1 5h1v9a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V5h1a1 1 0 0 0 0-2H1a1 1 0 0 0 0 2zm4-3h1V2a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v1h1a1 1 0 1 1 0 2H5a1 1 0 1 1 0-2z"/>
                            </svg>
                        </button>


                    </div>
                @endforeach
                <div class="flex flex-row">
                    <div class="flex items-center w-1/4 p-4 ml-32 mr-6 bg-white rounded-lg shadow-md">
                        <h2 class="mr-2 text-xl font-semibold text-teal-700">Total:</h2>
                        <p class="text-lg text-teal-700"> Rs {{ $total }}</p>
                    </div>
                    <div class="items-center w-1/6 p-4 bg-teal-400 rounded-lg shadow-md ">
                        <button class="mr-2 text-xl font-bold text-white">Checkout</button>

                    </div>

                </div>
            @else
            <div class="flex flex-col items-center mt-24 ml-32">
                <img src="{{ URL('images/cart.png') }}" alt="Empty Cart" class="w-40 h-32 mb-4">
                <h2 class="text-2xl font-semibold text-teal-700">Your Cart is Empty</h2>
                <p class="mb-8 text-gray-500">Add items to your cart and start shopping!</p>
                <a href="{{ route('user.dashboard') }}" class="px-6 py-3 text-white transition duration-300 bg-teal-500 rounded-md hover:bg-teal-600">Go to Dashboard</a>
            </div>
            @endif


        </div>

    </div>
</body>

@section('scripts')
<script>
    $(" .cart_remove").click(function (e){
        e.preventDefault();

        var ele = $(this);

        if(confirm("Do you really want to remove?")){
            $ .ajax({
                url: '{{route('remove_from_cart')}}',
                method: "DELETE",
                data:{
                    _token:'{{csrf_token()}}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function(response){
                    window.location.reload();
                }
            })
        }
    })
</script>
    {{-- <script>
        function increaseQuantity(medicineId) {
            const quantityInput = document.getElementById(`quantity_${medicineId}`);
            const currentQuantity = parseInt(quantityInput.value);
            quantityInput.value = currentQuantity + 1;
        }

        function decreaseQuantity(medicineId) {
            const quantityInput = document.getElementById(`quantity_${medicineId}`);
            const currentQuantity = parseInt(quantityInput.value);
            if (currentQuantity > 0) {
                quantityInput.value = currentQuantity - 1;
            }
        }

        function removeItem(medicineId) {
            // Add logic to remove the item from the cart
        }
    </script> --}}
</body>
</html>
