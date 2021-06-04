<?php

namespace App\Http\Services;

use App\Models\Comment;
use App\Models\News;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Collection;

class ReportService
{
    const DATA_TYPES = ['News', 'Posts', 'Comments', 'Tags', 'Users'];

    public function generate(array $data) : Collection
    {
        return collect($this->getData($data));
    }

    private function getCountData(string $type) : int
    {
        switch ($type) {
            case 'News':
                return News::query()->isActive()->count('id');
            case 'Posts':
                return Post::query()->where('is_published', 1)->count('id');
            case 'Comments':
                return Comment::query()->count('id');
            case 'Tags':
                return Tag::query()->count('id');
            default:
                return User::query()->count('id');
        }
    }

    private function getData(array $data) : array
    {
        $arr = [];

        foreach ($data as $item) {
            $arr[$item] = $this->getCountData($item);
        }

        return $arr;
    }
}
