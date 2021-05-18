<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;

class Pushall
{
    private $apiKey;
    private $id;

    public function __construct($apiKey, $id)
    {
        $this->apiKey = $apiKey;
        $this->id = $id;
    }

    public function send($title, $text)
    {
        $data = [
            "type"  => "self",
            "id"    => $this->id,
            "key"   => $this->apiKey,
            "text"  => $text,
            "title" => $title,
        ];

        try {
            Http::get(config('services.pushall.url'), $data);
        } catch (\Exception $e) {
            logger()->error($e->getMessage());
        }
    }
}
