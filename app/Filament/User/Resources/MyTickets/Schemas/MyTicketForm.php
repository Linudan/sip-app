<?php

namespace App\Filament\User\Resources\MyTickets\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Models\EquipmentItem;
use App\Models\TicketCategory;
use Illuminate\Support\Facades\Auth;

class MyTicketForm
{
    public static function configure(Schema $schema): Schema
    {
        $user = Auth::user();
        $departmentId = $user->department_id;

        $equipmentQuery = EquipmentItem::query()
            ->where(function ($query) use ($user, $departmentId) {
                $query->where('current_user_id', $user->id)
                    ->orWhere(function ($q) use ($departmentId) {
                        $q->where('current_department_id', $departmentId)
                            ->whereNull('current_user_id');
                    });
            })
            ->orderBy('name');

        return $schema
            ->schema([
                TextInput::make('title')
                    ->label(__('filament-panels::user-panel.my_tickets.form.title'))
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->label(__('filament-panels::user-panel.my_tickets.form.description'))
                    ->rows(5),
                Select::make('category_id')
                    ->label(__('filament-panels::user-panel.my_tickets.form.category_id'))
                    ->options(TicketCategory::pluck('name', 'id'))
                    ->required()
                    ->searchable(),
                Select::make('equipment_item_id')
                    ->label(__('filament-panels::user-panel.my_tickets.form.equipment_item_id'))
                    ->options($equipmentQuery->pluck('name', 'id'))
                    ->nullable()
                    ->placeholder(__('filament-panels::user-panel.my_tickets.placeholders.equipment_item')),
                Select::make('priority')
                    ->label(__('filament-panels::user-panel.my_tickets.form.priority'))
                    ->options([
                        'low'      => __('filament-panels::user-panel.priorities.low'),
                        'medium'   => __('filament-panels::user-panel.priorities.medium'),
                        'high'     => __('filament-panels::user-panel.priorities.high'),
                        'critical' => __('filament-panels::user-panel.priorities.critical'),
                    ])
                    ->default('medium')
                    ->required(),
                TextInput::make('telegram_chat_link')
                    ->label(__('filament-panels::user-panel.my_tickets.form.telegram_chat_link'))
                    ->url()
                    ->nullable(),
                TextInput::make('max_chat_link')
                    ->label(__('filament-panels::user-panel.my_tickets.form.max_chat_link'))
                    ->url()
                    ->nullable(),
            ]);
    }
}
