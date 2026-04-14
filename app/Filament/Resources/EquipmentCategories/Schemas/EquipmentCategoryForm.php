<?php
namespace App\Filament\Resources\EquipmentCategories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EquipmentCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('filament-panels::resources.equipment-сategories.columns.name'))
                    ->required(),
                TextInput::make('slug')
                    ->label(__('filament-panels::resources.equipment-сategories.columns.slug'))
                    ->required(),
                Textarea::make('description')
                    ->label(__('filament-panels::resources.equipment-сategories.columns.parent_name'))
                    ->columnSpanFull(),
                Select::make('parent_id')
                    ->label(__('filament-panels::resources.equipment-сategories.columns.parent_name'))
                    ->relationship('parent', 'name'),
                TextInput::make('icon')
                    ->label(__('filament-panels::resources.equipment-сategories.columns.icon')),
            ]);
    }
}
