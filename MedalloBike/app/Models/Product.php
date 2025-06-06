<?php

namespace App\Models;

// Made by: David Lopera Londoño

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the primary key of the product
     * $this->attributes['title'] - string - contains the title of the product
     * $this->attributes['description'] - string - contains the description of the product
     * $this->attributes['category_id'] - int - contains the foreign key of the category
     * $this->attributes['image'] - string - contains the path to the product's image
     * $this->attributes['brand'] - string - contains the brand of the product
     * $this->attributes['price'] - int - contains the price of the product
     * $this->attributes['stock'] - int - contains the stock of the product
     * $this->attributes['state'] - string - contains the state of the product (available/disabled)
     * $this->attributes['created_at'] - timestamp - contains the record creation date
     * $this->attributes['updated_at'] - timestamp - contains the record update date
     *
     * $this->category - Category - contains the associated category
     * $this->items - Collection<Item> - contains the associated items
     * $this->reviews - Collection<Review> - contains the associated reviews
     */
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'image',
        'brand',
        'price',
        'stock',
        'state',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getTitle(): string
    {
        return $this->attributes['title'];
    }

    public function setTitle(string $title): void
    {
        $this->attributes['title'] = $title;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getCategoryId(): int
    {
        return $this->attributes['category_id'];
    }

    public function setCategoryId(int $categoryId): void
    {
        $this->attributes['category_id'] = $categoryId;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getBrand(): string
    {
        return $this->attributes['brand'];
    }

    public function setBrand(string $brand): void
    {
        $this->attributes['brand'] = $brand;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getStock(): int
    {
        return $this->attributes['stock'];
    }

    public function setStock(int $stock): void
    {
        $this->attributes['stock'] = $stock;
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function getItems(): Collection
    {
        return $this->items;
    }

    public function setItems(Collection $items): void
    {
        $this->items = $items;
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function setReviews(Collection $reviews): void
    {
        $this->reviews = $reviews;
    }

    public static function sumPricesByQuantities(Collection $products, array $productsInSession): int
    {
        $total = 0;
        foreach ($products as $product) {
            $total = $total + ($product->getPrice() * $productsInSession[$product->getId()]);
        }

        return $total;
    }

    public function scopeTopSelling(Builder $query, int $limit = 3): Builder
    {
        return $query->withCount(['items as total_sold' => function ($query) {
            $query->select(DB::raw('SUM(quantity)'));
        }])
            ->orderBy('total_sold', 'desc')
            ->take($limit);
    }
}
