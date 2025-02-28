<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Income - MoneyMind</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body class="bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50">
    <div x-data="{ sidebarOpen: false, modalOpen: false, activeTab: 'overview', darkMode: false }" class="min-h-screen relative">
        <!-- Mobile Menu Button -->
        <x-aside-nav />


        <!-- Enhanced Header Section with Gradient -->
        <div class="bg-gradient-to-r from-orange-600 to-red-600 shadow-lg mb-6">
            <div class="md:ml-64 p-4 md:p-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div class="animate__animated animate__fadeIn">
                        <h1 class="text-2xl font-bold text-white">Spending Alerts & Limits</h1>
                        <div class="flex items-center mt-2 text-orange-100">
                            <i class="fas fa-bell mr-2"></i>
                            <span>Active Alerts: 3</span>
                            <span class="mx-2">•</span>
                            <span class="text-white flex items-center">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Budget Usage: 65%
                            </span>
                        </div>
                    </div>
                    <div class="flex space-x-3 mt-4 md:mt-0">
                        <button @click="modalOpen = true"
                            class="bg-white text-orange-600 px-4 py-2 rounded-lg flex items-center hover:bg-orange-50 transition-colors">
                            <i class="fas fa-plus mr-2"></i>
                            Add New Alert
                        </button>
                    </div>
                </div>

                <!-- Modified Navigation Tabs -->
                <div class="flex space-x-6 mt-8 border-b border-orange-500">
                    <button @click="activeTab = 'overview'"
                        :class="{'text-white border-b-2 border-white': activeTab === 'overview'}"
                        class="pb-4 text-orange-200 hover:text-white transition-colors">
                        <i class="fas fa-bell mr-2"></i>
                        Alerts Overview
                    </button>
                    <button @click="activeTab = 'categories'"
                        :class="{'text-white border-b-2 border-white': activeTab === 'categories'}"
                        class="pb-4 text-orange-200 hover:text-white transition-colors">
                        <i class="fas fa-tags mr-2"></i>
                        Category Limits
                    </button>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="md:ml-64 p-4 md:p-8 pt-0">
            <!-- Overview Tab Content -->
            <div x-show="activeTab === 'overview'" class="animate__animated animate__fadeIn">
                <!-- Total Budget Alert Card -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Total Budget Alert</h3>
                        <button class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Monthly Limit</span>
                                <span class="font-semibold">5,000 DH</span>
                            </div>
                            <div class="relative pt-1">
                                <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-200">
                                    <div style="width: 65%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-orange-500"></div>
                                </div>
                                <div class="flex justify-between text-sm mt-1">
                                    <span class="text-gray-600">Used: 3,250 DH</span>
                                    <span class="text-orange-600">65%</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center text-yellow-600 bg-yellow-50 p-3 rounded-lg">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            <span>Alert at 80% of budget (4,000 DH)</span>
                        </div>
                    </div>
                </div>

                <!-- Category Alerts Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Shopping Category -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center">
                                <div class="bg-blue-100 p-2 rounded-lg mr-3">
                                    <i class="fas fa-shopping-bag text-blue-600"></i>
                                </div>
                                <h3 class="font-semibold">Shopping</h3>
                            </div>
                            <button class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                        <div class="space-y-3">
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm text-gray-600">Limit: 1,000 DH</span>
                                    <span class="text-sm font-semibold text-red-600">85%</span>
                                </div>
                                <div class="relative pt-1">
                                    <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-200">
                                        <div style="width: 85%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-500"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-sm text-red-600 bg-red-50 p-2 rounded-lg flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                <span>Approaching limit!</span>
                            </div>
                        </div>
                    </div>

                    <!-- Add more category cards here -->
                </div>
            </div>

            <!-- Categories Tab Content -->
            <div x-show="activeTab === 'categories'" class="animate__animated animate__fadeIn">
                <!-- Category Limits Table -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-semibold">Category Spending Limits</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Monthly Limit</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Current Usage</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Alert Threshold</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <!-- Sample category row -->
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="bg-blue-100 p-2 rounded-lg mr-3">
                                                <i class="fas fa-shopping-bag text-blue-600"></i>
                                            </div>
                                            <span>Shopping</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">1,000 DH</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="w-24 bg-gray-200 rounded-full h-2 mr-2">
                                                <div class="bg-blue-600 h-2 rounded-full" style="width: 85%"></div>
                                            </div>
                                            <span>85%</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">80%</td>
                                    <td class="px-6 py-4">
                                        <button class="text-blue-600 hover:text-blue-800 mr-3">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-800">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Alert Modal -->
        <div x-show="modalOpen" class="fixed inset-0 z-50 overflow-y-auto">
            <!-- Modal content here -->
        </div>
    </div>
</body>

</html>