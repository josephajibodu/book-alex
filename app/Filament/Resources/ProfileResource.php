<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Filament\Resources\ProfileResource\RelationManagers;
use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Profile Details')
                    ->schema([
                        Grid::make()
                            ->schema([
                                TextInput::make('name')->required(),
                            ]),
                        RichEditor::make('intro')->required(),
                        SpatieMediaLibraryFileUpload::make('featured')
                            ->collection('featured')
                            ->multiple(false),
                        RichEditor::make('hobbies')->nullable(),
                        Toggle::make('is_active')->default(true),
                    ]),
                Section::make('Booking Section')
                    ->collapsed()
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('booking')->collection('about'),
                    ]),
                Section::make('Gallery')
                    ->collapsed()
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('gallery')->collection('gallery'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultPaginationPageOption(50)
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('slug')
                    ->label('Profile URL')
                    ->formatStateUsing(fn ($state, $record) => url('/profile/' . $record->slug))
                    ->sortable()
                    ->searchable(),
                IconColumn::make('is_active')->boolean(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
        ];
    }
}