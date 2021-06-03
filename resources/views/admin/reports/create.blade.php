@inject('reportService', '\App\Http\Services\ReportService')

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
                        @csrf

                        <div class="md:w-2/3">
                            <select class="form-multiselect block w-full border border-gray-400" size="5" multiple="" name="type_data">
                                @foreach($reportService::DATA_TYPES as $type)
                                    <option value="{{ $type }}">{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="bg-green-400 px-5 py-1 text-sm shadow-sm font-medium tracking-wider border text-green-100 rounded-full hover:shadow-lg hover:bg-green-500 mt-3">Generate report</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
