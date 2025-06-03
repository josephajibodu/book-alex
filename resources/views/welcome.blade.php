<x-layouts.guest :title="__('Dashboard')">

    <section class="relative w-full px-3 antialiased bg-gradient-to-br from-gray-900 via-black to-gray-800 lg:px-6" style="background-image: url('{{ asset("images/model-hero.jpg") }}'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-black opacity-70"></div>
        <div class="relative mx-auto max-w-7xl">
            <div class="container px-6 py-32 mx-auto md:text-center md:px-4">
                <h1 class="text-4xl font-extrabold leading-none leading-10 tracking-tight text-white sm:text-5xl md:text-6xl xl:text-7xl"><span class="block">Luxury Companionship, On Your Terms</span></h1>
                <p class="mx-auto mt-6 text-sm text-left text-gray-200 md:text-center md:mt-12 sm:text-base md:max-w-xl md:text-lg xl:text-xl">Because satisfaction isn't a maybe, it's a promise.</p>
                <div class="relative flex items-center mx-auto mt-12 overflow-hidden text-left border border-gray-700 rounded-md md:max-w-md md:text-center">
                    <input type="text" name="search" placeholder="Search" class="w-full h-12 px-6 py-2 font-medium text-gray-200 focus:outline-none">
                    <span class="relative top-0 right-0 block">
                    <button type="button" class="inline-flex items-center w-32 h-12 px-8 text-base font-bold leading-6 text-white transition duration-150 ease-in-out bg-pink-500 border border-transparent hover:bg-pink-400 focus:outline-none active:bg-pink-400" data-primary="pink-500">
                        Search
                    </button>
                </span>
                </div>
            </div>
        </div>
    </section>

</x-layouts.guest>
