<?php

namespace App\Http\Middleware;

use App\Models\City;
use App\Models\Region;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLocationExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->checkRegion($request);
        $this->checkLocation($request);
        $this->checkNrOfRooms($request);

        return $next($request);
    }

    private function checkRegion(Request $request): void
    {
        $regionSlug = $request->route('regionSlug');
        if ($regionSlug) {
            $region = Region::where('slug', $regionSlug)->first();
            if (!$region) {
                abort(404);
            }
        }
    }

    private function checkLocation(Request $request): void
    {
        $locationSlug = $request->route('locationSlug');
        if ($locationSlug) {
            $city = City::where('slug', $locationSlug)->first();
            if (!$city) {
                abort(404);
            }
        }
    }

    private function checkNrOfRooms(Request $request): void
    {
        $numberOfRooms = $request->route('numberOfRooms');
        if ($numberOfRooms) {
            if (!array_key_exists($numberOfRooms, config('constants.apartment_types'))) {
                abort(404);
            }
        }
    }
}
