<x-layouts.guest :title="__('Natasha')">
    <section class="relative w-full px-3 antialiased bg-gradient-to-br from-gray-900 via-black to-gray-800 lg:px-6">
        <div class="relative mx-auto max-w-7xl">
            <div class="container px-6 py-20 mx-auto md:text-center md:px-4">
                <h1 class="text-4xl font-extrabold leading-none tracking-tight text-white text-center sm:text-5xl md:text-6xl xl:text-7xl"><span class="block">Natasha</span></h1>
                <div class="flex flex-col md:flex-row md:space-x-8 mt-8">
                    <div class="md:w-1/2 md:mt-0">
                        <img src="{{ asset('images/natasha.jpg') }}" alt="Natasha" class="w-full mx-auto rounded-lg shadow-lg">
                    </div>
                    <div class="text-left md:w-1/2">
                        <div>
                            <p class="mt-4 text-gray-200">Natasha is a professional model with a passion for fashion and photography. She loves to travel and explore new cultures. With years of experience in the industry, she has worked with top brands and photographers worldwide. Her dedication to her craft and her vibrant personality make her a favorite among clients and colleagues alike.</p>
                        </div>
                        <div>
                            <h2 class="mt-8 text-2xl font-bold text-white">Hobbies</h2>
                            <ul class="mt-4 text-gray-200 list-disc list-inside">
                                <li>Photography: Capturing moments and creating art through the lens.</li>
                                <li>Traveling: Exploring new destinations and experiencing diverse cultures.</li>
                                <li>Fashion Design: Designing unique clothing pieces and staying ahead of trends.</li>
                                <li>Yoga: Practicing mindfulness and maintaining a healthy lifestyle.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mt-12">
                    <h2 class="text-2xl font-bold text-white">Recent Reviews</h2>
                    <div class="mt-4 space-y-4">
                        <div class="p-4 bg-gray-800 rounded-md">
                            <div class="flex items-center">
                                <div class="ml-4">
                                    <h3 class="text-lg font-bold text-white">Marie Hoola <span class="text-pink-500">★★★★☆</span></h3>
                                    <p class="text-sm text-gray-400">15 December, 2017</p>
                                </div>
                            </div>
                            <p class="mt-2 text-gray-200">Proin dignissim magna ut varius faucibus. Suspendisse aliquet, risus id hendrerit tincidunt.</p>
                        </div>
                        <div class="p-4 bg-gray-800 rounded-md">
                            <div class="flex items-center">
                                <div class="ml-4">
                                    <h3 class="text-lg font-bold text-white">Perry Powell <span class="text-pink-500">★★★★★</span></h3>
                                    <p class="text-sm text-gray-400">12 December, 2017</p>
                                </div>
                            </div>
                            <p class="mt-2 text-gray-200">Proin dignissim magna ut varius faucibus. Suspendisse aliquet, risus id hendrerit tincidunt.</p>
                        </div>
                        <div class="p-4 bg-gray-800 rounded-md">
                            <div class="flex items-center">
                                <div class="ml-4">
                                    <h3 class="text-lg font-bold text-white">Ross Hender <span class="text-pink-500">★★★★☆</span></h3>
                                    <p class="text-sm text-gray-400">09 December, 2017</p>
                                </div>
                            </div>
                            <p class="mt-2 text-gray-200">Proin dignissim magna ut varius faucibus. Suspendisse aliquet, risus id hendrerit tincidunt.</p>
                        </div>
                    </div>
                </div>
                <div class="mt-12">
                    <h2 class="text-2xl font-bold text-white">Write Review</h2>
                    <div class="flex items-center mt-4">
                        <span class="text-gray-400">Rate Model</span>
                        <div class="flex ml-2">
                            <span class="text-yellow-400">★</span>
                            <span class="text-yellow-400">★</span>
                            <span class="text-yellow-400">★</span>
                            <span class="text-yellow-400">★</span>
                            <span class="text-gray-400">★</span>
                        </div>
                    </div>
                    <form class="mt-4">
                        <div class="flex space-x-4">
                            <input type="text" placeholder="Your Name" class="w-1/2 p-4 text-gray-200 bg-gray-800 border border-gray-700 rounded-md focus:outline-none">
                            <input type="email" placeholder="Your Email" class="w-1/2 p-4 text-gray-200 bg-gray-800 border border-gray-700 rounded-md focus:outline-none">
                        </div>
                        <textarea class="w-full h-32 p-4 mt-4 text-gray-200 bg-gray-800 border border-gray-700 rounded-md focus:outline-none" placeholder="Message"></textarea>
                        <button type="submit" class="inline-flex items-center w-full h-12 px-8 mt-4 text-base font-bold leading-6 text-white transition duration-150 ease-in-out bg-pink-500 border border-transparent rounded-md hover:bg-pink-400 focus:outline-none active:bg-pink-400">Post Review</button>
                    </form>
                </div>
                <div class="mt-12">
                    <button type="button" class="inline-flex items-center w-48 h-12 px-8 text-base font-bold leading-6 text-white transition duration-150 ease-in-out bg-green-500 border border-transparent rounded-md hover:bg-green-400 focus:outline-none active:bg-green-400">Book Me</button>
                </div>
            </div>
        </div>
    </section>
</x-layouts.guest>
