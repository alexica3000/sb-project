<?php

namespace App\Models;

use App\Models\Traits\CacheableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Comment extends Model
{
    use HasFactory, CacheableTrait;

    protected $fillable = ['body', 'user_id'];

    protected static function cacheTags(): array
    {
        return ['comments'];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    }
}
