@include('user.menubar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
</head>
<body>
    <div class="mt-20 mr-4 md:ml-64">
        <div class="flex flex-wrap">
            @foreach ($medicines as $medicine)
                <div class="w-full px-2 mb-4 md:w-1/2 lg:w-1/2">
                    <div class="flex flex-col items-center justify-center h-full p-2 bg-white rounded-lg shadow-md">
                        <!-- Medicine Photo -->
                        <div class="flex items-center justify-center w-32 h-32">
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
                            <p class="mt-2 text-sm text-gray-500">Pharmacy: N/A</p>
                        @endif

                        <!-- Add to Cart Button -->
                        <button  onclick="window.location.href='/user/order'" class="px-4 py-2 mt-2 text-white bg-[#30afa3] rounded-md hover:bg-green-600">
                            Add to Cart
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
</body>
</html>
