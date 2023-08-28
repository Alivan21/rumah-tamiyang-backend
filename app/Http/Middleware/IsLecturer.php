<?php

namespace App\Http\Middleware;

use App\Commons\Enums\RoleEnum;
use Closure;
use Illuminate\Http\Request;

class IsLecturer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role != RoleEnum::DOSEN->value){
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        return $next($request);
    }
}
