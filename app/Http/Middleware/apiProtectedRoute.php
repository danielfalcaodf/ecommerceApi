<?php

namespace App\Http\Middleware;


use Closure;
use Exception;

use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;


class apiProtectedRoute extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = [

            'type' => 'error',

            'code' => 401
        ];
        try {
            $user = JWTAuth::parseToken()->authenticate();
            if ($user == false) {
                # code...
                auth('api')->logout();
                throw new TokenExpiredException("Token is Expired", 1);
            }
        } catch (Exception $exception) {
            if ($exception instanceof TokenInvalidException) {
                $response['massage'] = "Token is Invalid";
                return response()->json($response, 401);
            } else if ($exception instanceof TokenExpiredException) {
                $response['massage'] = "Token is Expired";
                return response()->json($response, 401);
            } else {
                $response['massage'] = "Authorization Token not found";
                return response()->json($response, 401);
            }
        }
        return $next($request);
    }
}