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
    <div class="mx-4 mt-28 md:ml-64">
        <div class="p-4 bg-white rounded-lg shadow-md">
            <div class="mb-4 text-xl font-bold">
                Quotation Details
                <a href="{{url('user/prepared-quotation')}}" class="float-right px-4 py-1.5 text-sm text-white bg-blue-500 rounded-md">Back</a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3">S No</th>
                            <th class="px-6 py-3">Drugs</th>
                            <th class="px-6 py-3">Quantity</th>
                            <th class="px-6 py-3">Amount</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $i=1; $total=0; @endphp
                        @forelse ($quotations as $row)
                            <tr>
                                <td class="px-6 py-3">{{ $i++ }}</td>
                                <td class="px-6 py-3">{{ $row->medicine_name }}</td>
                                <td class="px-6 py-3">{{ $row->amount }} x {{ $row->quanity }}</td>
                                <td class="px-6 py-3 text-right">{{ $row->total }}</td>
                                @php $total+= $row->total; @endphp
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-danger">No Data Records</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                <form action="{{url('/user/status-update')}}" method="POST">
                    @csrf
                    <div class="flex items-center space-x-4">
                        <label for="status" class="text-lg font-semibold">User can accept/reject the quotation</label>
                        <select class="form-control drug_name @error('status') border-red-500 @enderror"
                            name="status">
                            <option value="" selected disabled>-Select quotation-</option>
                            <option value="1">Accept</option>
                            <option value="2">Reject</option>
                        </select>
                        @error('status')
                        <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input type="text" value="{{$row->order_id}}" name="id" hidden>
                        <button type="submit" class="px-4 py-2 text-white bg-green-500 rounded-md">Submit</button>
                    </div>
                </form>
            </div>

            <div class="px-6 py-3 font-semibold text-right">
                Total
            </div>
            <div class="px-6 py-3 font-semibold text-right">
                {{ $total }}.00
            </div>
        </div>
    </div>
</body>
</html>
