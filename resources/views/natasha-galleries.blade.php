<x-layouts.guest :title="__('Natasha Galleries')">
    <section class="relative w-full px-3 antialiased bg-gradient-to-br from-gray-900 via-black to-gray-800 lg:px-6">
        <div class="relative mx-auto max-w-7xl">
            <div class="container px-6 py-20 mx-auto md:text-center md:px-4">
                <h1 class="text-4xl font-extrabold leading-none tracking-tight text-white text-center sm:text-5xl md:text-6xl xl:text-7xl"><span class="block">Natasha</span></h1>
                <div class="flex flex-col md:flex-row mt-8">
                    <div class="flex-1">
                        <img id="mainImage" src="{{ asset('images/natasha.jpg') }}" alt="Main Image" class="w-full h-full object-cover rounded-lg shadow-lg">
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-4 md:mt-0 md:ml-4 md:grid-cols-3 lg:grid-cols-4 gallery">
                        @for ($i = 0; $i < 12; $i++)
                            <div class="overflow-hidden rounded-lg shadow-lg transform transition duration-500 hover:scale-105">
                                <img src="{{ asset('images/natasha.jpg') }}" alt="Gallery Image" class="w-full h-full object-cover cursor-pointer glightbox" data-title="Natasha">
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.guest>
