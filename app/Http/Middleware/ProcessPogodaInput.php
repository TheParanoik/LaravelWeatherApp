<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProcessPogodaInput
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
      $request->city = strtr($request->city, [
      'Ę' => 'E',
      'Ą' => 'A',
      'Ś' => 'S',
      'Ż' => 'Z',
      'Ź' => 'Z',
      'Ć' => 'C',
      'Ń' => 'N',
      'ę' => 'e',
      'ą' => 'a',
      'ś' => 's',
      'ł' => 'l',
      'ż' => 'z',
      'ź' => 'z',
      'ć' => 'c',
      'ń' => 'n',
      '-' => '',
      '_' => '',
      '`' => '',
      "'" => '',
      '"' => '',
      '!' => '',
      '@' => '',
      '#' => '',
      '$' => '',
      '%' => '',
      '^' => '',
      '&' => '',
      '*' => '',
      '(' => '',
      ')' => '',
      '/' => '',
      '?' => '',
      '<' => '',
      '>' => '',
      ] );

        return $next($request);
    }
}
