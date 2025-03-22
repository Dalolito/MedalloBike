<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the primary key of the order
     * $this->attributes['totalPrice'] - int - contains the total price of the order
     * $this->attributes['user_id'] - int - contains the foreign key of the user
     * $this->attributes['state'] - string - contains the state of the order
     * $this->attributes['created_at'] - timestamp - contains the record creation date
     * $this->attributes['updated_at'] - timestamp - contains the record update date
     */
    protected $fillable = [
        'totalPrice',
        'user_id',
        'state'
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getTotalPrice(): int
    {
        return $this->attributes['totalPrice'];
    }

    public function setTotalPrice(int $totalPrice): void
    {
        $this->attributes['totalPrice'] = $totalPrice;
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $userId): void
    {
        $this->attributes['user_id'] = $userId;
    }

    public function getState(): string
    {
        return $this->attributes['state'];
    }

    public function setState(string $state): void
    {
        $this->attributes['state'] = $state;
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