<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\HttpFoundation\Response;

class SPARequestAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('Authorization');

        if (!$token) {
            return response()->json(['error' => 'Token mancante'], 401);
        }

        try {
            $data = Crypt::decrypt($token);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Token non valido'], 401);
        }


        if (Carbon::now()->timestamp > $data['exp']) {
            return response()->json(['error' => 'Token scaduto'], 401);
        }
        return $next($request);
    }
}
