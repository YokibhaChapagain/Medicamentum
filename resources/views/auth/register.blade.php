
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')

</head>
<body>
    <section class="flex items-center justify-center min-h-screen bg-teal-50">

        <!-- Register Container -->

        <div class="flex max-w-3xl p-5 bg-gray-100 shadow-lg rounded-2xl">

         <!-- Form -->
        <div class="sm:w-1/2 px-14">

            <h2 class="text-2xl font-bold text-[#318ECB] text-center">Register</h2>

            <form action="{{url('/register')}}" method="post" class="flex flex-col gap-4" enctype="multipart/form-data">
                @csrf

                <input class="p-2 mt-4 border rounded-xl" type="text" id="name" name="name" placeholder="Name" />

                @error('name')
                <span class="text-red-500">{{ $message }}</span>
                 @enderror

                <input class="p-2 border rounded-xl" type="email" id="email" name="email" placeholder="Email" />

                @error('email')
                <span class="text-red-500">{{ $message }}</span>
                 @enderror


                <input class="p-2 border rounded-xl" type="password" id="password" name="password" placeholder="Password">

                @error('password')
                <span class="text-red-500">{{ $message }}</span>
                @enderror

                <input class="p-2 border rounded-xl" type="password" id=" password_confirmation" name=" password_confirmation" placeholder="Confirm Password ">

                @error('password_confirmation')
                <span class="text-red-500">{{ $message }}</span>
                @enderror

                <select class="p-2 text-gray-600 border rounded-xl dark:bg-gray-200" name="role" id="role">
                    <option value="" disabled selected>Select a role</option>
                    <option value="User">User</option>
                    <option value="Pharmacy">Pharmacy</option>
                    <option value="Admin">Admin</option>
                </select>

                @error('role')
                <span class="text-red-500">{{ $message }}</span>
                 @enderror

                 <input class="p-2 mb-2 border rounded-xl" type="number" id="mobilenumbern" name="mobilenumber" placeholder="Mobile Number ">

                 <div class="relative">
                    <input type="file" id="profile_image" name="profile_image" class="hidden">
                    <label for="profile_image" class="p-2 text-gray-500 transition duration-300 ease-in-out bg-white rounded-md cursor-pointer hover:bg-gray-300">
                        Upload Profile Image
                    </label>
                </div>
                <button  class="bg-[#318ECB] rounded-xl text-white py-2 my-2" type="submit">Confirm Registration</button>

            </form>
        </div>

        <!-- Image -->
        <div class="hidden w-1/2 my-20 mr-4 sm:block">
            <img class=" rounded-2xl" src="{{ URL('images/medi.png') }}" alt="medicamentum" >
        </div>
        </div>
    </section>

</body>
</html>


