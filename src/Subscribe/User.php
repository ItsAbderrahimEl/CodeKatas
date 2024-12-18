<?php

namespace App\Subscribe;

class User
{
    public string $name;
    public bool $subscribed = false;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}