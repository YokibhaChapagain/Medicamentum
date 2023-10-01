@include('pharmacy.menubar')

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
                <div class="p-4 border-4 border-pink-400 rounded-md shadow-md bg-gradient-to-r from-pink-300 to-pink-100">
                    <h5 class="text-3xl font-bold text-center">{{$newMedicines}}</h5>
                    <p class="text-center">New Prescription</p>
                    <div class="mt-4 text-center">
                        <a href="{{ url('pharmacy/prescription-list') }}" class="text-red-500 underline hover:text-black">More Info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="p-4 border-4 rounded-md shadow-md border-cyan-400 bg-gradient-to-r from-cyan-300 to-cyan-100">
                    <h5 class="text-3xl font-bold text-center">{{$customers}}</h5>
                    <p class="text-center">Total Customers</p>
                    <div class="mt-4 text-center">
                        <a href="{{url('customers')}}" class="underline text-cyan-500 hover:text-black">More Info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="p-4 border-4 border-orange-400 rounded-md shadow-md bg-gradient-to-r from-orange-300 to-orange-100">
                    <h5 class="text-3xl font-bold text-center">{{$accept}}</h5>
                    <p class="text-center">Accept Prescription</p>
                    <div class="mt-4 text-center">
                        <a href="{{url('pharmacy/accept')}}" class="text-orange-600 underline hover:text-black">More Info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="p-4 border-4 border-red-200 rounded-md shadow-md bg-gradient-to-r from-red-100 to-red-50">
                    <h5 class="text-3xl font-bold text-center">{{$pending}}</h5>
                    <p class="text-center">Pending Prescription</p>
                    <div class="mt-4 text-center">
                        <a href="{{ url('pharmacy/pending') }}" class="text-pink-300 underline hover:text-black">More Info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="p-4 border-4 border-purple-400 rounded-md shadow-md bg-gradient-to-r from-purple-300 to-purple-100" style="background-color: transparent;">
                    <h5 class="text-3xl font-bold text-center">{{$reject}}</h5>
                    <p class="text-center">Reject Prescription</p>
                    <div class="mt-4 text-center">
                        <a href="{{url('pharmacy/reject')}}" class="text-purple-600 underline hover:text-black">More Info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="p-4 border-4 border-yellow-200 rounded-md shadow-md bg-gradient-to-r from-yellow-300 to-yellow-100" style="background-color: transparent;">
                    <h5 class="text-3xl font-bold text-center">{{$medicines}}</h5>
                    <p class="text-center">Total Medicines</p>
                    <div class="mt-4 text-center">
                        <a href="{{url('pharmacy/inventory')}}" class="text-yellow-600 underline hover:text-black">More Info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
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

