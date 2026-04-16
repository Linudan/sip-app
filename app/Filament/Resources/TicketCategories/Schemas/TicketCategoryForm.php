<?php
namespace App\Filament\Resources\TicketCategories\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TicketCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('filament-panels::resources.ticket-categories.columns.name'))
                    ->required(),
                TextInput::make('slug')
                    ->label(__('filament-panels::resources.ticket-categories.columns.slug'))
                    ->required(),
                Textarea::make('description')
                    ->label(__('filament-panels::resources.ticket-categories.columns.description'))
                    ->columnSpanFull(),
            ]);
    }
}
