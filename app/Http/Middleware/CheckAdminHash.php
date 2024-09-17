<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminHash
{
    public function handle(Request $request, Closure $next): Response
    {
        $hash = $request->segment(3);

        if ($request->routeIs('login') && !$hash) {
            return redirect('/');
        }

        if ($hash) {
            $user = User::where('hash', $hash)->first();

            if (!$user) {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
