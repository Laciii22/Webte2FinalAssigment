@vite('resources/js/user-dashboard-scripts.js')

<x-modal name="create-user-modal">
    <div class="modal-content ">
        <h4 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight p-3">Create User
        </h4>
        <form method="POST" id="create-user-form" action="{{ route('user.store') }}">
            @csrf
            @method('POST')
            <div class="px-4 py-5 sm:px-6" id="create-modal-content">
                <div class="mb-2">
                    <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input name="email" type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" />
                </div>
                <div class="mb-2">
                    <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input name="name" type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" />
                </div>
                <div class="mb-2">
                    <label for="password" class="block text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input name="password" type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="************" />
                </div>

                <div class="mb-2">
                    <label for="admin" class="block text-sm font-medium text-gray-900 dark:text-white">Admin</label>
                    <select name="admin" id="is-admin-select" class="shadow appearance-none border rounded-lg text-sm w-full p-2.5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div id="error-message" class="text-red-500 text-sm hidden p-2"></div>
            </div>
            <div class="px-4 py-4 sm:px-6 flex flex-row justify-between">
                <div>
                    <button type="submit" id="crt-btn" onclick="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-1">Create
                        User</button>
                    <button type="button" @click="$dispatch('close-modal', 'create-user-modal')" class="mt-3 w-full sm:mt-0 sm:w-auto bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</x-modal>
