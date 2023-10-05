@include('pharmacy.menubar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <style>
        .chart {
            width: 100%;
            max-width: 600px;
            height: 300px;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="mt-20 mb-10 mr-4 ml-14 md:ml-64">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            <div class="mb-3">
                <div class="p-4 bg-gray-100 rounded-md shadow-md">
                    <h5 class="text-3xl font-bold text-center">{{$newMedicines}}</h5>
                    <p class="text-center">New Prescription</p>
                    <div class="mt-4 text-center">
                        <a href="{{ url('pharmacy/prescription-list') }}" class="text-black underline hover:text-gray-400">More Info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="p-4 bg-gray-100 rounded-md shadow-md">
                    <h5 class="text-3xl font-bold text-center">{{$customers}}</h5>
                    <p class="text-center">Total Customers</p>
                    <div class="mt-4 text-center">
                        <a href="{{url('pharmacy/customers')}}" class="text-black underline hover:text-gray-400">More Info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="p-4 bg-gray-100 rounded-md shadow-md">
                    <h5 class="text-3xl font-bold text-center">{{$medicines}}</h5>
                    <p class="text-center">Total Medicine</p>
                    <div class="mt-4 text-center">
                        <a href="{{url('pharmacy/inventory')}}" class="text-black underline hover:text-gray-400">More Info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="p-4 border-2 border-green-500 rounded-md shadow-md bg-gradient-to-r from-green-100 to-green-300" style="background-color: transparent;">
                    <h5 class="text-3xl font-bold text-center">{{$accept}}</h5>
                    <p class="text-center">Accept Prescription</p>
                    <div class="mt-4 text-center">
                        <a href="{{url('pharmacy/accept')}}" class="text-black underline hover:text-white">More Info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>


            <div class="mb-3">
                <div class="p-4 border-2 border-red-500 rounded-md shadow-md bg-gradient-to-r from-red-200 to-red-300" style="background-color: transparent;">
                    <h5 class="text-3xl font-bold text-center">{{$reject}}</h5>
                    <p class="text-center">Reject Prescription</p>
                    <div class="mt-4 text-center">
                        <a href="{{url('pharmacy/reject')}}" class="text-black underline hover:text-white">More Info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>


            <div class="mb-3">
                <div class="p-4 border-2 border-yellow-500 rounded-md shadow-md bg-gradient-to-r from-yellow-300 to-yellow-100">
                    <h5 class="text-3xl font-bold text-center">{{$pending}}</h5>
                    <p class="text-center">Pending Prescription</p>
                    <div class="mt-4 text-center">
                        <a href="{{ url('pharmacy/pending') }}" class="text-black underline hover:text-white">More Info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container p-2 mx-auto">
            <h1 class="mb-4 text-2xl font-semibold">Sales Report</h1>
            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-xs font-semibold leading-4 tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b border-gray-200">Date</th>
                            <th class="px-6 py-3 text-xs font-semibold leading-4 tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b border-gray-200">User</th>
                            <th class="px-6 py-3 text-xs font-semibold leading-4 tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b border-gray-200">Price</th>
                            <th class="px-6 py-3 text-xs font-semibold leading-4 tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b border-gray-200">Quantity</th>
                            <th class="px-6 py-3 text-xs font-semibold leading-4 tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b border-gray-200">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">2023-10-01</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">Steve Thapa</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">Rs 25.00</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">5</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">Rs 125.00</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">2023-10-02</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">Kailash Kher</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">Rs 30.00</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">3</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">Rs 90.00</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">2023-10-03</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">Prince Shah</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">Rs 15.00</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">8</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">Rs 120.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>
</html>

{{-- @include('pharmacy.menubar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="mt-20 mb-10 mr-4 ml-14 md:ml-64">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            <div class="mb-3">
                <div class="p-4 border-4 border-pink-400 rounded-md shadow-md">
                    <h5 class="text-3xl font-bold text-center">{{$newMedicines}}</h5>
                    <p class="text-center">New Prescription</p>
                    <div class="mt-4 text-center">
                        <a href="{{ url('pharmacy/prescription-list') }}" class="text-red-500 underline hover:text-gray-400">More Info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="p-4 border-4 rounded-md shadow-md border-cyan-400">
                    <h5 class="text-3xl font-bold text-center">{{$customers}}</h5>
                    <p class="text-center">Total Customers</p>
                    <div class="mt-4 text-center">
                        <a href="{{url('customers')}}" class="underline text-cyan-500 hover:text-gray-400">More Info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="p-4 border-4 border-orange-400 rounded-md shadow-md">
                    <h5 class="text-3xl font-bold text-center">{{$accept}}</h5>
                    <p class="text-center">Accept Prescription</p>
                    <div class="mt-4 text-center">
                        <a href="{{url('pharmacy/accept')}}" class="text-orange-600 underline hover:text-gray-400">More Info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="p-4 border-4 border-red-200 rounded-md shadow-md">
                    <h5 class="text-3xl font-bold text-center">{{$pending}}</h5>
                    <p class="text-center">Pending Prescription</p>
                    <div class="mt-4 text-center">
                        <a href="{{ url('pharmacy/pending') }}" class="text-pink-300 underline hover:text-gray-400">More Info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="p-4 border-4 border-purple-400 rounded-md shadow-md" style="background-color: transparent;">
                    <h5 class="text-3xl font-bold text-center">{{$reject}}</h5>
                    <p class="text-center">Reject Prescription</p>
                    <div class="mt-4 text-center">
                        <a href="{{url('pharmacy/reject')}}" class="text-purple-600 underline hover:text-gray-400">More Info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="p-4 border-4 border-yellow-200 rounded-md shadow-md" style="background-color: transparent;">
                    <h5 class="text-3xl font-bold text-center">{{$medicines}}</h5>
                    <p class="text-center">Total Medicines</p>
                    <div class="mt-4 text-center">
                        <a href="{{url('pharmacy/inventory')}}" class="text-yellow-600 underline hover:text-gray-400">More Info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
 --}}

