<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected static function boot()
    {
        parent::boot();

        static::created(function() {
            Cache::tags(['tags'])->flush();
        });

        static::updated(function() {
            Cache::tags(['tags'])->flush();
        });

        static::deleted(function() {
            Cache::tags(['tags'])->flush();
        });
    }

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    public function news()
    {
        return $this->morphedByMany(News::class, 'taggable');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public static function tagsCloud()
    {
        return (new static)::query()->whereHas('posts')->orWhereHas('news')->get();
    }
}
