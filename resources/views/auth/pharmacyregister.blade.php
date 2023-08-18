<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')

</head>
<body>
    <section class="flex items-center justify-center min-h-screen bg-teal-50">

        <!-- Pharmacy Register Container -->

        <div class="flex max-w-3xl p-5 bg-gray-100 shadow-lg rounded-2xl">

         <!-- Form -->
        <div class="sm px-14">
            <h2 class="text-2xl font-bold text-[#318ECB] text-center">Pharmacy Details</h2>

            <form action="{{url('/pharmacy/register')}}" method="post" class="flex flex-col gap-2">
                @csrf

                <label class="mt-8 text-[#318ECB] "> Registration Number</label>
                <input class="p-2 mb-4 border rounded-xl" type="text" id="registration" name="registration" placeholder="R-XXXX/YYYY" />

                @error('registration')
                <span class="text-red-500">{{ $message }}</span>
                 @enderror

                <label class="text-[#318ECB] "> License Number</label>
                <input class="p-2 mb-4 border rounded-xl" type="text" id="license" name="license" placeholder="L-YYYY/XXXX" />

                @error('license')
                <span class="text-red-500">{{ $message }}</span>
                 @enderror

                <label class="text-[#318ECB] ">Telephone Number</label>
                <input class="p-2 mb-4 border rounded-xl" type="number" id="telephonenumber" name="telephonenumber" placeholder="Telephone Number">

                @error('telephonenumber')
                <span class="text-red-500">{{ $message }}</span>
                @enderror

                <label class="text-[#318ECB] ">Location</label>
                <input class="p-2 mb-4 border rounded-xl" type="text" id=" location" name=" location" placeholder="Location ">

                @error('location')
                <span class="text-red-500">{{ $message }}</span>
                @enderror

                <button  class="bg-[#318ECB] rounded-xl text-white py-2 my-3" type="submit">Submit </button>

            </form>

    </section>


</body>
</html>



