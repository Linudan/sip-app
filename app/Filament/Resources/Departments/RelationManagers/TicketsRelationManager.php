<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TicketsRelationManager extends RelationManager
{
    protected static string $relationship = 'tickets';

    protected static ?string $recordTitleAttribute = 'ticket_number';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ticket_number')
                    ->label(__('filament-panels::resources.tikets.columns.ticket_number'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('title')
                    ->label(__('filament-panels::resources.tikets.columns.title'))
                    ->limit(40),
                TextColumn::make('category.name')
                    ->label(__('filament-panels::resources.tikets.columns.category_name')),
                TextColumn::make('priority')
                    ->label(__('filament-panels::resources.tikets.columns.priority'))
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'low'      => 'gray',
                        'medium'   => 'info',
                        'high'     => 'warning',
                        'critical' => 'danger',
                    })
                    ->formatStateUsing(fn(string $state): string =>
                        __('filament-panels::resources.tikets.enums.priority.' . $state)
                    ),
                TextColumn::make('status')
                    ->label(__('filament-panels::resources.tikets.columns.status'))
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'new'         => 'gray',
                        'in_progress' => 'info',
                        'pending'     => 'warning',
                        'resolved'    => 'success',
                        'closed'      => 'success',
                        'cancelled'   => 'danger',
                    })
                    ->formatStateUsing(fn(string $state): string =>
                        __('filament-panels::resources.tikets.enums.status.' . $state)
                    ),
                TextColumn::make('assignedUsers')
                    ->label(__('filament-panels::resources.tikets.assignments.label'))
                    ->html()
                    ->getStateUsing(function ($record) {
                        return $record->assignedUsers->map(function ($user) {
                            $name = $user->full_name_with_initials ?? $user->name;
                            if ($user->pivot->is_primary) {
                                return '<strong>' . e($name) . '</strong>';
                            }
                            return e($name);
                        })->implode(', ');
                    }),
                TextColumn::make('created_at')
                    ->label(__('filament-panels::resources.tikets.columns.created_at'))
                    ->dateTime('d.m.Y H:i'),
            ])
            ->actions([
                ViewAction::make(),
            ]);
    }
}
