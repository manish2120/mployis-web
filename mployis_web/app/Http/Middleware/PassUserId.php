<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PassUserId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard('candidate')->check()) {
            $candidateId = Auth::guard('candidate')->id();

             if (!$request->route('candidate_id') || $request->route('candidate_id') != $candidateId) {
            // Append the correct candidate_id to the route and redirect
            return redirect()->route($request->route()->getName(), ['candidate_id' => $candidateId]);
        }

            // Adds the user id to the request data
            $request->merge(['candidate_id' => $candidateId]);
        }
        return $next($request);
    }
}
