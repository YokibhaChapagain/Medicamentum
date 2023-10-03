<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="p-8 mx-4 bg-white rounded shadow-md w-96">
            <h2 class="mb-6 text-2xl font-semibold text-gray-800">Forgot My Password</h2>
            @if (Session::has('success'))
                <div role="alert" class="px-4 py-3 text-blue-700 bg-blue-100 border-t border-b border-blue-500">
                    {{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
                <div role="alert" class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded">
                    {{ Session::get('fail') }}</div>
            @endif

            <!-- Instructions -->
            <p class="mb-4 text-gray-600">Enter your email address below, and we'll send you a link to reset your
                password.</p>

            <!-- Email Input -->
            <form action="{{ route('email.verify.post') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-600">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="w-full px-4 py-2 border rounded-md focus:ring focus:ring-indigo-300 focus:outline-none">
                </div>
                <span class="text-red-600 ">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full px-4 py-2 text-white transition duration-300 bg-blue-500 rounded-md hover:bg-blue-700">Reset
                    Password</button>
            </form>
            <!-- Back to Login Link -->
            <p class="mt-4 text-center">
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Back to Login</a>
            </p>
        </div>
    </div>
</body>

</html>
