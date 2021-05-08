<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <span>Posts</span>
            <a href="{{ route('posts.create') }}" class="bg-blue-500 px-4 py-2 text-xs font-semibold tracking-wider text-white rounded hover:bg-blue-600">Add Post</a>
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-full table-auto">
                        <thead class="justify-between">
                            <tr class="border-2 border-gray-200 bg-gray-200 text-gray-800">
                                <th class="px-16 py-2">
                                    <span>Title</span>
                                </th>
                                <th class="px-16 py-2">
                                    <span>Tags</span>
                                </th>
                                <th class="px-16 py-2">
                                    <span>Published</span>
                                </th>
                                <th class="px-16 py-2">
                                    <span>Created at</span>
                                </th>
                                <th class="px-16 py-2">
                                    <span>Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-200">
                            @if(isset($posts) and count($posts))
                                @foreach($posts as $post)
                                    <tr class="bg-white border-2 border-gray-200">
                                        <td>
                                            <span class="text-center ml-2 font-semibold">{{ $post->title }}</span>
                                        </td>
                                        <td class="py-1">
                                            @if($post->tags->isNotEmpty())
                                                @foreach($post->tags as $tag)
                                                    <span class="inline-flex items-center justify-center px-2 py-1 mr-1 text-xs font-bold leading-none text-white bg-green-600 rounded-full">{{ $tag->name }}</span>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td class="py-1">
                                            <span>{{ $post->is_published ? 'yes' : ''  }}</span>
                                        </td>
                                        <td class="py-1">
                                            <span>{{ $post->created_at->format('d.m.Y') }}</span>
                                        </td>
                                        <td class="py-1">
                                            <a href="{{ route('posts.edit', $post->id) }}" class="text-xs bg-blue-500 text-white px-4 py-2 border rounded-md hover:bg-blue-400 hover:border-indigo-500 hover:text-black">Edit</a>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="post" class="inline">
                                                @csrf
                                                @method('delete')
                                                <button
                                                    class="text-xs bg-red-500 text-white px-4 py-2 border rounded-md hover:bg-red-400 hover:border-indigo-500 hover:text-black "
                                                    onclick="if(confirm('Are you sure?')) this.closest('form').submit();"
                                                >
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
