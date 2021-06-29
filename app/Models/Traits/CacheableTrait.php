<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Cache;

trait CacheableTrait
{
    protected static function bootCacheableTrait()
    {
        static::created(function() {
            Cache::tags(self::cacheTags())->flush();
        });

        static::updated(function() {
            Cache::tags(self::cacheTags())->flush();
        });

        static::deleted(function() {
            Cache::tags(self::cacheTags())->flush();
        });
    }

    abstract static protected function cacheTags() : array;
}
