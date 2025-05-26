<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\GoogleAuthService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    protected GoogleAuthService $googleAuthService;

    public function __construct(GoogleAuthService $googleAuthService)
    {
        $this->googleAuthService = $googleAuthService;
    }

    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = $this->googleAuthService->findOrCreateUser($googleUser);

            Auth::login($user);

            $redirectUrl = $this->googleAuthService->getRedirectUrl($user);

            $viewData = [];
            $viewData['message'] = $this->googleAuthService->getWelcomeMessage($user);

            return redirect($redirectUrl)->with('viewData', $viewData);

        } catch (Exception $e) {
            $viewData = [];
            $viewData['error'] = __('messages.google_auth_error');

            return redirect('/login')->with('viewData', $viewData);
        }
    }

    public function showError(): View
    {
        $viewData = [];
        $viewData['title'] = __('auth.error.title');
        $viewData['subtitle'] = __('auth.error.subtitle');
        $viewData['message'] = __('auth.error.google_connection_failed');

        return view('auth.error')->with('viewData', $viewData);
    }
}
