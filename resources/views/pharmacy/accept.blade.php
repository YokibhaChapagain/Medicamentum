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
            <div class="bg-gray-200 text-lg font-semibold p-3">
                <span class="font-bold">Accept Quotation</span>
            </div>

            <div class="p-4">
                <table class="table-auto w-full">
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
                                    <div class="px-4 py-2 bg-yellow-500 text-white rounded-full">
                                        Pending
                                    </div>
                                    @elseif ($row->status == 1)
                                    <div class="px-4 py-2 bg-green-500 text-white rounded-full">
                                        Accept
                                    </div>
                                    @elseif ($row->status == 2)
                                    <div class="px-4 py-2 bg-red-500 text-white rounded-full">
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

