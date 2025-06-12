<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="font-sans antialiased">
    <!-- Header -->
    <header class="w-full px-3 antialiased bg-black lg:px-6">
        <div class="mx-auto max-w-7xl">
            <nav class="flex items-center w-full h-24 select-none" x-data="{ showMenu: false }">
                <div class="relative flex flex-wrap items-start justify-between w-full mx-auto font-medium md:items-center md:h-24 md:justify-between">
                    <a href="#_" class="flex items-center w-1/4 py-4 pl-6 pr-4 space-x-2 font-extrabold text-white md:py-0">
                    <span class="flex items-center justify-center flex-shrink-0 w-8 h-8 text-gray-900 rounded-full bg-gradient-to-br from-white via-gray-200 to-white">
                        <svg class="w-auto h-5 -translate-y-px" viewBox="0 0 69 66" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="m31.2 12.2-3.9 12.3-13.4.5-13.4.5 10.7 7.7L21.8 41l-3.9 12.1c-2.2 6.7-3.8 12.4-3.6 12.5.2.2 5-3 10.6-7.1 5.7-4.1 10.9-7.2 11.5-6.8.6.4 5.3 3.8 10.5 7.5 5.2 3.8 9.6 6.6 9.8 6.4.2-.2-1.4-5.8-3.6-12.5l-3.9-12.2 8.5-6.2c14.7-10.6 14.8-9.6-.4-9.7H44.2L40 12.5C37.7 5.6 35.7 0 35.5 0c-.3 0-2.2 5.5-4.3 12.2Z" fill="currentColor"/></svg>
                    </span>
                        <span>LustrousAffairs</span>
                    </a>
                    <div :class="{'flex': showMenu, 'hidden md:flex': !showMenu }" class="absolute z-50 flex-col items-center justify-center w-full h-auto px-2 text-center text-gray-400 -translate-x-1/2 border-0 border-gray-700 rounded-full md:border md:w-auto md:h-10 left-1/2 md:flex-row md:items-center">
                        <a href="{{ route('home') }}" class="relative inline-block w-full h-full px-4 py-5 mx-2 font-medium leading-tight text-center text-white md:py-2 group md:w-auto md:px-2 lg:mx-3 md:text-center {{ request()->routeIs('home') ? 'active' : '' }}">
                            <span>Home</span>
                            <span class="absolute bottom-0 left-0 w-full h-px duration-300 ease-out translate-y-px bg-gradient-to-r md:from-gray-700 md:via-gray-400 md:to-gray-700 from-gray-900 via-gray-600 to-gray-900 {{ request()->routeIs('home') ? 'block' : 'hidden' }}"></span>
                        </a>

                        @if (request()->routeIs('profile*'))
                            <a href="{{ route('profile', ['profile' => request()->route('profile')]) }}" class="relative inline-block w-full h-full px-4 py-5 mx-2 font-medium leading-tight text-center duration-300 ease-out md:py-2 group hover:text-white md:w-auto md:px-2 lg:mx-3 md:text-center {{ request()->routeIs('profile') ? 'active' : '' }}">
                                <span>Profile</span>
                                <span class="absolute bottom-0 left-0 w-full h-px duration-300 ease-out translate-y-px bg-gradient-to-r md:from-gray-700 md:via-gray-400 md:to-gray-700 from-gray-900 via-gray-600 to-gray-900 {{ request()->routeIs('profile') ? 'block' : 'hidden' }}"></span>
                            </a>
                            <a href="{{ route('profile.galleries', ['profile' => request()->route('profile')]) }}" class="relative inline-block w-full h-full px-4 py-5 mx-2 font-medium leading-tight text-center duration-300 ease-out md:py-2 group hover:text-white md:w-auto md:px-2 lg:mx-3 md:text-center {{ request()->routeIs('profile.galleries') ? 'active' : '' }}">
                                <span>Galleries</span>
                                <span class="absolute bottom-0 left-0 w-full h-px duration-300 ease-out translate-y-px bg-gradient-to-r md:from-gray-700 md:via-gray-400 md:to-gray-700 from-gray-900 via-gray-600 to-gray-900 {{ request()->routeIs('profile.galleries') ? 'block' : 'hidden' }}"></span>
                            </a>
                            <a href="{{ route('profile.booking', ['profile' => request()->route('profile')]) }}" class="relative inline-block w-full h-full px-4 py-5 mx-2 font-medium leading-tight text-center duration-300 ease-out md:py-2 group hover:text-white md:w-auto md:px-2 lg:mx-3 md:text-center {{ request()->routeIs('profile.booking') ? 'active' : '' }}">
                                <span>Booking</span>
                                <span class="absolute bottom-0 left-0 w-full h-px duration-300 ease-out translate-y-px bg-gradient-to-r md:from-gray-700 md:via-gray-400 md:to-gray-700 from-gray-900 via-gray-600 to-gray-900 {{ request()->routeIs('profile.booking') ? 'block' : 'hidden' }}"></span>
                            </a>
                        @endif

                        <a href="{{ route('house-rules') }}" class="relative inline-block w-full h-full px-4 py-5 mx-2 font-medium leading-tight text-center duration-300 ease-out md:py-2 group hover:text-white md:w-auto md:px-2 lg:mx-3 md:text-center {{ request()->routeIs('house-rules') ? 'active' : '' }}">
                            <span>House Rules</span>
                            <span class="absolute bottom-0 left-0 w-full h-px duration-300 ease-out translate-y-px bg-gradient-to-r md:from-gray-700 md:via-gray-400 md:to-gray-700 from-gray-900 via-gray-600 to-gray-900 {{ request()->routeIs('house-rules') ? 'block' : 'hidden' }}"></span>
                        </a>
                    </div>
                    <div class="fixed top-0 left-0 z-40 items-center hidden w-full h-full p-3 text-sm bg-gray-900 bg-opacity-50 md:w-auto md:bg-transparent md:p-0 md:relative smd:flex" :class="{'flex': showMenu, 'hidden': !showMenu }">
                        <div class="flex-col items-center w-full h-full p-3 overflow-hidden bg-black bg-opacity-50 rounded-lg select-none md:p-0 backdrop-blur-lg md:h-auto md:bg-transparent md:rounded-none md:relative md:flex md:flex-row md:overflow-auto">
                            <div class="flex flex-col items-center justify-end w-full h-full pt-2 md:w-full md:flex-row md:py-0">
{{--                                <a href="#_" class="w-full py-5 mr-0 text-center text-gray-200 md:py-3 md:w-auto hover:text-white md:pl-0 md:mr-3 lg:mr-5">Sign In</a>--}}
{{--                                <a href="#_" class="inline-flex items-center justify-center w-full px-4 py-3 md:py-1.5 font-medium leading-6 text-center whitespace-no-wrap transition duration-150 ease-in-out border border-transparent md:mr-1 text-gray-600 md:w-auto bg-white rounded-lg md:rounded-full hover:bg-white focus:outline-none focus:border-gray-700 focus:shadow-outline-gray active:bg-gray-700">Sign Up</a>--}}
                            </div>
                        </div>
                    </div>
                    <div @click="showMenu = !showMenu" class="absolute right-0 z-50 flex flex-col items-end translate-y-1.5 w-10 h-10 p-2 mr-4 rounded-full cursor-pointer md:hidden hover:bg-gray-200/10 hover:bg-opacity-10" :class="{ 'text-gray-400': showMenu, 'text-gray-100': !showMenu }">
                        <svg class="w-6 h-6" x-show="!showMenu" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" x-cloak>
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg class="w-6 h-6" x-show="showMenu" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" x-cloak>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
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
    <section class="bg-[#191a1b] py-16 border-b border-gray-950">
        <div class="max-w-4xl mx-auto flex flex-col md:flex-row items-center gap-8 px-4">
            <div class="flex-1 flex justify-center"
                 data-aos="slide-right"
                 data-aos-duration="1000">
                <div class="relative">
                    <img src="{{ asset('/images/support-us.jpg') }}" alt="Support" class="rounded-lg w-full max-w-md shadow-lg">
                    <div class="absolute inset-0 border-dotted border-2 border-gray-800 rounded-lg pointer-events-none" style="z-index:1;"></div>
                </div>
            </div>
            <div class="flex-1 text-center md:text-left">
                <h2 class="text-3xl font-bold text-white mb-4"
                    data-aos="slide-up"
                    data-aos-duration="1000"
                    data-aos-delay="200">Need Help?<br>We are always online</h2>
                <p class="text-2xl font-bold text-pink-500"
                   data-aos="slide-up"
                   data-aos-duration="1000"
                   data-aos-delay="400">support@lustrousaffairs.com</p>
            </div>
        </div>
    </section>
    <!-- End Support Section -->

    <footer class="bg-black/90">
        <div class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
            <div class="flex justify-center"
                 data-aos="zoom-in-up"
                 data-aos-duration="1000">
                <p class="text-base leading-6 text-center text-gray-400">
                    support@lustrousaffairs.com
                </p>
            </div>
            <p class="mt-8 text-base leading-6 text-center text-gray-400"
               data-aos="slide-up"
               data-aos-duration="1000"
               data-aos-delay="200">
                © 2025 lustrousaffairs.com. All rights reserved.
            </p>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>

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
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: false,
                mirror: true
            });
        });
    </script>
</body>
</html>
