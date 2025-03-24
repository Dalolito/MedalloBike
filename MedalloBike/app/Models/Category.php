<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * CATEGORY ATTRIBUTES
     * $this->attributes['id'] - int - contains the primary key of the category
     * $this->attributes['name'] - string - contains the name of the category
     * $this->attributes['description'] - string - contains the description of the category (nullable)
     * $this->attributes['state'] - string - contains the state of the category (available/disabled)
     * $this->attributes['created_at'] - timestamp - contains the record creation date
     * $this->attributes['updated_at'] - timestamp - contains the record update date
     */
    protected $fillable = [
        'name',
        'description',
        'state',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getDescription(): ?string
    {
        return $this->attributes['description'] ?? null;
    }

    public function setDescription(?string $description): void
    {
        $this->attributes['description'] = $description;
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

    /**
     * Get the products associated with the category.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
