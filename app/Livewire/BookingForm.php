<?php

namespace App\Livewire;

use App\Models\Profile;
use App\Models\Booking;
use Livewire\Component;

class BookingForm extends Component
{
    public $profile;
    public $fullname;
    public $phone;
    public $zipcode;
    public $service_type;
    public $duration;
    public $booking_date;
    public $notes;

    protected $rules = [
        'fullname' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'zipcode' => 'required|string|max:10',
        'service_type' => 'required|string|max:255',
        'duration' => 'required|string|max:50',
        'booking_date' => 'required|date',
        'notes' => 'nullable|string',
    ];

    public function mount(Profile $profile)
    {
        $this->profile = $profile;
    }

    public function submitBooking()
    {
        $this->validate();

        Booking::create([
            'profile_id' => $this->profile->id,
            'fullname' => $this->fullname,
            'phone' => $this->phone,
            'zipcode' => $this->zipcode,
            'service_type' => $this->service_type,
            'duration' => $this->duration,
            'booking_date' => $this->booking_date,
            'notes' => $this->notes,
            'status' => 'pending',
        ]);

        $this->reset(['fullname', 'phone', 'zipcode', 'service_type', 'duration', 'booking_date', 'notes']);

        session()->flash('message', 'Booking submitted successfully.');
    }

    public function render()
    {
        return view('livewire.booking-form');
    }
}