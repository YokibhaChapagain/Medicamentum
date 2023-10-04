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
        <form class="p-8 text-center bg-teal-500 rounded-lg shadow-lg" method="POST" action="{{ route('pharmacy.update', ['user' => $user]) }}"  enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="text-lg text-white">Name:</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" class="w-full px-4 py-2 border border-gray-400 rounded-full focus:outline-none focus:ring focus:border-blue-300" required>
            </div>

            <div class="mb-4">
                <label for="email" class="text-lg text-white">Email:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" class="w-full px-4 py-2 border border-gray-400 rounded-full focus:outline-none focus:ring focus:border-blue-300" required>
            </div>

            @if ($user->mobilenumber)
            <div class="mb-4">
                <label for="email" class="text-lg text-white">Mobile Number:</label>
                <input type="text" id="mobilenumber" name="mobilenumber" value="{{ $user->mobilenumber }}" class="w-full px-4 py-2 border border-gray-400 rounded-full focus:outline-none focus:ring focus:border-blue-300" required>
            </div>
            @endif
            <div class="mb-4">
                <label for="telephone" class="text-lg text-white">Telephone:</label>
                <input type="text" id="telephone" name="telephone" value="{{ $user->pharmacy ? $user->pharmacy->telephonenumber : '' }}" class="w-full px-4 py-2 border border-gray-400 rounded-full focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="mb-4">
                <label for="location" class="text-lg text-white">Location:</label>
                <input type="text" id="location" name="location" value="{{ $user->pharmacy ? $user->pharmacy->location : '' }}" class="w-full px-4 py-2 border border-gray-400 rounded-full focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="mb-4">
                <label for="profile_image" class="text-lg text-white">Profile Image:</label>
                <input type="file" id="profile_image" name="profile_image" accept="image/*" class="w-full px-4 py-2 border border-white rounded-full focus:outline-none focus:ring focus:border-blue-300">
        </div>

            <button type="submit" class="px-4 py-2 font-bold text-teal-500 bg-white rounded-xl hover:bg-gray-300">Update</button>
        </form>
    </div>
    </div>
</body>
</html>
