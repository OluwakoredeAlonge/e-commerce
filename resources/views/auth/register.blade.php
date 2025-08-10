<!DOCTYPE html>
<html lang="en" x-data="{ showPassword: false }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration - E-Commerce POS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gradient-to-br from-purple-500 via-pink-500 to-blue-500 min-h-screen flex items-center justify-center font-sans">

    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-8">
        <!-- Logo -->
        <div class="flex flex-col items-center mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 text-purple-600 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M12 4v16m8-8H4" />
            </svg>
            <h1 class="text-2xl font-bold text-gray-800">Admin Registration</h1>
            <p class="text-gray-500">Create a new admin account</p>
        </div>

        <!-- Register Form -->
        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Full Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <div class="relative mt-1">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <!-- User Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M5.121 17.804A8.966 8.966 0 0112 15c2.21 0 4.21.805 5.879 2.137M15 11a3 3 0 11-6 0 3 3 
                                     0 016 0z" />
                        </svg>
                    </span>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your full name"
                           class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg shadow-sm 
                                  focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                </div>
                @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="relative mt-1">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <!-- Mail Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M16 12H8m8 0l-4-4m4 4l-4 4m8-4a9 9 0 11-18 0 
                                     9 9 0 0118 0z" />
                        </svg>
                    </span>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email"
                           class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg shadow-sm 
                                  focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                </div>
                @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Phone Number -->
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                <div class="relative mt-1">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <!-- Phone Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 5a2 2 0 012-2h1.28a1 1 0 01.95.684l1.518 
                                     4.553a1 1 0 01-.272 1.06l-1.6 1.6a11.042 
                                     11.042 0 005.516 5.516l1.6-1.6a1 1 0 
                                     011.06-.272l4.553 1.518a1 1 0 01.684.95V19a2 
                                     2 0 01-2 2h-1C9.163 21 3 14.837 3 7V5z" />
                        </svg>
                    </span>
                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Enter your phone number"
                           class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg shadow-sm 
                                  focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                </div>
                @error('phone')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="relative mt-1">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <!-- Lock Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 11c0-1.657-1.343-3-3-3s-3 1.343-3 3m6 0c0 
                                     1.657 1.343 3 3 3s3-1.343 3-3m-6 0V7a4 4 0 
                                     118 0v4a9 9 0 11-18 0v-4a4 4 0 018 0" />
                        </svg>
                    </span>
                    <input :type="showPassword ? 'text' : 'password'" id="password" name="password" placeholder="Enter your password"
                           class="block w-full pl-10 pr-10 py-2 border border-gray-300 rounded-lg shadow-sm 
                                  focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
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
                @error('password')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password"
                       class="block w-full pl-3 py-2 border border-gray-300 rounded-lg shadow-sm 
                              focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
            </div>

            <!-- Submit -->
            <button type="submit" 
                    class="w-full flex items-center justify-center bg-gradient-to-r from-purple-600 to-blue-600 text-white py-2 px-4 rounded-lg shadow-md hover:from-purple-700 hover:to-blue-700 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 13l4 4L19 7" />
                </svg>
                Register Admin
            </button>

            <!-- Login Link -->
            <p class="text-sm text-center text-gray-600">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-purple-600 hover:underline">Login here</a>
            </p>
        </form>
    </div>

</body>
</html>
