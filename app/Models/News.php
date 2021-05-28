<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'short', 'body', 'is_published'];

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
}
