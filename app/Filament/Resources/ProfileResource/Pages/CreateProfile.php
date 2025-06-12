<?php

namespace App\Filament\Resources\ProfileResource\Pages;

use App\Filament\Resources\ProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CreateProfile extends CreateRecord
{
    protected static string $resource = ProfileResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $data['about_me'] = $data['intro'];

        $data['user_id'] = Auth::id();

        return parent::handleRecordCreation($data);
    }
}