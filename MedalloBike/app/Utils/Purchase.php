<?php

namespace App\Utils;

// Made by: David Lopera Londoño

use App\Models\CustomUser;
use App\Models\Item;
use App\Models\Order;
use App\Models\Product;

class Purchase
{
    /**
     * Process a purchase with products in session
     *
     * @param  int  $userId  User id
     * @param  array  $productsInSession  Array with products in session (product_id => quantity)
     * @return array Result of the purchase with status and order information
     */
    public static function process(int $userId, array $productsInSession): array
    {
        $user = CustomUser::find($userId);
        $products = Product::findMany(array_keys($productsInSession));

        // Calculate total price for all products in cart
        $total = Product::sumPricesByQuantities($products, $productsInSession);

        // Check if user has enough budget
        if ($user->getBudget() < $total) {
            return [
                'status' => 'insufficient_funds',
                'budget' => $user->getBudget(),
                'total' => $total,
            ];
        }

        // Create new order with initial values
        $order = new Order;
        $order->setUserId($userId);
        $order->setTotalPrice(0);
        $order->setState('pending');
        $order->save();

        // Reset total for accurate calculation
        $total = 0;

        // Process each product in cart
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

            // Update product stock
            $product->setStock($product->getStock() - $quantity);
            $product->save();
        }

        $order->setTotalPrice($total);
        $order->save();

        $user->setBudget($user->getBudget() - $total);
        $user->save();

        return [
            'status' => 'success',
            'order' => $order,
        ];
    }
}
