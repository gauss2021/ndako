<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ChatMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (null !== auth()->user() and !empty(auth()->user()->name)) {
            return $next($request);
        } else {
            return redirect()->route('login')->with('message', 'Veuiller vous connecter afin de discuter avec le proprietaire');
        }
    }
}