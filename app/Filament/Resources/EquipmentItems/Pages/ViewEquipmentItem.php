<?php
namespace App\Filament\Resources\EquipmentItems\Pages;

use App\Filament\Resources\EquipmentItems\EquipmentItemResource;
use Filament\Actions;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\KeyValueEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ViewEquipmentItem extends ViewRecord
{
    protected static string $resource = EquipmentItemResource::class;

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
                Section::make('Основная информация')
                    ->icon('heroicon-o-computer-desktop')
                    ->collapsible()
                    ->compact()
                    ->columns(2)
                    ->schema([
                        TextEntry::make('category.name')
                            ->label(__('filament-panels::resources.equipments.columns.category_name'))
                            ->placeholder('—'),
                        TextEntry::make('name')
                            ->label(__('filament-panels::resources.equipments.columns.name'))
                            ->placeholder('—'),
                        TextEntry::make('inventory_number')
                            ->label(__('filament-panels::resources.equipments.columns.inventory_number'))
                            ->badge()
                            ->color('gray')
                            ->placeholder('—'),
                        TextEntry::make('serial_number')
                            ->label(__('filament-panels::resources.equipments.columns.serial_number'))
                            ->placeholder('—'),
                        TextEntry::make('manufacturer')
                            ->label(__('filament-panels::resources.equipments.columns.manufacturer'))
                            ->placeholder('—'),
                        TextEntry::make('model')
                            ->label(__('filament-panels::resources.equipments.columns.model'))
                            ->placeholder('—'),
                        TextEntry::make('status')
                            ->label(__('filament-panels::resources.equipments.columns.status'))
                            ->badge()
                            ->color(fn(string $state): string => match ($state) {
                                'in_stock'    => 'gray',
                                'in_use'      => 'success',
                                'in_repair'   => 'warning',
                                'written_off' => 'danger',
                                default       => 'secondary',
                            })
                            ->formatStateUsing(fn(string $state): string =>
                                __("filament-panels::resources.equipments.enums.status.{$state}")
                            ),
                    ]),

                // Секция "Подробные характеристики" с универсальным отображением JSON/текста
                Section::make('Подробные характеристики')
                    ->icon('heroicon-o-document-chart-bar')
                    ->collapsible()
                    ->collapsed(true)
                    ->compact()
                    ->schema([
                        TextEntry::make('specifications')
                            ->label('')
                            ->formatStateUsing(function ($state) {
                                if (empty($state)) {
                                    return '<em>Нет характеристик</em>';
                                }
                                // Если state уже массив (из каста), или строка JSON
                                $data = is_string($state) ? json_decode($state, true) : $state;
                                if (is_array($data) && !empty($data)) {
                                    $html = '<div class="grid grid-cols-2 gap-2">';
                                    foreach ($data as $key => $value) {
                                        $html .= '<div><strong>' . e($key) . '</strong></div><div>' . e($value) . '</div>';
                                    }
                                    $html .= '</div>';
                                    return $html;
                                }
                                // Если не массив, выводим как обычный текст
                                return nl2br(e($state));
                            })
                            ->html()
                            ->columnSpanFull(),
                    ]),

                Section::make('Финансовые данные')
                    ->icon('heroicon-o-banknotes')
                    ->collapsible()
                    ->compact()
                    ->columns(2)
                    ->schema([
                        TextEntry::make('purchase_date')
                            ->label(__('filament-panels::resources.equipments.columns.purchase_date'))
                            ->date('d.m.Y')
                            ->placeholder('—'),
                        TextEntry::make('warranty_until')
                            ->label(__('filament-panels::resources.equipments.columns.warranty_until'))
                            ->date('d.m.Y')
                            ->placeholder('—'),
                        TextEntry::make('purchase_price')
                            ->label(__('filament-panels::resources.equipments.columns.purchase_price'))
                            ->money('RUB')
                            ->placeholder('—'),
                    ]),

                Section::make('Где находится')
                    ->icon('heroicon-o-map-pin')
                    ->collapsible()
                    ->compact()
                    ->columns(2)
                    ->schema([
                        TextEntry::make('currentUser.full_name_with_initials')
                            ->label(__('filament-panels::resources.equipments.columns.current_user'))
                            ->placeholder('Не привязан'),
                        TextEntry::make('currentDepartment.dep_name')
                            ->label(__('filament-panels::resources.equipments.columns.current_department'))
                            ->placeholder('Не указан'),
                    ]),

                Section::make('Дополнительно')
                    ->icon('heroicon-o-document-text')
                    ->collapsible()
                    ->compact()
                    ->schema([
                        TextEntry::make('notes')
                            ->label(__('filament-panels::resources.equipments.columns.notes'))
                            ->markdown()
                            ->placeholder('Нет примечаний')
                            ->columnSpanFull(),
                        ImageEntry::make('qr_code_image')
                            ->label('QR-код')
                            ->height(150)
                            ->width(150)
                            ->visible(fn($record) => filled($record->qr_code_image))
                            ->columnSpanFull(),
                        TextEntry::make('qr_code_hash')
                            ->label(__('filament-panels::resources.equipments.columns.qr_code_hash'))
                            ->copyable()
                            ->placeholder('Не задан')
                            ->visible(fn($record) => blank($record->qr_code_image))
                            ->columnSpanFull(),
                    ]),

                Section::make('Системная информация')
                    ->icon('heroicon-o-clock')
                    ->collapsible()
                    ->compact()
                    ->columns(2)
                    ->schema([
                        TextEntry::make('created_at')
                            ->label(__('filament-panels::resources.equipments.columns.created_at'))
                            ->dateTime('d.m.Y H:i')
                            ->placeholder('—'),
                        TextEntry::make('updated_at')
                            ->label(__('filament-panels::resources.equipments.columns.updated_at'))
                            ->dateTime('d.m.Y H:i')
                            ->placeholder('—'),
                    ]),
            ]);
    }
}
