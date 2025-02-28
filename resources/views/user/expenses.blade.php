<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses - MoneyMind</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body class="bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50">
    <!-- Success Message -->
    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
            class="fixed top-4 right-4 z-50 flex items-center p-4 mb-4 rounded-lg shadow-lg bg-green-50 border-l-4 border-green-500 animate__animated animate__fadeInRight">
            <div class="flex items-center">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-600 bg-green-100 rounded-lg">
                    <i class="fas fa-check"></i>
                </div>
                <div class="ml-3 text-sm font-medium text-green-700">
                    {{ session('success') }}
                </div>
            </div>
            <button @click="show = false" class="ml-4 text-green-500 hover:text-green-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    <!-- Error Message -->
    @if (session('error'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
            class="fixed top-4 right-4 z-50 flex items-center p-4 mb-4 rounded-lg shadow-lg bg-red-50 border-l-4 border-red-500 animate__animated animate__fadeInRight">
            <div class="flex items-center">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-600 bg-red-100 rounded-lg">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <div class="ml-3 text-sm font-medium text-red-700">
                    {{ session('error') }}
                </div>
            </div>
            <button @click="show = false" class="ml-4 text-red-500 hover:text-red-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    <div x-data="{
        sidebarOpen: false,
        modalOpen: false,
        expenseType: 'ponctuel',
        activeTab: 'overview',
        closeModal() {
            this.modalOpen = false;
        }
    }" class="min-h-screen relative">
        <!-- Enhanced Sidebar with Glassmorphism -->
        <x-aside-nav />

        <!-- Enhanced Header Section with Gradient -->
        <div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-violet-600 shadow-lg">
            <div class="md:ml-64 p-4 md:p-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div class="animate__animated animate__fadeIn">
                        <h1 class="text-2xl font-bold text-white">Expenses</h1>
                        <div class="flex items-center mt-2 text-blue-100">
                            <i class="fas fa-wallet mr-2"></i>
                            <span>Monthly Overview</span>
                            {{-- <span class="mx-2">•</span>
                            <span class="text-green-300 flex items-center">
                                <i class="fas fa-chart-line mr-1"></i>
                                2,850 DH Total
                            </span> --}}
                        </div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-6 mt-6">
                    <!-- One-time Expense Button -->
                    <button @click="modalOpen = true; expenseType = 'ponctuel'"
                        class="flex-1 bg-white/10 backdrop-blur-xl hover:bg-white/20 text-white p-6 rounded-xl border border-white/20 shadow-lg hover:shadow-xl transition-all duration-300 group">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-white/20 p-3 rounded-lg">
                                <i class="fas fa-receipt text-2xl"></i>
                            </div>
                            <span class="text-white/80">One-time</span>
                        </div>
                        <h3 class="text-lg font-semibold mb-1">Add One-time Expense</h3>
                        <p class="text-sm text-blue-100">Record individual expenses and purchases</p>
                        <div class="mt-4 flex items-center text-blue-100 group-hover:text-white transition-colors">
                            <span>Add now</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </div>
                    </button>

                    <!-- Recurring Expense Button -->
                    <button @click="modalOpen = true; expenseType = 'recurring'"
                        class="flex-1 bg-white/10 backdrop-blur-xl hover:bg-white/20 text-white p-6 rounded-xl border border-white/20 shadow-lg hover:shadow-xl transition-all duration-300 group">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-white/20 p-3 rounded-lg">
                                <i class="fas fa-sync-alt text-2xl"></i>
                            </div>
                            <span class="text-white/80">Recurring</span>
                        </div>
                        <h3 class="text-lg font-semibold mb-1">Add Recurring Expense</h3>
                        <p class="text-sm text-purple-100">Set up regular payments and subscriptions</p>
                        <div class="mt-4 flex items-center text-purple-100 group-hover:text-white transition-colors">
                            <span>Add now</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </div>
                    </button>
                </div>
                <!-- Enhanced Navigation Tabs -->
                <div class="flex space-x-6 mt-8 border-b border-blue-500">
                    <button @click="activeTab = 'overview'"
                        :class="{ 'text-white border-b-2 border-white': activeTab === 'overview' }"
                        class="pb-4 text-blue-200 hover:text-white transition-colors">
                        <i class="fas fa-th-large mr-2"></i>
                        Overview
                    </button>
                    <button @click="activeTab = 'recurrent'"
                        :class="{ 'text-white border-b-2 border-white': activeTab === 'recurrent' }"
                        class="pb-4 text-blue-200 hover:text-white transition-colors">
                        <i class="fas fa-receipt mr-2"></i>
                        Recurrent
                    </button>
                    <button @click="activeTab = 'punctuel'"
                        :class="{ 'text-white border-b-2 border-white': activeTab === 'punctuel' }"
                        class="pb-4 text-blue-200 hover:text-white transition-colors">
                        <i class="fas fa-chart-bar mr-2"></i>
                        Punctuel
                    </button>
                </div>
            </div>
        </div>

        <!-- Main Content Area with Enhanced Cards -->
        <div class="md:ml-64 p-4 md:p-8 pt-0">
            <!-- Overview Tab Content -->
            <div x-show="activeTab === 'overview'" class="animate__animated animate__fadeIn">
                <!-- Enhanced Summary Cards with 3D Effect -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div
                        class="bg-gradient-to-br from-red-500 to-pink-500 rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-white/20 p-3 rounded-lg">
                                <i class="fas fa-wallet text-white text-xl"></i>
                            </div>
                            <span class="text-sm text-white/80">vs last month</span>
                        </div>
                        <h3 class="text-white/90 text-sm mb-2">Total Expenses</h3>
                        <div class="flex items-baseline space-x-2">
                            <span class="text-2xl font-bold text-white">{{ $totalExpense }}</span>
                            <span class="text-white/80">DH</span>

                        </div>
                    </div>
                    <!-- Monthly Total Card -->
                    <div
                        class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-white/20 p-3 rounded-lg">
                                <i class="fas fa-sync-alt text-white text-xl"></i>
                            </div>
                            <span class="text-sm text-white/80">Monthly</span>
                        </div>
                        <h3 class="text-white/90 text-sm mb-2">Total Recurring</h3>
                        <div class="flex items-baseline space-x-2">
                            <span class="text-2xl font-bold text-white">2,850</span>
                            <span class="text-white/80">DH</span>
                        </div>
                        <p class="text-sm text-white/90 mt-2">8 active subscriptions</p>
                    </div>

                    <!-- Next Payment Card -->
                    <div
                        class="bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-white/20 p-3 rounded-lg">
                                <i class="fas fa-calendar text-white text-xl"></i>
                            </div>
                            <span class="text-sm text-white/80">Next Due</span>
                        </div>
                        <h3 class="text-white/90 text-sm mb-2">Next Payment</h3>
                        <div class="flex items-baseline space-x-2">
                            <span class="text-2xl font-bold text-white">Rent</span>
                        </div>
                        <p class="text-sm text-white/90 mt-2">Due in 5 days</p>
                    </div>

                    <div
                        class="bg-gradient-to-br from-emerald-500 to-teal-500 rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <!-- Similar structure with different colors -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-white/20 p-3 rounded-lg">
                                <i class="fas fa-wallet text-white text-xl"></i>
                            </div>
                            <span class="text-sm text-white/80">vs last month</span>
                        </div>
                        <h3 class="text-white/90 text-sm mb-2">Total Expenses</h3>
                        <div class="flex items-baseline space-x-2">
                            <span class="text-2xl font-bold text-white">{{ $totalExpense }}</span>
                            <span class="text-white/80">DH</span>

                        </div>
                    </div>
                </div>

                <!-- Enhanced Category Breakdown with Interactive Elements -->

                <div class="grid grid-cols-1 gap-6 mb-8">
                    <div class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg p-6 border border-white/20">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-semibold text-gray-900">Expense Categories</h3>
                            <div class="flex items-center space-x-3">
                                <select class="text-sm border border-gray-200 rounded-lg bg-white/50 px-3 py-2">
                                    <option>This Month</option>
                                    <option>Last Month</option>
                                    <option>Last 3 Months</option>
                                </select>
                                <select class="text-sm border border-gray-200 rounded-lg bg-white/50 px-3 py-2">
                                    <option>All Categories</option>
                                    <option>Housing</option>
                                    <option>Food</option>
                                    <option>Transportation</option>
                                    <option>Entertainment</option>
                                    <option>Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="space-y-6">
                            <!-- Category items with gradients -->
                            <div class="relative bg-gradient-to-r from-blue-50 to-blue-100 p-4 rounded-lg">
                                <div class="flex justify-between items-start mb-2">
                                    <div class="flex items-center space-x-3">
                                        <div class="bg-blue-500 p-2 rounded-lg">
                                            <i class="fas fa-home text-white"></i>
                                        </div>
                                        <div>
                                            <span class="font-medium text-gray-900">Housing</span>
                                            <p class="text-xs text-gray-600">Rent, Utilities, Maintenance</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <span class="font-semibold text-gray-900">857.50 DH</span>
                                        <p class="text-xs text-gray-600">35% of total</p>
                                    </div>
                                </div>
                                <div class="w-full bg-blue-200 rounded-full h-2.5 mt-2">
                                    <div class="bg-blue-600 h-2.5 rounded-full animate__animated animate__slideInLeft"
                                        style="width: 35%"></div>
                                </div>
                            </div>

                            <!-- Food Category -->
                            <div class="relative bg-gradient-to-r from-green-50 to-green-100 p-4 rounded-lg">
                                <!-- Similar structure with green theme -->
                            </div>

                            <!-- Transportation Category -->
                            <div class="relative bg-gradient-to-r from-purple-50 to-purple-100 p-4 rounded-lg">
                                <!-- Similar structure with purple theme -->
                            </div>
                        </div>
                    </div>
                </div>
                 <!-- Active Subscriptions -->
            <div class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg border border-white/20 overflow-hidden mb-8">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900">Active Subscriptions</h3>
                </div>
                <div class="divide-y divide-gray-100">
                    <!-- Rent Payment Item -->
                    <div class="p-6 hover:bg-gray-50/50 transition-all duration-200">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="bg-gradient-to-br from-blue-100 to-blue-200 p-3 rounded-xl">
                                    <i class="fas fa-home text-blue-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Rent Payment</h4>
                                    <p class="text-sm text-gray-600">Monthly on the 1st</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-gray-900">1,500 DH</p>
                                <p class="text-sm text-gray-600">Next: Apr 1, 2024</p>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-sm text-green-600 bg-green-50 px-3 py-1 rounded-full">
                                <i class="fas fa-check-circle mr-1"></i>
                                Active
                            </span>
                            <div class="flex space-x-3">
                                <button class="text-gray-400 hover:text-blue-600 transition-colors">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-gray-400 hover:text-red-600 transition-colors">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Netflix Subscription -->
                    <div class="p-6 hover:bg-gray-50/50 transition-all duration-200">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="bg-gradient-to-br from-red-100 to-red-200 p-3 rounded-xl">
                                    <i class="fas fa-tv text-red-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Netflix</h4>
                                    <p class="text-sm text-gray-600">Monthly on the 15th</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-gray-900">95 DH</p>
                                <p class="text-sm text-gray-600">Next: Mar 15, 2024</p>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-sm text-green-600 bg-green-50 px-3 py-1 rounded-full">
                                <i class="fas fa-check-circle mr-1"></i>
                                Active
                            </span>
                            <div class="flex space-x-3">
                                <button class="text-gray-400 hover:text-blue-600 transition-colors">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-gray-400 hover:text-red-600 transition-colors">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Enhanced Payment Calendar -->
            <div class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg border border-white/20 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-6">Upcoming Payments</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl border border-gray-200 p-4 hover:shadow-md transition-all duration-200">
                        <div class="text-center mb-3">
                            <span class="text-sm font-medium text-gray-600">MAR</span>
                            <h4 class="text-2xl font-bold text-gray-900">15</h4>
                        </div>
                        <div class="text-center">
                            <p class="font-medium text-gray-900">Netflix</p>
                            <p class="text-sm text-gray-600">95 DH</p>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl border border-gray-200 p-4 hover:shadow-md transition-all duration-200">
                        <div class="text-center mb-3">
                            <span class="text-sm font-medium text-gray-600">APR</span>
                            <h4 class="text-2xl font-bold text-gray-900">01</h4>
                        </div>
                        <div class="text-center">
                            <p class="font-medium text-gray-900">Rent Payment</p>
                            <p class="text-sm text-gray-600">1,500 DH</p>
                        </div>
                    </div>
                </div>
            </div>

                <!-- New Feature: Expense Insights -->
                <div class="grid grid-cols-1  gap-6 mb-8 py-6">
                    <div class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg p-6 border border-white/20">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Spending Insights</h3>
                        <div class="space-y-4">
                            <div class="flex items-center p-3 bg-yellow-50 rounded-lg border border-yellow-100">
                                <i class="fas fa-lightbulb text-yellow-500 mr-3"></i>
                                <p class="text-sm text-gray-600">Your restaurant spending is 25% higher than usual this
                                    month.</p>
                            </div>
                            <div class="flex items-center p-3 bg-green-50 rounded-lg border border-green-100">
                                <i class="fas fa-piggy-bank text-green-500 mr-3"></i>
                                <p class="text-sm text-gray-600">You've saved 15% on utilities compared to last month!
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg p-6 border border-white/20">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Budget Status</h3>
                        <!-- Add budget progress visualization -->
                    </div> --}}
                </div>
            </div>

            <!-- Transactions Tab Content -->
            <div x-show="activeTab === 'recurrent'" class="animate__animated animate__fadeIn" style="display: none;">
                <!-- Enhanced transactions table -->
                <!-- Recurring Expenses Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Netflix Subscription Card -->
                    @foreach ($depensesRecurente as $depense)
                        <div
                            class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg border border-white/20 hover:shadow-xl transition-all duration-300">
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <h3 class="font-semibold text-gray-900">{{ $depense->title }}</h3>
                                            <p class="text-sm text-gray-500">{{ $depense->category_name }} </p>
                                        </div>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button class="text-gray-400 hover:text-blue-600 transition-colors">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-gray-400 hover:text-red-600 transition-colors">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex justify-between items-baseline mb-3">
                                    <span class="text-2xl font-bold text-gray-900">{{ $depense->amount }} </span>
                                    <span class="text-gray-600">DH/month</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="fas fa-calendar-alt mr-2"></i>
                                    Next payment: {{ $depense->start_date }}
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- <!-- Gym Membership Card -->
                    <div class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg border border-white/20 hover:shadow-xl transition-all duration-300">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex items-center">
                                    <div class="bg-green-100 p-3 rounded-lg">
                                        <i class="fas fa-dumbbell text-green-600 text-xl"></i>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="font-semibold text-gray-900">Gym Membership</h3>
                                        <p class="text-sm text-gray-500">Health & Fitness</p>
                                    </div>
                                </div>
                                <div class="flex space-x-2">
                                    <button class="text-gray-400 hover:text-blue-600 transition-colors">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-gray-400 hover:text-red-600 transition-colors">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="flex justify-between items-baseline mb-3">
                                <span class="text-2xl font-bold text-gray-900">300</span>
                                <span class="text-gray-600">DH/month</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                Next payment: Dec 1, 2023
                            </div>
                        </div>
                    </div>

                    <!-- Internet Service Card -->
                    <div class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg border border-white/20 hover:shadow-xl transition-all duration-300">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex items-center">
                                    <div class="bg-blue-100 p-3 rounded-lg">
                                        <i class="fas fa-wifi text-blue-600 text-xl"></i>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="font-semibold text-gray-900">Internet Service</h3>
                                        <p class="text-sm text-gray-500">Utilities</p>
                                    </div>
                                </div>
                                <div class="flex space-x-2">
                                    <button class="text-gray-400 hover:text-blue-600 transition-colors">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-gray-400 hover:text-red-600 transition-colors">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="flex justify-between items-baseline mb-3">
                                <span class="text-2xl font-bold text-gray-900">399</span>
                                <span class="text-gray-600">DH/month</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                Next payment: Dec 5, 2023
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>

            <!-- Analytics Tab Content -->
            <div x-show="activeTab === 'punctuel'" class="animate__animated animate__fadeIn" style="display: none;">
                <!-- Enhanced analytics content -->
                <!-- One-time expenses and purchases that occur irregularly or as needed. These transactions represent individual spending events rather than recurring payments. -->
                <!-- Punctual Expenses Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Shopping Expense Card -->
                    @foreach ($depensesPunctuel as $depense)
                        <div
                            class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg border border-white/20 hover:shadow-xl transition-all duration-300">
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <div class="flex items-center">

                                        <div class="ml-4">
                                            <h3 class="font-semibold text-gray-900">{{ $depense->title }}</h3>
                                            <p class="text-sm text-gray-500">{{ $depense->category_name }} </p>
                                        </div>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button class="text-gray-400 hover:text-blue-600 transition-colors">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-gray-400 hover:text-red-600 transition-colors">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex justify-between items-baseline mb-3">
                                    <span class="text-2xl font-bold text-gray-900">{{ $depense->amount }} </span>
                                    <span class="text-gray-600">DH</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="fas fa-calendar-alt mr-2"></i>
                                    {{ $depense->date_depense }}
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- <!-- Restaurant Expense Card -->
                    <div class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg border border-white/20 hover:shadow-xl transition-all duration-300">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex items-center">
                                    <div class="bg-orange-100 p-3 rounded-lg">
                                        <i class="fas fa-utensils text-orange-600 text-xl"></i>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="font-semibold text-gray-900">Restaurant</h3>
                                        <p class="text-sm text-gray-500">Food & Dining</p>
                                    </div>
                                </div>
                                <div class="flex space-x-2">
                                    <button class="text-gray-400 hover:text-blue-600 transition-colors">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-gray-400 hover:text-red-600 transition-colors">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="flex justify-between items-baseline mb-3">
                                <span class="text-2xl font-bold text-gray-900">280</span>
                                <span class="text-gray-600">DH</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                Nov 18, 2023
                            </div>
                        </div>
                    </div>

                    <!-- Electronics Expense Card -->
                    <div class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg border border-white/20 hover:shadow-xl transition-all duration-300">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex items-center">
                                    <div class="bg-blue-100 p-3 rounded-lg">
                                        <i class="fas fa-laptop text-blue-600 text-xl"></i>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="font-semibold text-gray-900">Electronics</h3>
                                        <p class="text-sm text-gray-500">Technology</p>
                                    </div>
                                </div>
                                <div class="flex space-x-2">
                                    <button class="text-gray-400 hover:text-blue-600 transition-colors">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-gray-400 hover:text-red-600 transition-colors">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="flex justify-between items-baseline mb-3">
                                <span class="text-2xl font-bold text-gray-900">1,200</span>
                                <span class="text-gray-600">DH</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                Nov 20, 2023
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

        <!-- Modal -->
        <template x-if="modalOpen">
            <div class="fixed inset-0 z-50 overflow-y-auto" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">
                <div class="flex items-center justify-center min-h-screen px-4">
                    <!-- Backdrop -->
                    <div class="fixed inset-0 bg-black/30 backdrop-blur-sm" @click="closeModal"></div>

                    <!-- Modal Content -->
                    <div
                        class="relative bg-white/90 backdrop-blur-xl rounded-xl max-w-md w-full p-6 shadow-xl border border-white/20">
                        <!-- Modal Header -->
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-semibold text-gray-900"
                                x-text="expenseType === 'ponctuel' ? 'Add One-time Expense' : 'Add Recurring Expense'">
                            </h3>
                            <button @click="closeModal" class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>

                        <!-- Forms -->
                        <div x-show="expenseType === 'ponctuel'">
                            <form action="{{ route('ponctuel') }}" method="POST" class="space-y-6">
                                <!-- Amount Input -->
                                @csrf
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Amount (DH)</label>
                                    <div class="relative">
                                        <span
                                            class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">DH</span>
                                        <input type="number"
                                            class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                            placeholder="0.00" name="amount" step="0.01">
                                    </div>
                                </div>

                                <!-- Category Selection -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                                    <select name="category"
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                                        <option value="">Select a category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                                    <input type="text" name="title"
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                        placeholder="Enter expense title">
                                </div>

                                <!-- Date -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Date (Date when you
                                        made the expense)</label>
                                    <input type="date" name="date"
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                                </div>

                                <!-- Submit Button -->
                                <button type="submit"
                                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-2 px-4 rounded-lg hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 flex items-center justify-center space-x-2">
                                    <i class="fas fa-plus"></i>
                                    <span>Add One-time Expense</span>
                                </button>
                            </form>
                        </div>

                        <div x-show="expenseType === 'recurring'">
                            <form action="{{ route('recurente') }}" method="POST" class="space-y-6">
                                <!-- Amount Input -->
                                @csrf
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Amount (DH)</label>
                                    <div class="relative">
                                        <span
                                            class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">DH</span>
                                        <input type="number" name="amount"
                                            class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                            placeholder="0.00" step="0.01">
                                    </div>
                                </div>

                                <!-- Category Selection -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                                    <select name="category"
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                                        <option value="">Select a category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Description -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                                    <input type="text" name="title"
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                        placeholder="Enter expense title" required>
                                </div>

                                <!-- Frequency -->


                                <!-- Start Date -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Start Date (Date when
                                        your started your monthly expense)</label>
                                    <input name="start_date" type="date"
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                        required>
                                </div>



                                <!-- Submit Button -->
                                <button type="submit"
                                    class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 text-white py-2 px-4 rounded-lg hover:from-purple-700 hover:to-indigo-700 transition-all duration-200 flex items-center justify-center space-x-2">
                                    <i class="fas fa-plus"></i>
                                    <span>Add Recurring Expense</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>

    <script>
        // Add any additional JavaScript if needed
    </script>
</body>

</html>
