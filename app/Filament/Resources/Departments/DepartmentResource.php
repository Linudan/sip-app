<?php
namespace App\Filament\Resources\Departments;

use App\Filament\Resources\Departments\RelationManagers\UsersRelationManager;
use App\Filament\Resources\Departments\Pages\CreateDepartment;
use App\Filament\Resources\Departments\Pages\EditDepartment;
use App\Filament\Resources\Departments\Pages\ListDepartments;
use App\Filament\Resources\Departments\Pages\ViewDepartment;
use App\Filament\Resources\Departments\Schemas\DepartmentForm;
use App\Filament\Resources\Departments\Tables\DepartmentsTable;
use App\Models\Department;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class DepartmentResource extends Resource
{
    protected static ?string $model = Department::class;

    // ---НАСТРОЙКА ПЛАГИНА ГЛОБАЛЬНОГО ПОИСКА---

    // Включение глобального поиска (GlobalSearchModal) для ресурса
    public static function getGloballySearchableAttributes(): array
    {
        return ['dep_name'];
    }

    // Изменение Title-а при поиске (чтобы не выводилось просто название)
    public static function getGlobalSearchResultTitle(Model $record): string
    {
        // Теперь $record гарантированно является экземпляром, но тип параметра — Model
        return $record->dep_name;
    }

    // ---ЗАВЕРШЕНИЕ НАСТРОЙКИ ПЛАГИНА ГЛОБАЛЬНОГО ПОИСКА---


    // ---НАСТРОЙКА НАВИГАЦИИ---

    // Группа навигации
    public static function getNavigationGroup(): ?string
    {
        return __('filament-panels::resources.groups.users_group_label');
    }

    // Динамическая надпись в навигации
    public static function getNavigationLabel(): string
    {

        return __('filament-panels::resources.departments.navigation_label');
    }

    // Иконка в навигации
    protected static string|BackedEnum|null $navigationIcon = Heroicon::BuildingOffice2;

    // ---ЗАВЕРШЕНИЕ НАСТРОЙКИ НАВИГАЦИИ---


    // Динамическаое название таблицы во единственном числе
    public static function getSingularLabel(): string
    {
        return __('filament-panels::resources.departments.singular_label');
    }

    // Динамическаое название таблицы во множественном числе
    public static function getPluralLabel(): string
    {
        return __('filament-panels::resources.departments.plural_label');
    }

    public static function getLabel(): string
    {
        return __('filament-panels::resources.departments.label');
    }

    // Динамическое название таблицы
    public function getTitle(): string
    {
        return __('filament-panels::resources.departments.table_title');
    }


    public static function form(Schema $schema): Schema
    {
        return DepartmentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DepartmentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            UsersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListDepartments::route('/'),
            'create' => CreateDepartment::route('/create'),
            'view'   => ViewDepartment::route('/{record}'),
            'edit'   => EditDepartment::route('/{record}/edit'),
        ];
    }
}
