<?php
namespace App\Filament\Resources\EquipmentHistories\Pages;

use App\Filament\Resources\EquipmentHistories\EquipmentHistoryResource;
use Filament\Actions;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ViewEquipmentHistories extends ViewRecord
{
    protected static string $resource = EquipmentHistoryResource::class;

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
                Section::make()
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('user.full_name_with_initials')
                            ->label(__('filament-panels::resources.equipment-histories.columns.user_name'))
                            ->placeholder(__('filament-panels::resources.equipment-histories.placeholder.user_name')),
                        TextEntry::make('equipmentItem.name')
                            ->label(__('filament-panels::resources.equipment-histories.columns.equipment_item_name'))
                            ->placeholder('—'),
                        TextEntry::make('action')
                            ->label(__('filament-panels::resources.equipment-histories.columns.action'))
                            ->badge()
                            ->color(fn(string $state): string => match ($state) {
                                'assigned'       => 'success',
                                'returned'       => 'warning',
                                'repaired'       => 'info',
                                'status_changed' => 'primary',
                                'created'        => 'gray',
                                'updated'        => 'gray',
                                default          => 'gray',
                            })
                            ->formatStateUsing(fn(string $state): string =>
                                __('filament-panels::resources.equipment-histories.enums.action.' . $state)
                            ),
                        TextEntry::make('desciprion')
                            ->label(__('filament-panels::resources.equipment-histories.columns.details'))
                            ->dateTime('d.m.Y H:i')
                            ->placeholder('—'),
                        TextEntry::make('created_at')
                            ->label(__('filament-panels::resources.equipment-histories.columns.created_at'))
                            ->dateTime('d.m.Y H:i')
                            ->placeholder('—'),
                        TextEntry::make('updated_at')
                            ->label(__('filament-panels::resources.equipment-histories.columns.updated_at'))
                            ->dateTime('d.m.Y H:i')
                            ->placeholder('—'),
                    ]),
            ]);
    }
}
