<?php
namespace App\Filament\Resources\Tickets\Pages;

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
                Section::make(__('filament-panels::resources.tikets.view_tikets_cards.basic_information'))
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
                Section::make(__('filament-panels::resources.tikets.view_tikets_cards.descrption'))
                    ->icon('heroicon-o-document-text')
                    ->collapsible()
                    ->compact()
                    ->schema([
                        TextEntry::make('description')
                            ->label(__('filament-panels::resources.tikets.view_tikets_cards.descrption'))
                            ->placeholder('Нет описания')
                            ->markdown()
                            ->columnSpanFull(),
                    ]),

                // Карточка 3: Пользователь и оборудование
                Section::make(__('filament-panels::resources.tikets.view_tikets_cards.user_and_equipment'))
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
                Section::make(__('filament-panels::resources.tikets.view_tikets_cards.assigned_users'))
                    ->icon('heroicon-o-users')
                    ->collapsible()
                    ->compact()
                    ->schema([
                        TextEntry::make('assignedUsers')
                            ->label(__('filament-panels::resources.tikets.assignments.label'))
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

                // Карточка 5: Временные метки и завершение
                Section::make(__('filament-panels::resources.tikets.view_tikets_cards.time'))
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

                // Карточка 6: Рейтинг и отзыв
                Section::make(__('filament-panels::resources.tikets.view_tikets_cards.rating_and_review'))
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
                // Карточка 7: Вложения
                Section::make(__('filament-panels::resources.tikets.view_tikets_cards.attachments'))
                    ->icon('heroicon-o-paper-clip')
                    ->collapsible()
                    ->compact()
                    ->schema([
                        TextEntry::make('attachments_list')
                            ->label(__('filament-panels::resources.tikets.view_tikets_cards.attachments_list'))
                            ->getStateUsing(function ($record) {
                                $media = $record->getMedia('tickets_attachments');
                                if ($media->isEmpty()) {
                                    return __('filament-panels::resources.tikets.view_tikets_cards.no_attachments');
                                }
                                $html = '<ul class="list-disc pl-5">';
                                foreach ($media as $item) {
                                    $html .= '<li><a href="' . $item->getUrl() . '" target="_blank">' . e($item->file_name) . '</a></li>';
                                }
                                $html .= '</ul>';
                                return $html;
                            })
                            ->html()
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
