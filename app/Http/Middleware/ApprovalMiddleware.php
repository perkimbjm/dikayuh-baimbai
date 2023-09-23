<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class ApprovalMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            if (!auth()->user()->approved) {
                // auth()->logout();
                Auth::logout();

                return redirect()->route('login')->with('message', trans('global.yourAccountNeedsAdminApproval'));
            }
        }

        return $next($request);
    }
}
