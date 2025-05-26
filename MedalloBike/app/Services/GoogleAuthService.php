<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Contracts\User as SocialiteUser;

class GoogleAuthService
{
    public function findOrCreateUser(SocialiteUser $googleUser): User
    {
        $user = User::where('email', $googleUser->getEmail())->first();

        if ($user) {
            return $user;
        }

        return User::create([
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'password' => Hash::make(uniqid()),
            'email_verified_at' => now(),
            'role' => 'user',
            'budget' => 5000.00,
        ]);
    }

    public function getRedirectUrl(User $user): string
    {
        if ($user->getRole() === 'admin') {
            return '/admin/home';
        }

        return '/';
    }

    public function getWelcomeMessage(User $user): string
    {
        return __('auth.google.welcome_message', ['name' => $user->getName()]);
    }
}
