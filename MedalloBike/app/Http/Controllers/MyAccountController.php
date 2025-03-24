<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
    public function orders()
    {
        $userId = Auth::id();

        $viewData = [];
        $viewData['title'] = __('app.myaccount.orders.title');
        $viewData['subtitle'] = __('app.myaccount.orders.subtitle');
        $viewData['orders'] = Order::with(['items.product'])->where('user_id', $userId)->get();

        return view('myaccount.orders')->with('viewData', $viewData);
    }
}
