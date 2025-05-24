<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    /**
     * Redirect to Google for authentication
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google callback
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            $user = User::where('email', $googleUser->email)->first();
            
            if ($user) {
                Auth::login($user);
            } else {
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => Hash::make(uniqid()),
                    'email_verified_at' => now(),
                    'role' => 'user',
                    'budget' => 5000.00,
                ]);
                
                Auth::login($user);
            }
            
            if ($user->getRole() === 'admin') {
                return redirect('/admin/home')->with('success', 'Bienvenido, ' . $user->getName());
            }
            
            return redirect('/')->with('success', 'Bienvenido, ' . $user->getName());
            
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Error al iniciar sesión con Google. Inténtalo de nuevo.');
        }
    }
}