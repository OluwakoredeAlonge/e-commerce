<!DOCTYPE html>
<html lang="en" x-data="{ showPassword: false }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Commerce POS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500 min-h-screen flex items-center justify-center font-sans">

    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-8">
        <!-- Logo -->
        <div class="flex flex-col items-center mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 text-blue-600 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-2.293 
                       2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 
                       0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 
                       0 014 0z" />
            </svg>
            <h1 class="text-2xl font-bold text-gray-800">E-Commerce POS</h1>
            <p class="text-gray-500">Sign in to continue</p>
        </div>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="relative mt-1">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M16 12H8m8 0l-4-4m4 4l-4 4m8-4a9 9 0 11-18 0 
                                     9 9 0 0118 0z" />
                        </svg>
                    </span>
                    <input type="email" id="email" name="email" placeholder="Enter your email"
                           value="{{ old('email') }}"
                           required autofocus autocomplete="username"
                           class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg shadow-sm 
                                  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="relative mt-1">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 11c0-1.657-1.343-3-3-3s-3 1.343-3 3m6 0c0 
                                     1.657 1.343 3 3 3s3-1.343 3-3m-6 0V7a4 4 0 
                                     118 0v4a9 9 0 11-18 0v-4a4 4 0 018 0" />
                        </svg>
                    </span>
                    <input :type="showPassword ? 'text' : 'password'" id="password" name="password"
                           placeholder="Enter your password"
                           required autocomplete="current-password"
                           class="block w-full pl-10 pr-10 py-2 border border-gray-300 rounded-lg shadow-sm 
                                  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <span class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 cursor-pointer" 
                          @click="showPassword = !showPassword">
                        <template x-if="!showPassword">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 12a3 3 0 11-6 0 3 3 
                                         0 016 0zm8.485-2.121a10.477 
                                         10.477 0 00-15.364 0 10.477 
                                         10.477 0 000 15.364 10.477 
                                         10.477 0 0015.364 0 10.477 
                                         10.477 0 000-15.364z" />
                            </svg>
                        </template>
                        <template x-if="showPassword">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13.875 18.825A10.477 10.477 0 0112 19.5a10.477 
                                         10.477 0 01-7.424-3.075 10.477 
                                         10.477 0 01-3.075-7.424c0-2.21.676-4.258 
                                         1.824-5.924M21 21L3 3m9.825 9.825A3 
                                         3 0 1112 12v0" />
                            </svg>
                        </template>
                    </span>
                </div>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="remember" class="form-checkbox text-blue-600">
                    <span class="text-gray-600">Remember me</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">Forgot password?</a>
                @endif
            </div>

            <!-- Submit -->
            <button type="submit" 
                    class="w-full flex items-center justify-center bg-gradient-to-r from-blue-600 to-blue-800 text-white py-2 px-4 rounded-lg shadow-md hover:from-blue-700 hover:to-blue-900 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 13l4 4L19 7" />
                </svg>
                Sign In
            </button>
        </form>
    </div>

</body>
</html>
