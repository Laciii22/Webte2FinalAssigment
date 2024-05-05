@vite('resources/js/question-result-scripts.js')


<x-guest-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    
    <div class="min-h-screen ">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col md:flex-row gap-4 text-center">
                <div class="pt-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg md:w-1/2">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2 class="text-xl font-bold">Code: {{ $question->code }}</h2>
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Title: {{ $question->title }}
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Body: {{ $question->body }}
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Active: {{ $question->active }}
                    </div>
                </div>
    
                @if($question->category != 'text')
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg md:w-1/2">
                    <div class="p-6 text-white flex justify-center">
                        <canvas id="pie-chart" style="max-width: 300px; max-height: 300px;" data-labels="{!! htmlspecialchars(json_encode($responses->pluck('selected_value')), ENT_QUOTES, 'UTF-8') !!}" data-data="{!! htmlspecialchars(json_encode($responses->pluck('count')), ENT_QUOTES, 'UTF-8') !!}">
                        </canvas>
                    </div>
                </div>
                @else
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg md:w-1/2">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2 class="text-xl font-bold">Responses:</h2>
                        @foreach($responses as $response)
                        <div>{{ $response->selected_value }}</div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    
    
</x-guest-layout>
