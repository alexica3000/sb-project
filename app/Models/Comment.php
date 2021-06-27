<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'user_id'];

    protected static function boot()
    {
        parent::boot();

        static::created(function() {
            Cache::tags(['comments'])->flush();
        });

        static::updated(function() {
            Cache::tags(['comments'])->flush();
        });

        static::deleted(function() {
            Cache::tags(['comments'])->flush();
        });
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
