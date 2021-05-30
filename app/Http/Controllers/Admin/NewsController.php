<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\StoreNewsRequest;
use App\Http\Services\TagsSynchronizer;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()->latest()->paginate();

        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(StoreNewsRequest $request, TagsSynchronizer $synchronizer)
    {
        $fields = $request->except('is_published');
        $news = auth()->user()->news()->create($fields + ['is_published' => $request->has('is_published')]);
        $synchronizer->sync(collect(explode(',', $request->input('tags'))), $news);

        return redirect()->route('news.index')->with(['status' => 'News has been added.']);
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(StoreNewsRequest $request, News $news, TagsSynchronizer $synchronizer)
    {
        $fields = $request->except('is_published');
        $news->update($fields + ['is_published' => $request->has('is_published')]);
        $synchronizer->sync(collect(explode(',', $request->input('tags'))), $news);

        return redirect()->route('news.index')->with(['status' => 'News has been updated.']);
    }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('news.index')->with(['status' => 'The news has been deleted.']);
    }
}
