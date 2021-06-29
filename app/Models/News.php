<?php

namespace App\Models;

use App\Models\Interfaces\HasCommentsInterface;
use App\Models\Traits\CacheableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class News extends Model implements HasCommentsInterface
{
    use HasFactory, CacheableTrait;

    protected $fillable = ['title', 'short', 'body', 'is_published'];

    protected static function cacheTags() : array
    {
        return ['news'];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeIsActive($query)
    {
        return $query->where('is_published', 1);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
