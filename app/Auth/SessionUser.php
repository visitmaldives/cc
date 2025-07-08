<?php

namespace App\Auth;

use Illuminate\Contracts\Auth\Authenticatable;

class SessionUser implements Authenticatable
{
    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->attributes['id'] ?? null;
    }

    public function getAuthPassword()
    {
        return null; // not used
    }

    public function getAuthPasswordName()
    {
        return 'password'; // dummy
    }

    public function getRememberToken()
    {
        return null;
    }

    public function setRememberToken($value)
    {
        // not needed
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function __get($key)
    {
        return $this->attributes[$key] ?? null;
    }

    public function toArray()
    {
        return $this->attributes;
    }
}
