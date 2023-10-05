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
    <div class="mx-4 mt-20 mb-4 md:ml-64">

    <div class="mx-auto mt-8 overflow-hidden bg-white shadow-lg rounded-xl" style="width: 60%;">
        <div class="flex items-center justify-center mb-4 overflow-hidden border-2"  style="max-height: 50vh">
            <a href="{{ asset('storage/' . $medicine->image) }}" target="_blank">
                <div class="object-cover overflow-hidden">
                    <img src="{{ asset('storage/' . $medicine->image) }}" alt="{{ $medicine->name }}" class="object-cover w-full h-full" />
                </div>
            </a>
        </div>

        <div class="p-4 text-center">
            <div class="mb-2 text-3xl font-bold text-teal-700">{{$medicine->name}}</div>
            <p class="mb-2 text-base text-gray-600">{{$medicine->description}}</p>
            <p class="mb-2 text-xl font-bold text-teal-700"> Rs. {{$medicine->price}}</p>

            {{-- <div class="flex justify-between"> --}}
                <div class="items-center">
                    <div class="flex justify-center space-x-4">
                        <button class="px-4 py-2 text-base text-gray-700 bg-gray-200 hover:bg-gray-300">Manufacture Date: {{$medicine->manufacture}}</button>
                        <button class="px-4 py-2 text-base text-gray-700 bg-gray-200 hover:bg-gray-300">Expiration Date: {{$medicine->expiration}}</button>
                    </div>

                    @if ($medicine->prescription_required == 0)
                    <div class="mt-4 ">
                        <span class="font-semibold text-green-500">Prescription: Not Required</span>
                    </div>
                @elseif ($medicine->prescription_required == 1)
                    <div class="mt-4">
                        <span class="font-semibold text-red-500">Prescription Required</span>
                    </div>
                @endif

                </div>

            {{-- </div> --}}
        </div>
    </div>
</div>
</body>
</html>
