<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminCheck
{
    public function handle($request, Closure $next) {
		if(Auth::user()){
			return redirect('admin/home');
 		} else {
			return redirect('admin/login');
		}
    }
}
