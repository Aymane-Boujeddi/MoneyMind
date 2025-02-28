<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - MoneyMind</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body class="bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50">
    <div x-data="{ sidebarOpen: false, modalOpen: false, activeTab: 'overview' }" class="min-h-screen relative">
        <!-- Include Aside Navigation -->
        <x-aside-nav />

        <!-- Enhanced Header Section with Gradient -->
        <div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 shadow-lg mb-6">
            <div class="md:ml-64 p-4 md:p-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div class="animate__animated animate__fadeIn">
                        <h1 class="text-2xl font-bold text-white">Welcome back, John!</h1>
                        <div class="flex items-center mt-2 text-blue-100">
                            <i class="fas fa-chart-line mr-2"></i>
                            <span>Financial Overview</span>
                            <span class="mx-2">•</span>
                            <span class="text-green-300 flex items-center">
                                <i class="fas fa-arrow-trend-up mr-1"></i>
                                12% this month
                            </span>
                        </div>
                    </div>
                    <div class="flex space-x-3 mt-4 md:mt-0">
                        <button class="bg-white/10 text-white px-4 py-2 rounded-lg flex items-center hover:bg-white/20 transition-colors">
                            <i class="fas fa-filter mr-2"></i>
                            Filter
                        </button>
                        <button @click="modalOpen = true"
                            class="bg-white text-blue-600 px-4 py-2 rounded-lg flex items-center hover:bg-blue-50 transition-colors">
                            <i class="fas fa-plus mr-2"></i>
                            Add Transaction
                        </button>
                    </div>
                </div>

                <!-- Enhanced Navigation Tabs -->
                <div class="flex space-x-6 mt-8 border-b border-blue-500">
                    <button @click="activeTab = 'overview'"
                        :class="{'text-white border-b-2 border-white': activeTab === 'overview'}"
                        class="pb-4 text-blue-200 hover:text-white transition-colors">
                        <i class="fas fa-th-large mr-2"></i>
                        Overview
                    </button>
                    <button @click="activeTab = 'transactions'"
                        :class="{'text-white border-b-2 border-white': activeTab === 'transactions'}"
                        class="pb-4 text-blue-200 hover:text-white transition-colors">
                        <i class="fas fa-exchange-alt mr-2"></i>
                        Transactions
                    </button>
                    <button @click="activeTab = 'analytics'"
                        :class="{'text-white border-b-2 border-white': activeTab === 'analytics'}"
                        class="pb-4 text-blue-200 hover:text-white transition-colors">
                        <i class="fas fa-chart-bar mr-2"></i>
                        Analytics
                    </button>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="md:ml-64 p-4 md:p-8 pt-0">
            <!-- Enhanced Financial Summary Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Balance Card -->
                <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white/20 p-3 rounded-lg">
                            <i class="fas fa-wallet text-white text-xl"></i>
                        </div>
                        <span class="text-sm text-white/80">vs last month</span>
                    </div>
                    <h3 class="text-white/90 text-sm mb-2">Total Balance</h3>
                    <div class="flex items-baseline space-x-2">
                        <span class="text-2xl font-bold text-white">3,240</span>
                        <span class="text-white/80">DH</span>
                        <span class="text-green-300 text-sm ml-2">
                            <i class="fas fa-arrow-up text-xs"></i>
                            12%
                        </span>
                    </div>
                </div>

                <!-- Income Card -->
                <div class="bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white/20 p-3 rounded-lg">
                            <i class="fas fa-arrow-down text-white text-xl"></i>
                        </div>
                        <span class="text-sm text-white/80">Monthly</span>
                    </div>
                    <h3 class="text-white/90 text-sm mb-2">Income</h3>
                    <div class="flex items-baseline space-x-2">
                        <span class="text-2xl font-bold text-white">5,780</span>
                        <span class="text-white/80">DH</span>
                        <span class="text-green-300 text-sm ml-2">
                            <i class="fas fa-arrow-up text-xs"></i>
                            8%
                        </span>
                    </div>
                </div>

                <!-- Expenses Card -->
                <div class="bg-gradient-to-br from-red-500 to-pink-500 rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white/20 p-3 rounded-lg">
                            <i class="fas fa-arrow-up text-white text-xl"></i>
                        </div>
                        <span class="text-sm text-white/80">Monthly</span>
                    </div>
                    <h3 class="text-white/90 text-sm mb-2">Expenses</h3>
                    <div class="flex items-baseline space-x-2">
                        <span class="text-2xl font-bold text-white">2,540</span>
                        <span class="text-white/80">DH</span>
                        <span class="text-red-300 text-sm ml-2">
                            <i class="fas fa-arrow-down text-xs"></i>
                            5%
                        </span>
                    </div>
                </div>

                <!-- Savings Card -->
                <div class="bg-gradient-to-br from-purple-500 to-violet-500 rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white/20 p-3 rounded-lg">
                            <i class="fas fa-piggy-bank text-white text-xl"></i>
                        </div>
                        <span class="text-sm text-white/80">Total</span>
                    </div>
                    <h3 class="text-white/90 text-sm mb-2">Savings</h3>
                    <div class="flex items-baseline space-x-2">
                        <span class="text-2xl font-bold text-white">12,450</span>
                        <span class="text-white/80">DH</span>
                        <span class="text-green-300 text-sm ml-2">
                            <i class="fas fa-arrow-up text-xs"></i>
                            15%
                        </span>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Recent Transactions -->
                <div class="lg:col-span-2 bg-white/90 backdrop-blur-xl rounded-xl shadow-lg border border-white/20 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">Recent Transactions</h3>
                        <div class="flex items-center space-x-2">
                            <button class="text-gray-400 hover:text-gray-600 transition-colors">
                                <i class="fas fa-filter"></i>
                            </button>
                            <a href="#" class="text-blue-600 hover:text-blue-700 text-sm">View All</a>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <!-- Enhanced Transaction Items -->
                        <div class="group p-4 bg-white rounded-xl border border-gray-100 hover:border-blue-100 hover:shadow-md transition-all duration-300">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <div class="bg-blue-100 p-3 rounded-xl">
                                        <i class="fas fa-shopping-bag text-blue-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Grocery Shopping</p>
                                        <p class="text-sm text-gray-500">Carrefour Market</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="text-red-600 font-semibold">-320 DH</span>
                                    <p class="text-xs text-gray-500">Today at 2:30 PM</p>
                                </div>
                            </div>
                        </div>
                        <!-- More transaction items... -->
                    </div>
                </div>

                <!-- Right Sidebar -->
                <div class="space-y-6">
                    <!-- Enhanced Savings Goals -->
                    <div class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg border border-white/20 p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-semibold text-gray-900">Savings Goals</h3>
                            <button class="text-blue-600 hover:text-blue-700">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>

                        <div class="space-y-4">
                            <!-- Enhanced Goal Item -->
                            <div class="p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-100">
                                <div class="flex justify-between items-start mb-3">
                                    <div>
                                        <h4 class="font-medium text-gray-900">New Car</h4>
                                        <p class="text-sm text-gray-600">Target: Dec 2024</p>
                                    </div>
                                    <span class="text-sm font-medium text-blue-600">15,000 DH</span>
                                </div>
                                <div class="w-full bg-white rounded-full h-2.5 mb-2">
                                    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 h-2.5 rounded-full"
                                        style="width: 45%"></div>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600">6,750 DH saved</span>
                                    <span class="text-blue-600">45%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Enhanced AI Insights -->
                    <div class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg border border-white/20 p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-semibold text-gray-900">AI Insights</h3>
                            <i class="fas fa-robot text-blue-600"></i>
                        </div>
                        <div class="space-y-4">
                            <div class="p-4 bg-gradient-to-r from-yellow-50 to-amber-50 rounded-xl border border-yellow-100">
                                <div class="flex items-start space-x-3">
                                    <div class="bg-yellow-100 p-2 rounded-lg">
                                        <i class="fas fa-lightbulb text-yellow-600"></i>
                                    </div>
                                    <p class="text-sm text-gray-600">
                                        Your entertainment expenses increased by 15% this month. Consider reducing these costs to meet your savings goal.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>