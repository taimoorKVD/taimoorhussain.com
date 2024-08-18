<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Symfony\Component\HttpFoundation\Response;

class LogVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();
        if (!Visitor::where('ip_address', $ip)->exists()) {
            $locationData = Location::get($ip);
            Visitor::create([
                'ip_address' => $ip,
                'user_agent' => $request->header('User-Agent'),
                'referrer' => $request->header('Referer'),
                'location' => $locationData ? $locationData->cityName . ', ' . $locationData->countryName : null,
            ]);
        }
        return $next($request);
    }
}
