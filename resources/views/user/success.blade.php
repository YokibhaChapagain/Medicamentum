<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="flex items-center justify-center mt-40 bg-gray-300">
    <div class="text-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="green" class="w-40 h-40 ml-8 bi bi-check2-circle" viewBox="0 0 16 16">
            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
          </svg>
        <div class="mb-4 text-3xl font-bold text-teal-700">
            Thank you!
        </div>
        <div class="mb-6 text-xl font-semibold text-teal-500 ">
           Payment Done Succesfully
        </div>
        <a href="{{ route('user.dashboard') }}" class="px-4 py-2 text-white transition duration-300 bg-teal-700 rounded-md hover:bg-teal-400">
            Go Back to Dashboard
        </a>
    </div>
</body>

</html>
