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

    // Динамическая надпись в навигации
    public static function getNavigationLabel(): string
    {

        return __('filament-panels::resources.equipment-assignments.navigation_label');
    }

    // Динамическаое название таблицы во единственном числе
    public static function getSingularLabel(): string
    {
        return __('filament-panels::resources.equipment-assignments.singular_label');
    }

    // Динамическаое название таблицы во множественном числе
    public static function getPluralLabel(): string
    {
        return __('filament-panels::resources.equipment-assignments.plural_label');
    }

    public static function getLabel(): string
    {
        return __('filament-panels::resources.equipment-assignments.label');
    }

    // Динамическое название таблицы
    public function getTitle(): string
    {
        return __('filament-panels::resources.equipment-assignments.table_title');
    }

    // Иконка
    protected static string|BackedEnum|null $navigationIcon = Heroicon::ArrowRightCircle;

    // Динамическая надпись
    public static function getNavigationGroup(): ?string
    {
        return __('filament-panels::resources.groups.equipments_group_label');
    }

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
            'index'  => ListEquipmentAssignments::route('/'),
            'create' => CreateEquipmentAssignment::route('/create'),
            'edit'   => EditEquipmentAssignment::route('/{record}/edit'),
        ];
    }
}
