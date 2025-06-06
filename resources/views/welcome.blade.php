<x-layouts.guest :title="__('Dashboard')">

    <section class="relative w-full px-3 antialiased bg-gradient-to-br from-gray-900 via-black to-gray-800 lg:px-6" style="background-image: url('{{ asset("images/model-hero.jpg") }}'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-black opacity-70"></div>
        <div class="relative mx-auto max-w-7xl">
            <div class="container px-6 py-32 mx-auto md:text-center md:px-4">
                <h1 class="text-4xl font-extrabold leading-none leading-10 tracking-tight text-white sm:text-5xl md:text-6xl xl:text-7xl"><span class="block">Luxury Companionship, On Your Terms</span></h1>
                <p class="mx-auto mt-6 text-sm text-left text-gray-200 md:text-center md:mt-12 sm:text-base md:max-w-xl md:text-lg xl:text-xl">Because satisfaction isn't a maybe, it's a promise.</p>
            </div>
        </div>
    </section>

    <section class="relative w-full px-3 py-24 antialiased bg-gray-950 lg:px-6">
        <div class="relative mx-auto max-w-7xl">
            <div class="container px-6 mx-auto md:text-center md:px-4">
                <h2 class="text-2xl font-bold text-white md:text-3xl">Find Your Perfect Companion</h2>
                <p class="mx-auto mt-4 text-sm text-gray-300 md:text-center md:mt-6 sm:text-base md:max-w-xl md:text-lg">Search through our exclusive selection of companions</p>
                <div class="max-w-2xl mx-auto mt-8">
                    <livewire:search-profiles />
                </div>
            </div>
        </div>
    </section>

</x-layouts.guest>
