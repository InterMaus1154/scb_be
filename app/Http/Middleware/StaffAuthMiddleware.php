<?php

namespace App\Http\Middleware;

use App\Models\Staff;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StaffAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /*
         * This middleware prevents to perform actions that can only be permitted by staff
         * */
        $user = \Auth::user();
        if (!$user || !($user instanceof Staff)) {
            return \response()->json([
                'message' => 'Unauthorized action',
                'status' => 401
            ], 401);
        }

        return $next($request);
    }
}
