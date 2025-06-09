<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Protects against clickjacking
        $response->headers->set('X-Frame-Options', 'DENY');

        // Prevent XSS Attacks
        $response->headers->set('X-Content-Type-Options', 'nosniffts');

        // Prevent some XSS Attacks
        $response->headers->set('Referrer-Policy', 'no-referrer');

        // Enforce HTTPS
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');

        // Content Security Policy
        $response->headers->set('Permissions-Policy', 'geolocation=()');

        return $response;
    }
}
