<?php
namespace App\Filament\Resources\EquipmentCategories\Pages;

use App\Filament\Resources\EquipmentCategories\EquipmentCategoryResource;
use Filament\Actions;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ViewEquipmentCategory extends ViewRecord
{
    protected static string $resource = EquipmentCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make()
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('name')
                            ->label(__('filament-panels::resources.equipment-сategories.columns.name'))
                            ->placeholder('—'),
                        TextEntry::make('slug')
                            ->label(__('filament-panels::resources.equipment-сategories.columns.slug'))
                            ->placeholder('—'),
                        TextEntry::make('description')
                            ->label(__('filament-panels::resources.equipment-сategories.columns.description'))
                            ->placeholder('—'),
                        TextEntry::make('parent.name')
                            ->label(__('filament-panels::resources.equipment-сategories.columns.parent_name'))
                            ->placeholder('—'),
                    ]),
            ]);
    }
}
