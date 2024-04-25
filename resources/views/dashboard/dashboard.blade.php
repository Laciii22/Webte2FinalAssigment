<x-app-layout>
    <div id="editModal" class="fixed inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen px-4 pb-20 text-center">
            <!-- Background overlay -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Modal content edit-->
            <div class="inline-block align-middle bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="modal-content">
                    <h4 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight p-3">Edit Question</h4>
                    <form id="editForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="px-4 py-5 sm:px-6">
                            <div class="mb-4">
                                <label for="edit-title" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Title</label>
                                <input type="text" name="title" id="edit-title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white" placeholder="Enter title" required>
                            </div>
                            <div class="mb-4">
                                <label for="edit-body" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Body</label>
                                <textarea name="body" id="edit-body" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white" placeholder="Enter body" required></textarea>
                            </div>
                        </div>
                        <div class=" px-4 py-4 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="button" onclick="submitEditForm()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-1">Save Changes</button>
                            <button type="button" onclick="closeEditModal()" class="mt-3 w-full sm:mt-0 sm:w-auto bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
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
            <div class="inline-block align-middle bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form action="{{ route('questions.store') }}" method="POST">
                    @csrf
                    <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <!-- Add your form fields here -->
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Title</label>
                            <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white" placeholder="Enter title">
                        </div>

                        <!-- Body -->
                        <div class="mb-4">
                            <label for="body" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Body</label>
                            <textarea name="body" id="body" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white" placeholder="Enter body"></textarea>
                        </div>

                        <!-- Active status -->
                        <div class="mb-4">
                            <label for="active" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Active</label>
                            <select name="active" id="active" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="category" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Category</label>
                            <select name="category" id="category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white">
                                <option value="text">Text</option>
                                <option value="input">Input</option>
                            </select>
                        </div>

                        <div id="input-options" style="display: none;">
                            <label for="input_options" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Input Options</label>
                            <input type="text" name="input_options[]" id="input_options" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white" placeholder="Enter option">
                            <button type="button" id="add-option">Add Option</button>
                        </div>


                        @if(Auth::user()->isAdmin())
                        <label for="user_id">Select User:</label>
                        <select name="user_id" id="user_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white">
                            <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                            @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @endif


                        <!-- Modal footer with submit button -->
                        <div class="flex items-center justify-end mt-4">
                            <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeModal()">Close</button>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create
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
                    <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="openModal()">Create New Question</button>
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
                    <a href="{{ route('questions.question-result', ['question' => $question->code]) }}" class="text-blue-500 hover:underline">Go to Result</a>
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
                <div class="p-6 text-gray-900 dark:text-gray-100 sm:flex gap-1">
                    <!-- ///TODO -->
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded edit-button" data-question="{{ json_encode($question) }}">Edit</button>
                    <form id="deleteForm" action="{{ route('questions.destroy', ['question_code' => $question->code]) }}" method="POST">
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

<script>
    function openModal() {
        document.getElementById('modal').classList.add('flex');
        document.getElementById('modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
        document.getElementById('modal').classList.remove('flex');
    }

    var editButtons = document.querySelectorAll('.edit-button');
    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            var question = JSON.parse(this.getAttribute('data-question'));
            console.log(question);
            openEditModal(question);
        });
    });


    function openEditModal(question) {
        document.getElementById('edit-title').value = question.title;
        document.getElementById('edit-body').value = question.body;
        document.getElementById('editForm').action = '{{ route("questions.update", ["question" => "__question_code__"]) }}'.replace('__question_code__', question.code);
        document.getElementById('editModal').classList.remove('hidden');
    }

    // Funkcia na zatvorenie modálneho okna pre editáciu
    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    // Funkcia na odoslanie formulára pre editáciu
    function submitEditForm() {
        document.getElementById('editForm').submit();
    }


    function setQuestionCode(event) {
        event.preventDefault();
        var questionCode = event.target.dataset.questionCode;
        console.log(questionCode);
        var form = document.getElementById('deleteForm');
        form.querySelector('input[name="question_code"]').value = questionCode;
        form.submit();
    }


    document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('category');
        const inputOptions = document.getElementById('input-options');

        categorySelect.addEventListener('change', function() {
            if (categorySelect.value === 'input') {
                inputOptions.style.display = 'block';
            } else {
                inputOptions.style.display = 'none';
            }
        });

        const addOptionButton = document.getElementById('add-option');
        if (addOptionButton) {
            addOptionButton.addEventListener('click', function() {
                const inputOptions = document.getElementById('input-options');
                const inputField = document.createElement('input');
                inputField.type = 'text';
                inputField.name = 'input_options[]';
                inputField.classList.add('shadow', 'appearance-none', 'border', 'rounded', 'w-full', 'py-2', 'px-3', 'text-gray-700', 'leading-tight', 'focus:outline-none', 'focus:shadow-outline', 'dark:bg-gray-700', 'dark:text-white');
                inputField.placeholder = 'Enter option';
                inputOptions.appendChild(inputField);
            });
        }
    });
</script>