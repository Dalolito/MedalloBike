<?php

namespace App\Http\Controllers; 
 
use Illuminate\Http\Request; use App\Models\Order; use Illuminate\Support\Facades\Auth; 
 
class MyAccountController extends Controller 
{ 
    public function orders() 
    {
        $userId = Auth::id();
        
        $viewData = []; 
        $viewData["title"] = "My Orders - Online Store"; 
        $viewData["subtitle"] = "My Orders"; 
        $viewData["orders"] = Order::with(['items.product'])->where('user_id', $userId)->get(); 
        
        return view('myaccount.orders')->with("viewData", $viewData); 
    } 
} 
