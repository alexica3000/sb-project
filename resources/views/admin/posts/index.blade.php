<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Posts
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-full table-auto">
                        <thead class="justify-between">
                            <tr class="bg-gray-200 text-gray-800">
                                <th class="px-16 py-2">
                                    <span>Title</span>
                                </th>
                                <th class="px-16 py-2">
                                    <span>Description</span>
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
                                    <tr class="bg-white border-4 border-gray-200">
                                        <td>
                                            <span class="text-center ml-2 font-semibold">{{ $post->title }}</span>
                                        </td>
                                        <td class="py-1">
                                            {{ $post->short }}
                                        </td>
                                        <td class="py-1">
                                            <span>{{ $post->is_published }}</span>
                                        </td>
                                        <td class="py-1">
                                            <span>{{ $post->created_at->format('d.m.Y') }}</span>
                                        </td>
                                        <td class="py-1">
                                            <a href="{{ route('posts.edit', $post->id) }}" class="text-xs bg-blue-500 text-white px-4 py-2 border rounded-md hover:bg-blue-400 hover:border-indigo-500 hover:text-black">Edit</a>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
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
