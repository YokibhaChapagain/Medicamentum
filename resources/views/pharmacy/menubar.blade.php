<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

</head>
<body class="bg-gradient-to-r from-teal-100 via-teal-100 to-green-100">
    <nav class="fixed top-0 flex items-center w-full p-2 bg-white ">

            <div class="w-12 h-12 mx-5">
                <img class="max-w-full max-h-full " src="{{ URL('images/logo.png') }}" alt="medicamentum" >
            </div>

            <span class="text-3xl font-bold text-black">Medicamentum</span>

            <div class="flex-grow"></div>
            <div class="flex">
            <div class="relative hidden mx-auto text-gray-600 mr lg:block">
            <input
                class="h-10 pl-4 pr-20 text-sm bg-white border-2 border-gray-300 rounded-lg focus:outline-1"
                type="search" name="search" placeholder="Search">
            <button type="submit" class="absolute top-0 right-0 mt-3 mr-2">
                <svg class="w-4 h-4 text-gray-600 fill-current" xmlns="http://www.w3.org/2000/svg"
                     version="1.1" id="Capa_1" x="0px" y="0px"
                     viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                     xml:space="preserve"
                     width="512px" height="512px">
            <path
                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
          </svg>
            </button>
        </div>
        <a href="/pharmacy/pharmacy-details">
            <div class="w-10 h-10 mx-5 ">
                <img class="max-w-full max-h-full " src="{{ URL('images/user.png') }}" alt="medicamentum" >
            </div>
        </a>
        </div>

    </nav>

    <aside class="fixed hidden w-60 sm:block top-16">
        <div class="flex flex-col justify-between h-screen p-4 bg-white rounded-r-3xl">
            <div class="text-md">
              <div class="flex px-6 py-4 mt-8 space-x-6 font-bold text-black transition duration-100 cursor-pointer hover:bg-[#09756B] hover:text-white hover:rounded-br-3xl ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                  </svg>

                  <a href="{{url('/pharmacy/dashboard')}}">Dashboard</a>
              </div>

              <div class="flex px-6 py-4 mt-8 space-x-6 font-bold text-black transition duration-100 cursor-pointer hover:bg-[#09756B] hover:text-white hover:rounded-br-3xl ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                  </svg>

                  <a href="{{url('/pharmacy/inventory')}}">Inventory</a>
              </div>
              <div class="flex px-6 py-4 mt-8 space-x-6 font-bold text-black transition duration-100 cursor-pointer hover:bg-[#09756B] hover:text-white hover:rounded-br-3xl ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                  </svg>

                  <a href="{{url('/pharmacy/prescription-list')}}">Prescriptions</a>
              </div>
              <div class="flex px-6 py-4 mt-8 space-x-6 font-bold text-black transition duration-100 cursor-pointer hover:bg-[#09756B] hover:text-white hover:rounded-br-3xl ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                  </svg>

                  <a href="">Sales Report</a>
              </div>

              <div class="flex px-6 py-4 space-x-6 font-bold text-white bg-red-500 cursor-pointer mt-52 rounded-3xl ">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                  </svg>

                  <a href="/logout">Logout</a>

              </div>
        </div>
    </aside>

</body>
</html>
