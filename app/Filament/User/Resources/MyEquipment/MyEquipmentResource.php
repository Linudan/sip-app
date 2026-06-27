<?php
namespace App\Filament\User\Resources\MyEquipment;

use App\Filament\User\Resources\MyEquipment\Pages\ListMyEquipment;
use App\Filament\User\Resources\MyEquipment\Pages\ViewMyEquipment;
use App\Models\EquipmentItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class MyEquipmentResource extends Resource
{
    protected static ?string $model = EquipmentItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ComputerDesktop;

    public static function getLabel(): string
    {
        return __('filament-panels::resources.equipments.label');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-panels::user-panel.my_equipment.navigation_label');
    }

    public static function getPluralLabel(): string
    {
        return __('filament-panels::user-panel.my_equipment.plural_label');
    }

    public static function getSingularLabel(): string
    {
        return __('filament-panels::user-panel.my_equipment.singular_label');
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function getEloquentQuery(): Builder
    {
        $user = Auth::user();
        // Базовый запрос: оборудование, закреплённое за пользователем
        $query = parent::getEloquentQuery()->where('current_user_id', $user->id);

        // Если у пользователя есть отдел – добавляем оборудование отдела
        if ($user->department_id) {
            $query->orWhere(function ($q) use ($user) {
                $q->where('current_department_id', $user->department_id)
                    ->whereNull('current_user_id');
            });
        }

        return $query;
    }

    public static function table(Table $table): Table
    {
        return \App\Filament\User\Resources\MyEquipment\Tables\MyEquipmentTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMyEquipment::route('/'),
            'view'  => ViewMyEquipment::route('/{record}'),
        ];
    }
}
