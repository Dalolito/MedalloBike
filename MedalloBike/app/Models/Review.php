<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * REVIEW ATTRIBUTES
     *
     * this->attributes['id']-int-Review Id (primary key)
     * this->attributtes['product_id']-int-Product Id(foreign key)
     * this->attributtes['route_id']-int-Route Id(foreign key) ---------------
     * this->attributtes['user_id']-int-User Id (foreign key) ---------------
     * this->attibuttes['qualification ']-int-The qualification of product or route
     * this->attributtes['review']-string-The comment about the route or route
     * this->attributtes['approvedState']-boolean-The approval state of review
     * this->attributtes['moderator']-int-User Id admin
     */
    protected $table = 'review';

    protected $fillable = [
        'qualification',
        'review',
        'approvedState',
        'product_id',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getReviews(): string
    {
        return $this->attributes['review'];
    }

    public function getProductId(): int
    {
        return $this->attributes['product_id'];
    }

    public function getApprovedState(): bool
    {
        return $this->attributes['approvedState'];
    }

    public function setReviews(string $review): void
    {
        $this->attributes['review'] = $review;
    }

    public function setApprovedState(bool $approvedState): void
    {
        $this->attributes['approvedState'] = $approvedState;
    }
}
