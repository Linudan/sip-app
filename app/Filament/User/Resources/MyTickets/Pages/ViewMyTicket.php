<?php

namespace App\Filament\User\Resources\MyTickets\Pages;

use App\Filament\User\Resources\MyTickets\MyTicketResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ViewMyTicket extends ViewRecord
{
    protected static string $resource = MyTicketResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Информация о заявке')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('ticket_number')
                            ->label('Номер заявки')
                            ->placeholder('—'),
                        TextEntry::make('title')
                            ->label('Тема')
                            ->placeholder('—'),
                        TextEntry::make('category.name')
                            ->label('Категория')
                            ->placeholder('—'),
                        TextEntry::make('priority')
                            ->label('Приоритет')
                            ->badge()
                            ->color(fn(string $state): string => match ($state) {
                                'low'      => 'gray',
                                'medium'   => 'info',
                                'high'     => 'warning',
                                'critical' => 'danger',
                            }),
                        TextEntry::make('status')
                            ->label('Статус')
                            ->badge()
                            ->color(fn(string $state): string => match ($state) {
                                'new'         => 'gray',
                                'in_progress' => 'info',
                                'pending'     => 'warning',
                                'resolved'    => 'success',
                                'closed'      => 'success',
                                'cancelled'   => 'danger',
                            }),
                        TextEntry::make('created_at')
                            ->label('Создана')
                            ->dateTime('d.m.Y H:i')
                            ->placeholder('—'),
                        TextEntry::make('resolved_at')
                            ->label('Решена')
                            ->dateTime('d.m.Y H:i')
                            ->placeholder('—'),
                        TextEntry::make('closed_at')
                            ->label('Закрыта')
                            ->dateTime('d.m.Y H:i')
                            ->placeholder('—'),
                    ]),
                Section::make('Описание')
                    ->schema([
                        TextEntry::make('description')
                            ->label('')
                            ->markdown()
                            ->placeholder('—'),
                    ]),
                Section::make('Оборудование')
                    ->schema([
                        TextEntry::make('equipmentItem.name')
                            ->label('Оборудование')
                            ->placeholder('Не указано'),
                    ]),
                Section::make('Обратная связь')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('user_rating')
                            ->label('Оценка')
                            ->formatStateUsing(fn($state) => $state ? str_repeat('★', $state) . str_repeat('☆', 5 - $state) : '—'),
                        TextEntry::make('user_feedback')
                            ->label('Отзыв')
                            ->markdown()
                            ->placeholder('—'),
                    ]),
            ]);
    }
}
