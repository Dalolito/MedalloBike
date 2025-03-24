<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CustomUserController extends Controller
{
    public function show(): View
    {
        $viewData = [
            'title' => 'Mi Cuenta',
            'user' => Auth::user(),
        ];

        return view('customuser.show')->with('viewData', $viewData);
    }
}
