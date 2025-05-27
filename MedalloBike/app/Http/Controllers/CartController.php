<?php

namespace App\Http\Controllers;

// Made by: David Lopera Londoño

use App\Models\Product;
use App\Utils\Purchase;
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

        if (! $productsInSession) {
            return redirect()->route('cart.index');
        }

        $userId = Auth::id();
        $result = Purchase::process($userId, $productsInSession);

        if ($result['status'] === 'insufficient_funds') {
            return redirect()->route('cart.index')->with('error',
                __('messages.error.insufficient_funds', [
                    'budget' => number_format($result['budget'], 2),
                    'total' => number_format($result['total'], 2),
                ])
            );
        }

        if ($result['status'] === 'error') {
            return redirect()->route('cart.index')->with('error', __('messages.error.purchase_failed'));
        }

        $request->session()->forget('products');

        $viewData = [
            'title' => __('app.products_user.cart.purchase.title'),
            'subtitle' => __('app.products_user.cart.purchase.subtitle'),
            'order' => $result['order'],
        ];

        return view('cart.purchase')->with('viewData', $viewData);
    }
}
