<?php

namespace App\Policies;

use App\Models\News;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPolicy
{
    use HandlesAuthorization;

    public function showNews(?User $user, News $news)
    {
        return $news->is_published || auth()->id() == $news->user_id || (auth()->check() && auth()->user()->isAdmin());
    }
}
