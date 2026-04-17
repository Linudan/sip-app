<?php
namespace App\Filament\Resources\EquipmentItems\Tables;

use App\Models\EquipmentItem;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class EquipmentItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('deleted_at')
                    ->label(__('filament-panels::resources.equipments.columns.deleted_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('category.name')
                    ->label(__('filament-panels::resources.equipments.columns.category_name'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('name')
                    ->label(__('filament-panels::resources.equipments.columns.name'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('inventory_number')
                    ->label(__('filament-panels::resources.equipments.columns.inventory_number'))
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('serial_number')
                    ->label(__('filament-panels::resources.equipments.columns.serial_number'))
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('manufacturer')
                    ->label(__('filament-panels::resources.equipments.columns.manufacturer'))
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('model')
                    ->label(__('filament-panels::resources.equipments.columns.model'))
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('status')
                    ->label(__('filament-panels::resources.equipments.columns.status'))
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('purchase_date')
                    ->label(__('filament-panels::resources.equipments.columns.purchase_date'))
                    ->date()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('warranty_until')
                    ->label(__('filament-panels::resources.equipments.columns.warranty_until'))
                    ->date()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('purchase_price')
                    ->label(__('filament-panels::resources.equipments.columns.purchase_price'))
                    ->money()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('currentUser.name')
                    ->label(__('filament-panels::resources.equipments.columns.current_user'))
                    ->placeholder(__('filament-panels::resources.equipments.placeholder.current_user'))
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('currentDepartment.dep_name')
                    ->label(__('filament-panels::resources.equipments.columns.current_department'))
                    ->placeholder(__('filament-panels::resources.equipments.placeholder.current_department'))
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->label(__('filament-panels::resources.equipments.columns.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('filament-panels::resources.equipments.columns.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
                Action::make('assign')
                    ->label(__('filament-panels::resources.equipments.actions.assign'))
                    ->icon('heroicon-o-user-plus')
                    ->modalHeading(__('filament-panels::resources.equipments.modals.assign_user'))
                    ->modalSubmitActionLabel(__('filament-panels::resources.equipments.actions.assign'))
                    ->form([
                        Select::make('user_id')
                            ->label(__('filament-panels::resources.users.singular_label'))
                            ->options(User::pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                    ])
                    ->action(function (EquipmentItem $record, array $data): void {
                        if ($record->current_user_id && $record->current_user_id !== $data['user_id']) {
                            Notification::make()
                                ->title(__('filament-panels::resources.equipments.messages.already_assigned'))
                                ->danger()
                                ->send();
                            return;
                        }
                        $user = User::find($data['user_id']);
                        $record->update([
                            'current_user_id'       => $user->id,
                            'current_department_id' => $user->department_id,
                            'status'                => 'in_use',
                        ]);
                        Notification::make()
                            ->title(__('filament-panels::resources.equipments.messages.assigned_success'))
                            ->success()
                            ->send();
                    })
                    ->visible(fn(EquipmentItem $record) => in_array($record->status, ['in_stock', 'in_repair'])),
                Action::make('return')
                    ->label(__('filament-panels::resources.equipments.actions.return'))
                    ->icon('heroicon-o-arrow-uturn-left')
                    ->color('warning')
                    ->requiresConfirmation()
                    ->action(function (EquipmentItem $record): void {
                        $record->update([
                            'current_user_id'       => null,
                            'current_department_id' => null,
                            'status'                => 'in_stock',
                        ]);
                        Notification::make()
                            ->title(__('filament-panels::resources.equipments.messages.returned_success'))
                            ->success()
                            ->send();
                    })
                    ->visible(fn(EquipmentItem $record) => ! is_null($record->current_user_id)),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                DeleteBulkAction::make(),
                ForceDeleteBulkAction::make(),
                RestoreBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading(__('filament-panels::resources.share.empty_table_heading'))
            ->emptyStateDescription(__('filament-panels::resources.share.empty_table_description'));
    }
}
