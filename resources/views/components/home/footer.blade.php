<footer class="relative bg-white shadow-xl border-t overflow-hidden">


    <div class="relative mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
            <!-- Logo Section -->
            <div class="md:col-span-3">
                <div class="md:flex md:items-center justify-center gap-8 rounded-md bg-transparent backdrop-blur-sm text-black font-serif p-4 transition-all duration-300 hover:scale-105 hover:shadow-xl wowDiv"
                    data-animation="animate__backInLeft" data-delay="800">
                    <a href="/" class="flex items-center gap-2 group">
                        @if ($carousel->logo_url)
                            <div
                                class="w-80 h-full mx-auto overflow-hidden transform transition-transform duration-500 group-hover:scale-110">
                                <img src="{{ asset('storage/' . $carousel->logo_url) }}" alt="…"
                                    class="w-1/2 mx-auto object-cover">
                            </div>
                        @else
                            <span
                                class="text-xl font-bold tracking-tight transition-colors group-hover:text-gray-700">
                                {{ session('lang') == 'en' ? env('APP_NAME') : env('APP_NAME_AR') }}
                            </span>
                        @endif
                    </a>
                </div>
            </div>

            <!-- Navigation Sections -->
            <div class="md:col-span-9">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <!-- Support Section -->
                    <div class="transform transition-all duration-300 hover:scale-105">
                        <h2 class="mb-6 text-sm font-semibold text-black uppercase tracking-wider">
                            {{ session('lang') == 'en' ? 'Support' : 'الدعم' }}</h2>
                        <ul class="text-black font-medium space-y-3">
                            <li
                                class="bg-white/80 backdrop-blur-sm px-3 py-2 rounded-md transition-all duration-300 ">
                                <a href="/about"
                                    class="text-black transition-colors duration-300">{{ session('lang') == 'en' ? 'About us' : 'حول الشركة' }}</a>
                            </li>
                            <li
                                class="bg-white/80 backdrop-blur-sm px-3 py-2 rounded-md transition-all duration-300 ">
                                <a href="/contactUs"
                                    class="text-black transition-colors duration-300">{{ session('lang') == 'en' ? 'Contact Us' : 'تواصل معنا' }}</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Legal Section -->
                    <div class="transform transition-all duration-300 hover:scale-105">
                        <h2 class="mb-6 text-sm font-semibold uppercase text-black tracking-wider">
                            {{ session('lang') == 'en' ? 'Legal' : 'القوانين' }}</h2>
                        <ul class="text-black font-medium space-y-3">
                            <li
                                class="bg-white/80 backdrop-blur-sm px-3 py-2 rounded-md transition-all duration-300 ">
                                <a href="/privacy-policy"
                                    class="text-black transition-colors duration-300">{{ session('lang') == 'en' ? 'Privacy Policy' : 'سياسة الخصوصية' }}</a>
                            </li>
                            <li
                                class="bg-white/80 backdrop-blur-sm px-3 py-2 rounded-md transition-all duration-300 ">
                                <a href="/terms-conditions"
                                    class="text-black transition-colors duration-300">{{ session('lang') == 'en' ? 'Terms & Conditions' : 'الشروط والأحكام' }}</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Social Media Section -->
                    <div class="transform transition-all duration-300 hover:scale-105 group relative z-0">
                        <h2 class="mb-6 text-sm font-semibold uppercase text-black tracking-wider cursor-pointer">
                            {{ session('lang') == 'en' ? 'Follow us' : 'تابعنا' }}
                            {{-- <span
                                class="inline-block ml-2 transition-transform duration-300 group-hover:rotate-180">▼</span> --}}
                        </h2>
                        <div
                            class=" w-full   transition-all duration-300 transform -translate-y-2 group-hover:translate-y-0 z-0
                              ">
                            <ul
                                class="text-black flex flex-wrap font-medium bg-white/90 backdrop-blur-sm justify-start items-center p-4 rounded-xl gap-4 ">
                                @foreach ($socials as $social)
                                    <li class="transform transition-all duration-300 hover:scale-110">
                                        <a href="{{ $social->url }}" target="_blank"
                                            class="block">
                                            <img src="{{ asset('storage/' . $social->icon) }}"
                                                alt="{{ $social->name }} icon" class="w-8 h-8">
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-300 sm:mx-auto lg:my-8" />
        <div class="sm:flex sm:items-center sm:justify-between">
           <span class="text-sm text-black/90 sm:text-center hover:text-black transition-colors duration-300">
                © {{ date('Y') }} <a href=""
                    class="hover:text-gray-700 transition-colors duration-300">ScorpioSoftware™</a>. All Rights
                Reserved.
            </span>
        </div>
    </div>
</footer>

<style>
    @keyframes blob {
        0% {
            transform: translate(0px, 0px) scale(1);
        }

        33% {
            transform: translate(30px, -50px) scale(1.1);
        }

        66% {
            transform: translate(-20px, 20px) scale(0.9);
        }

        100% {
            transform: translate(0px, 0px) scale(1);
        }
    }

    .animate-blob {
        animation: blob 7s infinite;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }

    .animation-delay-4000 {
        animation-delay: 4s;
    }
</style>