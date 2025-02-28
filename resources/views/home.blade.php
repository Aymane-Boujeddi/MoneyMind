<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyMind - Personal Budgeting Made Simple</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg fixed w-full z-50" x-data="{ isOpen: false }">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="#" class="flex items-center space-x-2">
                        <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-xl font-bold text-gray-800">MoneyMind</span>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#features" class="text-gray-600 hover:text-blue-600 transition-colors">Features</a>
                    <a href="#why-choose" class="text-gray-600 hover:text-blue-600 transition-colors">Why Choose Us</a>
                    <a href="#pricing" class="text-gray-600 hover:text-blue-600 transition-colors">Pricing</a>
                    <a href="{{route('login')}} " class="bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-700 transition-colors">
                        Login
                    </a>
                    <a href="{{route('register')}} " class="bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition-colors">
                        Get Started
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button @click="isOpen = !isOpen" class="md:hidden text-gray-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div x-show="isOpen" class="md:hidden pb-4" @click.away="isOpen = false">
                <a href="#features" class="block py-2 text-gray-600">Features</a>
                <a href="#why-choose" class="block py-2 text-gray-600">Why Choose Us</a>
                <a href="#pricing" class="block py-2 text-gray-600">Pricing</a>
                <a href="#" class="block py-2 text-blue-600">Get Started</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-24 pb-12 bg-gradient-to-br from-blue-50 via-white to-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/2 mb-8 md:mb-0 animate__animated animate__fadeInLeft">
                    <h1 class="text-5xl font-bold text-gray-900 mb-6">
                        Take Control of Your
                        <span class="text-blue-600">Financial Future</span>
                    </h1>
                    <p class="text-xl text-gray-600 mb-8">
                        Welcome to MoneyMind, where smart budgeting meets AI-powered insights. Track, manage, and grow your finances with ease.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="bg-blue-600 text-white px-8 py-3 rounded-full hover:bg-blue-700 transition-all transform hover:scale-105">
                            Start Free Trial
                        </a>
                        <a href="#features" class="border-2 border-blue-600 text-blue-600 px-8 py-3 rounded-full hover:bg-blue-50 transition-all">
                            Learn More
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2 animate__animated animate__fadeInRight">
                    <div class="relative">
                        <!-- Animated Financial Stats Card -->
                        <div class="bg-white p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-bold text-gray-800">Monthly Overview</h3>
                                <div class="text-green-500 flex items-center">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                    </svg>
                                    <span class="ml-1">+12.5%</span>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div class="h-4 bg-gray-100 rounded-full overflow-hidden">
                                    <div class="w-3/4 h-full bg-blue-500 animate-pulse"></div>
                                </div>
                                <div class="h-4 bg-gray-100 rounded-full overflow-hidden">
                                    <div class="w-1/2 h-full bg-green-500 animate-pulse"></div>
                                </div>
                                <div class="h-4 bg-gray-100 rounded-full overflow-hidden">
                                    <div class="w-2/3 h-full bg-purple-500 animate-pulse"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Powerful Features</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature Cards with Hover Effects -->
                <div class="bg-white p-6 rounded-xl shadow-lg transform hover:-translate-y-2 transition-all duration-300">
                    <div class="bg-blue-100 rounded-full w-12 h-12 flex items-center justify-center mb-4">
                        <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Automated Tracking</h3>
                    <p class="text-gray-600">Effortlessly monitor your income and expenses with smart automation.</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg transform hover:-translate-y-2 transition-all duration-300">
                    <div class="bg-green-100 rounded-full w-12 h-12 flex items-center justify-center mb-4">
                        <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Smart Analytics</h3>
                    <p class="text-gray-600">Get insights and visualizations that help you understand your spending patterns.</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg transform hover:-translate-y-2 transition-all duration-300">
                    <div class="bg-purple-100 rounded-full w-12 h-12 flex items-center justify-center mb-4">
                        <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">AI Powered</h3>
                    <p class="text-gray-600">Receive personalized recommendations to optimize your financial decisions.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-blue-600">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-white mb-8">Ready to Take Control?</h2>
            <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                Join thousands of users who are already managing their finances smarter with MoneyMind.
            </p>
            <a href="#" class="inline-block bg-white text-blue-600 px-8 py-3 rounded-full font-semibold hover:bg-blue-50 transition-colors transform hover:scale-105">
                Start Your Journey
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-white font-bold mb-4">MoneyMind</h3>
                    <p class="text-sm">Making personal finance management simple and intelligent.</p>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-4">Features</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white transition-colors">Budgeting</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Analytics</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">AI Insights</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-4">Company</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Contact</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Privacy Policy</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-4">Connect</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="hover:text-white transition-colors">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                        <a href="#" class="hover:text-white transition-colors">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center">
                <p>&copy; 2024 MoneyMind. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>