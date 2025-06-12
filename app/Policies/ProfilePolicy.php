<?php

namespace App\Policies;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Profile $profile): bool
    {
        return $user->role === 'admin' || $user->id === $profile->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Profile $profile): bool
    {
        return $user->role === 'admin' || $user->id === $profile->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Profile $profile): bool
    {
        return $user->role === 'admin' || $user->id === $profile->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Profile $profile): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Profile $profile): bool
    {
        return false;
    }

    public function viewAnyInFilament(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function viewInFilament(User $user, Profile $profile): bool
    {
        return $user->role === 'admin' || $user->id === $profile->user_id;
    }
}