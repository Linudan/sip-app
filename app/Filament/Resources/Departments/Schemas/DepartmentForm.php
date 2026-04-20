<?php
namespace App\Filament\Resources\Departments\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DepartmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('dep_name')
                    ->required()
                    ->columnSpanFull()
                    ->label(__('filament-panels::resources.departments.columns.dep_name')),
                Textarea::make('description')
                    ->columnSpanFull()
                    ->label(__('filament-panels::resources.departments.columns.description')),
            ]);
    }
}
