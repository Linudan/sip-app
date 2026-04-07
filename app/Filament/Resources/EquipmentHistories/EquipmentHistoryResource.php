<?php

namespace App\Filament\Resources\EquipmentHistories;

use App\Filament\Resources\EquipmentHistories\Pages\CreateEquipmentHistory;
use App\Filament\Resources\EquipmentHistories\Pages\EditEquipmentHistory;
use App\Filament\Resources\EquipmentHistories\Pages\ListEquipmentHistories;
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

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

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
            'index' => ListEquipmentHistories::route('/'),
            'create' => CreateEquipmentHistory::route('/create'),
            'edit' => EditEquipmentHistory::route('/{record}/edit'),
        ];
    }
}
