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


            <div class="mb-4">
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

            <h1 class="mb-6 text-2xl font-semibold text-teal-700">Sales Report</h1>

            <div class="flex justify-between space-x-4">
                <a href="{{ url('pharmacy/sales-report') }}" class="flex-1 p-6 text-black transition-all duration-300 bg-teal-200 rounded-lg hover:bg-teal-500">
                    <h2 class="mb-2 text-xl font-semibold">Prescribed Sales</h2>
                    <p class="text-sm">View the verified sales report.</p>
                </a>


                <a href="{{ url('pharmacy/manual-sales-report') }}" class="flex-1 p-6 text-black transition-all duration-300 bg-teal-200 rounded-lg hover:bg-teal-500">
                    <h2 class="mb-2 text-xl font-semibold">Non-prescribed Sales</h2>
                    <p class="text-sm">View the manual sales report.</p>
                </a>
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

