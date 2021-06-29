<?php

namespace App\Models;

use App\Models\Traits\CacheableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Tag extends Model
{
    use HasFactory, CacheableTrait;

    protected $fillable = ['name'];

    protected static function cacheTags(): array
    {
        return ['tags'];
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
