<?php

namespace App\Http\Services;

class Pushall
{
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }
}
