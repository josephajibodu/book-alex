<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display the specified profile.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $profile = Profile::query()->where('slug', $slug)->firstOrFail();

        return view('profile', compact('profile'));
    }

    /**
     * Show the booking form for the specified profile.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\View\View
     */
    public function booking(Profile $profile)
    {
        return view('booking', compact('profile'));
    }

    /**
     * Show the galleries for the specified profile.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\View\View
     */
    public function galleries(Profile $profile)
    {
        return view('galleries', compact('profile'));
    }
}
