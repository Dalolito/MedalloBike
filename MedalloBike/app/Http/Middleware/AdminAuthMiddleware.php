<?php

namespace App\Http\Middleware;

// Made by: David Lopera Londoño

use App\Models\CustomUser;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // First check if user is authenticated
        if (Auth::check()) {
            // Get the authenticated user ID and find the CustomUser
            $userId = Auth::id();
            $customUser = CustomUser::find($userId);

            // Check if the user exists and is an admin
            if ($customUser && $customUser->getRole() == 'admin') {
                return $next($request);
            }
        }

        // If not authenticated or not an admin, redirect to home
        return redirect()->route('home.index');
    }
}
