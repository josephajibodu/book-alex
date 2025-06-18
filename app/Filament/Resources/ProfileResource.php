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
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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
                                TextInput::make('name')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                        if ($operation !== 'create') {
                                            return;
                                        }
                                        $set('slug', Str::slug($state));
                                    }),
                                TextInput::make('slug')
                                    ->reactive()
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->label('Profile URL')
                                    ->helperText('This will be used in your profile URL')
                                    ->placeholder('your-profile-url'),
                                TextInput::make('phone')
                                    ->tel()
                                    ->label('Phone Number')
                                    ->placeholder('Enter phone number')
                                    ->required(),
                                TextInput::make('email')
                                    ->email()
                                    ->label('Email Address')
                                    ->placeholder('Enter email address')
                                    ->required(),
                            ]),
                        RichEditor::make('intro')->required(),
                        SpatieMediaLibraryFileUpload::make('featured')
                            ->collection('featured')
                            ->multiple(false)
                            ->required(),
                        RichEditor::make('hobbies')
                            ->nullable(),
                        Toggle::make('is_active')->default(true),
                    ]),
                Section::make('Booking Section')
                    ->collapsed()
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('bookings')
                            ->collection('bookings')
                            ->required(),
                    ]),
                Section::make('Gallery')
                    ->collapsed()
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('gallery')
                            ->multiple(true)
                            ->collection('gallery'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        $user = Auth::user();
        $currentCount = $user->profiles()->count();
        $limit = $user->profile_limit;
        $limitText = $limit === null ? 'Unlimited' : $limit;
        $countText = "{$currentCount}/{$limitText} profiles";

        return $table
            ->defaultPaginationPageOption(50)
            ->description("Your profiles: {$countText} • Click the profile URL to copy it.")
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('slug')
                    ->label('Profile URL')
                    ->formatStateUsing(fn ($state, $record) => route('profile', $record))
                    ->copyable(true)
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
            RelationManagers\ReviewsRelationManager::make(),
            RelationManagers\BookingsRelationManager::make()
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

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if (Auth::user()->role === 'admin') {
            return $query;
        }

        return $query->where('user_id', Auth::id());
    }

    public static function canCreate(): bool
    {
        $user = Auth::user();
        $currentCount = $user->profiles()->count();
        $profileLimit = $user->profile_limit;

        // Allow creation if unlimited or under limit
        return $profileLimit === null || $currentCount < $profileLimit;
    }
}