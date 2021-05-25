<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <span>News</span>
            <a href="{{ route('news.create') }}" class="bg-blue-500 px-4 py-2 text-xs font-semibold tracking-wider text-white rounded hover:bg-blue-600">Add News</a>
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
                            @forelse($news as $item)
                                <tr class="bg-white border-2 border-gray-200">
                                    <td>
                                        <span class="text-center ml-2 font-semibold">{{ $item->title }}</span>
                                    </td>
                                    <td class="py-1">
                                        <span>{{ $item->is_published ? 'yes' : ''  }}</span>
                                    </td>
                                    <td class="py-1">
                                        <span>{{ $item->created_at->format('d.m.Y') }}</span>
                                    </td>
                                    <td class="py-1">
                                        <a href="{{ route('news.edit', $item->id) }}" class="text-xs bg-blue-500 text-white px-4 py-2 border rounded-md hover:bg-blue-400 hover:border-indigo-500 hover:text-black">Edit</a>
                                        <form action="{{ route('news.destroy', $item->id) }}" method="post" class="inline">
                                            @csrf
                                            @method('delete')
                                            <button
                                                type="button"
                                                class="text-xs bg-red-500 text-white px-4 py-2 border rounded-md hover:bg-red-400 hover:border-indigo-500 hover:text-black "
                                                onclick="if(confirm('Are you sure?')) this.closest('form').submit();"
                                            >
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-2 border-gray-200">
                                    <td colspan="5" class="py-1">No news</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
