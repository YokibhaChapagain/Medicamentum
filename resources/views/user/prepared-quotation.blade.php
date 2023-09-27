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
        <div class="bg-white shadow-md rounded-xl">
            <div class="p-4 bg-gray-200 rounded-xl">
                <span class="text-xl font-bold">Prepared Quotation</span>
                <a href="{{url('user-dashboard')}}" class="float-right px-4 py-1 text-white bg-blue-600 rounded-md">Back</a>
            </div>

            <div class="p-4">
                <table class="w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2">Item Orders</th>
                            <th class="px-4 py-2">Note</th>
                            <th class="px-4 py-2">Total Amount</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $i=1; @endphp
                        @php $total=0; @endphp
                        @forelse ($data as $row)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$row->note}}</td>
                                <td>{{$row->amount}}</td>
                                <td>
                                    @if($row->status == 0)
                                    <span class="px-4 py-1 text-white bg-yellow-500 rounded-full">Pending</span>
                                    @elseif ($row->status == 1)
                                    <span class="px-4 py-1 text-white bg-green-500 rounded-full">Accept</span>
                                    @elseif ($row->status == 2)
                                    <span class="px-4 py-1 text-white bg-red-500 rounded-full">Reject</span>
                                    @endif
                                </td>
                                <td>
                                    @if($row->status == 0)
                                    <a href="{{url('quoation-details')}}/{{$row->order_id}}" class="px-4 py-1 text-white bg-blue-500 rounded-md">View</a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-danger">No Data Records</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
