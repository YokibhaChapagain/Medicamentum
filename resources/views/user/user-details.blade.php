@include('user.menubar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

</head>
<body>

    <div class="mr-4 md:ml-64">
        <div class="flex items-center justify-center h-screen">
            <div class="p-10 text-center text-white bg-teal-500 rounded-lg shadow-lg">
                <h2 class="mb-4 text-3xl font-bold">{{ $user->name }}</h2>
                <div class="mb-2">
                    <span class="text-gray-700">Email:</span>
                    <span>{{ $user->email }}</span>
                </div>
                <div class="mb-2">
                    <span class="text-gray-700">Phone Number:</span>
                    <span>{{ $user->mobilenumber }}</span>
                </div>
                <button onclick="window.location.href='{{ route('user.update', ['user' => $user]) }}'" class="px-4 py-2 mt-4 font-bold text-teal-500 bg-white rounded-xl hover:bg-gray-300" id="update-button">Update</button>
            </div>
        </div>


        </div>

</body>
</html>
