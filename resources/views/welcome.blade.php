<x-layouts.guest :title="__('Dashboard')">

    <section
        class="relative w-full px-3 antialiased bg-gradient-to-br from-slate-900 via-indigo-950 to-slate-900 lg:px-6"
        style="background-image: url('{{ asset("images/model-hero.png") }}'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-slate-900 opacity-0"></div>
        <div class="relative mx-auto max-w-7xl">
            <div class="container px-6 py-32 mx-auto md:text-center md:px-4">
                <h1 class="text-4xl font-extrabold leading-none leading-10 tracking-tight text-white sm:text-5xl md:text-6xl xl:text-7xl"
                    data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="100">
                    <span class="block">Luxury Companionship, On Your Terms</span>
                </h1>
                <p class="mx-auto mt-6 text-sm text-left text-gray-200 md:text-center md:mt-12 sm:text-base md:max-w-xl md:text-lg xl:text-xl"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                    Because satisfaction isn't a maybe, it's a promise.
                </p>
            </div>
        </div>
    </section>

    <section
        class="relative w-full py-20 bg-gradient-to-br from-slate-900 via-indigo-950 to-slate-900 flex flex-col items-center justify-center">
        <hr class="w-3/4 border-gray-800 mb-12" data-aos="fade-right" data-aos-duration="1500"
            data-aos-easing="ease-in-out">
        <div class="flex flex-col items-center justify-center text-center">
            <span class="text-6xl text-gray-300 mb-6" data-aos="flip-up" data-aos-duration="1000"
                data-aos-delay="200">&ldquo;</span>
            <h2 class="text-3xl md:text-5xl font-light text-white mb-8 max-w-3xl" data-aos="fade-up"
                data-aos-duration="1200" data-aos-delay="400">
                Every unforgettable experience begins with the right company.
            </h2>
        </div>
        <hr class="w-3/4 border-gray-800 mt-12" data-aos="fade-left" data-aos-duration="1500"
            data-aos-easing="ease-in-out">
    </section>

</x-layouts.guest>
