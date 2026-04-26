<?php
namespace App\Filament\Resources\Departments\Pages;

use App\Filament\Resources\Tickets\TicketResource;
use Filament\Actions;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ViewTicket extends ViewRecord
{
    protected static string $resource = TicketResource::class;

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
                // Карточка 1: Основная информация
                Section::make('Основная информация')
                    ->icon('heroicon-o-ticket')
                    ->collapsible()
                    ->compact()
                    ->columns(2)
                    ->schema([
                        TextEntry::make('ticket_number')
                            ->label(__('filament-panels::resources.tikets.columns.ticket_number'))
                            ->placeholder('—'),
                        TextEntry::make('title')
                            ->label(__('filament-panels::resources.tikets.columns.title'))
                            ->placeholder('—'),
                        TextEntry::make('priority')
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
                        TextEntry::make('status')
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
                    ]),

                // Карточка 2: Описание
                Section::make('Описание')
                    ->icon('heroicon-o-document-text')
                    ->collapsible()
                    ->compact()
                    ->schema([
                        TextEntry::make('description')
                            ->label('')
                            ->placeholder('Нет описания')
                            ->markdown()
                            ->columnSpanFull(),
                    ]),

                // Карточка 3: Пользователь и оборудование
                Section::make('Пользователь и оборудование')
                    ->icon('heroicon-o-user')
                    ->collapsible()
                    ->compact()
                    ->columns(2)
                    ->schema([
                        TextEntry::make('user.full_name_with_initials')
                            ->label(__('filament-panels::resources.tikets.columns.user_name'))
                            ->placeholder('—'),
                        TextEntry::make('equipmentItem.name')
                            ->label(__('filament-panels::resources.tikets.columns.equipment_item_name'))
                            ->placeholder('Не указано'),
                        TextEntry::make('category.name')
                            ->label(__('filament-panels::resources.tikets.columns.category_name'))
                            ->placeholder('—'),
                    ]),

                // Карточка 4: Назначенные специалисты
                Section::make('Назначенные специалисты')
                    ->icon('heroicon-o-users')
                    ->collapsible()
                    ->compact()
                    ->schema([
                        TextEntry::make('assignedUsers')
                            ->label('')
                            ->placeholder('Не назначены')
                            ->formatStateUsing(function ($state, $record) {
                                $users = $record->assignedUsers;
                                if ($users->isEmpty()) {
                                    return '<em>Не назначены</em>';
                                }
                                $list = '<ul class="list-disc pl-5">';
                                foreach ($users as $user) {
                                    $list .= '<li>' . e($user->full_name_with_initials) . '</li>';
                                }
                                $list .= '</ul>';
                                return $list;
                            })
                            ->html()
                            ->columnSpanFull(),
                    ]),

                // Карточка 5: Ссылки на чаты
                Section::make('Чаты и связь')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->collapsible()
                    ->compact()
                    ->columns(2)
                    ->schema([
                        TextEntry::make('telegram_chat_link')
                            ->label(__('filament-panels::resources.tikets.columns.telegram_chat_link'))
                            ->url(fn($state) => $state)
                            ->openUrlInNewTab()
                            ->placeholder('—'),
                        TextEntry::make('max_chat_link')
                            ->label(__('filament-panels::resources.tikets.columns.max_chat_link'))
                            ->url(fn($state) => $state)
                            ->openUrlInNewTab()
                            ->placeholder('—'),
                    ]),

                // Карточка 6: Временные метки и завершение
                Section::make('Временные метки')
                    ->icon('heroicon-o-calendar')
                    ->collapsible()
                    ->compact()
                    ->columns(2)
                    ->schema([
                        TextEntry::make('resolved_at')
                            ->label(__('filament-panels::resources.tikets.columns.resolved_at'))
                            ->dateTime('d.m.Y H:i')
                            ->placeholder('—'),
                        TextEntry::make('closed_at')
                            ->label(__('filament-panels::resources.tikets.columns.closed_at'))
                            ->dateTime('d.m.Y H:i')
                            ->placeholder('—'),
                        TextEntry::make('created_at')
                            ->label(__('filament-panels::resources.tikets.columns.created_at'))
                            ->dateTime('d.m.Y H:i'),
                        TextEntry::make('updated_at')
                            ->label(__('filament-panels::resources.tikets.columns.updated_at'))
                            ->dateTime('d.m.Y H:i'),
                    ]),

                // Карточка 7: Рейтинг и отзыв
                Section::make('Рейтинг и отзыв')
                    ->icon('heroicon-o-star')
                    ->collapsible()
                    ->collapsed(true)
                    ->compact()
                    ->schema([
                        TextEntry::make('user_rating')
                            ->label(__('filament-panels::resources.tikets.columns.user_rating'))
                            ->formatStateUsing(fn($state) => $state ? str_repeat('★', $state) . str_repeat('☆', 5 - $state) : '—'),
                        TextEntry::make('user_feedback')
                            ->label(__('filament-panels::resources.tikets.columns.user_feedback'))
                            ->markdown()
                            ->placeholder('Нет отзыва')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
