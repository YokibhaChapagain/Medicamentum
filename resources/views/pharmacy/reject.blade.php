@include('pharmacy.menubar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
</head>
<body>
    <div class="mx-4 mb-4 mt-28 md:ml-64">
        <div class="bg-white shadow-md rounded-lg">
            <div class="px-4 py-2 font-semibold bg-gray-300">
                <span class="font-bold">Reject Quotation</span>
            </div>

            <div class="p-4">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2">Item Orders</th>
                            <th class="px-4 py-2">Note</th>
                            <th class="px-4 py-2">Total Amount</th>
                            <th class="px-4 py-2">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $i = 1; @endphp
                        @forelse ($data as $row)
                            <tr>
                                <td class="px-4 py-2">{{ $i++ }}</td>
                                <td class="px-4 py-2">{{ $row->note }}</td>
                                <td class="px-4 py-2">{{ $row->amount }}</td>
                                <td>
                                    @if ($row->status == 0)
                                        <div class="px-4 py-1 bg-yellow-500 rounded-full text-white">
                                            Pending
                                        </div>
                                    @elseif ($row->status == 1)
                                        <div class="px-4 py-1 bg-green-500 rounded-full text-white">
                                            Accept
                                        </div>
                                    @elseif ($row->status == 2)
                                        <div class="px-4 py-1 bg-red-500 rounded-full text-white">
                                            Reject
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-2 text-center text-red-500">No Data Records</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>
</html>
