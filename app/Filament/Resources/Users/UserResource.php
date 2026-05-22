<?php
namespace App\Filament\Resources\Users;

use App\Filament\Resources\UserResource\RelationManagers\EquipmentItemsRelationManager;
use App\Filament\Resources\UserResource\RelationManagers\TicketsRelationManager;
use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Filament\Resources\Users\Pages\ViewUser;
use App\Filament\Resources\Users\Schemas\UserForm;
use App\Filament\Resources\Users\Tables\UsersTable;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    // ---НАСТРОЙКА ПЛАГИНА ГЛОБАЛЬНОГО ПОИСКА---

    // Включение глобального поиска (GlobalSearchModal) для ресурса
    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'surname', 'patronymic', 'email'];
    }

    // Изменение Title-а при поиске (чтобы не выводилось просто название)
    public static function getGlobalSearchResultTitle(Model $record): string
    {
        // Теперь $record гарантированно является экземпляром User, но тип параметра — Model
        return trim($record->surname . ' ' . $record->name . ' ' . $record->patronymic);
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

        return __('filament-panels::resources.users.navigation_label');
    }

    // Иконка в навигации
    protected static string|BackedEnum|null $navigationIcon = Heroicon::Users;

    // ---ЗАВЕРШЕНИЕ НАСТРОЙКИ НАВИГАЦИИ---

    // Динамическаое название таблицы во множественном числе
    public static function getPluralLabel(): string
    {
        return __('filament-panels::resources.users.plural_label');
    }

    // Динамическаое название таблицы во единственном числе
    public static function getSingularLabel(): string
    {
        return __('filament-panels::resources.users.singular_label');
    }

    public static function getLabel(): string
    {
        return __('filament-panels::resources.users.label');
    }

    // Динамическое название таблицы
    public function getTitle(): string
    {
        return __('filament-panels::resources.users.table_title');
    }

    // Мягкое удаление
    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function form(Schema $schema): Schema
    {
        return UserForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UsersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            EquipmentItemsRelationManager::class,
            TicketsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'view'   => ViewUser::route('/{record}'),
            'edit'   => EditUser::route('/{record}/edit'),
        ];
    }
}
