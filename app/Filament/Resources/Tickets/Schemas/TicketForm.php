<?php
namespace App\Filament\Resources\Tickets\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TicketForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('ticket_number')
                    ->label(__('filament-panels::resources.tikets.placeholder.ticket_number'))
                    ->required(),
                Select::make('user_id')
                    ->label(__('filament-panels::resources.tikets.placeholder.user_name'))
                    ->options(function () {
                        return \App\Models\User::all()
                            ->mapWithKeys(fn($user) => [$user->id => $user->full_name_with_initials])
                            ->toArray();
                    })
                    ->searchable()
                    ->required(),
                Select::make('category_id')
                    ->label(__('filament-panels::resources.tikets.placeholder.category_name'))
                    ->relationship('category', 'name')
                    ->required(),
                Select::make('equipment_item_id')
                    ->label(__('filament-panels::resources.tikets.placeholder.equipment_item_name'))
                    ->searchable()
                    // Подгрузка возможных значений
                    ->preload()
                    ->relationship('equipmentItem', 'name'),
                TextInput::make('title')
                    ->label(__('filament-panels::resources.tikets.placeholder.title'))
                    ->required(),
                Textarea::make('description')
                    ->label(__('filament-panels::resources.tikets.placeholder.description'))
                    ->columnSpanFull(),
                Select::make('priority')
                    ->label(__('filament-panels::resources.tikets.placeholder.priority'))
                    ->required()
                    ->options([
                        'low'      => __('filament-panels::resources.tikets.enums.priority.low'),
                        'medium'   => __('filament-panels::resources.tikets.enums.priority.medium'),
                        'high'     => __('filament-panels::resources.tikets.enums.priority.high'),
                        'critical' => __('filament-panels::resources.tikets.enums.priority.critical'),
                    ])
                    ->default('medium'),
                Select::make('status')
                    ->label(__('filament-panels::resources.tikets.placeholder.status'))
                    ->required()
                    ->options([
                        'new'         => __('filament-panels::resources.tikets.enums.status.new'),
                        'in_progress' => __('filament-panels::resources.tikets.enums.status.in_progress'),
                        'pending'     => __('filament-panels::resources.tikets.enums.status.pending'),
                        'resolved'    => __('filament-panels::resources.tikets.enums.status.resolved'),
                        'closed'      => __('filament-panels::resources.tikets.enums.status.closed'),
                        'cancelled'   => __('filament-panels::resources.tikets.enums.status.cancelled'),
                    ])
                    ->default('new'),
                TextInput::make('telegram_chat_link')
                    ->label(__('filament-panels::resources.tikets.placeholder.telegram_chat_link'))
                    ->tel(),
                TextInput::make('max_chat_link')
                    ->label(__('filament-panels::resources.tikets.placeholder.max_chat_link')),
                DateTimePicker::make('resolved_at')
                    ->label(__('filament-panels::resources.tikets.placeholder.resolved_at')),
                DateTimePicker::make('closed_at')
                    ->label(__('filament-panels::resources.tikets.placeholder.closed_at')),
                TextInput::make('user_rating')
                    ->label(__('filament-panels::resources.tikets.placeholder.user_rating'))
                    ->numeric(),
                Textarea::make('user_feedback')
                    ->label(__('filament-panels::resources.tikets.placeholder.user_feedback'))
                    ->columnSpanFull(),
            ]);
    }
}
