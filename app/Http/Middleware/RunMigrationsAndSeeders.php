<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class RunMigrationsAndSeeders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {

            Artisan::call('migrate', ['--force' => true]);


            Artisan::call('db:seed', ['--force' => true]);
        } catch (QueryException $e) {

            throw new \Exception("Errore durante l'esecuzione delle migrazioni e dei seed: " . $e->getMessage());
        }

        return $next($request);
    }
}
