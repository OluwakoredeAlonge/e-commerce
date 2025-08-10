<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - E-Commerce POS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-pink-500 via-purple-500 to-blue-500 min-h-screen flex items-center justify-center font-sans">

    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-8">
        
        <!-- Status Message -->
        @if (session('status'))
            <div class="mb-4 text-green-600 text-sm">
                {{ session('status') }}
            </div>
        @endif

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Header -->
        <div class="flex flex-col items-center mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 text-blue-600 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m0 0l4-4m-4 4l4 4m8-4a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h1 class="text-2xl font-bold text-gray-800">Forgot Password</h1>
            <p class="text-gray-500 text-center">Enter your email and we’ll send you a reset link.</p>
        </div>

        <!-- Forgot Password Form -->
        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <div class="relative mt-1">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <!-- Email Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m8 0l-4-4m4 4l-4 4" />
                        </svg>
                    </span>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                           placeholder="Enter your email"
                           class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg shadow-sm 
                                  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
            </div>

            <!-- Submit -->
            <button type="submit" 
                    class="w-full flex items-center justify-center bg-gradient-to-r from-blue-600 to-purple-600 text-white py-2 px-4 rounded-lg shadow-md hover:from-blue-700 hover:to-purple-700 transition duration-300">
                Send Reset Link
            </button>

            <!-- Back to Login -->
            <p class="text-sm text-center text-gray-600">
                Remembered your password? 
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
            </p>
        </form>
    </div>

</body>
</html>
