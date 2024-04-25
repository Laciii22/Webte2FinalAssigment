<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                Code: {{ $question->code }}
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

            @if($question->category == 'text')
            <form action="{{ route('submitResponse', $question->code) }}" method="POST">
                @csrf
                <input type="hidden" name="question_code" value="{{ $question->code }}">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <input type="text" name="text_input" placeholder="Enter text here">
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit
                        Text</button>
                </div>
            </form>
            @else
            <form action="{{ route('submitResponse', $question->code) }}" method="POST">
                @csrf
                <input type="hidden" name="question_code" value="{{ $question->code }}">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach($responses as $response)
                    <input type="radio" name="response[]" value="{{ $response->id }}"> {{ $response->selected_value }}
                    <br>
                    @endforeach
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit
                        Options</button>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>