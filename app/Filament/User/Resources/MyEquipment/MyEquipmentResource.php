<?php

namespace App\Filament\User\Resources\MyEquipment;

use App\Models\EquipmentItem;
use App\Filament\User\Resources\MyEquipment\Pages\ListMyEquipment;
use App\Filament\User\Resources\MyEquipment\Pages\ViewMyEquipment;
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
        return parent::getEloquentQuery()
            ->where(function (Builder $query) {
                $user = Auth::user();
                $query->where('current_user_id', $user->id)
                      ->orWhere(function ($q) use ($user) {
                          $q->where('current_department_id', $user->department_id)
                            ->whereNull('current_user_id');
                      });
            });
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
