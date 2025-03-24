<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * ROUTE ATTRIBUTES
 * $this->attributes['id'] - int - contains the primary key of the route
 * $this->attributes['name'] - string - contains the name of the route
 * $this->attributes['description'] - string - contains the description of the route
 * $this->attributes['difficulty'] - int - difficulty level of the route
 * $this->attributes['type'] - string - type of route
 * $this->attributes['zone'] - string - zone of the route
 * $this->attributes['imageMap'] - string - contains the image path of the map
 * $this->attributes['coordinateStart'] - array - starting coordinates
 * $this->attributes['coordinateEnd'] - array - ending coordinates
 * $this->attributes['created_at'] - timestamp - creation date
 * $this->attributes['updated_at'] - timestamp - update date
 * $this->reviews - Review[] - associated reviews
 */
class Route extends Model
{
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

    protected $casts = [
        'coordinateStart' => 'array',
        'coordinateEnd' => 'array',
    ];

    // === RELATIONSHIPS ===

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    // === GETTERS & SETTERS ===

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

    public function getCoordinateStart(): array
    {
        return $this->attributes['coordinateStart'];
    }

    public function setCoordinateStart(array $coordinateStart): void
    {
        $this->attributes['coordinateStart'] = $coordinateStart;
    }

    public function getCoordinateEnd(): array
    {
        return $this->attributes['coordinateEnd'];
    }

    public function setCoordinateEnd(array $coordinateEnd): void
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
}
