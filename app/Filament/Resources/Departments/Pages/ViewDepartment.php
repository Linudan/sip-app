<?php
namespace App\Filament\Resources\Departments\Pages;

use App\Filament\Resources\Departments\DepartmentResource;
use Filament\Actions;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ViewDepartment extends ViewRecord
{
    protected static string $resource = DepartmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make()
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('dep_name')
                            ->label(__('filament-panels::resources.departments.columns.dep_name'))
                            ->placeholder('—'),
                        TextEntry::make('description')
                            ->label(__('filament-panels::resources.departments.columns.description'))
                            ->placeholder('—'),
                    ]),
            ]);
    }
}
