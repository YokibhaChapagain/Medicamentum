
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')

</head>
<body>
    <section class="flex items-center justify-center min-h-screen bg-teal-50">

        <!-- Login Container -->

        <div class="flex max-w-3xl p-5 bg-gray-100 shadow-lg rounded-2xl">

         <!-- Form -->
        <div class="sm:w-1/2 px-14">
            <h2 class="text-2xl font-bold text-[#318ECB]">Login</h2>
            <p class="mt-4 text-xs text-[#318ECB]">If you're already a member, easily log in</p>

            <form action="{{route('login')}}" method="post" class="flex flex-col gap-4">
                @csrf

                <input class="p-2 mt-8 border rounded-xl" type="email" id="email" name="email" placeholder="Email" />

                @error('email')
                <span class="text-red-500">{{ $message }}</span>
                 @enderror

                <input class="p-2 border rounded-xl" type="password" id="password" name="password" placeholder="Password">

                @error('password')
                <span class="text-red-500">{{ $message }}</span>
                @enderror


                <button  class="bg-[#318ECB] rounded-xl text-white py-2 mt-2" type="submit">Log in</button>

                <a href="#!" class="py-4 mt-2 text-xs border-b">Forgot password?</a>

                <div class="flex items-center justify-between text-xs">
                    <p>Don't have an account?</p>

                    <a href='/register' class="px-8 py-2 bg-white border border-gray-300 rounded-xl text-[#318ECB] font-semibold">Register</a>
                </div>

            </form>



        </div>
            <!-- Image -->
            <div class="hidden w-1/2 my-12 mr-4 sm:block">
                <img class=" rounded-2xl" src="{{ URL('images/medi.png') }}" alt="medicamentum" >
            </div>
        </div>

    </section>


















</body>


</html>


