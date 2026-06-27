<?php
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/test-upload', function () {
    $ticket = Ticket::first();
    if (!$ticket) {
        return 'Нет заявки для теста';
    }
    $ticket->addMediaFromUrl('https://via.placeholder.com/150')->toMediaCollection('tickets_attachments');
    return 'Файл загружен к заявке ID ' . $ticket->id;
});

