<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CheckLink
{
    public function handle($request, Closure $next) {
		if(Auth::user()){
			return redirect('/');
 		} return redirect('/');
    }
}
