@include('pharmacy.menubar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')

</head>
<body class="bg-gray-100">

<div class="mx-4 mb-4 mt-28 md:ml-64">
    <div class="overflow-hidden bg-white rounded-lg shadow-md">
        <div class="px-4 py-4 font-bold text-gray-600 bg-gray-300 rounded-lg shadow-md">
            New Prescription
            <a href="{{ url('pharmacy/dashboard') }}" class="float-right px-4 py-1 text-white bg-blue-500 rounded-md hover:bg-blue-700">Back</a>
        </div>
        <div class="p-4">
            <table class="w-full table-auto">
                <thead class="text-white bg-[#369f95]">
                    <th class="px-4 py-2">S.No</th>
                    <th class="px-4 py-2">Customer Name</th>
                    <th class="px-4 py-2">Note</th>

                    <th class="px-4 py-2">Action</th>
                </thead>

                @php $i=1 @endphp

                <tbody>
                    @forelse ($prescription as $row)
                        <tr>
                            <td class="px-4 py-2">{{ $i++ }}</td>
                            <td class="px-4 py-2">{{ $row->user->name }}</td>
                            <td class="px-4 py-2">{{ $row->note }}</td>
                            <td class="px-4 py-2 ">
                                @if ($row->confirm == 0)

                                <button type="button" onclick="window.location='{{ url('pharmacy/uploaded-prescription/'.$row->id) }}'"
                                    class="inline-block px-4 py-2 font-bold text-white bg-orange-500 rounded-md hover:bg-blue-500">
                                Add Medications (New)
                            </button>

                                @elseif($row->confirm == 1)
                                <button type="button" onclick="window.location='{{ url('pharmacy/uploaded-prescription/'.$row->id) }}'"
                                class="inline-block px-4 py-2 font-bold text-white bg-green-500 rounded-md hover:bg-green-500">
                            Add Medications
                        </button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-4 py-2 font-bold text-center text-danger" colspan="5">No Data Record</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
