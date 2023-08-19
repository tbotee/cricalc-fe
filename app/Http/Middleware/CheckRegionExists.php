<?php

namespace App\Http\Middleware;

use App\Models\Region;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRegionExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->checkRegion($request);

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
}
