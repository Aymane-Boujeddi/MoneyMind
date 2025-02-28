<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - MoneyMind</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body class="bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50">
    <div x-data="{ sidebarOpen: false, editMode: false, activeTab: 'profile' }" class="min-h-screen relative">
        <x-aside-nav />

        <!-- Enhanced Header Section -->
        <div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-violet-600 shadow-lg">
            <div class="md:ml-64 p-4 md:p-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div class="animate__animated animate__fadeIn">
                        <h1 class="text-2xl font-bold text-white">Account Settings</h1>
                        <div class="flex items-center mt-2 text-blue-100">
                            <i class="fas fa-user-circle mr-2"></i>
                            <span>Manage Your Profile</span>
                        </div>
                    </div>
                    <div class="mt-4 md:mt-0 flex space-x-3">
                        <button @click="editMode = !editMode"
                            class="bg-white/10 backdrop-blur-sm text-white px-4 py-2 rounded-lg flex items-center hover:bg-white/20 transition-all duration-200">
                            <i class="fas" :class="editMode ? 'fa-check' : 'fa-edit'"></i>
                            <span class="ml-2" x-text="editMode ? 'Save Changes' : 'Edit Profile'"></span>
                        </button>
                    </div>
                </div>

                <!-- Profile Navigation -->
                <div class="flex space-x-6 mt-8 border-b border-white/20">
                    <button @click="activeTab = 'profile'"
                        :class="{'text-white border-b-2 border-white': activeTab === 'profile'}"
                        class="pb-4 text-blue-200 hover:text-white transition-colors">
                        <i class="fas fa-user mr-2"></i>
                        Personal Info
                    </button>
                    <button @click="activeTab = 'financial'"
                        :class="{'text-white border-b-2 border-white': activeTab === 'financial'}"
                        class="pb-4 text-blue-200 hover:text-white transition-colors">
                        <i class="fas fa-wallet mr-2"></i>
                        Financial Details
                    </button>
                    <button @click="activeTab = 'security'"
                        :class="{'text-white border-b-2 border-white': activeTab === 'security'}"
                        class="pb-4 text-blue-200 hover:text-white transition-colors">
                        <i class="fas fa-shield-alt mr-2"></i>
                        Security
                    </button>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="md:ml-64 p-4 md:p-8 pt-0">
            <!-- Profile Overview Card -->
            <div class="mb-6">
                <div class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg border border-white/20 p-6">
                    <div class="flex flex-col md:flex-row items-center md:items-start space-y-4 md:space-y-0 md:space-x-6">
                        <div class="relative group">
                            <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-white shadow-lg">
                                <img src="https://ui-avatars.com/api/?name=John+Doe&background=0366D6&color=fff"
                                    class="w-full h-full object-cover" />
                            </div>
                            <button x-show="editMode"
                                class="absolute bottom-0 right-0 bg-blue-600 text-white p-2 rounded-full shadow-lg hover:bg-blue-700 transition-all duration-200">
                                <i class="fas fa-camera"></i>
                            </button>
                        </div>
                        <div class="text-center md:text-left">
                            <h2 class="text-2xl font-bold text-gray-900">{{ Auth::user()->name }}</h2>
                            <p class="text-gray-600">{{ Auth::user()->email }}</p>
                            <div class="flex items-center justify-center md:justify-start mt-2 space-x-3">
                                <span class="bg-green-100 text-green-800 text-xs px-2.5 py-0.5 rounded-full flex items-center">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    Verified Account
                                </span>
                                <span class="text-gray-500 text-sm">
                                    <i class="far fa-clock mr-1"></i>
                                    Joined {{ Auth::user()->created_at->format('M Y') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Content Section -->
                <div class="lg:col-span-2">
                    <!-- Personal Info Tab -->
                    <div x-show="activeTab === 'profile'" class="space-y-6 animate__animated animate__fadeIn">
                        <div class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg border border-white/20 p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-6">Personal Information</h3>
                            <form class="space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                        <input type="text" :disabled="!editMode"
                                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                            value="{{ Auth::user()->name }}" />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                        <input type="email" :disabled="!editMode"
                                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                            value="{{ Auth::user()->email }}" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Financial Details Tab -->
                    <form action="" method="POST">
                        @csrf
                        <div x-show="activeTab === 'financial'" class="space-y-6 animate__animated animate__fadeIn">
                            <div class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg border border-white/20 p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-6">Financial Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Monthly Income Card -->
                                <div class="bg-gradient-to-br from-green-50 to-emerald-100 rounded-xl p-4">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-sm text-gray-600">Monthly Salary</p>
                                            <h4 class="text-xl font-bold text-gray-900 mt-1">{{ Auth::user()->salary }} DH</h4>
                                        </div>
                                        <div class="bg-white p-2 rounded-lg shadow">
                                            <i class="fas fa-money-bill-wave text-green-600"></i>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Update Salary</label>
                                        <div class="relative">
                                            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">DH</span>
                                            <input type="number" name="salary" :disabled="!editMode"
                                                class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-600 focus:border-transparent"
                                                value="{{ Auth::user()->salary }}" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Monthly Budget Card -->
                                <div class="bg-gradient-to-br from-blue-50 to-indigo-100 rounded-xl p-4">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-sm text-gray-600">Monthly Budget</p>
                                            <h4 class="text-xl font-bold text-gray-900 mt-1">{{ Auth::user()->budget }} DH</h4>
                                        </div>
                                        <div class="bg-white p-2 rounded-lg shadow">
                                            <i class="fas fa-piggy-bank text-blue-600"></i>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Update Budget</label>
                                        <div class="relative">
                                            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">DH</span>
                                            <input type="number" name="budget" :disabled="!editMode"
                                                class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                                value="{{ Auth::user()->budget }}" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Salary Date Card -->
                                <div class="md:col-span-2 bg-gradient-to-br from-purple-50 to-violet-100 rounded-xl p-4">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-sm text-gray-600">Salary Credit Date</p>
                                            <h4 class="text-xl font-bold text-gray-900 mt-1">Day {{ Auth::user()->credit_date }}</h4>
                                        </div>
                                        <div class="bg-white p-2 rounded-lg shadow">
                                            <i class="fas fa-calendar-alt text-purple-600"></i>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Update Credit Date</label>
                                        <input type="number" name="credit_date" :disabled="!editMode
                                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                            value="{{ Auth::user()->credit_date }}"
                                            min="1" max="31" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>

                    <!-- Security Tab -->
                    <div x-show="activeTab === 'security'" class="space-y-6 animate__animated animate__fadeIn">
                        <div class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg border border-white/20 p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-6">Security Settings</h3>
                            <!-- Security content here -->
                        </div>
                    </div>
                </div>

                <!-- Side Panel -->
                <div class="space-y-6">
                    <!-- Account Status -->
                    <div class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg border border-white/20 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Account Status</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="bg-green-100 p-2 rounded-lg">
                                        <i class="fas fa-shield-alt text-green-600"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900">Account Security</h4>
                                        <p class="text-sm text-gray-600">2FA Enabled</p>
                                    </div>
                                </div>
                                <i class="fas fa-check-circle text-green-600"></i>
                            </div>
                            <!-- Add more status items -->
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg border border-white/20 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                        <div class="space-y-3">
                            <button class="w-full flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                <span class="flex items-center">
                                    <i class="fas fa-key text-blue-600 mr-3"></i>
                                    <span class="text-gray-700">Change Password</span>
                                </span>
                                <i class="fas fa-chevron-right text-gray-400"></i>
                            </button>
                            <!-- Add more quick actions -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>