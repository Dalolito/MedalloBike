<?php

namespace App\Http\Controllers;

use App\Models\Order;
// Made by: David Lopera Londoño

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MyAccountController extends Controller
{
    public function orders(): View
    {
        $userId = Auth::id();

        $viewData = [];
        $viewData['title'] = __('app.myaccount.orders.title');
        $viewData['subtitle'] = __('app.myaccount.orders.subtitle');
        $viewData['orders'] = Order::with(['items.product'])->where('user_id', $userId)->get();

        return view('myaccount.orders')->with('viewData', $viewData);
    }
}
