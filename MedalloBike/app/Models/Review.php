<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the primary key of the review
     * $this->attributes['product_id'] - int - contains the foreign key of the associated product
     * $this->attributes['user_id'] - int - contains the foreign key of the associated user
     * $this->attributes['qualification'] - int - contains the rating given in the review (0-5)
     * $this->attributes['description'] - string - contains the text of the review
     * $this->attributes['created_at'] - timestamp - contains the date the review was created
     * $this->attributes['updated_at'] - timestamp - contains the date the review was last updated
     *
     * $this->product - Product - contains the associated product
     * $this->user - CustomUser - contains the associated user
     */
    protected $fillable = [
        'qualification',
        'description',
        'product_id',
        'user_id',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getProductId(): int
    {
        return $this->attributes['product_id'];
    }

    public function setProductId(int $product_id): void
    {
        $this->attributes['product_id'] = $product_id;
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $user_id): void
    {
        $this->attributes['user_id'] = $user_id;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getQualification(): int
    {
        return $this->attributes['qualification'];
    }

    public function setQualification(int $qualification): void
    {
        $this->attributes['qualification'] = $qualification;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(CustomUser::class);
    }

    public function getUser(): CustomUser
    {
        return $this->user;
    }

    public function setUser(CustomUser $user): void
    {
        $this->user = $user;
    }
}
