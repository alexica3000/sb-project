<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Report
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>Please choose one or more items:</h2>
                    <form method="post" action="{{ route('reports.generate') }}">
                        <label class="inline-flex items-center mt-3">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-teal-600"><span class="ml-2 text-gray-700">label</span>
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
