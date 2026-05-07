<?php

namespace App\Filament\User\Resources\MyTickets\Pages;

use App\Filament\User\Resources\MyTickets\MyTicketResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMyTicket extends CreateRecord
{
    protected static string $resource = MyTicketResource::class;
}
