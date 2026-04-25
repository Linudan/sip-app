<?php
namespace App\Observers;

use App\Models\Ticket;

class TicketObserver
{
    /**
     * Handle the Ticket "created" event.
     */
    public function creating(Ticket $ticket): void
    {
        if (empty($ticket->ticket_number)) {
            $date = now()->format('dmy');                  // 250426
            $lastId = Ticket::withTrashed()->max('id') ?? 0;
            $nextNumber = $lastId + 1;
            $ticket->ticket_number = sprintf('TICKET-%03d-%s', $nextNumber, $date);
        }
    }

    /**
     * Handle the Ticket "updated" event.
     */
    public function updating(Ticket $ticket): void
    {
        // Если статус меняется на 'closed' и closed_at ещё не установлено
        if ($ticket->isDirty('status') && $ticket->status === 'closed' && is_null($ticket->closed_at)) {
            $ticket->closed_at = now();
        }

        // Если статус меняется на 'resolved' и resolved_at ещё не установлено
        if ($ticket->isDirty('status') && $ticket->status === 'resolved' && is_null($ticket->resolved_at)) {
            $ticket->resolved_at = now();
        }
    }

    /**
     * Handle the Ticket "deleted" event.
     */
    public function deleted(Ticket $ticket): void
    {
        //
    }

    /**
     * Handle the Ticket "restored" event.
     */
    public function restored(Ticket $ticket): void
    {
        //
    }

    /**
     * Handle the Ticket "force deleted" event.
     */
    public function forceDeleted(Ticket $ticket): void
    {
        //
    }
}
