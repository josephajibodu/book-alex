<div>
    @if (session()->has('message'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <div class="mt-4 space-y-4 max-w-4xl mx-auto">
        <h2 class="text-3xl font-bold text-white text-center mb-12">Client Reviews</h2>
        <div class="reviews-swiper swiper mx-auto relative">
            <div class="swiper-wrapper">
                @foreach($reviews as $review)
                    <div class="swiper-slide">
                        <div class="p-10">
                            <div class="flex flex-col items-center text-center">
                                <div class="flex items-center mb-6">
                                    @for($i = 0; $i < 5; $i++)
                                        <svg class="w-6 h-6 {{ $i < $review->rating ? 'text-yellow-400' : 'text-gray-700' }}"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    @endfor
                                </div>
                                <p class="text-xl text-gray-200 italic mb-6">"{{ $review->content }}"</p>
                                <div class="flex items-center">
                                    <div
                                        class="h-12 w-12 rounded-full bg-gradient-to-br from-indigo-500 to-blue-600 flex items-center justify-center text-white font-bold text-xl">
                                        {{ substr($review->name, 0, 1) }}
                                    </div>
                                    <div class="ml-4 text-left">
                                        <h3 class="text-lg font-semibold text-white">{{ $review->name }}</h3>
                                        <div class="text-gray-400 text-sm">
                                            {{ $review->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Add Navigation -->
            <div
                class="swiper-button-next !w-12 !h-12 !bg-white/10 !rounded-full hover:!bg-white/20 transition-all duration-300 after:!text-2xl after:!text-white">
            </div>
            <div
                class="swiper-button-prev !w-12 !h-12 !bg-white/10 !rounded-full hover:!bg-white/20 transition-all duration-300 after:!text-2xl after:!text-white">
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination !bottom-0"></div>
        </div>
    </div>

    <div class="mt-12 max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold text-white">Write Review</h2>
        <form wire:submit.prevent="submitReview" class="mt-4">
            <div class="flex space-x-4 items-center">
                <input type="text" wire:model="author" placeholder="Your Name"
                    class="w-1/2 p-4 text-gray-200 bg-gray-800 border border-gray-700 rounded-md focus:outline-none">
                <div class="flex items-center space-x-2" x-data="{ hover: 0 }">
                    @for ($i = 1; $i <= 5; $i++)
                        <button type="button" x-on:mouseenter="hover = {{ $i }}" x-on:mouseleave="hover = 0"
                            x-on:click="$wire.set('rating', {{ $i }})" class="focus:outline-none"
                            aria-label="Rate {{ $i }} star{{ $i > 1 ? 's' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                x-bind:fill="hover ? (hover >= {{ $i }} ? '#6366f1' : 'none') : ($wire.rating >= {{ $i }} ? '#6366f1' : 'none')"
                                viewBox="0 0 24 24" stroke="#6366f1" stroke-width="2" class="w-7 h-7">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 17.25l-6.172 3.245 1.179-6.873L2.018 9.755l6.9-1.002L12 2.25l3.082 6.503 6.9 1.002-4.989 4.867 1.179 6.873z" />
                            </svg>
                        </button>
                    @endfor
                    <span class="ml-2 text-gray-300">Rate Model</span>
                </div>
            </div>
            <textarea wire:model="content"
                class="w-full h-32 p-4 mt-4 text-gray-200 bg-gray-800 border border-gray-700 rounded-md focus:outline-none"
                placeholder="Message"></textarea>
            <button type="submit"
                class="inline-flex items-center w-full h-12 px-8 mt-4 text-base font-bold leading-6 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none active:bg-indigo-500">Post
                Review</button>
        </form>
    </div>
</div>
