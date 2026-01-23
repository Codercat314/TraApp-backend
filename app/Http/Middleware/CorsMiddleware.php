<?php
//100% vibecoded 
namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    public function handle($request, Closure $next)
    {
        $headers = [
            'Access-Control-Allow-Origin'      => 'http://localhost:5176', // Your Vue dev server
            'Access-Control-Allow-Methods'     => 'POST, GET, OPTIONS, PUT, DELETE, PATCH',
            'Access-Control-Allow-Credentials' => 'true',
            'Access-Control-Max-Age'           => '86400',
            'Access-Control-Allow-Headers'     => 'Content-Type, Authorization, X-Requested-With, Accept, Origin'
        ];

        // Handle preflight OPTIONS request
        if ($request->isMethod('OPTIONS')) {
            return response()->json('OK', 200, $headers);
        }

        $response = $next($request);

        foreach ($headers as $key => $value) {
            $response->header($key, $value);
        }

        return $response;
    }
}