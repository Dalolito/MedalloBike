<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Item;
use App\Models\CustomUser;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $total = 0;
        $productsInCart = [];
        $productsInSession = $request->session()->get('products');
        if ($productsInSession) {
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $total = Product::sumPricesByQuantities($productsInCart, $productsInSession);
        }
        $viewData = [];
        $viewData["title"] = __('app.cart.purchase.title');
        $viewData["subtitle"] = __('app.cart.purchase.subtitle');
        $viewData['total'] = $total;
        $viewData['products'] = $productsInCart;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(Request $request, $id)
    {
        $products = $request->session()->get('products');
        $products[$id] = $request->input('quantity');
        $request->session()->put('products', $products);

        return redirect()->route('cart.index');
    }

    public function delete(Request $request)
    {
        $request->session()->forget('products');

        return back();
    }

    public function purchase(Request $request)
    {
        $productsInSession = $request->session()->get("products");
        
        if ($productsInSession) {
            $userId = Auth::id();
            $customUser = CustomUser::find($userId);
            
            $order = new Order();
            $order->setUserId($userId);
            $order->setTotalPrice(0);
            $order->setState('pending'); 
            $order->save();
            
            $total = 0;
            $productsInCart = Product::findMany(array_keys($productsInSession));
            
            foreach ($productsInCart as $product) {
                $quantity = $productsInSession[$product->getId()];
                $item = new Item();
                $item->setQuantity($quantity);
                $item->setTotalPrice($product->getPrice() * $quantity);
                $item->setProductId($product->getId());
                $item->setOrderId($order->getId());
                $item->save();
                $total = $total + ($product->getPrice() * $quantity);
            }
            
            $order->setTotalPrice($total);
            $order->save();
            
            $newBudget = $customUser->getBudget() - $total;
            $customUser->setBudget($newBudget);
            $customUser->save();
            
            $request->session()->forget('products');
            
            $viewData = [];
            $viewData["title"] = "Purchase - Online Store";
            $viewData["subtitle"] = "Purchase Status";
            $viewData["order"] = $order;
            
            return view('cart.purchase')->with("viewData", $viewData);
        } 
        else 
        {
            return redirect()->route('cart.index');
        }
    }
}