<?php
namespace App\Filament\Resources\Tickets\Tables;

use App\Exports\TicketExport;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Actions\Action;
use pxlrbt\FilamentExcel\Actions\ExportAction;
use pxlrbt\FilamentExcel\Actions\ExportBulkAction;

class TicketsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->striped()
            ->recordActionsPosition(RecordActionsPosition::BeforeCells)
            ->columns([
                TextColumn::make('deleted_at')
                    ->label(__('filament-panels::resources.tikets.columns.deleted_at'))
                    ->placeholder(__('filament-panels::resources.tikets.placeholder.deleted_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('ticket_number')
                    ->label(__('filament-panels::resources.tikets.columns.ticket_number'))
                    ->placeholder(__('filament-panels::resources.tikets.placeholder.ticket_number'))
                    ->toggleable()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('user.full_name_with_initials')
                    ->label(__('filament-panels::resources.tikets.columns.user_name'))
                    ->placeholder(__('filament-panels::resources.tikets.placeholder.user_name'))
                    ->sortable(query: function ($query, $direction) {
                        return $query->join('users', 'tickets.user_id', '=', 'users.id')
                            ->orderBy('users.surname', $direction)
                            ->orderBy('users.name', $direction);
                    })
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('category.name')
                    ->label(__('filament-panels::resources.tikets.columns.category_name'))
                    ->placeholder(__('filament-panels::resources.tikets.placeholder.category_name'))
                    ->toggleable()
                    ->sortable()
                    ->searchable(),
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
                TextColumn::make('equipmentItem.name')
                    ->label(__('filament-panels::resources.tikets.columns.equipment_item_name'))
                    ->placeholder(__('filament-panels::resources.tikets.placeholder.equipment_item_name'))
                    ->toggleable()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('title')
                    ->label(__('filament-panels::resources.tikets.columns.title'))
                    ->placeholder(__('filament-panels::resources.tikets.placeholder.title'))
                    ->toggleable()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('priority')
                    ->label(__('filament-panels::resources.tikets.columns.priority'))
                    ->placeholder(__('filament-panels::resources.tikets.placeholder.priority'))
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'low'      => 'gray',
                        'medium'   => 'info',
                        'high'     => 'warning',
                        'critical' => 'danger',
                    })
                    ->formatStateUsing(fn(string $state): string =>
                        __('filament-panels::resources.tikets.enums.priority.' . $state)
                    )
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('status')
                    ->label(__('filament-panels::resources.tikets.columns.status'))
                    ->placeholder(__('filament-panels::resources.tikets.placeholder.status'))
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
                    )
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('resolved_at')
                    ->label(__('filament-panels::resources.tikets.columns.resolved_at'))
                    ->placeholder(__('filament-panels::resources.tikets.placeholder.resolved_at'))
                    ->dateTime()
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('closed_at')
                    ->label(__('filament-panels::resources.tikets.columns.closed_at'))
                    ->placeholder(__('filament-panels::resources.tikets.placeholder.closed_at'))
                    ->dateTime()
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('user_rating')
                    ->label(__('filament-panels::resources.tikets.columns.user_rating'))
                    ->placeholder(__('filament-panels::resources.tikets.placeholder.user_rating'))
                    ->numeric()
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label(__('filament-panels::resources.tikets.columns.created_at'))
                    ->placeholder(__('filament-panels::resources.tikets.placeholder.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('filament-panels::resources.tikets.columns.updated_at'))
                    ->placeholder(__('filament-panels::resources.tikets.placeholder.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
                SelectFilter::make('status')
                    ->label(__('filament-panels::resources.tikets.columns.status'))
                    ->options([
                        'new'         => __('filament-panels::resources.tikets.enums.status.new'),
                        'in_progress' => __('filament-panels::resources.tikets.enums.status.in_progress'),
                        'pending'     => __('filament-panels::resources.tikets.enums.status.pending'),
                        'resolved'    => __('filament-panels::resources.tikets.enums.status.resolved'),
                        'closed'      => __('filament-panels::resources.tikets.enums.status.closed'),
                        'cancelled'   => __('filament-panels::resources.tikets.enums.status.cancelled'),
                    ])
                    ->attribute('status'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                Action::make('changeStatus')
                    ->label(__('filament-panels::resources.tikets.actions.change_status'))
                    ->icon('heroicon-o-arrow-path')
                    ->color('primary')
                    ->visible(fn() => auth()->user()->hasRole(['admin', 'it_specialist']))
                    ->form([
                        Select::make('status')
                            ->label(__('filament-panels::resources.tikets.columns.status'))
                            ->options([
                                'in_progress' => __('filament-panels::resources.tikets.enums.status.in_progress'),
                                'pending'     => __('filament-panels::resources.tikets.enums.status.pending'),
                                'resolved'    => __('filament-panels::resources.tikets.enums.status.resolved'),
                                // можно добавить и другие, если нужно
                            ])
                            ->required(),
                    ])
                    ->action(function ($record, array $data) {
                        $record->update(['status' => $data['status']]);
                        if ($data['status'] === 'resolved' && ! $record->resolved_at) {
                            $record->update(['resolved_at' => now()]);
                        }
                        Notification::make()
                            ->title(__('filament-panels::resources.tikets.messages.status_changed'))
                            ->success()
                            ->send();
                    }),
            ])
            ->headerActions([
                // Экспорт всей таблицы (кнопка в заголовке)
                ExportAction::make()
                    ->label('Экспорт')
                    ->color('gray')
                    ->exports([
                        TicketExport::make()
                            ->fromTable()
                            ->except(['resolved_at', 'closed_at', 'deleted_at', 'updated_at'])
                            ->withFilename(fn() => 'Заявки_' . date('Y-m-d'))
                        // предложить формат (xlsx, csv, ...)
                            ->askForWriterType(),
                    ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                    ExportBulkAction::make()
                        ->color('gray')
                        ->label('Экспорт выбранных')
                        ->exports([
                            TicketExport::make()
                                ->fromTable()
                                ->except(['resolved_at', 'closed_at', 'deleted_at', 'updated_at'])
                                ->withFilename(fn() => 'Заявки_' . date('Y-m-d'))
                                ->askForWriterType(),
                        ]),
                ]),
            ])
            // Сообщения при пустой таблице
            ->emptyStateHeading(__('filament-panels::resources.share.empty_table_heading'))
            ->emptyStateDescription(__('filament-panels::resources.share.empty_table_description'));
    }
}
