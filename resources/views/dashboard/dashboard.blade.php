<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

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
                <form action="" method="POST">
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
</script>