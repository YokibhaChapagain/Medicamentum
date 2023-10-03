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

        <div class="bg-white rounded-lg shadow">
            <div class="p-3 text-lg font-semibold bg-gray-200">
                <span class="font-bold">Accept Quotation</span>
            </div>

            <div class="p-4">
                <table class="w-full border-separate border-spacing-y-2">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2">Item Orders</th>
                            <th class="px-4 py-2">Note</th>
                            <th class="px-4 py-2">Total Amount</th>
                            <th class="px-4 py-2">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $i=1; @endphp
                        @php $total=0; @endphp
                        @forelse ($data as $row)
                            <tr>
                                <td class="px-4 py-2">{{$i++}}</td>
                                <td class="px-4 py-2">{{$row->note}}</td>
                                <td class="px-4 py-2">{{$row->amount}}</td>
                                <td>
                                    @if($row->status == 0)
                                    <div class="px-4 py-2 text-white bg-yellow-500 rounded-full">
                                        Pending
                                    </div>
                                    @elseif ($row->status == 1)
                                    <div class="px-4 py-2 text-white bg-green-500 rounded-full">
                                        Accept
                                    </div>
                                    @elseif ($row->status == 2)
                                    <div class="px-4 py-2 text-white bg-red-500 rounded-full">
                                        Reject
                                    </div>
                                    @endif
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-red-500">No Data Records</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>


</body>
</html>

