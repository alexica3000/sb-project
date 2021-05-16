<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\User;
use App\Notifications\NewPostsNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;

class NewPostsNotifyCommands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:new_posts_notify {start} {end}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify users with new posts';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all();
        $posts = Post::query()
            ->where('is_published', 1)
            ->where('created_at', '>', Carbon::parse($this->argument('start')))
            ->where('created_at', '<', Carbon::parse($this->argument('end')))
            ->get();

        $users->map->notify(new NewPostsNotification($posts));
    }
}
