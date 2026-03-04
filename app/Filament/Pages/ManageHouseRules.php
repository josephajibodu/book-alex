<?php

namespace App\Filament\Pages;

use App\Models\HouseRuleSection;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ManageHouseRules extends Page implements HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Content';

    protected static ?string $navigationLabel = 'House Rules';

    protected static string $view = 'filament.pages.manage-house-rules';

    public ?array $data = [];

    public function mount(): void
    {
        $sections = HouseRuleSection::query()
            ->orderBy('position')
            ->get()
            ->map(function (HouseRuleSection $section): array {
                return [
                    'id' => $section->id,
                    'title' => $section->title,
                    'body' => $section->body,
                    'is_active' => $section->is_active,
                ];
            })
            ->all();

        $this->form->fill([
            'sections' => $sections,
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema($this->getFormSchema())
            ->statePath('data');
    }

    protected function getFormSchema(): array
    {
        return [
            Repeater::make('sections')
                ->schema([
                    TextInput::make('title')
                        ->required()
                        ->maxLength(255),
                    Toggle::make('is_active')
                        ->label('Active')
                        ->default(true),
                    RichEditor::make('body')
                        ->required()
                        ->columnSpanFull(),
                ])
                ->collapsible()
                ->reorderable()
                ->itemLabel(fn (array $state): string => $state['title'] ?? 'Untitled section')
                ->columnSpanFull(),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();
        $sections = $data['sections'] ?? [];

        $seenIds = [];

        foreach ($sections as $index => $sectionData) {
            $attributes = [
                'title' => $sectionData['title'] ?? '',
                'body' => $sectionData['body'] ?? '',
                'is_active' => $sectionData['is_active'] ?? false,
                'position' => $index + 1,
            ];

            if (!empty($sectionData['id'])) {
                $model = HouseRuleSection::find($sectionData['id']);

                if ($model) {
                    $model->update($attributes);
                    $seenIds[] = $model->id;
                    continue;
                }
            }

            $model = HouseRuleSection::create($attributes);
            $seenIds[] = $model->id;
        }

        if (!empty($seenIds)) {
            HouseRuleSection::whereNotIn('id', $seenIds)->delete();
        } else {
            HouseRuleSection::query()->delete();
        }

        Notification::make()
            ->title('House rules updated')
            ->success()
            ->send();

        $this->mount();
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('save')
                ->label('Save')
                ->action('save'),
        ];
    }
}

