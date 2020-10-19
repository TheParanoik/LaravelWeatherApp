<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LogPogodaResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function terminate($request, $response)
    {

        // $city = $request->city;
        // $forecast = $response->forecast;
        // $current_temp = $response->current_temp;

        //DB::table('log')->insert(['city' => $city, 'current_temp' => $current_temp, 'forecast' => $forecast]);
    }
}
