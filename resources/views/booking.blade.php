<x-layouts.guest :title="__('Booking')">
    <section class="relative w-full px-3 antialiased bg-gradient-to-br from-gray-900 via-black to-gray-800 lg:px-6">
        <div class="relative mx-auto max-w-7xl">
            <div class="container px-6 py-20 mx-auto md:text-center md:px-4">
                <h1 class="text-4xl font-extrabold leading-none tracking-tight text-white text-center sm:text-5xl md:text-6xl xl:text-7xl"><span class="block">Booking</span></h1>
                <div class="flex flex-col md:flex-row mt-8">
                    <div class="md:w-1/2">
                        <form class="space-y-4 text-left">
                            <input type="text" name="fullname" placeholder="Full Name" class="w-full p-4 text-gray-200 bg-gray-800 border border-gray-700 rounded-md focus:outline-none">
                            <input type="text" name="phone" placeholder="Phone" class="w-full p-4 text-gray-200 bg-gray-800 border border-gray-700 rounded-md focus:outline-none">
                            <input type="text" name="zipcode" placeholder="Zip Code" class="w-full p-4 text-gray-200 bg-gray-800 border border-gray-700 rounded-md focus:outline-none">
                            <select name="service_type" class="w-full p-4 text-gray-200 bg-gray-800 border border-gray-700 rounded-md focus:outline-none">
                                <option value="">Select Service Type</option>
                                <option value="incall">Incall</option>
                                <option value="outcall">Outcall</option>
                            </select>
                            <select name="duration" class="w-full p-4 text-gray-200 bg-gray-800 border border-gray-700 rounded-md focus:outline-none">
                                <option value="">Select Duration</option>
                                <option value="1hr">1hr</option>
                                <option value="2hr">2hr</option>
                                <option value="3hr">3hr</option>
                                <option value="overnight">Overnight</option>
                            </select>
                            <input type="datetime-local" name="booking_date" class="w-full p-4 text-gray-200 bg-gray-800 border border-gray-700 rounded-md focus:outline-none">
                            <textarea name="notes" placeholder="Notes" class="w-full h-32 p-4 text-gray-200 bg-gray-800 border border-gray-700 rounded-md focus:outline-none"></textarea>
                            <button type="submit" class="inline-flex items-center w-full h-12 px-8 mt-4 text-base font-bold leading-6 text-white transition duration-150 ease-in-out bg-pink-500 border border-transparent rounded-md hover:bg-pink-400 focus:outline-none active:bg-pink-400">Book Now</button>
                        </form>
                    </div>
                    <div class="md:w-1/2 md:ml-4">
                        <img src="{{ asset('images/natasha.jpg') }}" alt="Featured Image" class="w-full h-full object-cover rounded-lg shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.guest>
