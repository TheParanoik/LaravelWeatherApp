<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogPogodaResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle(Request $request, Closure $next)
     {


         return $next($request);
     }
    public function terminate($request, $response)
    {
        
        $forecast = $request->forecastjson;

        $city = $request->city;

        $current_temp = $request->current_temp;

        DB::table('log')->insert(['city' => $city, 'current_temp' => $current_temp, 'forecast' => $forecast]);
    }
}
