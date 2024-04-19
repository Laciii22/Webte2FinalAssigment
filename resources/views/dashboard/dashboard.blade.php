<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div id="editModal" class="modal hidden">
        <div class="modal-content">
            <h4>Edit Question</h4>
            <form action="" method="PUT">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="edit-title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                    <input type="text" name="title" id="edit-title"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Enter title" required>
                </div>
                <div class="mb-4">
                    <label for="edit-body" class="block text-gray-700 text-sm font-bold mb-2">Body</label>
                    <textarea name="body" id="edit-body"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Enter body" required></textarea>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save
                        Changes</button>
                </div>
            </form>
        </div>
    </div>



    <!-- Modal -->
    <div class="fixed inset-0 overflow-y-auto hidden" id="modal">
        <div class="flex items-center justify-center min-h-screen px-4 pb-20 text-center">
            <!-- Background overlay -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Modal content -->
            <div
                class="inline-block align-middle bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form action="{{ route('questions.store') }}" method="POST">
                    @csrf
                    <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <!-- Add your form fields here -->
                        <div class="mb-4">
                            <label for="title"
                                class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Title</label>
                            <input type="text" name="title" id="title"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white"
                                placeholder="Enter title">
                        </div>

                        <!-- Body -->
                        <div class="mb-4">
                            <label for="body"
                                class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Body</label>
                            <textarea name="body" id="body"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white"
                                placeholder="Enter body"></textarea>
                        </div>

                        <!-- Active status -->
                        <div class="mb-4">
                            <label for="active"
                                class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Active</label>
                            <select name="active" id="active"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="category"
                                class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">category</label>
                            <select name="category" id="category"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white">
                                <option value="text">Text</option>
                                <option value="input">Input</option>
                            </select>
                        </div>

                        @if(Auth::user()->isAdmin())
                        <label for="user_id">Select User:</label>
                        <select name="user_id" id="user_id"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white">
                            @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @endif


                        <!-- Add more form fields as needed -->

                        <!-- Modal footer with submit button -->
                        <div class="flex items-center justify-end mt-4">
                            <button type="button"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-2"
                                onclick="closeModal()">Close</button>
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create
                                Question</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        onclick="openModal()">Create New Question</button>
                </div>
            </div>
        </div>
    </div>

    @foreach($questions as $question)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Code: {{ $question->code }}
                    <a href="{{ route('questions.question-result', ['question' => $question->code]) }}"
                        class="text-blue-500 hover:underline">Go to Result</a>


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
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- ///TODO -->

                    <button id="editButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        data-question="{{ $question }}">Edit</button>
                    <form action="" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</x-app-layout>

<script>
// Function to open the modal
function openModal() {
    document.getElementById('modal').classList.add('flex');
    document.getElementById('modal').classList.remove('hidden');
}

// Function to close the modal
function closeModal() {
    document.getElementById('modal').classList.add('hidden');
    document.getElementById('modal').classList.remove('flex');
}

var editButtons = document.querySelectorAll('.edit-button');
editButtons.forEach(button => {
    console.log("click")
    button.addEventListener('click', function() {
        var question = JSON.parse(this.getAttribute('data-question'));
        openEditModal(question);
    });
});

function openEditModal(question) {
    openModal();
    console.log(question)
    document.getElementById("edit-title").value = question.title;
    document.getElementById("edit-body").value = question.body;
    // Open modal
    var modal = document.getElementById('editModal');
    modal.style.display = "block";
}
</script>