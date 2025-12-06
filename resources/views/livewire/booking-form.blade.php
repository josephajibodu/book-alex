<div>
    @if (session()->has('message'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submitBooking" class="mt-4">
        @if ($errors->any())
            <div class="p-4 mb-4 text-red-700 bg-red-100 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="flex space-x-4">
            <div class="w-1/2">
                <label for="fullname" class="block text-sm font-medium text-gray-200 text-left mb-2">Full Name</label>
                <input type="text" id="fullname" wire:model="fullname" placeholder="Full Name"
                    class="w-full p-4 text-gray-200 bg-gray-800 border border-gray-700 rounded-md focus:outline-none">
            </div>
            <div class="w-1/2">
                <label for="phone" class="block text-sm font-medium text-gray-200 text-left mb-2">Phone</label>
                <input type="text" id="phone" wire:model="phone" placeholder="Phone"
                    class="w-full p-4 text-gray-200 bg-gray-800 border border-gray-700 rounded-md focus:outline-none">
            </div>
        </div>
        <div class="flex space-x-4 mt-4">
            <div class="w-1/2">
                <label for="zipcode" class="block text-sm font-medium text-gray-200 text-left mb-2">Zip Code</label>
                <input type="text" id="zipcode" wire:model="zipcode" placeholder="Zip Code"
                    class="w-full p-4 text-gray-200 bg-gray-800 border border-gray-700 rounded-md focus:outline-none">
            </div>
            <div class="w-1/2">
                <label for="service_type" class="block text-sm font-medium text-gray-200 text-left mb-2">Service
                    Type</label>
                <select id="service_type" wire:model="service_type"
                    class="w-full p-4 text-gray-200 bg-gray-800 border border-gray-700 rounded-md focus:outline-none">
                    <option value="">Select Service Type</option>
                    <option value="incall">Incall</option>
                    <option value="outcall">Outcall</option>
                </select>
            </div>
        </div>
        <div class="flex space-x-4 mt-4">
            <div class="w-1/2">
                <label for="duration" class="block text-sm font-medium text-gray-200 text-left mb-2">Duration</label>
                <select id="duration" wire:model="duration"
                    class="w-full p-4 text-gray-200 bg-gray-800 border border-gray-700 rounded-md focus:outline-none">
                    <option value="">Select Duration</option>
                    <option value="1hr">1hr</option>
                    <option value="2hr">2hr</option>
                    <option value="3hr">3hr</option>
                    <option value="overnight">Overnight</option>
                </select>
            </div>
            <div class="w-1/2">
                <label for="booking_date" class="block text-sm font-medium text-gray-200 text-left mb-2">Booking
                    Date</label>
                <input type="datetime-local" id="booking_date" wire:model="booking_date"
                    class="w-full p-4 text-gray-200 bg-gray-800 border border-gray-700 rounded-md focus:outline-none">
            </div>
        </div>
        <div class="mt-4">
            <label for="notes" class="block text-sm font-medium text-gray-200 text-left mb-2">Notes</label>
            <textarea id="notes" wire:model="notes"
                class="w-full h-32 p-4 text-gray-200 bg-gray-800 border border-gray-700 rounded-md focus:outline-none"
                placeholder="Notes"></textarea>
        </div>
        <button type="submit"
            class="inline-flex items-center w-full h-12 px-8 mt-4 text-base font-bold leading-6 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none active:bg-indigo-500">Submit
            Booking</button>
    </form>
</div>
