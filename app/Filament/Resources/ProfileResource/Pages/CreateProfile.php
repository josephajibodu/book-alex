<?php

namespace App\Filament\Resources\ProfileResource\Pages;

use App\Filament\Resources\ProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;

class CreateProfile extends CreateRecord
{
    protected static string $resource = ProfileResource::class;

    protected function beforeCreate(): void
    {
        $user = Auth::user();
        $currentProfileCount = $user->profiles()->count();
        $profileLimit = $user->profile_limit;

        // Check if user has reached their profile limit
        if ($profileLimit !== null && $currentProfileCount >= $profileLimit) {
            $limitText = $profileLimit === 1 ? '1 profile' : "{$profileLimit} profiles";

            Notification::make()
                ->title('Profile Limit Reached')
                ->body("You have reached your limit of {$limitText}. Please contact an administrator to increase your limit.")
                ->danger()
                ->send();

            $this->halt();
        }
    }

    protected function handleRecordCreation(array $data): Model
    {
        $data['about_me'] = $data['intro'];

        $data['user_id'] = Auth::id();

        return parent::handleRecordCreation($data);
    }
}