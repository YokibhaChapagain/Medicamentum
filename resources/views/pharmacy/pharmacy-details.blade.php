@include('pharmacy.menubar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

</head>
<body>
    <div class="mr-4 md:ml-64">

        <div class="flex items-center justify-center h-screen ">
            <div class="p-10 px-20 font-bold text-center text-white bg-teal-500 rounded-lg shadow-lg">
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
                @if ($user->mobilenumber)
                <div class="flex mb-4 space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-6 h-6 bi bi-phone" viewBox="0 0 16 16">
                        <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                        <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                      </svg>
                      <span>{{ $user->mobilenumber }}</span>
                </div>
                @endif
            @if ($user->pharmacy)
            <div class="flex mb-4 space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-6 h-6 bi bi-telephone" viewBox="0 0 16 16">
                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                  </svg>
        <span>{{ $user->pharmacy->telephonenumber }}</span>
    </div>
    <div class="flex mb-4 space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-6 h-6 bi bi-geo-alt-fill" viewBox="0 0 16 16">
            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
          </svg>
        <span>{{ $user->pharmacy->location }}</span>
    </div>
@endif



                <button onclick="window.location.href='{{ route('pharmacy.update', ['user' => $user]) }}'" class="px-4 py-2 mt-4 font-bold text-teal-500 bg-white rounded-xl hover:bg-gray-300" id="update-button">Update</button>
            </div>
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
