<?php

namespace App\Filament\User\Resources\MyEquipment\Pages;

use App\Filament\User\Resources\MyEquipment\MyEquipmentResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ViewMyEquipment extends ViewRecord
{
    protected static string $resource = MyEquipmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Никаких действий — только просмотр
        ];
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Основная информация')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('category.name')
                            ->label('Категория')
                            ->placeholder('—'),
                        TextEntry::make('name')
                            ->label('Наименование')
                            ->placeholder('—'),
                        TextEntry::make('inventory_number')
                            ->label('Инвентарный номер')
                            ->placeholder('—'),
                        TextEntry::make('serial_number')
                            ->label('Серийный номер')
                            ->placeholder('—'),
                        TextEntry::make('manufacturer')
                            ->label('Производитель')
                            ->placeholder('—'),
                        TextEntry::make('model')
                            ->label('Модель')
                            ->placeholder('—'),
                        TextEntry::make('status')
                            ->label('Статус')
                            ->badge()
                            ->color(fn(string $state): string => match ($state) {
                                'in_use'      => 'success',
                                'in_stock'    => 'gray',
                                'in_repair'   => 'warning',
                                'written_off' => 'danger',
                            }),
                    ]),
                Section::make('Местоположение')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('currentUser.full_name_with_initials')
                            ->label('Текущий пользователь')
                            ->placeholder('—'),
                        TextEntry::make('currentDepartment.dep_name')
                            ->label('Отдел')
                            ->placeholder('—'),
                    ]),
                Section::make('Дополнительно')
                    ->schema([
                        TextEntry::make('notes')
                            ->label('Примечания')
                            ->markdown()
                            ->placeholder('—'),
                    ]),
            ]);
    }
}
