<?php
namespace App\Filament\Resources\Departments\Pages;

use App\Filament\Resources\TicketCategories\TicketCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTicketCategory extends ViewRecord
{
    protected static string $resource = TicketCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
