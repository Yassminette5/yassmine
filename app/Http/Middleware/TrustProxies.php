<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /**
     * Les proxies de confiance (null = tous).
     */
    protected $proxies;

    /**
     * En-têtes utilisés pour déterminer l’adresse IP réelle du client.
     */
    protected $headers = Request::HEADER_X_FORWARDED_FOR;
}
