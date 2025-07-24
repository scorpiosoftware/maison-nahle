{{-- Enhanced Navigation Header --}}
<nav class="fixed top-0  z-50 w-full bg-white/95 backdrop-blur-md border-b border-gray-200/50 shadow-sm transition-all duration-300">
    <div class="px-4 py-3 lg:px-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                {{-- Mobile menu button --}}
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2.5 text-gray-600 rounded-xl  hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500/20 transition-all duration-200 group">
                    <span class="sr-only">{{ session('lang') == 'en' ? 'Open sidebar' : 'فتح الشريط الجانبي' }}</span>
                    <svg class="w-6 h-6 transition-transform duration-200 group-hover:scale-110" fill="currentColor" viewBox="0 0 20 20">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>

                {{-- Logo Section --}}
                <a href="/" class="flex items-center {{ session('lang') == 'ar' ? 'mr-4 md:ml-24' : 'ml-4 md:mr-24' }} group">
                    <div class="relative">
                        <img src="{{ URL::to('storage/'.$logo) }}" class="h-10 bg-gray-700 p-2 rounded-md transition-all duration-300 group-hover:scale-105" alt="Logo" />
                        <div class="absolute inset-0 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                </a>
            </div>

            {{-- Right side content --}}
            <div class="flex items-center space-x-4 rtl:space-x-reverse">
                {{-- Language Switcher --}}
                <livewire:language>

                {{-- Notifications (placeholder) --}}
                <button class="relative p-2.5 text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-xl transition-all duration-200 group">
                    <svg class="w-6 h-6 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5-5-5 5h5zm0 0v-14a6 6 0 10-12 0v14"></path>
                    </svg>
                    <span class="absolute top-1 right-1 w-3 h-3 bg-red-500 rounded-full animate-pulse"></span>
                </button>

                {{-- Profile Dropdown --}}
                <div class="flex items-center">
                    <div class="relative">
                        <button type="button"
                            class="flex items-center p-1.5 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl focus:ring-4 focus:ring-blue-500/20 transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/25 group"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">{{ session('lang') == 'en' ? 'Open user menu' : 'فتح قائمة المستخدم' }}</span>
                            <img class="w-8 h-8 rounded-lg object-cover ring-2 ring-white/50 transition-all duration-300 group-hover:ring-white"
                                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                alt="user photo">
                        </button>
                        
                        {{-- Dropdown Menu --}}
                        <div class="z-50 hidden absolute {{ session('lang') == 'ar' ? 'left-0' : 'right-0' }} mt-2 w-64 bg-white/95 backdrop-blur-md divide-y divide-gray-100/50 rounded-2xl shadow-xl border border-gray-200/50"
                            id="dropdown-user">
                            {{-- User Info Section --}}
                            <div class="px-6 py-4 bg-gradient-to-r from-blue-50 to-purple-50 rounded-t-2xl">
                                <div class="flex items-center space-x-3 rtl:space-x-reverse">
                                    <img class="w-12 h-12 rounded-xl object-cover ring-2 ring-white shadow-sm"
                                        src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                        alt="user photo">
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-semibold text-gray-900 truncate">
                                            {{ Auth::user()->name }}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate">
                                            {{ Auth::user()->email }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Menu Items --}}
                            <ul class="py-2">
                                <li>
                                    <a href="{{ route('dashboard.index') }}"
                                        class="flex items-center px-6 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-200 group">
                                        <svg class="w-5 h-5 {{ session('lang') == 'ar' ? 'ml-3' : 'mr-3' }} text-gray-400 group-hover:text-blue-500 transition-colors duration-200" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                        </svg>
                                        {{ session('lang') == 'en' ? 'Dashboard' : 'لوحة التحكم' }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('profile.edit', Auth::user()->id) }}"
                                        class="flex items-center px-6 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-200 group">
                                        <svg class="w-5 h-5 {{ session('lang') == 'ar' ? 'ml-3' : 'mr-3' }} text-gray-400 group-hover:text-purple-500 transition-colors duration-200" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ session('lang') == 'en' ? 'Settings' : 'الإعدادات' }}
                                    </a>
                                </li>
                                <li class="border-t border-gray-100/50 mt-2 pt-2">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <button
                                            class="flex items-center w-full px-6 py-3 text-sm text-red-600 hover:bg-red-50 transition-colors duration-200 group">
                                            <svg class="w-5 h-5 {{ session('lang') == 'ar' ? 'ml-3' : 'mr-3' }} group-hover:text-red-700 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                            </svg>
                                            {{ session('lang') == 'en' ? 'Sign out' : 'تسجيل الخروج' }}
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

{{-- Enhanced Sidebar --}}
{{-- {{ session('lang') == 'ar' ? 'right-0' : 'left-0' }} --}}
<aside id="logo-sidebar"
    class="fixed top-0  z-40 w-72 h-screen pt-20 transition-transform duration-300 -translate-x-full bg-white border-r border-gray-200/50  shadow-xl">
    {{-- Sidebar Header --}}
    <div class="px-6 py-4 border-b border-gray-200/50 bg-gradient-to-r from-blue-50/50 to-purple-50/50">
        <h2 class="text-lg font-semibold text-gray-800 {{ session('lang') == 'ar' ? 'text-right' : 'text-left' }}">
            {{ session('lang') == 'en' ? 'Admin Panel' : 'لوحة الإدارة' }}
        </h2>
        <p class="text-sm text-gray-500 {{ session('lang') == 'ar' ? 'text-right' : 'text-left' }}">
            {{ session('lang') == 'en' ? 'E-commerce Management' : 'إدارة التجارة الإلكترونية' }}
        </p>
    </div>
    
    {{-- Sidebar Content --}}
    <div class="h-full px-4 pb-4 overflow-y-auto bg-white scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-transparent hover:scrollbar-thumb-gray-400">
        <nav class="space-y-2 font-medium mt-4">
            {{-- Dashboard --}}
            <a href="{{ route('dashboard.index') }}" 
                class="flex items-center p-3 text-gray-700 rounded-xl hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 hover:text-blue-700 transition-all duration-300 group border border-transparent hover:border-blue-200/50">
                <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-gradient-to-br from-blue-100 to-purple-100 group-hover:from-blue-200 group-hover:to-purple-200 transition-all duration-300">
                    <svg class="w-5 h-5 text-blue-600 group-hover:text-blue-700 transition-colors duration-300" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                </div>
                <span class="{{ session('lang') == 'ar' ? 'mr-3' : 'ml-3' }} font-medium">{{ session('lang') == 'en' ? 'Dashboard' : 'لوحة التحكم' }}</span>
                <svg class="w-4 h-4 {{ session('lang') == 'ar' ? 'mr-auto rotate-180' : 'ml-auto' }} opacity-0 group-hover:opacity-100 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>

            {{-- Social --}}
            <a href="{{ route('social.index') }}" 
                class="flex items-center p-3 text-gray-700 rounded-xl hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 hover:text-purple-700 transition-all duration-300 group border border-transparent hover:border-purple-200/50">
                <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-gradient-to-br from-purple-100 to-pink-100 group-hover:from-purple-200 group-hover:to-pink-200 transition-all duration-300">
                    <svg class="w-5 h-5 text-purple-600 group-hover:text-purple-700 transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c1.54 0 3-.35 4.31-.99-.7-.57-1.31-1.25-1.78-2.04-1.17.59-2.49.94-3.88.94C7.93 19.91 4.09 16.07 4.09 11.36S7.93 2.8 12.65 2.8s8.56 3.84 8.56 8.56c0 1.39-.35 2.71-.94 3.88.79.47 1.47 1.08 2.04 1.78C22.65 15.01 23 13.54 23 12c0-5.52-4.48-10-10-10z"/>
                    </svg>
                </div>
                <span class="{{ session('lang') == 'ar' ? 'mr-3' : 'ml-3' }} font-medium">{{ session('lang') == 'en' ? 'Social Accounts' : 'التواصل الاجتماعي' }}</span>
            </a>

            {{-- Carousel --}}
            <a href="{{ route('carousel.index') }}" 
                class="flex items-center p-3 text-gray-700 rounded-xl hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 hover:text-green-700 transition-all duration-300 group border border-transparent hover:border-green-200/50">
                <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-gradient-to-br from-green-100 to-emerald-100 group-hover:from-green-200 group-hover:to-emerald-200 transition-all duration-300">
                    <svg class="w-5 h-5 text-green-600 group-hover:text-green-700 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m3 16 5-7 6 6.5m6.5 2.5L16 13l-4.286 6M14 10h.01M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                    </svg>
                </div>
                <span class="{{ session('lang') == 'ar' ? 'mr-3' : 'ml-3' }} font-medium">{{ session('lang') == 'en' ? 'Carousel' : 'قائمة الصور' }}</span>
            </a>

            {{-- Inbox --}}
            <a href="{{ route('inbox.index') }}" 
                class="flex items-center p-3 text-gray-700 rounded-xl hover:bg-gradient-to-r hover:from-yellow-50 hover:to-orange-50 hover:text-yellow-700 transition-all duration-300 group border border-transparent hover:border-yellow-200/50 relative">
                <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-gradient-to-br from-yellow-100 to-orange-100 group-hover:from-yellow-200 group-hover:to-orange-200 transition-all duration-300">
                    <svg class="w-5 h-5 text-yellow-600 group-hover:text-yellow-700 transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M5.024 3.783A1 1 0 0 1 6 3h12a1 1 0 0 1 .976.783L20.802 12h-4.244a1.99 1.99 0 0 0-1.824 1.205 2.978 2.978 0 0 1-5.468 0A1.991 1.991 0 0 0 7.442 12H3.198l1.826-8.217ZM3 14v5a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5h-4.43a4.978 4.978 0 0 1-9.14 0H3Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <span class="{{ session('lang') == 'ar' ? 'mr-3' : 'ml-3' }} font-medium">{{ session('lang') == 'en' ? 'Inbox' : 'البريد الوارد' }}</span>
                {{-- Notification badge --}}
                <span class="inline-flex items-center justify-center w-5 h-5 {{ session('lang') == 'ar' ? 'mr-auto' : 'ml-auto' }} text-xs font-bold text-white bg-red-500 rounded-full animate-pulse">3</span>
            </a>

            {{-- Product Views --}}
            <a href="{{ route('productView.index') }}" 
                class="flex items-center p-3 text-gray-700 rounded-xl hover:bg-gradient-to-r hover:from-indigo-50 hover:to-blue-50 hover:text-indigo-700 transition-all duration-300 group border border-transparent hover:border-indigo-200/50">
                <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-gradient-to-br from-indigo-100 to-blue-100 group-hover:from-indigo-200 group-hover:to-blue-200 transition-all duration-300">
                    <svg class="w-5 h-5 text-indigo-600 group-hover:text-indigo-700 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </div>
                <span class="{{ session('lang') == 'ar' ? 'mr-3' : 'ml-3' }} font-medium">{{ session('lang') == 'en' ? 'Product Views' : 'عرض المنتجات' }}</span>
            </a>

            {{-- Ads Manager --}}
            <a href="{{ route('ads.index') }}" 
                class="flex items-center p-3 text-gray-700 rounded-xl hover:bg-gradient-to-r hover:from-rose-50 hover:to-pink-50 hover:text-rose-700 transition-all duration-300 group border border-transparent hover:border-rose-200/50">
                <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-gradient-to-br from-rose-100 to-pink-100 group-hover:from-rose-200 group-hover:to-pink-200 transition-all duration-300">
                    <svg class="w-5 h-5 text-rose-600 group-hover:text-rose-700 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </div>
                <span class="{{ session('lang') == 'ar' ? 'mr-3' : 'ml-3' }} font-medium">{{ session('lang') == 'en' ? 'Ads Manager' : 'إدارة الإعلانات' }}</span>
            </a>

            {{-- Catalog Dropdown --}}
            <div x-data="{ open: false }" class="relative">
                <button type="button" @click="open = !open"
                    class="flex items-center w-full p-3 text-gray-700 rounded-xl hover:bg-gradient-to-r hover:from-slate-50 hover:to-gray-50 hover:text-slate-700 transition-all duration-300 group border border-transparent hover:border-slate-200/50">
                    <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-gradient-to-br from-slate-100 to-gray-100 group-hover:from-slate-200 group-hover:to-gray-200 transition-all duration-300">
                        <svg class="w-5 h-5 text-slate-600 group-hover:text-slate-700 transition-colors duration-300" fill="currentColor" viewBox="0 0 18 21">
                            <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                        </svg>
                    </div>
                    <span class="flex-1 {{ session('lang') == 'ar' ? 'mr-3 text-right' : 'ml-3 text-left' }} font-medium">
                        {{ session('lang') == 'en' ? 'Catalog' : 'الكتالوج' }}
                    </span>
                    <svg class="w-4 h-4 transition-transform duration-300 {{ session('lang') == 'ar' ? 'rotate-180' : '' }}" 
                         :class="{ 'rotate-180': open && '{{ session('lang') }}' === 'en', 'rotate-0': open && '{{ session('lang') }}' === 'ar' }" 
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                
                {{-- Dropdown Content --}}
                <div class="relative mt-2">
                    <ul x-show="open" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-2"
                        class="space-y-1 bg-gray-50/50 rounded-xl p-2 border border-gray-200/50">
                        
                        {{-- Stores --}}
                        <li>
                            <a href="{{ route('storeSections.index') }}" 
                                class="flex items-center w-full p-3 text-gray-600 transition-all duration-200 rounded-lg hover:bg-white hover:text-blue-700 hover:shadow-sm group {{ session('lang') == 'ar' ? 'pr-12' : 'pl-12' }}">
                                <svg class="w-4 h-4 {{ session('lang') == 'ar' ? 'ml-2' : 'mr-2' }} text-gray-400 group-hover:text-blue-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                {{ session('lang') == 'en' ? 'Stores' : 'المتاجر' }}
                            </a>
                        </li>
                        
                        {{-- Branches --}}
                        <li>
                            <a href="{{ route('branch.index') }}" 
                                class="flex items-center w-full p-3 text-gray-600 transition-all duration-200 rounded-lg hover:bg-white hover:text-green-700 hover:shadow-sm group {{ session('lang') == 'ar' ? 'pr-12' : 'pl-12' }}">
                                <svg class="w-4 h-4 {{ session('lang') == 'ar' ? 'ml-2' : 'mr-2' }} text-gray-400 group-hover:text-green-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ session('lang') == 'en' ? 'Branches' : 'الفروع' }}
                            </a>
                        </li>
                        
                        {{-- Categories --}}
                        <li>
                            <a href="{{ route('category.index') }}" 
                                class="flex items-center w-full p-3 text-gray-600 transition-all duration-200 rounded-lg hover:bg-white hover:text-purple-700 hover:shadow-sm group {{ session('lang') == 'ar' ? 'pr-12' : 'pl-12' }}">
                                <svg class="w-4 h-4 {{ session('lang') == 'ar' ? 'ml-2' : 'mr-2' }} text-gray-400 group-hover:text-purple-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                {{ session('lang') == 'en' ? 'Categories' : 'التصنيفات' }}
                            </a>
                        </li>
                        
                        {{-- Brands --}}
                        <li>
                            <a href="{{ route('brand.index') }}" 
                                class="flex items-center w-full p-3 text-gray-600 transition-all duration-200 rounded-lg hover:bg-white hover:text-indigo-700 hover:shadow-sm group {{ session('lang') == 'ar' ? 'pr-12' : 'pl-12' }}">
                                <svg class="w-4 h-4 {{ session('lang') == 'ar' ? 'ml-2' : 'mr-2' }} text-gray-400 group-hover:text-indigo-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                                {{ session('lang') == 'en' ? 'Brands' : 'العلامات التجارية' }}
                            </a>
                        </li>
                        
                        {{-- Colors --}}
                        <li>
                            <a href="{{ route('color.index') }}" 
                                class="flex items-center w-full p-3 text-gray-600 transition-all duration-200 rounded-lg hover:bg-white hover:text-yellow-700 hover:shadow-sm group {{ session('lang') == 'ar' ? 'pr-12' : 'pl-12' }}">
                                <svg class="w-4 h-4 {{ session('lang') == 'ar' ? 'ml-2' : 'mr-2' }} text-gray-400 group-hover:text-yellow-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v1.586l8.707 8.707a1 1 0 010 1.414L13.414 22.414a1 1 0 01-1.414 0L4.293 14.707A1 1 0 014 14.293V10a2 2 0 012-2h2m3-3v18m0-18a2 2 0 012 2v1M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                                </svg>
                                {{ session('lang') == 'en' ? 'Colors' : 'الألوان' }}
                            </a>
                        </li>
                        
                        {{-- Sizes --}}
                        <li>
                            <a href="{{ route('size.index') }}" 
                                class="flex items-center w-full p-3 text-gray-600 transition-all duration-200 rounded-lg hover:bg-white hover:text-orange-700 hover:shadow-sm group {{ session('lang') == 'ar' ? 'pr-12' : 'pl-12' }}">
                                <svg class="w-4 h-4 {{ session('lang') == 'ar' ? 'ml-2' : 'mr-2' }} text-gray-400 group-hover:text-orange-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4a1 1 0 011-1h4m0 0V1a1 1 0 011-1h4a1 1 0 011 1v2m0 0h4a1 1 0 011 1v4m0 0v8a2 2 0 01-2 2H6a2 2 0 01-2-2v-8m0 0V8a1 1 0 011-1h2m8 0V7a1 1 0 00-1-1h-4a1 1 0 00-1 1v1m8 0h2"></path>
                                </svg>
                                {{ session('lang') == 'en' ? 'Sizes' : 'المقاسات' }}
                            </a>
                        </li>
                        
                        {{-- Products --}}
                        <li>
                            <a href="{{ route('product.index') }}" 
                                class="flex items-center w-full p-3 text-gray-600 transition-all duration-200 rounded-lg hover:bg-white hover:text-emerald-700 hover:shadow-sm group {{ session('lang') == 'ar' ? 'pr-12' : 'pl-12' }}">
                                <svg class="w-4 h-4 {{ session('lang') == 'ar' ? 'ml-2' : 'mr-2' }} text-gray-400 group-hover:text-emerald-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                                {{ session('lang') == 'en' ? 'Products' : 'المنتجات' }}
                            </a>
                        </li>
                        
                        {{-- Orders --}}
                        <li>
                            <a href="{{ route('order.index') }}" 
                                class="flex items-center w-full p-3 text-gray-600 transition-all duration-200 rounded-lg hover:bg-white hover:text-red-700 hover:shadow-sm group {{ session('lang') == 'ar' ? 'pr-12' : 'pl-12' }} relative">
                                <svg class="w-4 h-4 {{ session('lang') == 'ar' ? 'ml-2' : 'mr-2' }} text-gray-400 group-hover:text-red-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                                {{ session('lang') == 'en' ? 'Orders' : 'الطلبات' }}
                                {{-- New orders badge --}}
                                <span class="inline-flex items-center justify-center w-4 h-4 {{ session('lang') == 'ar' ? 'mr-auto' : 'ml-auto' }} text-xs font-bold text-white bg-red-500 rounded-full animate-pulse">5</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            {{-- Quick Stats Section --}}
            <div class="pt-6 mt-6 border-t border-gray-200/50">
                <h3 class="px-3 mb-3 text-xs font-semibold text-gray-500 uppercase tracking-wider {{ session('lang') == 'ar' ? 'text-right' : 'text-left' }}">
                    {{ session('lang') == 'en' ? 'Quick Stats' : 'إحصائيات سريعة' }}
                </h3>
                <div class="space-y-3">
                    {{-- Total Products --}}
                    <div class="flex items-center justify-between p-3 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg border border-blue-200/30">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                                </svg>
                            </div>
                            <div class="{{ session('lang') == 'ar' ? 'mr-3' : 'ml-3' }}">
                                <p class="text-xs text-gray-600">{{ session('lang') == 'en' ? 'Products' : 'المنتجات' }}</p>
                                <p class="text-sm font-semibold text-gray-900">1,247</p>
                            </div>
                        </div>
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                    
                    {{-- Total Orders --}}
                    <div class="flex items-center justify-between p-3 bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg border border-green-200/30">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 2L3 7v11a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V7l-7-5z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="{{ session('lang') == 'ar' ? 'mr-3' : 'ml-3' }}">
                                <p class="text-xs text-gray-600">{{ session('lang') == 'en' ? 'Orders' : 'الطلبات' }}</p>
                                <p class="text-sm font-semibold text-gray-900">89</p>
                            </div>
                        </div>
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                    
                    {{-- Revenue --}}
                    <div class="flex items-center justify-between p-3 bg-gradient-to-r from-purple-50 to-pink-50 rounded-lg border border-purple-200/30">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path>
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="{{ session('lang') == 'ar' ? 'mr-3' : 'ml-3' }}">
                                <p class="text-xs text-gray-600">{{ session('lang') == 'en' ? 'Revenue' : 'الإيرادات' }}</p>
                                <p class="text-sm font-semibold text-gray-900">$24,567</p>
                            </div>
                        </div>
                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            {{-- Help Section --}}
            <div class="pt-6 mt-6 border-t border-gray-200/50">
                <div class="p-4 bg-gradient-to-br from-gray-50 to-blue-50 rounded-xl border border-gray-200/50">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <div class="{{ session('lang') == 'ar' ? 'mr-3' : 'ml-3' }}">
                            <h4 class="text-sm font-semibold text-gray-900 mb-1">
                                {{ session('lang') == 'en' ? 'Need Help?' : 'تحتاج مساعدة؟' }}
                            </h4>
                            <p class="text-xs text-gray-600 mb-3">
                                {{ session('lang') == 'en' ? 'Check our documentation or contact support.' : 'راجع الوثائق أو اتصل بالدعم.' }}
                            </p>
                            <button class="text-xs text-blue-600 hover:text-blue-700 font-medium transition-colors duration-200">
                                {{ session('lang') == 'en' ? 'Get Support' : 'احصل على الدعم' }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</aside>

{{-- Additional CSS for custom scrollbar and animations --}}
<style>
    @keyframes slideIn {
        from { transform: translateX(-100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .scrollbar-thin::-webkit-scrollbar {
        width: 6px;
    }
    
    .scrollbar-thin::-webkit-scrollbar-track {
        background: transparent;
    }
    
    .scrollbar-thin::-webkit-scrollbar-thumb {
        background-color: rgba(156, 163, 175, 0.5);
        border-radius: 3px;
    }
    
    .scrollbar-thin::-webkit-scrollbar-thumb:hover {
        background-color: rgba(156, 163, 175, 0.8);
    }
    
    /* RTL Support */
    [dir="rtl"] .sidebar-item {
        text-align: right;
    }
    
    /* Mobile Responsive Improvements */
    @media (max-width: 768px) {
        #logo-sidebar {
            transform: translateX(-100%);
        }
        
        #logo-sidebar.show {
            transform: translateX(0);
        }
        
        .nav-item {
            padding: 0.875rem;
        }
    }
    
    /* Hover animations */
    .nav-item:hover .nav-icon {
        transform: scale(1.1);
    }
    
    .dropdown-item:hover {
        padding-left: 3.5rem;
    }
    
    [dir="rtl"] .dropdown-item:hover {
        padding-right: 3.5rem;
        padding-left: 3rem;
    }
</style>

{{-- JavaScript for enhanced interactions --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add active state management
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('a[wire\\:navigate]');
    
    navLinks.forEach(link => {
        const href = link.getAttribute('href');
        if (href && currentPath.includes(href)) {
            link.classList.add('bg-gradient-to-r', 'from-blue-100', 'to-purple-100', 'text-blue-700', 'border-blue-300/50');
            link.classList.remove('text-gray-700');
        }
    });
    
    // Enhanced mobile menu toggle
    const mobileMenuButton = document.querySelector('[data-drawer-toggle="logo-sidebar"]');
    const sidebar = document.getElementById('logo-sidebar');
    
    if (mobileMenuButton && sidebar) {
        mobileMenuButton.addEventListener('click', function() {
            sidebar.classList.toggle('-translate-x-full');
            sidebar.classList.toggle('show');
        });
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(e) {
            if (window.innerWidth < 1024 && 
                !sidebar.contains(e.target) && 
                !mobileMenuButton.contains(e.target) && 
                !sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('show');
            }
        });
    }
    
    // Add smooth scrolling for sidebar
    const sidebarContent = document.querySelector('.overflow-y-auto');
    if (sidebarContent) {
        sidebarContent.style.scrollBehavior = 'smooth';
    }
    
    // Notification count animation
    const notificationBadges = document.querySelectorAll('.animate-pulse');
    notificationBadges.forEach(badge => {
        setInterval(() => {
            badge.classList.toggle('scale-110');
        }, 1000);
    });
});
</script>

{{-- Alpine.js for dropdown functionality --}}