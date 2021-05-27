<?php

namespace App\Models;

use App\Events\PostCreatedEvent;
use App\Events\PostDeletedEvent;
use App\Events\PostUpdatedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Psy\Util\Json;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'alias', 'short', 'body', 'is_published'];

    protected $dispatchesEvents = [
        'created' => PostCreatedEvent::class,
        'updated' => PostUpdatedEvent::class,
        'deleted' => PostDeletedEvent::class,
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function(Post $post) {
            $after = $post->getDirty();
            $post->history()->attach(auth()->id(), [
                'before' => Arr::only($post->fresh()->toArray(), array_keys($after)),
                'after'  => $after,
            ]);
        });
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function history()
    {
        return $this->belongsToMany(User::class, 'post_histories')->withPivot(['before', 'after', ])->withTimestamps()->using(PostHistory::class);
    }

    public function comments()
    {
        return $this->morphToMany(Comment::class, 'commentable');
    }
}
