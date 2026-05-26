<?php
namespace App\Filament\User\Resources\MyTickets\Schemas;

use App\Models\EquipmentItem;
use App\Models\TicketCategory;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class MyTicketForm
{
    public static function configure(Schema $schema): Schema
    {
        $user           = Auth::user();
        $equipmentQuery = EquipmentItem::query();

        if ($user->department_id) {
            $equipmentQuery->where(function ($query) use ($user) {
                $query->where('current_user_id', $user->id)
                    ->orWhere(function ($q) use ($user) {
                        $q->where('current_department_id', $user->department_id)
                            ->whereNull('current_user_id');
                    });
            });
        } else {
            $equipmentQuery->where('current_user_id', $user->id);
        }

        $equipmentQuery->orderBy('name');

        return $schema
            ->schema([
                TextInput::make('title')
                    ->label(__('filament-panels::user-panel.my_tickets.form.title'))
                    ->required()
                    ->maxLength(255),
                Select::make('category_id')
                    ->label(__('filament-panels::user-panel.my_tickets.form.category_id'))
                    ->options(TicketCategory::pluck('name', 'id'))
                    ->required()
                    ->searchable(),
                Textarea::make('description')
                    ->label(__('filament-panels::user-panel.my_tickets.form.description'))
                    ->rows(5),
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
            ]);
    }
}
