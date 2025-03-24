<?php

namespace App\Http\Controllers;

use App\Models\CustomUser;
use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $total = 0;
        $productsInCart = [];
        $productsInSession = $request->session()->get('products');

        if ($productsInSession) {
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $total = Product::sumPricesByQuantities($productsInCart, $productsInSession);
        }

        $viewData = [];
        $viewData['title'] = __('app.products_user.cart.index.title');
        $viewData['subtitle'] = __('app.products_user.cart.index.subtitle');
        $viewData['total'] = $total;
        $viewData['products'] = $productsInCart;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(Request $request, int $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $quantity = $request->input('quantity');

        if ($quantity > $product->getStock()) {
            $quantity = $product->getStock();
        }

        $products = $request->session()->get('products', []);
        $products[$id] = $quantity;
        $request->session()->put('products', $products);

        return redirect()->route('cart.index');
    }

    public function delete(Request $request): RedirectResponse
    {
        $request->session()->forget('products');

        return back();
    }

    public function purchase(Request $request): View|RedirectResponse
    {
        $productsInSession = $request->session()->get('products');

        if ($productsInSession) {
            $userId = Auth::id();
            $customUser = CustomUser::find($userId);

            $productsInCart = Product::findMany(array_keys($productsInSession));
            $total = Product::sumPricesByQuantities($productsInCart, $productsInSession);

            if ($customUser->getBudget() < $total) {
                return redirect()->route('cart.index')->with('error',
                    __('messages.error.insufficient_funds', [
                        'budget' => number_format($customUser->getBudget(), 2),
                        'total' => number_format($total, 2),
                    ])
                );
            }

            $order = new Order;
            $order->setUserId($userId);
            $order->setTotalPrice(0);
            $order->setState('pending');
            $order->save();

            $total = 0;

            foreach ($productsInCart as $product) {
                $quantity = $productsInSession[$product->getId()];

                if ($quantity > $product->getStock()) {
                    $quantity = $product->getStock();
                }

                $item = new Item;
                $item->setQuantity($quantity);
                $item->setTotalPrice($product->getPrice() * $quantity);
                $item->setProductId($product->getId());
                $item->setOrderId($order->getId());
                $item->save();
                $total = $total + ($product->getPrice() * $quantity);

                $newStock = $product->getStock() - $quantity;
                $product->setStock($newStock);
                $product->save();
            }

            $order->setTotalPrice($total);
            $order->save();

            $newBudget = $customUser->getBudget() - $total;
            $customUser->setBudget($newBudget);
            $customUser->save();

            $request->session()->forget('products');

            $viewData = [];
            $viewData['title'] = __('app.products_user.cart.purchase.title');
            $viewData['subtitle'] = __('app.products_user.cart.purchase.subtitle');
            $viewData['order'] = $order;

            return view('cart.purchase')->with('viewData', $viewData);
        } 
        else 
        {
            return redirect()->route('cart.index');
        }
    }
}
