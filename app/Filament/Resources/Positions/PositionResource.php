<?php
namespace App\Filament\Resources\Positions;

use App\Filament\Resources\PositionResource\RelationManagers\UsersRelationManager;
use App\Filament\Resources\Positions\Pages\CreatePosition;
use App\Filament\Resources\Positions\Pages\EditPosition;
use App\Filament\Resources\Positions\Pages\ListPositions;
use App\Filament\Resources\Positions\Pages\ViewPosition;
use App\Filament\Resources\Positions\Schemas\PositionForm;
use App\Filament\Resources\Positions\Tables\PositionsTable;
use App\Models\Position;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class PositionResource extends Resource
{
    protected static ?string $model = Position::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Briefcase;

    // Включение глобального поиска (GlobalSearchModal) для ресурса
    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }

    // Изменение Title-а при поиске (чтобы не выводилось просто название)
    public static function getGlobalSearchResultTitle(Model $record): string
    {
        // Теперь $record гарантированно является экземпляром, но тип параметра — Model
        return $record->name;
    }


    public static function getNavigationLabel(): string
    {
        return __('filament-panels::resources.positions.navigation_label');
    }

    public static function getSingularLabel(): string
    {
        return __('filament-panels::resources.positions.singular_label');
    }

    public static function getPluralLabel(): string
    {
        return __('filament-panels::resources.positions.plural_label');
    }

    public static function getLabel(): string
    {
        return __('filament-panels::resources.positions.label');
    }

    public function getTitle(): string
    {
        return __('filament-panels::resources.positions.table_title');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('filament-panels::resources.groups.users_group_label');
    }

    public static function form(Schema $schema): Schema
    {
        return PositionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PositionsTable::configure($table);
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
            'index'  => ListPositions::route('/'),
            'create' => CreatePosition::route('/create'),
            'view'   => ViewPosition::route('/{record}'),
            'edit'   => EditPosition::route('/{record}/edit'),
        ];
    }
}
