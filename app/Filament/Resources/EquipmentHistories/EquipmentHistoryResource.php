<?php
namespace App\Filament\Resources\EquipmentHistories;

use App\Filament\Resources\EquipmentHistories\Pages\CreateEquipmentHistory;
use App\Filament\Resources\EquipmentHistories\Pages\EditEquipmentHistory;
use App\Filament\Resources\EquipmentHistories\Pages\ListEquipmentHistories;
use App\Filament\Resources\EquipmentHistories\Pages\ViewEquipmentHistories;
use App\Filament\Resources\EquipmentHistories\Schemas\EquipmentHistoryForm;
use App\Filament\Resources\EquipmentHistories\Tables\EquipmentHistoriesTable;
use App\Models\EquipmentHistory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EquipmentHistoryResource extends Resource
{
    protected static ?string $model = EquipmentHistory::class;

    // Динамическая надпись
    public static function getNavigationLabel(): string
    {

        return __('filament-panels::resources.equipment-histories.navigation_label');
    }

    // Динамическаое название таблицы во единственном числе
    public static function getSingularLabel(): string
    {
        return __('filament-panels::resources.equipment-histories.singular_label');
    }

    // Динамическаое название таблицы во множественном числе
    public static function getPluralLabel(): string
    {
        return __('filament-panels::resources.equipment-histories.plural_label');
    }

    public static function getLabel(): string
    {
        return __('filament-panels::resources.equipment-histories.label');
    }

    // Динамическое название таблицы
    public function getTitle(): string
    {
        return __('filament-panels::resources.equipment-histories.table_title');
    }

    // Иконка
    protected static string|BackedEnum|null $navigationIcon = Heroicon::InboxStack;

    // Динамическая надпись
    public static function getNavigationGroup(): ?string
    {
        return __('filament-panels::resources.groups.equipments_group_label');
    }

    public static function form(Schema $schema): Schema
    {
        return EquipmentHistoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EquipmentHistoriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListEquipmentHistories::route('/'),
            'create' => CreateEquipmentHistory::route('/create'),
            'view'   => ViewEquipmentHistories::route('/{record}'),
            'edit'   => EditEquipmentHistory::route('/{record}/edit'),
        ];
    }
}
