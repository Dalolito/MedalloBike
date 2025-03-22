<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the primary key of the item
     * $this->attributes['quantity'] - int - contains the quantity of the product
     * $this->attributes['totalPrice'] - int - contains the total price of the item
     * $this->attributes['product_id'] - int - contains the foreign key of the product
     * $this->attributes['order_id'] - int - contains the foreign key of the order
     * $this->attributes['created_at'] - timestamp - contains the record creation date
     * $this->attributes['updated_at'] - timestamp - contains the record update date
     */
    protected $fillable = [
        'quantity',
        'totalPrice',
        'product_id',
        'order_id',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity(int $quantity): void
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getTotalPrice(): int
    {
        return $this->attributes['totalPrice'];
    }

    public function setTotalPrice(int $totalPrice): void
    {
        $this->attributes['totalPrice'] = $totalPrice;
    }

    public function getProductId(): int
    {
        return $this->attributes['product_id'];
    }

    public function setProductId(int $productId): void
    {
        $this->attributes['product_id'] = $productId;
    }

    public function getOrderId(): int
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId(int $orderId): void
    {
        $this->attributes['order_id'] = $orderId;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }
}
