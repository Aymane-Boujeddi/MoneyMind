<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recurring Payments - MoneyMind</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body class="bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50">
    <div x-data="{ sidebarOpen: false, modalOpen: false, activeTab: 'all' }" class="min-h-screen relative">
        <x-aside-nav />

        <!-- Modified Header Section -->
        <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 shadow-lg mb-6">
            <div class="md:ml-64 p-4 md:p-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div class="animate__animated animate__fadeIn">
                        <h1 class="text-2xl font-bold text-white">Payment History</h1>
                        <div class="flex items-center mt-2 text-indigo-100">
                            <i class="fas fa-chart-line mr-2"></i>
                            <span>Last 30 Days Overview</span>
                            <span class="mx-2">•</span>
                            <span class="text-green-300 flex items-center">
                                <i class="fas fa-wallet mr-1"></i>
                                5,230 DH Spent
                            </span>
                        </div>
                    </div>
                    <button @click="modalOpen = true"
                        class="mt-4 md:mt-0 bg-white text-indigo-600 px-4 py-2 rounded-lg flex items-center hover:bg-indigo-50 transition-all duration-200 shadow-md hover:shadow-lg">
                        <i class="fas fa-download mr-2"></i>
                        Export History
                    </button>
                </div>

                <!-- Modified Navigation Tabs -->
                <div class="flex space-x-6 mt-8 border-b border-indigo-500">
                    <button @click="activeTab = 'all'"
                        :class="{'text-white border-b-2 border-white': activeTab === 'all'}"
                        class="pb-4 text-indigo-200 hover:text-white transition-colors">
                        <i class="fas fa-list-ul mr-2"></i>
                        All Transactions
                    </button>
                    <button @click="activeTab = 'insights'"
                        :class="{'text-white border-b-2 border-white': activeTab === 'insights'}"
                        class="pb-4 text-indigo-200 hover:text-white transition-colors">
                        <i class="fas fa-lightbulb mr-2"></i>
                        Insights
                    </button>
                    <button @click="activeTab = 'budget'"
                        :class="{'text-white border-b-2 border-white': activeTab === 'budget'}"
                        class="pb-4 text-indigo-200 hover:text-white transition-colors">
                        <i class="fas fa-bullseye mr-2"></i>
                        Budget Analysis
                    </button>
                </div>
            </div>
        </div>

        <!-- Modified Main Content Area -->
        <div class="md:ml-64 p-4 md:p-8 pt-0">
            <!-- Modified Summary Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <!-- Monthly Overview Card -->
                <div class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white/20 p-3 rounded-lg">
                            <i class="fas fa-chart-pie text-white text-xl"></i>
                        </div>
                        <span class="text-sm text-white/80">This Month</span>
                    </div>
                    <h3 class="text-white/90 text-sm mb-2">Total Spent</h3>
                    <div class="flex items-baseline space-x-2">
                        <span class="text-2xl font-bold text-white">5,230</span>
                        <span class="text-white/80">DH</span>
                    </div>
                    <p class="text-sm text-white/90 mt-2">15% less than last month</p>
                </div>

                <!-- Savings Progress Card -->
                <div class="bg-gradient-to-br from-emerald-500 to-green-600 rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white/20 p-3 rounded-lg">
                            <i class="fas fa-piggy-bank text-white text-xl"></i>
                        </div>
                        <span class="text-sm text-white/80">Savings Goal</span>
                    </div>
                    <h3 class="text-white/90 text-sm mb-2">Monthly Target</h3>
                    <div class="flex items-baseline space-x-2">
                        <span class="text-2xl font-bold text-white">75%</span>
                    </div>
                    <p class="text-sm text-white/90 mt-2">1,500 DH saved of 2,000 DH goal</p>
                </div>

                <!-- Budget Health Card -->
                <div class="bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white/20 p-3 rounded-lg">
                            <i class="fas fa-heart-pulse text-white text-xl"></i>
                        </div>
                        <span class="text-sm text-white/80">Budget Health</span>
                    </div>
                    <h3 class="text-white/90 text-sm mb-2">Overall Status</h3>
                    <div class="flex items-baseline space-x-2">
                        <span class="text-2xl font-bold text-white">Good</span>
                    </div>
                    <p class="text-sm text-white/90 mt-2">On track with monthly goals</p>
                </div>
            </div>

            <!-- Enhanced Transaction History with Filters and Search -->
            <div class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg border border-white/20 overflow-hidden mb-8">
                <div class="p-6 border-b border-gray-100">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                        <h3 class="text-lg font-semibold text-gray-900">Recent Transactions</h3>

                        <!-- Search and Filter Controls -->
                        <div class="flex flex-wrap gap-3">
                            <div class="relative">
                                <input type="text" placeholder="Search transactions..."
                                    class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                            </div>

                            <select class="border border-gray-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option>All Categories</option>
                                <option>Groceries</option>
                                <option>Entertainment</option>
                                <option>Bills</option>
                                <option>Shopping</option>
                            </select>

                            <select class="border border-gray-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option>Last 30 days</option>
                                <option>Last 3 months</option>
                                <option>Last 6 months</option>
                                <option>This year</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Transaction Quick Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-4 bg-gray-50/50">
                    <div class="text-center p-3">
                        <p class="text-sm text-gray-600">Highest Payment</p>
                        <p class="font-semibold text-indigo-600">1,200 DH</p>
                    </div>
                    <div class="text-center p-3">
                        <p class="text-sm text-gray-600">Average Payment</p>
                        <p class="font-semibold text-indigo-600">450 DH</p>
                    </div>
                    <div class="text-center p-3">
                        <p class="text-sm text-gray-600">Total Transactions</p>
                        <p class="font-semibold text-indigo-600">24</p>
                    </div>
                    <div class="text-center p-3">
                        <p class="text-sm text-gray-600">Most Common Category</p>
                        <p class="font-semibold text-indigo-600">Groceries</p>
                    </div>
                </div>

                <!-- Enhanced Transaction Items -->
                <div class="divide-y divide-gray-100">
                    <template x-for="(transaction, index) in transactions" :key="index">
                        <div class="p-6 hover:bg-gray-50/50 transition-all duration-200">
                            <div class="flex items-center justify-between group">
                                <div class="flex items-center space-x-4">
                                    <div class="bg-gradient-to-br from-red-100 to-red-200 p-3 rounded-xl">
                                        <i class="fas fa-shopping-cart text-red-600"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">Grocery Shopping</h4>
                                        <p class="text-sm text-gray-600">Marjane Supermarket</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="text-right">
                                        <p class="font-semibold text-red-600">-450 DH</p>
                                        <p class="text-sm text-gray-600">Today</p>
                                    </div>
                                    <!-- Quick Actions -->
                                    <div class="opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="text-gray-400 hover:text-indigo-600 px-2">
                                            <i class="fas fa-receipt" title="View Receipt"></i>
                                        </button>
                                        <button class="text-gray-400 hover:text-indigo-600 px-2">
                                            <i class="fas fa-tag" title="Add Category"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Pagination -->
                <div class="p-4 border-t border-gray-100">
                    <div class="flex justify-between items-center">
                        <button class="px-4 py-2 text-sm text-gray-600 hover:text-indigo-600">Previous</button>
                        <div class="flex gap-2">
                            <button class="w-8 h-8 rounded-full bg-indigo-600 text-white flex items-center justify-center">1</button>
                            <button class="w-8 h-8 rounded-full hover:bg-gray-100 text-gray-600 flex items-center justify-center">2</button>
                            <button class="w-8 h-8 rounded-full hover:bg-gray-100 text-gray-600 flex items-center justify-center">3</button>
                        </div>
                        <button class="px-4 py-2 text-sm text-gray-600 hover:text-indigo-600">Next</button>
                    </div>
                </div>
            </div>

            <!-- Enhanced Budget Insights with Interactive Elements -->
            <div class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg border border-white/20 p-6 mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-6">Smart Budget Insights</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Spending Breakdown -->
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl border border-gray-200 p-4">
                        <div class="flex items-center space-x-3 mb-3">
                            <i class="fas fa-chart-pie text-purple-500"></i>
                            <h4 class="font-semibold text-gray-900">Category Breakdown</h4>
                        </div>
                        <div class="space-y-2">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Groceries</span>
                                <div class="w-2/3">
                                    <div class="h-2 bg-purple-200 rounded-full">
                                        <div class="h-2 bg-purple-500 rounded-full" style="width: 45%"></div>
                                    </div>
                                </div>
                                <span class="text-sm font-medium">45%</span>
                            </div>
                            <!-- Add more categories -->
                        </div>
                    </div>

                    <!-- Smart Tips -->
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl border border-gray-200 p-4">
                        <div class="flex items-center space-x-3 mb-3">
                            <i class="fas fa-lightbulb text-amber-500"></i>
                            <h4 class="font-semibold text-gray-900">Smart Tips</h4>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-start space-x-2">
                                <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                <p class="text-sm text-gray-600">Set up automatic savings transfers for your goals</p>
                            </div>
                            <div class="flex items-start space-x-2">
                                <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                <p class="text-sm text-gray-600">Review subscriptions - you might save 150 DH monthly</p>
                            </div>
                        </div>
                    </div>

                    <!-- Upcoming Payments -->
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl border border-gray-200 p-4">
                        <div class="flex items-center space-x-3 mb-3">
                            <i class="fas fa-calendar text-blue-500"></i>
                            <h4 class="font-semibold text-gray-900">Upcoming Payments</h4>
                        </div>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-wifi text-gray-400"></i>
                                    <span class="text-sm text-gray-600">Internet Bill</span>
                                </div>
                                <span class="text-sm font-medium">Due in 3 days</span>
                            </div>
                            <!-- Add more upcoming payments -->
                        </div>
                    </div>
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