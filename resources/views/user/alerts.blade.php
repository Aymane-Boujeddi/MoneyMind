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
@if(session('success'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
        class="fixed top-4 right-4 z-50 flex items-center p-4 mb-4 rounded-lg shadow-lg bg-green-50 border-l-4 border-green-500 animate__animated animate__fadeInRight">
        <div class="flex items-center">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-600 bg-green-100 rounded-lg">
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
    @elseif(session('error'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
        class="fixed top-4 right-4 z-50 flex items-center p-4 mb-4 rounded-lg shadow-lg bg-red-50 border-l-4 border-red-500 animate__animated animate__fadeInRight">
        <div class="flex items-center">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-600 bg-red-100 rounded-lg">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            @if($errors->any())
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="fixed top-4 right-4 z-50 flex items-center p-4 mb-4 rounded-lg shadow-lg bg-red-50 border-l-4 border-red-500 animate__animated animate__fadeInRight">
                <div class="flex items-center">
                    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-600 bg-red-100 rounded-lg">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="ml-3 text-sm font-medium text-red-700">
                        @if($errors->has('seuil'))
                            {{ $errors->first('seuil') }}
                        @endif
                        @if($errors->has('category_id'))
                            {{ $errors->first('category_id') }}
                        @endif
                    </div>
                </div>
                <button @click="show = false" class="ml-4 text-red-500 hover:text-red-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            @endif
           
    @endif
    <div x-data="{ sidebarOpen: false, globalModalOpen: false, categoryModalOpen: false, activeTab: 'overview' }" class="min-h-screen relative">
        <!-- Mobile Menu Button -->
        <x-aside-nav />


        <!-- Enhanced Header Section with Gradient -->
        <div class="bg-gradient-to-r from-purple-600 to-indigo-600 shadow-lg mb-6">
            <div class="md:ml-64 p-4 md:p-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div class="animate__animated animate__fadeIn">
                        <h1 class="text-2xl font-bold text-white">Spending Alerts</h1>
                        <div class="flex items-center mt-2 text-purple-100">
                            <i class="fas fa-bell mr-2"></i>
                            <span>Alert Management</span>
                        </div>
                    </div>
                    <div class="flex space-x-3 mt-4 md:mt-0">
                        <button @click="globalModalOpen = true"
                            class="bg-white/10 backdrop-blur-sm text-white px-4 py-2 rounded-lg flex items-center hover:bg-white/20 transition-colors">
                            <i class="fas fa-globe mr-2"></i>
                            Set Global Alert
                        </button>
                        <button @click="categoryModalOpen = true"
                            class="bg-white text-indigo-600 px-4 py-2 rounded-lg flex items-center hover:bg-indigo-50 transition-colors">
                            <i class="fas fa-tags mr-2"></i>
                            Add Category Alert
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="md:ml-64 p-4 md:p-8 pt-0">
            <!-- Global Alert Card -->
            <div class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg p-6 mb-8">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Global Budget Alert</h3>
                        <p class="text-sm text-gray-600">Monitors overall spending across all categories</p>
                        <span class="text-sm text-gray-500">Alert at {{$globalAlert->seuil}}%</span>
                    </div>
                    <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm">
                        Active
                    </span>
                </div>
                <div class="space-y-4">
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-600">Alert Threshold</span>
                            <span class="font-semibold">{{$totalExpenses / $salary * 100}}  %</span>
                        </div>
                        <div class="relative pt-1">
                            <div class="overflow-hidden h-3 text-xs flex rounded-full bg-gray-200">
                                <div class="bg-gradient-to-r from-purple-500 to-indigo-600 w-[{{$globalAlert->progress}}%] rounded-full transition-all duration-500"></div>
                            </div>
                            <div class="flex justify-between text-sm mt-2">
                                <span class="text-gray-600">Current Progress: {{$globalAlert->progress}}</span>
                                <span class="text-purple-600">{{$totalExpenses}} / {{$salary}} DH</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Category Alerts Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Sample Category Alert Card -->
                @if ($categoryAlerts->isEmpty())
                    <div class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg p-6 group hover:shadow-xl transition-all duration-300">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex items-center space-x-3">
                                <div class="bg-blue-100 p-3 rounded-lg">
                                    <i class="fas fa-shopping-bag text-blue-600"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">No Category Alert</h3>
                                    <p class="text-sm text-gray-500">Add alerts for specific categories</p>
                                </div>
                            </div>
                            
                    
                @else
                    
                @foreach($categoryAlerts as $categoryAlert)
                <div class="bg-white/90 backdrop-blur-xl rounded-xl shadow-lg p-6 group hover:shadow-xl transition-all duration-300">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="bg-blue-100 p-3 rounded-lg">
                                <i class="fas fa-shopping-bag text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">{{ $categoryAlert->category->category_name }}</h3>
                                <p class="text-sm text-gray-500">Alert at {{ $categoryAlert->seuil }}%</p>
                            </div>
                        </div>
                        <div class="opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="text-gray-400 hover:text-blue-600">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="relative pt-1">
                            <div class="overflow-hidden h-2 text-xs flex rounded-full bg-gray-200">
                                <div class="bg-gradient-to-r from-blue-500 to-indigo-600 w-[{{ $categoryAlert->progress }}%] rounded-full"></div>
                            </div>
                            <div class="flex justify-between text-sm mt-2">
                                <span class="text-gray-600">{{ $categoryAlert->current_expense }} / {{ $categoryAlert->budget }} DH</span>
                                <span class="text-blue-600 font-medium">{{ $categoryAlert->progress }}%</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                <!-- Add more category alert cards here -->
            </div>
        </div>

        <!-- Global Alert Modal -->
        <template x-if="globalModalOpen">
            <div class="fixed inset-0 z-50 overflow-y-auto"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">
                <div class="flex items-center justify-center min-h-screen px-4">
                    <div class="fixed inset-0 bg-black/30 backdrop-blur-sm" @click="globalModalOpen = false"></div>

                    <div class="relative bg-white rounded-xl max-w-md w-full p-6 shadow-xl">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-semibold text-gray-900">Set Global Alert</h3>
                            <button @click="globalModalOpen = false" class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>

                        <form action="{{route('addGlobalAlert')}}" method="POST" class="space-y-6">
                            @csrf
                            <input type="hidden" name="type" value="global">

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Alert Threshold (%)</label>
                                <input type="number" name="seuil" min="1" max="100" step="1"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                    placeholder="Enter percentage (e.g., 80)">
                            </div>

                            <div class="flex justify-end space-x-4">
                                <button type="button" @click="globalModalOpen = false"
                                    class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                                    Set Alert
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </template>

        <!-- Category Alert Modal -->
        <template x-if="categoryModalOpen">
            <div class="fixed inset-0 z-50 overflow-y-auto"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">
                <div class="flex items-center justify-center min-h-screen px-4">
                    <div class="fixed inset-0 bg-black/30 backdrop-blur-sm" @click="categoryModalOpen = false"></div>

                    <div class="relative bg-white rounded-xl max-w-md w-full p-6 shadow-xl">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-semibold text-gray-900">Set Category Alert</h3>
                            <button @click="categoryModalOpen = false" class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>

                        <form action="{{route('addCategoryAlert')}}" method="POST" class="space-y-6">
                            @csrf
                            <input type="hidden" name="type" value="category">

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                                <select name="category_id" 
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                    <option value="">Select a category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Alert Threshold (%)</label>
                                <input type="number" name="seuil" min="1" max="100" step="1"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                    placeholder="Enter percentage (e.g., 75)">
                            </div>

                            <div class="flex justify-end space-x-4">
                                <button type="button" @click="categoryModalOpen = false"
                                    class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                                    Set Alert
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </template>
    </div>
</body>

</html>