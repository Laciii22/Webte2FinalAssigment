<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
@vite('resources/js/dashboard-scripts.js')

@include('components.create-question-modal')
@include('components.edit-modal')

<x-modal name="qrcode-modal">
    <div id="qrcode-content-parent">
    </div>
</x-modal>

<x-app-layout>

    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <button x-data class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="$dispatch('open-modal', 'create-question-modal')">Create New Question</button>
                    <span>TUTO DOROBIT FILTRE NAMIESTO TOHOT TEXXT</span>
                </div>
            </div>
        </div>
    </div>


    @foreach($questions as $index => $question)
    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">

                <h5 class="hover:text-gray-400 mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="http://localhost:8000/{{$question->code}}/result">{{$question->code}}</a>
                </h5>

                @if ($question->category == "choice")
                <div class="grid gap-6 mb-2 md:grid-cols-2">
                    <div>
                        <label for="body" class="block text-sm font-medium text-gray-900 dark:text-white">Question</label>
                        <input type="text" id="body" class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" value="{{$question->title}}" disabled />

                        <div class="grid gap-6 mb-2 md:grid-cols-2">
                            <div>

                                <label for="body" class="block text-sm font-medium text-gray-900 dark:text-white">Lesson</label>
                                <input type="text" id="body" class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" value="{{$question->lesson}}" disabled />
                            </div>
                            <div>
                                <label for="body" class="block text-sm font-medium text-gray-900 dark:text-white">Owner</label>
                                <input type="text" id="body" class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" value="{{$question->user->name}}" disabled />
                            </div>
                        </div>

                        @if($question->active == 1)
                        <div class="flex items-center mb-4">
                            <input disabled id="default-checkbox" type="checkbox" checked value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Active
                            </label>
                        </div>

                        @else
                        <div class="flex items-center mb-4">
                            <input disabled id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Active</label>
                        </div>
                        @endif
                    </div>



                    <div>
                        @foreach($responses->where('question_code', $question->code) as $response)
                        <div class="mb-2">
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" value="{{$response->value}}" disabled />
                        </div>
                        @endforeach
                    </div>
                </div>


                @else
                <div class="grid gap-6 mb-2 md:grid-cols-2">
                    <div>
                        <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Code</label>
                        <input type="text" id="code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" value="{{$question->code}}" disabled />
                    </div>
                    <div>
                        <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                        <input type="text" id="body" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" value="{{$question->body}}" disabled />
                    </div>
                </div>
                @endif

                <div class="text-gray-900 dark:text-gray-100 sm:flex gap-1 flex justify-end">
                    <button x-data @click="$dispatch('open-modal', 'qrcode-modal')" class="bg-gray-900 hover:bg-black text-white font-bold py-2 px-4 rounded qrcode-btn" data-code="{{$question->code}}">Show QR
                        code</button>
                    @if ($question->active)
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded edit-btn" data-question="{{ json_encode($question) }}" data-answers="{{ json_encode($responses->where('question_code', $question->code)->toArray()) }}" x-data @click="$dispatch('open-modal', 'edit-question-modal')">Edit</button>
                    @endif
                    <form id="deleteForm" class="m-0" action="{{ route('questions.destroy', ['question_code' => $question->code]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="question_code" value="{{ $question->code }}">
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</x-app-layout>