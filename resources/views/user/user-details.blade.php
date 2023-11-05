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
            <div class="p-10 font-bold text-center text-white bg-teal-500 rounded-lg shadow-lg">
                @if(session('status'))
                <div class="block px-4 py-3 mx-4 mb-4 text-xl text-white" id="status-message">
                    {{ session('status') }}
                </div>
                @endif

                <div class="flex items-center justify-center mb-4">
                    <a href="{{ asset('storage/' . $user->profile_image) }}" target="_blank">
                        <div class="w-32 h-32 overflow-hidden rounded-full">
                            <img src="{{ asset('storage/' . $user->profile_image) }}" alt="{{ $user->name }}" class="object-cover w-full h-full" />
                        </div>
                    </a>
                </div>

                <h2 class="mb-4 text-3xl font-bold">{{ $user->name }}</h2>
                <hr class="mx-auto mb-4 border-t-2 border-white w-50">
                <div class="flex mb-4 space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-6 h-6 bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                    </svg>
                    <span>{{ $user->email }}</span>
                </div>
                <div class="flex mb-4 space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-6 h-6 bi bi-phone" viewBox="0 0 16 16">
                        <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                        <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                    </svg>
                    <span>{{ $user->mobilenumber }}</span>
                </div>

                <div class="flex mb-4 space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-6 h-6 bi bi-geo-alt" viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                      </svg>
                    <span>{{ $user->address }}</span>
                </div>
                <button onclick="window.location.href='{{ route('user.update', ['user' => $user]) }}'" class="px-4 py-2 mt-4 font-bold text-teal-500 bg-white rounded-xl hover:bg-gray-300" id="update-button">Update</button>
            </div>
        </div>

        </div>

</body>
</html>
<script>
    setTimeout(function() {
        var statusMessage = document.getElementById('status-message');
        if (statusMessage) {
            statusMessage.style.display = 'none';
        }
    }, 2000);
</script>
