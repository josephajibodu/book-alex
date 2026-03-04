<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HouseRuleSectionResource\Pages;
use App\Models\HouseRuleSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class HouseRuleSectionResource extends Resource
{
    protected static ?string $model = HouseRuleSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = null;
    protected static ?string $navigationLabel = null;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                RichEditor::make('body')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('position')
                    ->numeric()
                    ->required()
                    ->default(0),
                Toggle::make('is_active')
                    ->default(true),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('position')
                    ->sortable()
                    ->label('Order'),
                TextColumn::make('title')
                    ->sortable()
                    ->searchable(),
                IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active'),
                TextColumn::make('updated_at')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->label('Last Updated'),
            ])
            ->defaultSort('position')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHouseRuleSections::route('/'),
            'create' => Pages\CreateHouseRuleSection::route('/create'),
            'edit' => Pages\EditHouseRuleSection::route('/{record}/edit'),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
}

