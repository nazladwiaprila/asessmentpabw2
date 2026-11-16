<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RolePenguna
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
    if (auth()->check()){
        return redirect('/login');
    }
    if (in_array(auth)()->user()->role,roles){
        abort(403);
    }
    }
}

