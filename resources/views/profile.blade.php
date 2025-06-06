<x-layouts.guest :title="__($profile->name)">
    <section class="relative w-full px-3 antialiased bg-gradient-to-br from-gray-900 via-black to-gray-800 lg:px-6">
        <div class="relative mx-auto max-w-7xl">
            <div class="container px-6 py-20 mx-auto md:text-center md:px-4">
                <h1 class="text-4xl font-extrabold leading-none tracking-tight text-white text-center sm:text-5xl md:text-6xl xl:text-7xl"><span class="block">{{ $profile->name }}</span></h1>
                <div class="flex flex-col md:flex-row md:space-x-8 mt-8">
                    <div class="md:w-1/2 md:mt-0">
                        <img src="{{ $profile->getFirstMediaUrl('featured') }}" alt="{{ $profile->name }}" class="w-full mx-auto rounded-lg shadow-lg">
                    </div>
                    <div class="text-left md:w-1/2">
                        <div class="mt-4 text-gray-200!">
                            {!! $profile->intro !!}
                        </div>
                        <div class="text-gray-200!">
                            <h2 class="mt-8 text-2xl font-bold text-white">Hobbies</h2>
                            {!! $profile->hobbies  !!}
                        </div>
                    </div>
                </div>
                <div class="mt-12">
                    @livewire('reviews', ['profile' => $profile])
                </div>

                <div class="mt-12">
                    <flux:button href="{{ route('profile.booking', $profile) }}" type="button" class="inline-flex items-center w-48 h-12 px-8 text-base font-bold leading-6 text-white transition duration-150 ease-in-out bg-green-500 border border-transparent rounded-md hover:bg-green-400 focus:outline-none active:bg-green-400">
                        Book Me
                    </flux:button>
                </div>
            </div>
        </div>
    </section>
</x-layouts.guest>
