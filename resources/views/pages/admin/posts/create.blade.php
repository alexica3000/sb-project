<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Post
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('components.errors')

                    <form method="post" action="{{ route('posts.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="email" class="form-control" id="title" name="title">
                        </div>

                        <div class="form-group">
                            <label for="alias">Alias</label>
                            <input type="email" class="form-control" id="alias" name="alias">
                        </div>

                        <div class="form-group">
                            <label for="short">Short Description</label>
                            <textarea class="form-control" rows="3" name="short" id="short"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" rows="7" name="description" id="description"></textarea>
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="is_published" name="is_published">
                            <label class="form-check-label" for="is_published">Published</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Add New Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
