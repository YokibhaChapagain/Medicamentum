@include('user.menubar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')


</head>
<body>
    <div class="flex items-center justify-center h-screen">
        <form class="p-8 text-center bg-white rounded-lg shadow-lg" method="POST" action="{{ route('user.update', ['user' => $user]) }}">
            @csrf
            @method('PUT')

            <h2 class="mb-4 text-3xl font-bold">{{ $user->name }}</h2>

            <div class="mb-4">
                <label for="email" class="text-gray-700">Email:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" class="w-full px-4 py-2 border border-gray-400 rounded-full focus:outline-none focus:ring focus:border-blue-300" required>
            </div>

            <div class="mb-4">
                <label for="mobilenumber" class="text-gray-700">Phone Number:</label>
                <input type="tel" id="mobilenumber" name="mobilenumber" value="{{ $user->mobilenumber }}" class="w-full px-4 py-2 border border-gray-400 rounded-full focus:outline-none focus:ring focus:border-blue-300" required>
            </div>

            <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-600">Update</button>
        </form>
    </div>
</body>
</html>



