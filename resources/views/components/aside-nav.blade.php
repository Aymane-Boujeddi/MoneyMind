<aside class="fixed inset-y-0 left-0 bg-white/80 backdrop-blur-xl shadow-lg w-64 transform transition-transform duration-200 ease-in-out z-40
md:translate-x-0 border-r border-gray-200/50"
  :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}"
  x-data="{ activeLink: '{{ Route::currentRouteName() }}' }">
  <!-- Logo and Brand -->
  <div class="p-6 border-b border-gray-200/50">
    <div class="flex items-center space-x-3">
      <div class="bg-gradient-to-br from-blue-600 to-indigo-600 p-2 rounded-lg">
        <i class="fas fa-wallet text-white text-xl"></i>
      </div>
      <span class="text-xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
        MoneyMind
      </span>
    </div>
  </div>

  <!-- User Profile -->
  <div class="p-4 border-b border-gray-200/50">
    <div class="flex items-center space-x-3">
      <div class="w-10 h-10 rounded-full bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center">
        <span class="text-white font-semibold">
          {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
        </span>
      </div>
      <div>
        <h4 class="font-medium text-gray-900">{{ Auth::user()->name }}</h4>
        <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
      </div>
    </div>
  </div>

  <!-- Navigation Menu -->
  <nav class="p-4 space-y-2">
    <a href="{{ route('user') }}"
      class="flex items-center space-x-3 p-3 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors"
      :class="{ 'bg-gradient-to-r from-blue-500 to-indigo-500 text-white': activeLink === 'user' }"
      @click="activeLink = 'user'">
      <i class="fas fa-chart-pie"></i>
      <span>Dashboard</span>
    </a>
    <a href="{{ route('expenses') }}"
      class="flex items-center space-x-3 p-3 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors"
      :class="{ 'bg-gradient-to-r from-blue-500 to-indigo-500 text-white': activeLink === 'expenses' }"
      @click="activeLink = 'expenses'">
      <i class="fas fa-wallet"></i>
      <span>Expenses</span>
    </a>
    <a href="{{ route('income') }}"
      class="flex items-center space-x-3 p-3 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors"
      :class="{ 'bg-gradient-to-r from-blue-500 to-indigo-500 text-white': activeLink === 'income' }"
      @click="activeLink = 'income'">
      <i class="fas fa-arrow-trend-up"></i>
      <span>Income</span>
    </a>
    <a href="{{ route('alerts') }}"
      class="flex items-center space-x-3 p-3 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors"
      :class="{ 'bg-gradient-to-r from-blue-500 to-indigo-500 text-white': activeLink === 'alerts' }"
      @click="activeLink = 'alerts'">
      <i class="fas fa-bell"></i>
      <span>Alerts</span>
    </a>
    <a href="{{ route('savings') }}"
      class="flex items-center space-x-3 p-3 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors"
      :class="{ 'bg-gradient-to-r from-blue-500 to-indigo-500 text-white': activeLink === 'goals' }"
      @click="activeLink = 'goals'">
      <i class="fas fa-bullseye"></i>
      <span>Savings</span>
    </a>
    <a href="{{ route('recurring') }}"
      class="flex items-center space-x-3 p-3 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors"
      :class="{ 'bg-gradient-to-r from-blue-500 to-indigo-500 text-white': activeLink === 'recurring' }"
      @click="activeLink = 'recurring'">
      <i class="fas fa-clock"></i>
      <span>Recurring</span>
    </a>
    <a href="{{ route('wishlist') }}"
      class="flex items-center space-x-3 p-3 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors"
      :class="{ 'bg-gradient-to-r from-blue-500 to-indigo-500 text-white': activeLink === 'wishlist' }"
      @click="activeLink = 'wishlist'">
      <i class="fas fa-gift"></i>
      <span>Wishlist</span>
    </a>
    <a href="{{ route('profile') }}"
      class="flex items-center space-x-3 p-3 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors"
      :class="{ 'bg-gradient-to-r from-blue-500 to-indigo-500 text-white': activeLink === 'profile' }"
      @click="activeLink = 'profile'">
      <i class="fas fa-user"></i>
      <span>Profile</span>
    </a>
  </nav>

  <!-- Settings and Help -->
  <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-200/50">
    <div class="flex items-center justify-between">
      <button class="text-gray-600 hover:text-gray-900">
        <i class="fas fa-cog"></i>
      </button>
      <button class="text-gray-600 hover:text-gray-900">
        <i class="fas fa-question-circle"></i>
      </button>
      <button class="text-gray-600 hover:text-gray-900" @click="darkMode = !darkMode">
        <i class="fas" :class="darkMode ? 'fa-sun' : 'fa-moon'"></i>
      </button>
      <button class="text-gray-600 hover:text-gray-900">
        <i class="fas fa-sign-out-alt"></i>
      </button>
    </div>
  </div>
</aside>