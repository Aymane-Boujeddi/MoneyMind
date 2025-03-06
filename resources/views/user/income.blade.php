<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Income Management - MoneyMind</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50 min-h-screen">
    <!-- Success Message -->
    @if (session('success'))
        <div id="successMessage" class="fixed top-4 right-4 z-50 flex items-center p-4 mb-4 rounded-lg shadow-lg bg-green-50 border-l-4 border-green-500 animate__animated animate__fadeInRight">
            <div class="flex items-center">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-600 bg-green-100 rounded-lg">
                    <i class="fas fa-check"></i>
                </div>
                <div class="ml-3 text-sm font-medium text-green-700">
                    {{ session('success') }}
                </div>
            </div>
            <button id="closeSuccessMessage" class="ml-4 text-green-500 hover:text-green-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    <div class="min-h-screen relative">
        <!-- Sidebar Navigation -->
        <x-aside-nav />

        <!-- Enhanced Header Section with Gradient -->
        <div class="bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600 shadow-lg">
            <div class="md:ml-64 p-4 md:p-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div class="animate__animated animate__fadeIn">
                        <h1 class="text-2xl font-bold text-white">Income Management</h1>
                        <div class="flex items-center mt-2 text-green-100">
                            <i class="fas fa-wallet mr-2"></i>
                            <span>Monthly Overview</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-6 mt-6">
                    <!-- Regular Income Button -->
                    <button id="openRegularIncomeModal"
                        class="flex-1 bg-white/10 backdrop-blur-xl hover:bg-white/20 text-white p-6 rounded-xl border border-white/20 shadow-lg hover:shadow-xl transition-all duration-300 group">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-white/20 p-3 rounded-lg">
                                <i class="fas fa-briefcase text-2xl"></i>
                            </div>
                            <span class="text-white/80">Regular</span>
                        </div>
                        <h3 class="text-lg font-semibold mb-1">Modify Income</h3>
                        <p class="text-sm text-green-100">Actual Salary {{ $income }} DH</p>
                        <div class="mt-4 flex items-center text-green-100 group-hover:text-white transition-colors">
                            <span>Modify now</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </div>
                    </button>

                    <!-- Side Income Button -->
                    <button id="openSideIncomeModal"
                        class="flex-1 bg-white/10 backdrop-blur-xl hover:bg-white/20 text-white p-6 rounded-xl border border-white/20 shadow-lg hover:shadow-xl transition-all duration-300 group">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-white/20 p-3 rounded-lg">
                                <i class="fas fa-coins text-2xl"></i>
                            </div>
                            <span class="text-white/80">Side Income</span>
                        </div>
                        <h3 class="text-lg font-semibold mb-1">Add Side Income</h3>
                        <p class="text-sm text-emerald-100">Track freelance and additional earnings</p>
                        <div class="mt-4 flex items-center text-emerald-100 group-hover:text-white transition-colors">
                            <span>Add now</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </div>
                    </button>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="md:ml-64 p-4 md:p-8 pt-0">
            <!-- Overview Tab Content -->
            <div class="animate__animated animate__fadeIn">
                <!-- Income Summary Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Total Income Card -->
                    <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-white/20 p-3 rounded-lg">
                                <i class="fas fa-wallet text-white text-xl"></i>
                            </div>
                            <span class="text-sm text-white/80">{{ $credit_date }} Th</span>
                        </div>
                        <h3 class="text-white/90 text-sm mb-2">Total Income</h3>
                        <div class="flex items-baseline space-x-2">
                            <span class="text-2xl font-bold text-white">{{ $income }}</span>
                            <span class="text-white/80">DH</span>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-blue-500 to-emerald-600 rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-white/20 p-3 rounded-lg">
                                <i class="fas fa-wallet text-white text-xl"></i>
                            </div>
                        </div>
                        <h3 class="text-white/90 text-sm mb-2">Current Budget</h3>
                        <div class="flex items-baseline space-x-2">
                            <span class="text-2xl font-bold text-white">{{ $budget }}</span>
                            <span class="text-white/80">DH</span>
                        </div>
                    </div>

                    <!-- Similar cards for other income metrics -->
                </div>

                <!-- Side Incomes Section -->
                <div class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg p-6 border border-white/20 mb-8">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">Side Incomes</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50/50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Source</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-900">2024-11-22</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Freelance</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">4000 DH</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">
                                        <button class="text-blue-600 hover:text-blue-900 mr-2">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Add Income Modal -->
            <div id="modal" class="fixed inset-0 z-50 overflow-y-auto hidden">
                <div class="flex items-center justify-center min-h-screen px-4">
                    <div class="fixed inset-0 bg-black/30 backdrop-blur-sm" id="closeModal"></div>

                    <div class="relative bg-white/90 backdrop-blur-xl rounded-xl max-w-md w-full p-6 shadow-xl border border-white/20">
                        <div class="flex justify-between items-center mb-6">
                            <h3 id="modalTitle" class="text-xl font-semibold text-gray-900">Add Regular Income</h3>
                            <button id="closeModalButton" class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>

                        <form class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Amount (DH)</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">DH</span>
                                    <input type="number" name="salary" value="{{ $income }}" class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-600 focus:border-transparent" placeholder="0.00">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Credit Date (from 1 to 31)</label>
                                <input type="number" name="credit_date" value="{{ $credit_date }}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-600 focus:border-transparent" placeholder="Enter income title">
                            </div>

                            <div class="flex justify-end space-x-4">
                                <button type="button" id="cancelModalButton" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                                    Cancel
                                </button>
                                <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                                    Change Income Informations
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('openRegularIncomeModal').addEventListener('click', function() {
            document.getElementById('modal').classList.remove('hidden');
            document.getElementById('modalTitle').textContent = 'Add Regular Income';
        });

        document.getElementById('openSideIncomeModal').addEventListener('click', function() {
            document.getElementById('modal').classList.remove('hidden');
            document.getElementById('modalTitle').textContent = 'Add Side Income';
        });

        document.getElementById('closeModalButton').addEventListener('click', function() {
            document.getElementById('modal').classList.add('hidden');
        });

        document.getElementById('cancelModalButton').addEventListener('click', function() {
            document.getElementById('modal').classList.add('hidden');
        });

        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('modal').classList.add('hidden');
        });

        document.getElementById('closeSuccessMessage').addEventListener('click', function() {
            document.getElementById('successMessage').classList.add('hidden');
        });

        setTimeout(function() {
            if (document.getElementById('successMessage')) {
                document.getElementById('successMessage').classList.add('hidden');
            }
        }, 3000);
    </script>
</body>

</html>