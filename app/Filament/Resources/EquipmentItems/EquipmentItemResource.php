<?php

namespace App\Filament\Resources\EquipmentItems;

use App\Filament\Resources\EquipmentItems\Pages\CreateEquipmentItem;
use App\Filament\Resources\EquipmentItems\Pages\EditEquipmentItem;
use App\Filament\Resources\EquipmentItems\Pages\ListEquipmentItems;
use App\Filament\Resources\EquipmentItems\Schemas\EquipmentItemForm;
use App\Filament\Resources\EquipmentItems\Tables\EquipmentItemsTable;
use App\Models\EquipmentItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class EquipmentItemResource extends Resource
{
    protected static ?string $model = EquipmentItem::class;

    protected static ?int $navigationSort = 3;

    // Динамическая надпись
    public static function getNavigationLabel(): string {

    return __('filament-panels::resources.equipments.navigation_label');
    }

    // Иконка
    protected static string|BackedEnum|null $navigationIcon = Heroicon::ComputerDesktop;

    // Динамическая надпись
    public static function getNavigationGroup(): ?string {
    return __('filament-panels::resources.groups.equipments_group_label');
    }

    public static function form(Schema $schema): Schema
    {
        return EquipmentItemForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EquipmentItemsTable::configure($table);
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
            'index' => ListEquipmentItems::route('/'),
            'create' => CreateEquipmentItem::route('/create'),
            'edit' => EditEquipmentItem::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
