<?php

namespace App\Utils;

// Made by: David Lopera Londoño

use App\Models\CustomUser;
use App\Models\Item;
use App\Models\Order;
use App\Models\Product;

class Purchase
{
    public static function process(int $userId, array $productsInSession): array
    {
        try {
            $user = CustomUser::find($userId);
            $products = Product::findMany(array_keys($productsInSession));

            $order = new Order;
            $order->setUserId($userId);
            $order->setTotalPrice(0);
            $order->setState('pending');
            $order->save();

            $total = 0;
            $items = [];
            $stockAvailable = false;

            foreach ($products as $product) {
                $quantity = $productsInSession[$product->getId()];

                if ($quantity > $product->getStock()) {
                    $quantity = $product->getStock();
                }

                if ($quantity <= 0) {
                    continue;
                }

                $stockAvailable = true;

                $item = new Item;
                $item->setQuantity($quantity);
                $item->setTotalPrice($product->getPrice() * $quantity);
                $item->setProductId($product->getId());
                $item->setOrderId($order->getId());
                $item->save();
                $items[] = $item;

                $total += ($product->getPrice() * $quantity);

                $product->setStock($product->getStock() - $quantity);
                $product->save();
            }

            if (! $stockAvailable || $total <= 0) {
                $order->delete();

                return [
                    'status' => 'error',
                    'message' => __('messages.error.stock_not_available'),
                ];
            }

            $order->setTotalPrice($total);
            $order->save();

            return [
                'status' => 'success',
                'order' => $order,
            ];
        } catch (\Exception $e) {
            if (isset($order) && $order->getId()) {
                if (isset($items) && ! empty($items)) {
                    foreach ($items as $item) {
                        $item->delete();
                    }
                }

                $order->delete();
            }

            return [
                'status' => 'error',
                'message' => __('messages.error.purchase_failed'),
            ];
        }
    }
}
