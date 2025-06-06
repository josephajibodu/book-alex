<div>
    @if (session()->has('message'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <h2 class="text-2xl font-bold text-white">Recent Reviews</h2>
    <div class="mt-4 space-y-4">
        @foreach($reviews as $review)
            <div class="p-4 bg-gray-800 rounded-md">
                <div class="flex items-center">
                    <div class="ml-4">
                        <h3 class="text-lg font-bold text-white">{{ $review->author }} <span class="text-pink-500">{{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}</span></h3>
                        <p class="text-sm text-gray-400">{{ $review->created_at->format('d F, Y') }}</p>
                    </div>
                </div>
                <p class="mt-2 text-gray-200">{{ $review->content }}</p>
            </div>
        @endforeach
    </div>

    <div class="mt-12">
        <h2 class="text-2xl font-bold text-white">Write Review</h2>
        <form wire:submit.prevent="submitReview" class="mt-4">
            <div class="flex space-x-4">
                <input type="text" wire:model="author" placeholder="Your Name" class="w-1/2 p-4 text-gray-200 bg-gray-800 border border-gray-700 rounded-md focus:outline-none">
                <input type="number" wire:model="rating" min="1" max="5" placeholder="Rating (1-5)" class="w-1/2 p-4 text-gray-200 bg-gray-800 border border-gray-700 rounded-md focus:outline-none">
            </div>
            <textarea wire:model="content" class="w-full h-32 p-4 mt-4 text-gray-200 bg-gray-800 border border-gray-700 rounded-md focus:outline-none" placeholder="Message"></textarea>
            <button type="submit" class="inline-flex items-center w-full h-12 px-8 mt-4 text-base font-bold leading-6 text-white transition duration-150 ease-in-out bg-pink-500 border border-transparent rounded-md hover:bg-pink-400 focus:outline-none active:bg-pink-400">Post Review</button>
        </form>
    </div>
</div>
