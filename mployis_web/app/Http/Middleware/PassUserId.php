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
        if (Auth::guard('candidate')->check()) {
            $candidateId = Auth::guard('candidate')->id();

            // Check if the route has a candidate_id and if it matches the logged-in user
            if (!$request->route('candidate_id') || $request->route('candidate_id') != $candidateId) {
                // Redirect with correct candidate_id
                return redirect()->route(
                    $request->route()->getName(), 
                    array_merge($request->route()->parameters(), ['candidate_id' => $candidateId])
                );
            }

            // Inject the correct candidate_id into the route parameters
            $request->route()->setParameter('candidate_id', $candidateId);
        }

        if (Auth::guard('company')->check()) {
            $companyId = Auth::guard('company')->id();

            // Check if the route has a company_id and if it matches the logged-in user
            if (!$request->route('company_id') || $request->route('company_id') != $companyId) {
                // Redirect with correct company_id
                return redirect()->route(
                    $request->route()->getName(), 
                    array_merge($request->route()->parameters(), ['company_id' => $companyId])
                );
            }

            // Inject the correct company_id into the route parameters
            $request->route()->setParameter('company_id', $companyId);
        }

        return $next($request);
    }
}
