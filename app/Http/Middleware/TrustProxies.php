<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /**
     * Доверенные прокси-серверы.
     *
     * @var array<int, string>|string|null
     */
    protected $proxies = '*'; // Доверяем всем прокси (для теста). В продакшене указать конкретный IP NPM.

    /**
     * Заголовки, используемые для определения реального IP/протокола.
     *
     * @var int
     */
    protected $headers =
        Request::HEADER_X_FORWARDED_FOR |
        Request::HEADER_X_FORWARDED_HOST |
        Request::HEADER_X_FORWARDED_PORT |
        Request::HEADER_X_FORWARDED_PROTO;
}