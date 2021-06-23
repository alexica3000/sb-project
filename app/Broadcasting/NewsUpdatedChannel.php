<?php

namespace App\Broadcasting;

use App\Models\User;

class NewsUpdatedChannel
{
    public function __construct()
    {
        //
    }

    public function join(User $user) : bool
    {
        return $user->isAdmin();
    }
}
