<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'short', 'body', 'is_published'];

    protected $perPage = 5;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
