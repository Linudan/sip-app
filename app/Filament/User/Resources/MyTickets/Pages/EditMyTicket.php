<?php

namespace App\Filament\User\Resources\MyTickets\Pages;

use App\Filament\User\Resources\MyTickets\MyTicketResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditMyTicket extends EditRecord
{
    protected static string $resource = MyTicketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}