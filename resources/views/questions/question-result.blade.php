@vite('resources/js/question-result-scripts.js')

<x-guest-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="min-h-screen">
        <div class="py-12 ">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg max-w-7xl mx-auto mb-3">
                <div class="flex justify-between">
                    <div class="p-3 md:p-6 w-full">
                        <label for="lesson" class="block text-sm font-medium text-gray-900 dark:text-white">Code:</label>
                        <input name="lesson" type="text" value="{{ $question->code }} " class=" lesson-input mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" value="{{$question->lesson}}" disabled />
                    </div>
                    <div class="p-3 md:p-6 w-full">
                        <label for="lesson" class="block text-sm font-medium text-gray-900 dark:text-white">Title:</label>
                        <input name="lesson" type="text" value="{{ $question->title }} " class="lesson-input mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" value="{{$question->lesson}}" disabled />
                    </div>
                    <div class="p-3 md:p-6 w-full">
                        <label for="lesson" class="block text-sm font-medium text-gray-900 dark:text-white">Lesson:</label>
                        <input name="lesson" type="text" value="{{ $question->lesson }} " class="lesson-input mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" value="{{$question->lesson}}" disabled />
                    </div>
                    <div class="p-3 md:p-6 w-full">
                        <label for="lesson" class="block text-sm font-medium text-gray-900 dark:text-white">Active:</label>
                        <input name="lesson" type="text" value="{{ $question->active }} " class="lesson-input mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" value="{{$question->lesson}}" disabled />
                    </div>
                </div>
            </div>

                <div class=" max-w-7xl mx-auto  grid grid-cols-1 md:grid-cols-2 gap-4 ">
                    @foreach($allResponses as $version => $responses)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex items-center mb-3">
                                <h2 class="text-xl font-bold mr-5">Responses:</h2>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" id="toggleButton-{{ $version }}" class="sr-only peer" checked>
                                    <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-teal-300 dark:peer-focus:ring-teal-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-teal-600"></div>
                                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Word cloud</span>
                                </label>
                            </div>
                            <div>Version {{ $version }}:</div>
                            <div id="word-cloud-{{ $version }}" class="min-h-80 mt-3" data-word-cloud="{{ json_encode($responses) }}"></div>
                            <div id="response-list-{{ $version }}" class="hidden">
                                @foreach($responses as $response)
                                <div class="p-3">
                                    <input name="responses" type="text" value="{{ $response->count }}x {{ $response->value }}" class="lesson-input mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled />
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>