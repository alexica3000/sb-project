<?php

namespace App\Models;

use App\Events\PostCreatedEvent;
use App\Events\PostDeletedEvent;
use App\Events\PostUpdatedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'alias', 'short', 'body', 'is_published'];

    protected $dispatchesEvents = [
        'created' => PostCreatedEvent::class,
        'updated' => PostUpdatedEvent::class,
        'deleted' => PostDeletedEvent::class,
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
