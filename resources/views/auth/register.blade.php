<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - MoneyMind</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body class="bg-gradient-to-br from-blue-50 via-white to-gray-50 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Logo and Title -->
        <div class="text-center mb-8">
            <a href="/" class="inline-flex items-center mb-4">
                <svg class="h-8 w-8 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-2xl font-bold text-gray-900">MoneyMind</span>
            </a>
            <h2 class="text-3xl font-bold text-gray-900">Create Your Account</h2>
            <p class="text-gray-600 mt-2">Start your journey to better financial management</p>
        </div>

        <!-- Register Form -->
        <div class="bg-white rounded-xl shadow-lg p-8 ">
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}"  autofocus
                        class="mt-1 block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                        placeholder="Enter your full name">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" 
                        class="mt-1 block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                        placeholder="Enter your email">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" type="password" name="password" 
                        class="mt-1 block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                        placeholder="Create a password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div>
                    <label for="salary" class="block text-sm font-medium text-gray-700">Monthly Salary</label>
                    <input id="salary" type="number" name="salary" 
                        class="mt-1 block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                        placeholder="Your Monthly Salary">
                    <x-input-error :messages="$errors->get('salary')" class="mt-2" />
                </div>
                <div>
                    <label for="budget" class="block text-sm font-medium text-gray-700">Current Budget</label>
                    <input id="budget" type="number" name="budget" 
                        class="mt-1 block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                        placeholder="Day Of Salary Credit (1 - 31)">
                    <x-input-error :messages="$errors->get('budget')" class="mt-2" />
                </div>
                <div>
                    <label for="credit_date" class="block text-sm font-medium text-gray-700">Salary Credit </label>
                    <input id="credit_date" type="number" name="credit_date" 
                        class="mt-1 block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                        placeholder="Day Of Salary Credit (1 - 31)">
                    <x-input-error :messages="$errors->get('credit_date')" class="mt-2" />
                </div>
                


                <!-- Submit Button -->
                <button type="submit" class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Create Account
                </button>
            </form>

            <!-- Login Link -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                        Sign in instead
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>