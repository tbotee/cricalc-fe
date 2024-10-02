<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Jenssegers\Agent\Agent;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();
        $userAgent = $request->header('User-Agent');
        $timestamp = now()->format('Y-m-d');
        $language = $request->header('Accept-Language', 'en');
        $deviceType = $this->getDeviceType($userAgent);

        $visitorDataString = implode('|', [
            $ip,
            $userAgent,
            $deviceType,
            $timestamp,
            $language
        ]);

        $hashedVisitorData = hash('sha256', $visitorDataString);

        $visitor = Visitor::where('date', $timestamp)->where('data', $hashedVisitorData)->first();

        if ($visitor) {
            $visitor->increment('navigation_count');
        } else {
            Visitor::create([
                'data' => $hashedVisitorData,
                'date' => $timestamp,
                'navigation_count' => 1
            ]);
        }

        return $next($request);
    }

    private function getDeviceType($userAgent)
    {
        // Basic detection of mobile vs desktop
        if (preg_match('/mobile/i', $userAgent)) {
            return 'Mobile';
        } else {
            return 'Desktop';
        }
    }
}
