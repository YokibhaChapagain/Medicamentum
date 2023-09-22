@include('pharmacy.menubar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

</head>
<body>
    <div class="mt-20 mb-10 ml-14 md:ml-64">
        <div class="flex justify-between text-gray-900">
            <div class="flex p-4">
                <h1 class="text-3xl font-semibold">
                    Medicines
                </h1>
            </div>
            <div class="mt-6 mr-2">
                <button onclick="window.location.href='/pharmacy/addmedicine'" class="inline-flex items-center justify-center w-8 h-8 mr-2 text-pink-100 transition-colors duration-150 bg-pink-700 rounded-full focus:shadow-outline hover:bg-pink-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                      </svg>
                </button>
            </div>

        </div>

        @if(session()->has('message'))
        <div class="block px-4 py-3 mx-4 mb-4 text-xl text-green-700 bg-green-100 rounded alert alert-success" id="success-message">
            {{ session()->get('message') }}
        </div>
        @endif

        @if(session()->has('remove'))
        <div class="block px-4 py-3 mx-4 mb-4 text-xl text-green-700 bg-green-100 rounded alert alert-success" id="remove-message">
            {{ session()->get('remove') }}
        </div>
        @endif

        @if(session()->has('status'))
        <div class="block px-4 py-3 mx-4 mb-4 text-xl text-green-700 bg-green-100 rounded alert alert-success" id="status-message">
            {{ session()->get('status') }}
        </div>
        @endif

            <div class="flex justify-center px-3 py-4">
                <table class="w-full mb-4 bg-gray-200 rounded shadow-md text-md">
                    <tbody>
                        <tr class="order-b">

                            <th class="p-3 px-4 text-left">Name</th>
                            <th class="p-3 px-4 text-left">Description</th>
                            <th class="p-3 px-4 text-left">Manufacture</th>
                            <th class="p-3 px-4 text-left">Price</th>
                            <th class="p-3 px-4 text-left">Quantity</th>
                            <th class="p-3 px-4 text-left">Prescription</th>
                            <th class="p-3 px-4 text-left">Image</th>
                            <th class="p-3 px-16 text-left">Action</th>

                            <th></th>
                        </tr>

                        @foreach ($medicines as $index => $medicine)
                        <tr class="{{ $index % 2 == 0 ? 'bg-gray-100' : 'bg-white' }} hover:bg-blue-100">

                            <td class="p-3 px-4 text-left">{{ $medicine->name }}</td>
                            <td class="p-3 px-4 text-left">{{ $medicine->description }}</td>
                            <td class="p-3 px-4 text-left">{{ $medicine->manufacture }}</td>
                            <td class="p-3 px-4 text-left">{{ $medicine->price }}</td>
                            <td class="p-3 px-4 text-left">{{ $medicine->quantity }}</td>
                            <td class="p-3 px-4 text-left">{{ $medicine->prescription_required ? 'Yes' : 'No' }}</td>
                            <td class="p-3 px-4 text-left ">
                                <img src="{{asset('storage/'.  $medicine->image) }}" alt="{{ $medicine->name }} Image" height="50" width="50">
                            </td>
                            <td class="flex justify-center p-4 px-5">
                                <button type="button" onclick="window.location='{{ route('edit', ['id' => $medicine->id]) }}'"
                                        class="px-2 py-1 mr-3 text-sm text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                                    Edit
                                </button>
                                <button onclick="window.location='{{ route('delete', ['id' => $medicine->id]) }}'"
                                    class="px-2 py-1 text-sm text-white bg-red-500 rounded hover:bg-red-700 focus:outline-none focus:shadow-outline">
                                Delete
                            </button>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    setTimeout(function() {
        var successMessage = document.getElementById('success-message');
        if (successMessage) {
            successMessage.style.display = 'none';
        }
    }, 2000);
</script>

<script>
    setTimeout(function() {
        var removeMessage = document.getElementById('remove-message');
        if (removeMessage) {
            removeMessage.style.display = 'none';
        }
    }, 2000);
</script>


<script>
    setTimeout(function() {
        var statusMessage = document.getElementById('status-message');
        if (statusMessage) {
            statusMessage.style.display = 'none';
        }
    }, 2000);
</script>
