<?php

namespace App\Auth;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Authenticatable;

class SessionGuard implements Guard
{
    protected $user;

    public function check()
    {
        return $this->user() !== null;
    }

    public function guest()
    {
        return !$this->check();
    }

    public function user()
    {
        if ($this->user) {
            return $this->user;
        }

        if ($sessionUser = session('user')) {
            $this->user = new SessionUser(is_object($sessionUser) ? (array)$sessionUser : $sessionUser);
        }

        return $this->user;
    }

    public function id()
    {
        return optional($this->user())->getAuthIdentifier();
    }

    public function validate(array $credentials = [])
    {
        return false; // Not implemented
    }

    public function setUser(Authenticatable $user)
    {
        $this->user = $user;
        return $this;
    }

    public function hasUser()
    {
        return !is_null($this->user);
    }
}
