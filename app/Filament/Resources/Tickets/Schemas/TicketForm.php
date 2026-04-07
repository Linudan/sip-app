<?php

namespace App\Filament\Resources\Tickets\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TicketForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('ticket_number')
                    ->required(),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                Select::make('equipment_item_id')
                    ->relationship('equipmentItem', 'name'),
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('priority')
                    ->required()
                    ->default('medium'),
                TextInput::make('status')
                    ->required()
                    ->default('new'),
                TextInput::make('telegram_chat_link')
                    ->tel(),
                TextInput::make('max_chat_link'),
                DateTimePicker::make('resolved_at'),
                DateTimePicker::make('closed_at'),
                TextInput::make('user_rating')
                    ->numeric(),
                Textarea::make('user_feedback')
                    ->columnSpanFull(),
            ]);
    }
}
