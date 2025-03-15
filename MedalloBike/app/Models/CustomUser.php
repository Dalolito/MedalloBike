<?php

// Made by: Camilo Monsalve Montes

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CustomUser extends Authenticatable
{
    use Notifiable;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the complete user name
     * $this->attributes['email'] - string - contains the user email
     * $this->attributes['password'] - string - contains the user password
     * $this->attributes['address'] - string - contains the user address
     * $this->attributes['role'] - string - contains the user role
     * $this->attributes['budget'] - double - contains the user budget
     * $this->attributes['remember_token'] - string - contains the user password
     * $this->attributes['email_verified_at'] - timestamp - contains the user email verification date
     * $this->attributes['created_at'] - timestamp - contains the user creation date
     * $this->attributes['updated_at'] - timestamp - contains the user update date
     */

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'custom_users';

    protected $fillable = ['name', 'email', 'password', 'address', 'budget'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime', 'password' => 'hashed'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName($name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function setEmail($email): void
    {
        $this->attributes['email'] = $email;
    }

    public function getPassword(): string
    {
        return $this->attributes['password'];
    }

    public function setPassword($password): void
    {
        $this->attributes['password'] = $password;
    }

    public function getAddress(): string
    {
        return $this->attributes['address'];
    }

    public function setAddress($address): void
    {
        $this->attributes['address'] = $address;
    }

    public function getRole(): string
    {
        return $this->attributes['role'];
    }

    public function setRole($role): void
    {
        $this->attributes['role'] = $role;
    }

    public function getBudget(): float
    {
        return $this->attributes['budget'];
    }

    public function setBudget($budget): void
    {
        $this->attributes['budget'] = $budget;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($createdAt): void
    {
        $this->attributes['created_at'] = $createdAt;
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updatedAt): void
    {
        $this->attributes['updated_at'] = $updatedAt;
    }
}
