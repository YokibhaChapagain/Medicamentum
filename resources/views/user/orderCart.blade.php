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
    <div class="flex justify-center mt-20">
        <div class="w-full md:w-2/3 lg:w-1/2">
                <div class="flex items-center p-4 mb-4 ml-32 bg-white rounded-lg shadow-md">
                    <div class="w-24 h-24 mr-4">
                        <img src="{{ asset('storage/' . $medicine->image) }}" alt="{{ $medicine->name }} Image" class="object-contain w-full h-full">
                    </div>

                    <div class="flex flex-col justify-between flex-grow"> <!-- Use justify-between to push content to the bottom -->
                        <h2 class="text-xl font-semibold text-teal-600">{{ $medicine->name }}</h2>

                        <p class="text-gray-600">Rs. {{ $medicine->price }}</p>

                        @if ($medicine->pharmacy)
                            <p class="mt-2 text-sm text-gray-500">Pharmacy: {{ $medicine->pharmacy->pharmacyUser->name ?? 'N/A' }}</p>
                        @else
                            <p class="mt-2 text-sm text-gray-500">Pharmacy: N/A</p>
                        @endif
                    </div>

                    <div class="flex flex-row items-end mt-4">
                        <button class="px-3 py-1 bg-gray-300 rounded-l" onclick="decreaseQuantity({{ $medicine->id }})">-</button>
                        <input type="number" class="w-16 mx-2 text-center" id="quantity_{{ $medicine->id }}" value="0" readonly>
                        <button class="px-3 py-1 bg-gray-300 rounded-r" onclick="increaseQuantity({{ $medicine->id }})">+</button>
                    </div>
                </div>
        </div>
    </div>


    <script>
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
    </script>
</body>
</html>
