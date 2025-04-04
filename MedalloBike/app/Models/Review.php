<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the primary key of the review
     * $this->attributes['product_id'] - int - contains the foreign key of the associated product
     * $this->attributes['user_id'] - int - contains the foreign key of the user who created the review
     * $this->attributes['qualification'] - int - contains the rating given in the review (0-5)
     * $this->attributes['review'] - string - contains the text of the review
     * $this->attributes['state'] - bool - contains the approval status of the review (true = approved, false = pending/rejected)
     * $this->attributes['created_at'] - timestamp - contains the date the review was created
     * $this->attributes['updated_at'] - timestamp - contains the date the review was last updated
     */
    protected $fillable = [
        'qualification',
        'review',
        'state',
        'product_id',
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

    public function getReview(): string
    {
        return $this->attributes['review'];
    }

    public function setReview(string $review): void
    {
        $this->attributes['review'] = $review;
    }

    public function getState(): bool
    {
        return $this->attributes['state'];
    }

    public function setState(bool $approvedState): void
    {
        $this->attributes['approvedState'] = $approvedState;
    }

    public function getQualification(): int
    {
        return $this->attributes['qualification'];
    }

    public function setQualification(int $qualification): void
    {
        $this->attributes['product_id'] = $qualification;
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
