<?php

namespace App\Models;

use App\Models\Interfaces\HasCommentsInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class News extends Model implements HasCommentsInterface
{
    use HasFactory;

    protected $fillable = ['title', 'short', 'body', 'is_published'];

    protected static function boot()
    {
        parent::boot();

        static::created(function() {
            Cache::tags(['news'])->flush();
        });

        static::updated(function() {
            Cache::tags(['news'])->flush();
        });

        static::deleted(function() {
            Cache::tags(['news'])->flush();
        });
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
