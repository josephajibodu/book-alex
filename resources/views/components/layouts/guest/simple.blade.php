<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body class="font-sans antialiased">
    <!-- Header -->
    <header class="w-full px-3 antialiased bg-slate-900 lg:px-6">
        <div class="mx-auto max-w-7xl">
            <nav class="flex items-center w-full h-24 select-none" x-data="{ showMenu: false }">
                <div
                    class="relative flex flex-wrap items-start justify-between w-full mx-auto font-medium md:items-center md:h-24 md:justify-between">
                    <a href="#_"
                        class="flex items-center md:w-1/4 py-4 pl-6 pr-4 font-extrabold text-white md:py-0">
                        <span class="dynapuff-bold text-xl md:text-3xl">BookAlex</span>
                        <x-sexy />
                    </a>
                    <div :class="{'flex': showMenu, 'hidden md:flex': !showMenu }"
                        class="absolute z-50 flex-col items-center justify-center w-full h-auto px-2 text-center text-gray-400 -translate-x-1/2 border-0 border-gray-700 rounded-full md:border md:w-auto md:h-10 left-1/2 md:flex-row md:items-center">
                        <a href="{{ route('home') }}"
                            class="relative inline-block w-full h-full px-4 py-5 mx-2 font-medium leading-tight text-center text-white md:py-2 group md:w-auto md:px-2 lg:mx-3 md:text-center {{ request()->routeIs('home') ? 'active' : '' }}">
                            <span>Home</span>
                            <span
                                class="absolute bottom-0 left-0 w-full h-px duration-300 ease-out translate-y-px bg-gradient-to-r md:from-gray-700 md:via-gray-400 md:to-gray-700 from-gray-900 via-gray-600 to-gray-900 {{ request()->routeIs('home') ? 'block' : 'hidden' }}"></span>
                        </a>

                        @if (request()->routeIs('profile*'))
                            <a href="{{ route('profile', ['profile' => request()->route('profile')]) }}"
                                class="relative inline-block w-full h-full px-4 py-5 mx-2 font-medium leading-tight text-center duration-300 ease-out md:py-2 group hover:text-white md:w-auto md:px-2 lg:mx-3 md:text-center {{ request()->routeIs('profile') ? 'active' : '' }}">
                                <span>Profile</span>
                                <span
                                    class="absolute bottom-0 left-0 w-full h-px duration-300 ease-out translate-y-px bg-gradient-to-r md:from-gray-700 md:via-gray-400 md:to-gray-700 from-gray-900 via-gray-600 to-gray-900 {{ request()->routeIs('profile') ? 'block' : 'hidden' }}"></span>
                            </a>
                            <a href="{{ route('profile.galleries', ['profile' => request()->route('profile')]) }}"
                                class="relative inline-block w-full h-full px-4 py-5 mx-2 font-medium leading-tight text-center duration-300 ease-out md:py-2 group hover:text-white md:w-auto md:px-2 lg:mx-3 md:text-center {{ request()->routeIs('profile.galleries') ? 'active' : '' }}">
                                <span>Galleries</span>
                                <span
                                    class="absolute bottom-0 left-0 w-full h-px duration-300 ease-out translate-y-px bg-gradient-to-r md:from-gray-700 md:via-gray-400 md:to-gray-700 from-gray-900 via-gray-600 to-gray-900 {{ request()->routeIs('profile.galleries') ? 'block' : 'hidden' }}"></span>
                            </a>
                            <a href="{{ route('profile.booking', ['profile' => request()->route('profile')]) }}"
                                class="relative inline-block w-full h-full px-4 py-5 mx-2 font-medium leading-tight text-center duration-300 ease-out md:py-2 group hover:text-white md:w-auto md:px-2 lg:mx-3 md:text-center {{ request()->routeIs('profile.booking') ? 'active' : '' }}">
                                <span>Booking</span>
                                <span
                                    class="absolute bottom-0 left-0 w-full h-px duration-300 ease-out translate-y-px bg-gradient-to-r md:from-gray-700 md:via-gray-400 md:to-gray-700 from-gray-900 via-gray-600 to-gray-900 {{ request()->routeIs('profile.booking') ? 'block' : 'hidden' }}"></span>
                            </a>
                        @endif

                        <a href="{{ route('house-rules') }}"
                            class="relative inline-block w-full h-full px-4 py-5 mx-2 font-medium leading-tight text-center duration-300 ease-out md:py-2 group hover:text-white md:w-auto md:px-2 lg:mx-3 md:text-center {{ request()->routeIs('house-rules') ? 'active' : '' }}">
                            <span>House Rules</span>
                            <span
                                class="absolute bottom-0 left-0 w-full h-px duration-300 ease-out translate-y-px bg-gradient-to-r md:from-gray-700 md:via-gray-400 md:to-gray-700 from-gray-900 via-gray-600 to-gray-900 {{ request()->routeIs('house-rules') ? 'block' : 'hidden' }}"></span>
                        </a>
                    </div>
                    <div class="fixed top-0 left-0 z-40 items-center hidden w-full h-full p-3 text-sm bg-gray-900 bg-opacity-50 md:w-auto md:bg-transparent md:p-0 md:relative smd:flex"
                        :class="{'flex': showMenu, 'hidden': !showMenu }">
                        <div
                            class="flex-col items-center w-full h-full p-3 overflow-hidden bg-slate-900 bg-opacity-50 rounded-lg select-none md:p-0 backdrop-blur-lg md:h-auto md:bg-transparent md:rounded-none md:relative md:flex md:flex-row md:overflow-auto">
                            <div
                                class="flex flex-col items-center justify-end w-full h-full pt-2 md:w-full md:flex-row md:py-0">
                                {{-- <a href="#_"
                                    class="w-full py-5 mr-0 text-center text-gray-200 md:py-3 md:w-auto hover:text-white md:pl-0 md:mr-3 lg:mr-5">Sign
                                    In</a>--}}
                                {{-- <a href="#_"
                                    class="inline-flex items-center justify-center w-full px-4 py-3 md:py-1.5 font-medium leading-6 text-center whitespace-no-wrap transition duration-150 ease-in-out border border-transparent md:mr-1 text-gray-600 md:w-auto bg-white rounded-lg md:rounded-full hover:bg-white focus:outline-none focus:border-gray-700 focus:shadow-outline-gray active:bg-gray-700">Sign
                                    Up</a>--}}
                            </div>
                        </div>
                    </div>
                    <div @click="showMenu = !showMenu"
                        class="absolute right-0 z-50 flex flex-col items-end translate-y-1.5 w-10 h-10 p-2 mr-4 rounded-full cursor-pointer md:hidden hover:bg-gray-200/10 hover:bg-opacity-10"
                        :class="{ 'text-gray-400': showMenu, 'text-gray-100': !showMenu }">
                        <svg class="w-6 h-6" x-show="!showMenu" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" x-cloak>
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg class="w-6 h-6" x-show="showMenu" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" x-cloak>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Support Section -->
    <section class="bg-gradient-to-br from-slate-900 via-indigo-950 to-slate-900 py-16 border-b border-slate-950">
        <div class="max-w-4xl mx-auto flex flex-col md:flex-row items-center gap-8 px-4">
            <div class="flex-1 flex justify-center" data-aos="fade-right" data-aos-duration="1000">
                <div class="relative">
                    <img src="{{ asset('/images/support-us.jpg') }}" alt="Support"
                        class="rounded-lg w-full max-w-md shadow-lg">
                    <div class="absolute inset-0 border-dotted border-2 border-gray-800 rounded-lg pointer-events-none"
                        style="z-index:1;"></div>
                </div>
            </div>
            <div class="flex-1 text-center md:text-left">
                <h2 class="text-3xl font-bold text-white mb-4" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-delay="200">Need Help?<br>We are always online</h2>
                <p class="text-2xl font-bold text-indigo-400" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-delay="400">support@book-alex.com</p>
            </div>
        </div>
    </section>
    <!-- End Support Section -->

    <footer class="bg-gradient-to-br from-slate-900 via-indigo-950 to-slate-900">
        <div class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
            <div class="flex justify-center" data-aos="zoom-in" data-aos-duration="1000">
                <p class="text-base leading-6 text-center text-gray-400">
                    support@book-alex.com
                </p>
            </div>
            <p class="mt-8 text-base leading-6 text-center text-gray-400" data-aos-delay="200">
                © 2025 book-alex.com. All rights reserved.
            </p>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script type="text/javascript">
        const lightbox = GLightbox({
            touchNavigation: true,
            loop: true,
            autoplayVideos: true,
        });
    </script>
    @fluxScripts
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: false,
                mirror: true
            });

            // Initialize Swiper
            const swiper = new Swiper('.reviews-swiper', {
                // Optional parameters
                direction: 'horizontal',
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                // Pagination
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    renderBullet: function (index, className) {
                        return '<span class="' + className + ' !w-2 !h-2 !bg-white/30 hover:!bg-white/50 !transition-all !duration-300"></span>';
                    },
                },
                // Responsive breakpoints
                breakpoints: {
                    // when window width is >= 640px
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 20
                    }
                }
            });
        });
    </script>
</body>

</html>
