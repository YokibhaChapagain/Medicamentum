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
        <div class="p-4 mb-4 bg-teal-300 rounded-lg">
            <h1 class="flex text-2xl">
                <div class="mr-2 font-bold">Welcome,</div>  <div class="text-white">{{$user->name}}</div>
            </h1>
        </div>

        <div class="flex flex-wrap -mx-2">
            @foreach ($medicines as $medicine)
                <div class="w-full px-2 mb-4 md:w-1/2 lg:w-1/4">
                    <div class="flex flex-col items-center justify-center h-full p-2 bg-white rounded-lg shadow-md">
                        <!-- Medicine Photo -->
                        <div class="flex items-center justify-center w-40 h-32">
                            <img src="{{ asset('storage/' . $medicine->image) }}" alt="{{ $medicine->name }} Image" class="object-contain max-w-full max-h-full">
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

                        <div class="flex mt-2">
                            <button onclick="window.location.href='/user/order'" class="px-2 text-white bg-teal-400 rounded-md hover:bg-green-600">
                                Add to Cart
                            </button>

                            <button onclick="window.location.href='/user/medicine/{{ $medicine->id }}'" class="px-2 py-2 ml-4 text-white bg-[#318ECB] rounded-md hover:bg-blue-600">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>


</body>
</html>
