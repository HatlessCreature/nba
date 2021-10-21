<?php

namespace App\Http\Middleware;

use Closure;

class ForbiddenWordFilter
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

        foreach (["hate", "idiot", "stupid"] as $forbiddenWord)
            // dd($forbiddenWord, $request->content);
            if (stripos($request->content, $forbiddenWord) > -1) {
                // dd($forbiddenWord, $request->content);
                return response()->view('forbidden-comment');
            }

        return $next($request);
    }
}
