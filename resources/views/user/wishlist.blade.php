<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist - MoneyMind</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 via-purple-50 to-pink-50 min-h-screen">
    <div class="min-h-screen relative">
        <x-aside-nav />

        <!-- Enhanced Header Section with Gradient -->
        <div class="bg-gradient-to-r from-purple-600 to-pink-600 shadow-lg mb-6">
            <div class="md:ml-64 p-4 md:p-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div class="animate__animated animate__fadeIn">
                        <h1 class="text-2xl font-bold text-white">My Wishlist</h1>
                        <div class="flex items-center mt-2 text-purple-100">
                            <i class="fas fa-gift mr-2"></i>
                            <span>6 Items</span>
                            <span class="mx-2">•</span>
                            <span class="text-white flex items-center">
                                <i class="fas fa-piggy-bank mr-1"></i>
                                27% Saved
                            </span>
                        </div>
                    </div>
                    <div class="flex space-x-3 mt-4 md:mt-0">
                        <button
                            class="bg-purple-500 text-white px-4 py-2 rounded-lg flex items-center hover:bg-purple-400 transition-colors">
                            <i class="fas fa-filter mr-2"></i>
                            Filter
                        </button>
                        <button id="openModalButton"
                            class="bg-white text-purple-600 px-4 py-2 rounded-lg flex items-center hover:bg-purple-50 transition-colors">
                            <i class="fas fa-plus mr-2"></i>
                            Add Item
                        </button>
                    </div>
                </div>

                <!-- Enhanced Navigation Tabs -->
                <div class="flex space-x-6 mt-8 border-b border-purple-500">
                    <button class="pb-4 text-purple-200 hover:text-white transition-colors">
                        <i class="fas fa-list mr-2"></i>
                        Items
                    </button>
                    <button class="pb-4 text-purple-200 hover:text-white transition-colors">
                        <i class="fas fa-piggy-bank mr-2"></i>
                        Savings
                    </button>
                    <button class="pb-4 text-purple-200 hover:text-white transition-colors">
                        <i class="fas fa-tag mr-2"></i>
                        Deals
                    </button>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="md:ml-64 p-4 md:p-8 pt-0">
            <!-- Enhanced Summary Cards with Glassmorphism -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <div
                    class="bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white/20 p-3 rounded-lg">
                            <i class="fas fa-gift text-white text-xl"></i>
                        </div>
                        <span class="text-sm text-white/80">Total</span>
                    </div>
                    <h3 class="text-white/90 text-sm mb-2">Total Items</h3>
                    <div class="flex items-baseline space-x-2">
                        <span class="text-2xl font-bold text-white">6</span>
                        <span class="text-white/80">items</span>
                    </div>
                </div>

                <div
                    class="bg-gradient-to-br from-blue-500 to-indigo-500 rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white/20 p-3 rounded-lg">
                            <i class="fas fa-shopping-cart text-white text-xl"></i>
                        </div>
                        <span class="text-sm text-white/80">Value</span>
                    </div>
                    <h3 class="text-white/90 text-sm mb-2">Total Value</h3>
                    <div class="flex items-baseline space-x-2">
                        <span class="text-2xl font-bold text-white">15,750</span>
                        <span class="text-white/80">DH</span>
                    </div>
                </div>

                <div
                    class="bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white/20 p-3 rounded-lg">
                            <i class="fas fa-piggy-bank text-white text-xl"></i>
                        </div>
                        <span class="text-sm text-white/80">Saved</span>
                    </div>
                    <h3 class="text-white/90 text-sm mb-2">Saved Amount</h3>
                    <div class="flex items-baseline space-x-2">
                        <span class="text-2xl font-bold text-white">4,200</span>
                        <span class="text-white/80">DH</span>
                    </div>
                </div>
            </div>

            <!-- Enhanced Wishlist Items Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <!-- Enhanced Item Cards -->
                <div
                    class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border border-white/20">
                    <div class="relative">
                        <div class="aspect-w-16 aspect-h-9 bg-gradient-to-br from-gray-100 to-gray-200">
                            <div class="p-4 flex items-center justify-center">
                                <i class="fas fa-laptop text-4xl text-gray-400"></i>
                            </div>
                        </div>
                        <span
                            class="absolute top-2 right-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white text-xs px-3 py-1 rounded-full">
                            High Priority
                        </span>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="font-semibold text-gray-900">MacBook Pro</h3>
                                <p class="text-sm text-gray-600">For web development</p>
                            </div>
                            <div class="flex space-x-2">
                                <button class="text-gray-400 hover:text-blue-600">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-gray-400 hover:text-red-600">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-gray-600">Savings Progress (40%)</span>
                                <span class="font-medium text-gray-900">4,000 / 10,000 DH</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: 40%"></div>
                            </div>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-600">
                                <i class="far fa-calendar-alt mr-1"></i>
                                Target: Jun 2024
                            </span>
                            <button class="text-blue-600 hover:text-blue-800">
                                Add Funds
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div
                    class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border border-white/20">
                    <div class="relative">
                        <div class="aspect-w-16 aspect-h-9 bg-gradient-to-br from-gray-100 to-gray-200">
                            <div class="p-4 flex items-center justify-center">
                                <i class="fas fa-mobile-alt text-4xl text-gray-400"></i>
                            </div>
                        </div>
                        <span
                            class="absolute top-2 right-2 bg-gradient-to-r from-yellow-500 to-yellow-600 text-white text-xs px-3 py-1 rounded-full">
                            Medium Priority
                        </span>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="font-semibold text-gray-900">iPhone 15</h3>
                                <p class="text-sm text-gray-600">Upgrade from old phone</p>
                            </div>
                            <div class="flex space-x-2">
                                <button class="text-gray-400 hover:text-blue-600">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-gray-400 hover:text-red-600">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-gray-600">Savings Progress (25%)</span>
                                <span class="font-medium text-gray-900">2,000 / 8,000 DH</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-yellow-500 h-2.5 rounded-full" style="width: 25%"></div>
                            </div>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-600">
                                <i class="far fa-calendar-alt mr-1"></i>
                                Target: Aug 2024
                            </span>
                            <button class="text-blue-600 hover:text-blue-800">
                                Add Funds
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Shopping Tips with Glassmorphism -->
            <div class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg p-6 border border-white/20">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Smart Shopping Tips</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="p-4 bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg border border-blue-200">
                        <i class="fas fa-calendar-alt text-blue-600 mb-2"></i>
                        <h4 class="font-medium text-gray-900 mb-1">Time Your Purchase</h4>
                        <p class="text-sm text-gray-600">Wait for seasonal sales to get the best deals on your wishlist
                            items.</p>
                    </div>
                    <div class="p-4 bg-gradient-to-br from-green-50 to-green-100 rounded-lg border border-green-200">
                        <i class="fas fa-tags text-green-600 mb-2"></i>
                        <h4 class="font-medium text-gray-900 mb-1">Compare Prices</h4>
                        <p class="text-sm text-gray-600">Check multiple retailers and set price alerts for better
                            deals.</p>
                    </div>
                    <div
                        class="p-4 bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg border border-purple-200">
                        <i class="fas fa-piggy-bank text-purple-600 mb-2"></i>
                        <h4 class="font-medium text-gray-900 mb-1">Save Systematically</h4>
                        <p class="text-sm text-gray-600">Set up automatic savings for your wishlist items.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Modal with Glassmorphism -->
        <div id="modal" class="fixed inset-0 z-50 overflow-y-auto hidden">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="fixed inset-0 bg-black/30 backdrop-blur-sm"></div>
                <div
                    class="relative bg-white/90 backdrop-blur-xl rounded-xl max-w-md w-full p-6 shadow-xl border border-white/20">
                    <!-- Modal content -->
                    <form action="" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="itemName" class="block text-sm font-medium text-gray-700 mb-2">Item
                                Name</label>
                            <input type="text" id="itemName" name="itemName"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                placeholder="Enter item name" required>
                        </div>
                        <div>
                            <label for="itemPrice" class="block text-sm font-medium text-gray-700 mb-2">Item Price
                                (DH)</label>
                            <div class="relative">
                                <span
                                    class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">DH</span>
                                <input type="number" id="itemPrice" name="itemPrice"
                                    class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    placeholder="0.00" step="0.01" required>
                            </div>
                        </div>
                        <div>
                            <label for="targetDate" class="block text-sm font-medium text-gray-700 mb-2">Target
                                Date</label>
                            <input type="date" id="targetDate" name="targetDate"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                required>
                        </div>
                        <div class="flex justify-end space-x-3">
                            <button type="button" id="closeModalButton"
                                class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-all duration-200">Cancel</button>
                            <button type="submit"
                                class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-all duration-200">Add
                                Item</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('openModalButton').addEventListener('click', function() {
            document.getElementById('modal').classList.remove('hidden');
        });

        document.getElementById('closeModalButton').addEventListener('click', function() {
            document.getElementById('modal').classList.add('hidden');
        });
    </script>
</body>

</html>
