<?php

namespace App\Services;

// Made by: David Lopera Londoño
use App\Models\CustomUser;
use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class PurchaseService
{
    /**
     * procces purchase of session products
     *
     * @param  int  $userId  User id
     * @param  array  $productsInSession  Array with products in session
     * @return array Result of the purchase
     */
    public function processPurchase(int $userId, array $productsInSession): array
    {
        $user = CustomUser::find($userId);
        $products = Product::findMany(array_keys($productsInSession));
        $total = Product::sumPricesByQuantities($products, $productsInSession);

        if ($user->getBudget() < $total) {
            return [
                'status' => 'insufficient_funds',
                'budget' => $user->getBudget(),
                'total' => $total,
            ];
        }

        DB::beginTransaction();

        $order = new Order;
        $order->setUserId($userId);
        $order->setTotalPrice(0);
        $order->setState('pending');
        $order->save();

        $total = 0;

        foreach ($products as $product) {
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

            $total += ($product->getPrice() * $quantity);

            $product->setStock($product->getStock() - $quantity);
            $product->save();
        }

        $order->setTotalPrice($total);
        $order->save();

        $user->setBudget($user->getBudget() - $total);
        $user->save();

        DB::commit();

        return [
            'status' => 'success',
            'order' => $order,
        ];

    }
}
