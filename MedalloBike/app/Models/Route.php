<?php

namespace App\Models;

// Made by: [Your Name]

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Route extends Model
{
    use HasFactory;

    /**
     * ROUTE ATTRIBUTES
     * $this->attributes['id'] - int - contains the primary key of the route
     * $this->attributes['name'] - string - contains the name of the route
     * $this->attributes['description'] - string - contains the description of the route
     * $this->attributes['difficulty'] - int - contains the difficulty of the route
     * $this->attributes['type'] - string - contains the type of the route
     * $this->attributes['zone'] - string - contains the zone of the route
     * $this->attributes['imageMap'] - string - contains the path to the map image
     * $this->attributes['coordinateStart'] - string - contains the start coordinates of the route
     * $this->attributes['coordinateEnd'] - string - contains the end coordinates of the route
     * $this->attributes['created_at'] - timestamp - contains the record creation date
     * $this->attributes['updated_at'] - timestamp - contains the record update date
     *
     * $this->reviews - Collection<Review> - contains the associated reviews
     */
    protected $fillable = [
        'name',
        'description',
        'difficulty',
        'type',
        'zone',
        'imageMap',
        'coordinateStart',
        'coordinateEnd',
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

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getDifficulty(): int
    {
        return $this->attributes['difficulty'];
    }

    public function setDifficulty(int $difficulty): void
    {
        $this->attributes['difficulty'] = $difficulty;
    }

    public function getType(): string
    {
        return $this->attributes['type'];
    }

    public function setType(string $type): void
    {
        $this->attributes['type'] = $type;
    }

    public function getZone(): string
    {
        return $this->attributes['zone'];
    }

    public function setZone(string $zone): void
    {
        $this->attributes['zone'] = $zone;
    }

    public function getImageMap(): string
    {
        return $this->attributes['imageMap'];
    }

    public function setImageMap(string $imageMap): void
    {
        $this->attributes['imageMap'] = $imageMap;
    }

    public function getCoordinateStart(): string
    {
        return $this->attributes['coordinateStart'];
    }

    public function setCoordinateStart(string $coordinateStart): void
    {
        $this->attributes['coordinateStart'] = $coordinateStart;
    }

    public function getCoordinateEnd(): string
    {
        return $this->attributes['coordinateEnd'];
    }

    public function setCoordinateEnd(string $coordinateEnd): void
    {
        $this->attributes['coordinateEnd'] = $coordinateEnd;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
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
}
