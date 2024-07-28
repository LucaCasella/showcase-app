<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class RunCommandStorageLink
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function handle(Request $request, Closure $next)
    {
        try {

            Log::info("Running command storage");
            Artisan::call('storage:link', ['--force' => true]);
            Log::info("Running command storage successfully");

        } catch (QueryException $e) {
            Log::info("Running command storage worng");

            throw new \Exception("Errore storage: " . $e->getMessage());

        }

        return $next($request);
    }
}
