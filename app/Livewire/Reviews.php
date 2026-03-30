<?php

namespace App\Livewire;

use App\Models\Profile;
use App\Models\Review;
use Livewire\Component;

class Reviews extends Component
{
    public $profile;

    public $author;

    public $content;

    public $rating;

    protected $rules = [
        'author' => 'required|string|max:255',
        'content' => 'required|string',
        'rating' => 'required|integer|min:1|max:5',
    ];

    public function mount(Profile $profile)
    {
        $this->profile = $profile;
    }

    public function submitReview()
    {
        $this->validate();

        $this->profile->reviews()->create([
            'name' => $this->author,
            'content' => $this->content,
            'rating' => $this->rating,
            'is_approved' => false,
        ]);

        $this->reset(['author', 'content', 'rating']);

        session()->flash('message', 'Review submitted successfully.');
    }

    public function render()
    {
        return view('livewire.reviews', [
            'reviews' => Review::query()
                ->where('is_approved', true)
                // ->where(function ($query) {
                //     $query->whereNull('profile_id')
                //         ->orWhere('profile_id', $this->profile->id);
                // })
                ->latest()
                ->get(),
        ]);
    }
}
