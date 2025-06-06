<?php

namespace App\Livewire;

use App\Models\Profile;
use Livewire\Component;

class SearchProfiles extends Component
{
    public $search = '';
    public $results = [];

    public function updatedSearch()
    {
        if (strlen($this->search) >= 2) {
            $this->results = Profile::query()
                ->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('intro', 'like', '%' . $this->search . '%')
                ->take(3)
                ->get();
        } else {
            $this->results = [];
        }
    }

    public function search()
    {
        $this->updatedSearch();
    }

    public function render()
    {
        return view('livewire.search-profiles');
    }
}