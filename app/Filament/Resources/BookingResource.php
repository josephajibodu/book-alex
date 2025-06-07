<?php

namespace App\Filament\Resources;

use App\Enums\ServiceType;
use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\DateTimeColumn;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-phone-arrow-up-right';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Select::make('profile_id')
                            ->relationship('profile', 'name')
                            ->native(false)
                            ->searchable(true)
                            ->preload(true)
                            ->required(),
                        TextInput::make('fullname')->required(),
                        TextInput::make('phone')->required(),
                        TextInput::make('zipcode')->required(),
                        Select::make('service_type')
                            ->options(ServiceType::class)
                            ->native(false)
                            ->required(),
                        TextInput::make('duration')->required(),
                        DateTimePicker::make('booking_date')->required(),
                        Textarea::make('notes')
                            ->columnSpanFull()
                            ->nullable(),
                    ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('profile.name')->sortable()->searchable(),
                TextColumn::make('fullname')->sortable()->searchable(),
                TextColumn::make('phone')->sortable()->searchable(),
                TextColumn::make('service_type')->sortable(),
                TextColumn::make('booking_date')->dateTime()->sortable(),
                TextColumn::make('status')->sortable(),
            ])
            ->filters([
                // Add any necessary filters here
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
