<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Goals - MoneyMind</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body class="bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50">
    <div x-data="{ sidebarOpen: false, modalOpen: false, activeTab: 'active' }" class="min-h-screen relative">
        <!-- Sidebar (Same as other pages) -->
        <x-aside-nav />

        <!-- Enhanced Header Section -->
        <div class="bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 shadow-lg mb-6">
            <div class="md:ml-64 p-4 md:p-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div class="animate__animated animate__fadeIn">
                        <h1 class="text-2xl font-bold text-white">Savings Goals</h1>
                        <div class="flex items-center mt-2 text-emerald-100">
                            <i class="fas fa-piggy-bank mr-2"></i>
                            <span>Your Savings Journey</span>
                            <span class="mx-2">•</span>
                            <span class="text-green-300 flex items-center">
                                <i class="fas fa-chart-line mr-1"></i>
                                Total Saved: 12,500 DH
                            </span>
                        </div>
                    </div>
                    <button @click="modalOpen = true"
                        class="mt-4 md:mt-0 bg-white text-emerald-600 px-4 py-2 rounded-lg flex items-center hover:bg-emerald-50 transition-all duration-200 shadow-md hover:shadow-lg">
                        <i class="fas fa-plus mr-2"></i>
                        Set New Savings Goal
                    </button>
                </div>

                <!-- Enhanced Navigation Tabs -->
                <div class="flex space-x-6 mt-8 border-b border-emerald-500">
                    <button @click="activeTab = 'active'"
                        :class="{'text-white border-b-2 border-white': activeTab === 'active'}"
                        class="pb-4 text-emerald-200 hover:text-white transition-colors">
                        <i class="fas fa-piggy-bank mr-2"></i>
                        Active Goals
                    </button>
                    <button @click="activeTab = 'completed'"
                        :class="{'text-white border-b-2 border-white': activeTab === 'completed'}"
                        class="pb-4 text-emerald-200 hover:text-white transition-colors">
                        <i class="fas fa-trophy mr-2"></i>
                        Achieved Goals
                    </button>
                    <button @click="activeTab = 'insights'"
                        :class="{'text-white border-b-2 border-white': activeTab === 'insights'}"
                        class="pb-4 text-emerald-200 hover:text-white transition-colors">
                        <i class="fas fa-lightbulb mr-2"></i>
                        Saving Tips
                    </button>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="md:ml-64 p-4 md:p-8 pt-0">
            <!-- Enhanced Summary Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Monthly Savings Card -->
                <div class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white/20 p-3 rounded-lg">
                            <i class="fas fa-coins text-white text-xl"></i>
                        </div>
                        <span class="text-sm text-white/80">Monthly</span>
                    </div>
                    <h3 class="text-white/90 text-sm mb-2">Monthly Savings</h3>
                    <div class="flex items-baseline space-x-2">
                        <span class="text-2xl font-bold text-white">2,500</span>
                        <span class="text-white/80">DH</span>
                    </div>
                    <p class="text-sm text-white/90 mt-2">+15% vs last month</p>
                </div>

                <!-- Total Saved Card -->
                <div class="bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white/20 p-3 rounded-lg">
                            <i class="fas fa-piggy-bank text-white text-xl"></i>
                        </div>
                        <span class="text-sm text-white/80">Total</span>
                    </div>
                    <h3 class="text-white/90 text-sm mb-2">Total Savings</h3>
                    <div class="flex items-baseline space-x-2">
                        <span class="text-2xl font-bold text-white">12,500</span>
                        <span class="text-white/80">DH</span>
                    </div>
                    <p class="text-sm text-white/90 mt-2">Across all goals</p>
                </div>

                <!-- Savings Rate Card -->
                <div class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white/20 p-3 rounded-lg">
                            <i class="fas fa-chart-pie text-white text-xl"></i>
                        </div>
                        <span class="text-sm text-white/80">Rate</span>
                    </div>
                    <h3 class="text-white/90 text-sm mb-2">Savings Rate</h3>
                    <div class="flex items-baseline space-x-2">
                        <span class="text-2xl font-bold text-white">25</span>
                        <span class="text-white/80">%</span>
                    </div>
                    <p class="text-sm text-white/90 mt-2">of monthly income</p>
                </div>

                <!-- Time to Goal Card -->
                <div class="bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white/20 p-3 rounded-lg">
                            <i class="fas fa-hourglass-half text-white text-xl"></i>
                        </div>
                        <span class="text-sm text-white/80">Next Goal</span>
                    </div>
                    <h3 class="text-white/90 text-sm mb-2">Time to Goal</h3>
                    <div class="flex items-baseline space-x-2">
                        <span class="text-2xl font-bold text-white">3</span>
                        <span class="text-white/80">months</span>
                    </div>
                    <p class="text-sm text-white/90 mt-2">Emergency Fund</p>
                </div>
            </div>

            <!-- Enhanced Goals Section -->
            <div class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg border border-white/20 overflow-hidden mb-8">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900">Your Savings Goals</h3>
                </div>
                <div class="divide-y divide-gray-100">
                    <!-- Emergency Fund Goal -->
                    <div class="p-6 hover:bg-gray-50/50 transition-all duration-200">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex items-center space-x-4">
                                <div class="bg-emerald-100 p-3 rounded-lg">
                                    <i class="fas fa-shield-alt text-emerald-600 text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">Emergency Fund</h3>
                                    <p class="text-sm text-gray-600">6 months of expenses</p>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <button class="text-gray-400 hover:text-emerald-600 transition-colors">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-gray-400 hover:text-red-600 transition-colors">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-gray-600">Progress (75%)</span>
                                <span class="font-medium text-gray-900">30,000 / 40,000 DH</span>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2.5">
                                <div class="bg-gradient-to-r from-emerald-500 to-teal-500 h-2.5 rounded-full animate__animated animate__slideInLeft"
                                    style="width: 75%"></div>
                            </div>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-600">
                                <i class="far fa-calendar-alt mr-1"></i>
                                Target: June 2024
                            </span>
                            <span class="text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full">
                                <i class="fas fa-check-circle mr-1"></i>
                                On Track
                            </span>
                        </div>
                    </div>

                    <!-- Add more goal items here -->
                </div>
            </div>

            <!-- Savings Tips Section -->
            <div class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg border border-white/20 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-6">Smart Saving Tips</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="p-4 bg-gradient-to-br from-emerald-50 to-teal-100 rounded-xl border border-emerald-200">
                        <i class="fas fa-piggy-bank text-emerald-600 text-xl mb-2"></i>
                        <h4 class="font-medium text-gray-900 mb-1">50/30/20 Rule</h4>
                        <p class="text-sm text-gray-600">Allocate 50% for needs, 30% for wants, and 20% for savings.</p>
                    </div>
                    <!-- Add more tips -->
                </div>
            </div>
        </div>

        <!-- Enhanced Modal -->
        <div x-show="modalOpen"
            class="fixed inset-0 z-50 overflow-y-auto"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="fixed inset-0 bg-black/30 backdrop-blur-sm"></div>
                <div class="relative bg-white/90 backdrop-blur-xl rounded-xl max-w-md w-full p-6 shadow-xl border border-white/20">
                    <!-- Modal content -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>