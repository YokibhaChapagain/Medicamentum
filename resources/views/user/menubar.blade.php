<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

</head>
<body class="bg-gradient-to-r from-teal-100 via-teal-200 to-green-200">
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
            <div class="w-10 h-10 mx-5 ">
                <img class="max-w-full max-h-full " src="{{ URL('images/user.png') }}" alt="medicamentum" >
            </div>
        </div>

    </nav>

    <aside class="fixed hidden w-60 sm:block top-16">
        <div class="flex flex-col justify-between h-screen p-4 bg-white rounded-r-3xl">
            <div class="text-md">
              <div class="flex px-6 py-4 mt-6 space-x-6 font-bold text-black transition duration-100 cursor-pointer hover:bg-[#09756B] hover:text-white hover:rounded-br-3xl ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                  </svg>

                  <a href="{{url('/user/dashboard')}}">Dashboard</a>
              </div>

              <div class="flex px-6 py-4 mt-6 space-x-6 font-bold text-black transition duration-100 cursor-pointer hover:bg-[#09756B] hover:text-white hover:rounded-br-3xl ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-6 h-6 bi bi-bell" viewBox="0 0 16 16">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                  </svg>

                  <a href="{{url('/pharmacy/inventory')}}">Reminders</a>
              </div>
              <div class="flex px-6 py-4 mt-6 space-x-6 font-bold text-black transition duration-100 cursor-pointer hover:bg-[#09756B] hover:text-white hover:rounded-br-3xl ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-6 h-6 bi bi-upload" viewBox="0 0 16 16">
                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                  </svg>
                  <a href="{{url('/user/upload-prescription')}}">Upload Prescription</a>
              </div>

              <div class="flex px-6 py-4 mt-6 space-x-6 font-bold text-black transition duration-100 cursor-pointer hover:bg-[#09756B] hover:text-white hover:rounded-br-3xl ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-6 h-6 bi bi-clock-history " viewBox="0 0 16 16">
                  <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                  <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                  <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                </svg>
                <a href="{{url('/user/history')}}">History</a>
            </div>
            <div class="flex px-6 py-4 mt-6 space-x-6 font-bold text-black transition duration-100 cursor-pointer hover:bg-[#09756B] hover:text-white hover:rounded-br-3xl ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-6 h-6 bi bi-bag-check" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                  </svg>

                  <a href="{{url('/user/order')}}">Cart</a>
              </div>


              <div class="flex px-6 py-4 space-x-6 font-bold text-white bg-red-500 cursor-pointer mt-36 rounded-3xl ">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                  </svg>

                  <a href="/logout">Logout</a>

              </div>
        </div>
    </aside>

</body>
</html>
