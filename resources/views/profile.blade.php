<x-layouts.guest :title="__($profile->name)">
    <section class="relative w-full px-3 antialiased bg-gradient-to-br from-gray-900 via-black to-gray-800 lg:px-6">
        <div class="relative mx-auto max-w-7xl">
            <div class="container px-6 py-20 mx-auto md:text-center md:px-4">
                <h1 class="text-4xl font-extrabold leading-none tracking-tight text-white text-center sm:text-5xl md:text-6xl xl:text-7xl"
                    data-aos="zoom-in"
                    data-aos-duration="1000">
                    <span class="block">{{ $profile->name }}</span>
                </h1>
                <div class="flex flex-col md:flex-row md:space-x-8 mt-8">
                    <div class="md:w-1/2 md:mt-0 text-left"
                         data-aos="slide-right"
                         data-aos-duration="1000">
                        <img src="{{ $profile->getFirstMediaUrl('featured') }}" alt="{{ $profile->name }}" class="w-full mx-auto rounded-lg shadow-lg">

                        <div class="text-gray-200! trix-content"
                             data-aos="fade-up"
                             data-aos-duration="1000"
                             data-aos-delay="200">
                            <h2 class="text-2xl mt-0! font-bold text-white">Hobbies</h2>
                            {!! $profile->hobbies  !!}
                        </div>
                    </div>
                    <div class="text-left md:w-1/2"
                         data-aos="slide-left"
                         data-aos-duration="1000">
                        <div class="mt-4 text-gray-200! trix-content"
                             data-aos="fade-up"
                             data-aos-duration="1000"
                             data-aos-delay="200">
                            <h2 class="text-2xl mt-0! font-bold text-white">Description & Services</h2>
                            {!! $profile->intro !!}
                        </div>

                        <div class="mt-8 text-gray-200! trix-content"
                             data-aos="fade-up"
                             data-aos-duration="1000"
                             data-aos-delay="400">
                            <h2 class="text-2xl mt-0! font-bold text-white">Personal Contact</h2>
                            <div class="mt-4 space-y-3">
                                @if($profile->phone)
                                    <div class="flex items-center"
                                         data-aos="fade-up"
                                         data-aos-duration="1000"
                                         data-aos-delay="500">
                                        <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                        <span class="text-gray-200">{{ $profile->phone }}</span>
                                    </div>
                                @endif
                                @if($profile->email)
                                    <div class="flex items-center"
                                         data-aos="fade-up"
                                         data-aos-duration="1000"
                                         data-aos-delay="600">
                                        <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                        <span class="text-gray-200">{{ $profile->email }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mt-8"
                             data-aos="zoom-in"
                             data-aos-duration="1000"
                             data-aos-delay="700">
                            <flux:button href="{{ route('profile.booking', $profile) }}" type="button" class="w-full h-14 text-lg font-bold text-white transition duration-150 ease-in-out bg-green-500 border border-transparent rounded-md hover:bg-green-400 focus:outline-none active:bg-green-400">
                                Book Me
                            </flux:button>
                        </div>
                    </div>
                </div>
                <div class="mt-12"
                     data-aos="fade-up"
                     data-aos-duration="1000"
                     data-aos-delay="800">
                    @livewire('reviews', ['profile' => $profile])
                </div>
            </div>
        </div>
    </section>
</x-layouts.guest>
