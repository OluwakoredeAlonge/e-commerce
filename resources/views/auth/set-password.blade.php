<!DOCTYPE html>
<html lang="en" x-data="{ showPassword: false, showConfirmPassword: false }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Your Password - E-Commerce POS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gradient-to-br from-green-500 via-blue-500 to-purple-500 min-h-screen flex items-center justify-center font-sans">

    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-8">
        <!-- Header -->
        <div class="flex flex-col items-center mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 text-green-600 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.657-1.343-3-3-3s-3 1.343-3 3m6 0c0 1.657 1.343 3 3 3s3-1.343 3-3m-6 0V7a4 4 0 118 0v4a9 9 0 11-18 0v-4a4 4 0 018 0" />
            </svg>
            <h1 class="text-2xl font-bold text-gray-800">Complete Registration</h1>
            <p class="text-gray-500 text-center">Set your password to activate your account.</p>
        </div>

        <!-- Laravel Form -->
        <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
            @csrf

            <!-- Required Hidden Fields -->
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="relative mt-1">
                    <input :type="showPassword ? 'text' : 'password'" id="password" name="password"
                           placeholder="Enter your password" required
                           class="block w-full pl-3 pr-10 py-2 border border-gray-300 rounded-lg shadow-sm 
                                  focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 sm:text-sm">

                    <!-- Eye Toggle -->
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
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <div class="relative mt-1">
                    <input :type="showConfirmPassword ? 'text' : 'password'" id="password_confirmation" name="password_confirmation"
                           placeholder="Confirm your password" required
                           class="block w-full pl-3 pr-10 py-2 border border-gray-300 rounded-lg shadow-sm 
                                  focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 sm:text-sm">

                    <!-- Eye Toggle -->
                    <span class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 cursor-pointer" 
                          @click="showConfirmPassword = !showConfirmPassword">
                        <template x-if="!showConfirmPassword">
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
                        <template x-if="showConfirmPassword">
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
            </div>

            <!-- Submit -->
            <button type="submit" 
                    class="w-full flex items-center justify-center bg-gradient-to-r from-green-600 to-blue-600 text-white py-2 px-4 rounded-lg shadow-md hover:from-green-700 hover:to-blue-700 transition duration-300">
                Set Password
            </button>
        </form>
    </div>

</body>
</html>
