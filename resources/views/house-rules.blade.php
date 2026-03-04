<x-layouts.guest :title="__('House Rules')">
    <section
        class="relative w-full px-3 antialiased bg-gradient-to-br from-slate-900 via-indigo-950 to-slate-900 lg:px-6">
        <div class="relative mx-auto max-w-7xl">
            <div class="container px-6 py-20 mx-auto md:text-center md:px-4">
                <h1
                    class="text-4xl font-extrabold leading-none tracking-tight text-white text-center sm:text-5xl md:text-6xl xl:text-7xl">
                    <span class="block">House Rules</span>
                </h1>
                <div class="mt-8 text-left text-white space-y-6">
                    @forelse ($sections as $section)
                        <div class="space-y-2">
                            <h2 class="text-2xl font-bold">
                                {{ $section->title }}
                            </h2>
                            <div class="prose prose-invert max-w-none">
                                {!! $section->body !!}
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-slate-200">
                            House rules will be available soon.
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</x-layouts.guest>