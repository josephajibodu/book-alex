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
}