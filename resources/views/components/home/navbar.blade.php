<nav class="bg-white border-b border-gray-200 shadow-sm z-50 wowDiv nav-bar" id="wowDiv"
    data-animation="animate__fadeInDown" data-delay="300">
    <div class="md:max-w-7xl  mx-auto px-8 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            <!-- Language Switcher - Desktop Only -->
            <div class="hidden lg:block">
                <livewire:language>
            </div>

            <!-- Logo Section - Centered -->
            <div class="flex-1  flex md:justify-center justify-start  lg:flex-none lg:justify-start">
                <a href="/" class="flex items-center justify-center group">
                    @if ($carousel->logo_url)
                        <div class="h-8 sm:h-10 lg:h-12 w-auto transition-all duration-300 hover:scale-105">
                            <img src="{{ asset('storage/' . $carousel->logo_url) }}"
                                alt="{{ session('lang') == 'en' ? env('APP_NAME') : env('APP_NAME_AR') }}"
                                class="h-full w-auto object-contain"
                                 loading="eager">
                        </div>
                    @else
                        <span
                            class="text-xl sm:text-2xl font-bold text-gray-900 transition-colors duration-300 hover:text-gray-700">
                            {{ session('lang') == 'en' ? env('APP_NAME') : env('APP_NAME_AR') }}
                        </span>
                    @endif
                </a>
            </div>

            <!-- Desktop Menu Actions -->
            <div class="hidden lg:flex items-center gap-3">
                <!-- Cart Component -->
                <div>
                    <livewire:cart>
                </div>

                <!-- Wishlist Link -->
                <a href="{{ route('wishlist.index') }}"
                    class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </a>

                <!-- User Dropdown -->
                <div class="relative" x-data="{ open: false }" @click.away="open = false">
                    <button @click="open = !open"
                        class="flex items-center gap-2 px-3 py-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span class="text-sm font-medium">
                            @auth
                                {{ Auth::user()->name }}
                            @else
                                {{ session('lang') == 'en' ? 'Account' : 'الحساب' }}
                            @endauth
                        </span>
                        <svg class="w-4 h-4 transform transition-transform" :class="{ 'rotate-180': open }"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-50 py-1"
                        x-cloak>

                        @guest
                            <a href="{{ route('login') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                {{ session('lang') == 'en' ? 'Sign In' : 'تسجيل دخول' }}
                            </a>
                            <a href="{{ route('register') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                {{ session('lang') == 'en' ? 'Sign Up' : 'انشاء حساب' }}
                            </a>
                        @endguest

                        @auth
                            @if (Auth::user()->role_id == 1)
                                <a href="{{ route('dashboard.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                    <i class="fas fa-tachometer-alt mr-2"></i>
                                    {{ session('lang') == 'en' ? 'Dashboard' : 'لوحة التحكم' }}
                                </a>
                            @endif
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                <i class="fas fa-user-circle mr-2"></i>
                                {{ session('lang') == 'en' ? 'Profile' : 'الملف الشخصي' }}
                            </a>
                            <div class="border-t border-gray-100 my-1"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                    <i class="fas fa-sign-out-alt mr-2"></i>
                                    {{ session('lang') == 'en' ? 'Sign Out' : 'تسجيل خروج' }}
                                </button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="lg:hidden">
                <button data-collapse-toggle="mobile-menu"
                    class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="lg:hidden hidden border-t border-gray-200">
            <div class="py-4 space-y-4">

                <!-- Language Switcher - Mobile -->
                <div class="flex justify-center">
                    <livewire:language>
                </div>

                <!-- Mobile Actions -->
                <div class="flex items-center justify-center gap-4 py-4 border-t border-gray-100">
                    <!-- Cart Component -->
                    <div>
                        <livewire:cart>
                    </div>

                    <!-- Wishlist Link -->
                    <a href="{{ route('wishlist.index') }}"
                        class="p-3 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-all duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </a>

                    <!-- User Menu Mobile -->
                    <div class="relative" x-data="{ open: false }" @click.away="open = false">
                        <button @click="open = !open"
                            class="flex items-center gap-2 px-3 py-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span class="text-sm font-medium">
                                @auth
                                    {{ Auth::user()->name }}
                                @else
                                    {{ session('lang') == 'en' ? 'Account' : 'الحساب' }}
                                @endauth
                            </span>
                            <svg class="w-4 h-4 transform transition-transform" :class="{ 'rotate-180': open }"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <!-- Mobile Dropdown Menu -->
                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-50 py-1"
                            x-cloak>

                            @guest
                                <a href="{{ route('login') }}"
                                    class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                    {{ session('lang') == 'en' ? 'Sign In' : 'تسجيل دخول' }}
                                </a>
                                <a href="{{ route('register') }}"
                                    class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                    {{ session('lang') == 'en' ? 'Sign Up' : 'انشاء حساب' }}
                                </a>
                            @endguest

                            @auth
                                @if (Auth::user()->role_id == 1)
                                    <a href="{{ route('dashboard.index') }}"
                                        class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                        <i class="fas fa-tachometer-alt mr-2"></i>
                                        {{ session('lang') == 'en' ? 'Dashboard' : 'لوحة التحكم' }}
                                    </a>
                                @endif
                                <a href="#"
                                    class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                    <i class="fas fa-user-circle mr-2"></i>
                                    {{ session('lang') == 'en' ? 'Profile' : 'الملف الشخصي' }}
                                </a>
                                <div class="border-t border-gray-100 my-1"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-left px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                        <i class="fas fa-sign-out-alt mr-2"></i>
                                        {{ session('lang') == 'en' ? 'Sign Out' : 'تسجيل خروج' }}
                                    </button>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
