<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center">
        <div class="py-12 w-full md:w-1/2 relative">
        <div class="absolute top-20 right-20 w-32 h-32 bg-badge"></div>
            <div class="w-full md:max-w-7xl sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2 class="text-xl font-bold">Code: {{ $question->code }}</h2>
                    </div>

                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Title: {{ $question->title }}
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Lesson: {{ $question->lesson }}
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Active: {{ $question->active }}
                    </div>

                    @if($question->category == 'text')
                    <form action="{{ route('submitResponse') }}" method="POST">
                        @csrf
                        <input type="hidden" name="question_code" value="{{ $question->code }}">
                        <div class="p-6">
                            <label for="text_input" class="block mb-2 text-gray-900 dark:text-white">Your answer:</label>
                            <input type="text" name="text_input" class="border rounded-lg block w-full bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-teal-500 focus:teal-blue-500" placeholder="Enter text here">
                        </div>
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit Text</button>
                        </div>
                    </form>

                    @else
                    <form action="{{ route('submitResponse', $question->code) }}" method="POST">
                        @csrf
                        <input type="hidden" name="question_code" value="{{ $question->code }}">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            @foreach($responses as $response)
                            <input id="teal-radio-{{ $response->id }}" type="radio" name="response[]" value="{{ $response->id }}" class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="teal-radio-{{ $response->id }}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $response->value }}</label> <br>
                            @endforeach
                        </div>

                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit Options</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
