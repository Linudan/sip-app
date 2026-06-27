<?php
namespace App\Filament\Resources\Tickets\Pages;

use App\Filament\Resources\Tickets\TicketResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTicket extends CreateRecord
{
    protected static string $resource = TicketResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Если статус не задан явно, ставим 'new'
        if (! isset($data['status'])) {
            $data['status'] = 'new';
        }
        return $data;
    }

}
