<div>
    @if (session()->has('message'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <h2 class="text-2xl font-bold text-white">Recent Reviews</h2>
    <div class="mt-4 space-y-4">
        @foreach($reviews as $review)
            <div class="p-8 bg-[#232323] rounded-lg mb-6">
                <div class="flex justify-between items-center mb-2">
                    <span class="font-bold text-lg text-white">{{ $review->name }}</span>
                    <span class="text-sm uppercase text-gray-400">{{ strtoupper($review->created_at->format('d M, Y')) }}</span>
                </div>
                <p class="mt-2 text-left text-gray-200 leading-relaxed">{{ $review->content }}</p>
                <div class="flex items-center mt-6">
                    @for ($i = 1; $i <= 5; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="{{ $i <= $review->rating ? '#f472b6' : 'none' }}" viewBox="0 0 24 24" stroke="#f472b6" stroke-width="2" class="w-6 h-6 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 17.25l-6.172 3.245 1.179-6.873L2.018 9.755l6.9-1.002L12 2.25l3.082 6.503 6.9 1.002-4.989 4.867 1.179 6.873z" />
                        </svg>
                    @endfor
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-12">
        <h2 class="text-2xl font-bold text-white">Write Review</h2>
        <form wire:submit.prevent="submitReview" class="mt-4">
            <div class="flex space-x-4 items-center">
                <input type="text" wire:model="author" placeholder="Your Name" class="w-1/2 p-4 text-gray-200 bg-gray-800 border border-gray-700 rounded-md focus:outline-none">
                <div class="flex items-center space-x-2" x-data="{ hover: 0 }">
                    @for ($i = 1; $i <= 5; $i++)
                        <button type="button"
                            x-on:mouseenter="hover = {{ $i }}"
                            x-on:mouseleave="hover = 0"
                            x-on:click="$wire.set('rating', {{ $i }})"
                            class="focus:outline-none"
                            aria-label="Rate {{ $i }} star{{ $i > 1 ? 's' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                x-bind:fill="hover ? (hover >= {{ $i }} ? '#f472b6' : 'none') : ($wire.rating >= {{ $i }} ? '#f472b6' : 'none')"
                                viewBox="0 0 24 24" stroke="#f472b6" stroke-width="2" class="w-7 h-7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 17.25l-6.172 3.245 1.179-6.873L2.018 9.755l6.9-1.002L12 2.25l3.082 6.503 6.9 1.002-4.989 4.867 1.179 6.873z" />
                            </svg>
                        </button>
                    @endfor
                    <span class="ml-2 text-gray-300">Rate Model</span>
                </div>
            </div>
            <textarea wire:model="content" class="w-full h-32 p-4 mt-4 text-gray-200 bg-gray-800 border border-gray-700 rounded-md focus:outline-none" placeholder="Message"></textarea>
            <button type="submit" class="inline-flex items-center w-full h-12 px-8 mt-4 text-base font-bold leading-6 text-white transition duration-150 ease-in-out bg-pink-500 border border-transparent rounded-md hover:bg-pink-400 focus:outline-none active:bg-pink-400">Post Review</button>
        </form>
    </div>
</div>
