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
                <span class="text-xl font-bold">Prescription History</span>
                <a href="{{url('user/dashboard')}}" class="float-right px-4 py-1 text-white bg-blue-600 rounded-md">Back</a>
            </div>

            <div class="p-4">
                <table class="w-full">
                    <thead class="text-white bg-[#369f95]">
                        <tr>
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">Note</th>
                            <th class="px-4 py-2 text-center" colspan="3">Images</th>
                        </tr>
                    </thead>

                    @php $i=1; @endphp

                    <tbody>
                        @forelse ($user as $row)
                            <tr>
                                <td class="px-4 py-2 border">{{ $i++ }}</td>
                                <td class="px-4 py-2 border">{{ $row->note }}</td>
                                <td class="px-4 py-2 text-center border">
                                    @if($row->image1)
                                        <a href="{{ asset($row->image1) }}" target="_blank">
                                        <img src="{{ asset($row->image1) }}" alt="" class="w-12 h-12 rounded-full">
                                        </a>
                                     @else
                                         ---
                                     @endif
                                </td>
                                <td class="px-4 py-2 text-center border">
                                    @if($row->image2)
                                        <a href="{{ asset($row->image2) }}" target="_blank">
                                        <img src="{{ asset($row->image2) }}" alt="" class="w-12 h-12 rounded-full">
                                        </a>
                                     @else
                                         ---
                                     @endif
                                </td>
                                <td class="px-4 py-2 text-center border">
                                    @if($row->image3)
                                        <a href="{{ asset($row->image3) }}" target="_blank">
                                        <img src="{{ asset($row->image3) }}" alt="" class="w-12 h-12 rounded-full">
                                        </a>
                                     @else
                                         ---
                                     @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="px-4 py-2 text-center border text-danger" colspan="5">No Data Record</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
