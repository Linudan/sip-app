<?php
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/debug-session', function () {
    return [
        'user' => auth()->user() ? auth()->user()->email : null,
        'session_id' => session()->getId(),
        'cookies' => request()->cookies->all(),
        'headers' => [
            'host' => request()->getHost(),
            'scheme' => request()->getScheme(),
            'x-forwarded-proto' => request()->header('X-Forwarded-Proto'),
            'x-forwarded-host' => request()->header('X-Forwarded-Host'),
        ]
    ];
})->middleware('auth');

