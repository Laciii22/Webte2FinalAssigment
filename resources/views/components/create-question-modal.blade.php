@vite('resources/js/dashboard-scripts.js')

<x-modal name="create-question-modal">
    <div class="modal-content ">
        <h4 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight p-3">Create Question
        </h4>
        <form method="POST" action="{{ route('questions.store') }}">
            @csrf
            @method('POST')
            <div class="px-4 py-5 sm:px-6" id="create-modal-content">
                <div class="mb-2">
                    <label for="question" class="block text-sm font-medium text-gray-900 dark:text-white">Question</label>
                    <input name="title" type="text" id="question" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" />
                </div>
                <div class="mb-2">
                    <label for="lesson" class="block text-sm font-medium text-gray-900 dark:text-white">Lesson</label>
                    <input name="lesson" type="text" id="lesson" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" />
                </div>

                <div class="mb-2">
                    <label for="category" class="block text-sm font-medium text-gray-900 dark:text-white">Category</label>
                    <select name="category" id="category-select" class="shadow appearance-none border rounded-lg text-sm w-full p-2.5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white">
                        <option value="text">Text</option>
                        <option value="choice">Choice</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="active" class="block text-sm font-medium text-gray-900 dark:text-white">Active</label>
                    <select name="active" id="active" class="shadow appearance-none border rounded-lg text-sm w-full p-2.5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                @if(Auth::user()->isAdmin())
                <div class="mb-6">
                    <label for="user_id" class="block text-sm font-medium text-gray-900 dark:text-white">Select
                        user</label>
                    <select name="user_id" id="user_id" class="shadow appearance-none border rounded w-full p-2.5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white">
                        <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                @else
                <div class="mb-6">
                    <label for="user_id" class="block text-sm font-medium text-gray-900 dark:text-white">User</label>
                    <input value="{{Auth::id()}}" disabled type="user_id" id="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" />
                </div>
                @endif
            </div>
            <div class="px-4 py-4 sm:px-6 flex flex-row justify-between">
                <div>
                    <button type="button" id="add-btn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-1 hidden">Add
                        answer</button>
                </div>
                <div>
                    <button type="submit" onclick="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-1">Create
                        question</button>
                    <button type="button" @click="$dispatch('close-modal', 'create-question-modal')" class="mt-3 w-full sm:mt-0 sm:w-auto bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</x-modal>