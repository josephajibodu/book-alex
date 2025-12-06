<div class="py-10 rounded-lg">
    <div class="max-w-2xl mx-auto">
        <div class="relative flex items-center overflow-hidden text-left border border-gray-700 rounded-md">
            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search"
                class="w-full h-12 px-6 py-2 font-medium text-gray-200 bg-transparent focus:outline-none">
            <span class="relative top-0 right-0 block">
                <button type="button" wire:click="search"
                    class="inline-flex items-center w-32 h-12 px-8 text-base font-bold leading-6 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent hover:bg-indigo-500 focus:outline-none active:bg-indigo-500"
                    data-primary="indigo-600">
                    Search
                </button>
            </span>
        </div>

        @if(strlen($search) >= 2)
            <div class="mt-8">
                @if(count($results) > 0)
                    <div class="flex flex-wrap justify-center gap-8">
                        @foreach($results as $profile)
                            <a href="{{ route('profile', $profile->slug) }}" class="block group" style="width: 320px;">
                                <div class="relative overflow-hidden rounded-lg shadow-lg bg-slate-900">
                                    <img class="object-cover w-full h-80 transition-transform duration-300 group-hover:scale-105"
                                        src="{{ $profile->getFirstMediaUrl('featured') }}" alt="{{ $profile->name }}">
                                    <div class="absolute bottom-0 left-0 w-full px-6 py-4 bg-white bg-opacity-100">
                                        <p class="text-xl font-semibold text-center text-gray-900">{{ $profile->name }}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="p-4 text-sm text-gray-300 text-center">
                        No profiles found.
                    </div>
                @endif
            </div>
        @endif
    </div>
</div>
