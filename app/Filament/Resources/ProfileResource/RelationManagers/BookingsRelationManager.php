<?php

namespace App\Filament\Resources\ProfileResource\RelationManagers;

use App\Filament\Resources\BookingResource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingsRelationManager extends RelationManager
{
    protected static string $relationship = 'bookings';

    public function form(Form $form): Form
    {
        return BookingResource::form($form);
    }

    public function table(Table $table): Table
    {
        return BookingResource::table($table);
    }
}
