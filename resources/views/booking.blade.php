<x-layouts.guest :title="__('Book ' . $profile->name)">
    <section class="relative w-full px-3 antialiased bg-gradient-to-br from-gray-900 via-black to-gray-800 lg:px-6">
        <div class="relative mx-auto max-w-7xl">
            <div class="container px-6 py-20 mx-auto md:text-center md:px-4">
                <h1 class="text-4xl font-extrabold leading-none tracking-tight text-white text-center sm:text-5xl md:text-6xl xl:text-7xl"><span class="block">Booking</span></h1>
                <div class="flex flex-col md:flex-row mt-8">
                    <div class="md:w-1/2">
                        @livewire('booking-form', ['profile' => $profile])
                    </div>
                    <div class="md:w-1/2 md:ml-4">
                        <img src="{{ $profile->getFirstMediaUrl('bookings') }}" alt="Featured Image" class="w-full h-full object-cover rounded-lg shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.guest>
