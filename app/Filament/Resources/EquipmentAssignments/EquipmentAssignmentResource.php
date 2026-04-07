<?php

namespace App\Filament\Resources\EquipmentAssignments;

use App\Filament\Resources\EquipmentAssignments\Pages\CreateEquipmentAssignment;
use App\Filament\Resources\EquipmentAssignments\Pages\EditEquipmentAssignment;
use App\Filament\Resources\EquipmentAssignments\Pages\ListEquipmentAssignments;
use App\Filament\Resources\EquipmentAssignments\Schemas\EquipmentAssignmentForm;
use App\Filament\Resources\EquipmentAssignments\Tables\EquipmentAssignmentsTable;
use App\Models\EquipmentAssignment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EquipmentAssignmentResource extends Resource
{
    protected static ?string $model = EquipmentAssignment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return EquipmentAssignmentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EquipmentAssignmentsTable::configure($table);
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
            'index' => ListEquipmentAssignments::route('/'),
            'create' => CreateEquipmentAssignment::route('/create'),
            'edit' => EditEquipmentAssignment::route('/{record}/edit'),
        ];
    }
}
