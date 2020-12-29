<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'alias', 'short', 'description', 'is_published'];

    public function setIsPublishedAttribute()
    {
        $this->attributes['is_published'] = request()->boolean('is_published');
    }
}
