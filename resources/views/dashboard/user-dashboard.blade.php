<x-app-layout>

    <!-- Modal -->
    <div class="fixed w-full hidden" id="modal">
        <div class="flex items-center justify-center min-h-screen px-4 pb-20 text-center">
            <!-- Background overlay -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Modal content -->
            <div class="inline-block align-middle bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <!-- Add your form fields here -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 dark:text-gray-300 dark:te text-sm font-bold mb-2">Name</label>
                            <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white" placeholder="Enter title">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Email</label>
                            <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white" placeholder="Enter title">
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Password</label>
                            <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white" placeholder="********">
                        </div>

                        <div class="mb-4">
                            <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem]">
                                <input id="admin" class="relative float-left -ms-[1.5rem] me-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-secondary-500 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] rtl:float-right dark:border-neutral-400 dark:checked:border-primary" type="radio" name="is_admin" value=1 />
                                <label class="mt-px inline-block ps-[0.15rem] hover:cursor-pointer text-gray-700 dark:text-gray-300" for="radioDefault01">
                                    Admin
                                </label>
                            </div>
                            <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem]">
                                <input id="user" class="relative float-left -ms-[1.5rem] me-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-secondary-500 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] rtl:float-right dark:border-neutral-400 dark:checked:border-primary" type="radio" name="is_admin" value=0 />
                                <label class="mt-px inline-block ps-[0.15rem] hover:cursor-pointer text-gray-700 dark:text-gray-300" for="radioDefault02">
                                    User
                                </label>
                            </div>
                        </div>

                        <!-- Modal footer with submit button -->
                        <div class="flex items-center justify-end mt-4">
                            <button type="button" onclick="submitEditForm()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 mr-4 px-4 rounded">Update
                                user</button>
                            <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="closeModal()">Close</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="/register" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create New User</a>
                </div>
            </div>
        </div>
    </div>

    @foreach($users as $user)
    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4">
                    <div class="grid gap-6 mb-2 md:grid-cols-2">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" value="{{$user->name}}" disabled />
                        </div>
                        <div>
                            <label for=" email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="example@example.com" value="{{$user->email}}" disabled />
                        </div>
                    </div>

                    <div class="text-gray-900 dark:text-gray-100 sm:flex gap-1 flex justify-end">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded edit-button" type="button" data-user="{{ json_encode($user) }}">Edit</button>
                        <form id=" deleteForm" action='{{ route("user.delete", $user->id) }}' method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="user-id" value="{{ $user->id }}">
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</x-app-layout>

<script>
    function openModal() {
        document.getElementById('modal').classList.add('fixed');
        document.getElementById('modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
        document.getElementById('modal').classList.remove('fixed');
    }

    var editButtons = document.querySelectorAll('.edit-button');
    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const data = JSON.parse(this.getAttribute('data-user'));
            console.log(data);
            openEditModal(data);
        });
    });


    function openEditModal(data) {
        document.getElementById('modal').classList.remove('hidden');
        document.getElementById('name').value = data.name;
        document.getElementById('email').value = data.email;
        console.log(data.id)
        if (data.is_admin === 1) {
            document.getElementById('admin').checked = true;
        } else {
            document.getElementById('user').checked = true;
        }
        document.getElementById('editForm').action = '{{ route("user.update", "3")}}'
    }

    // Funkcia na zatvorenie modálneho okna pre editáciu
    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    // Funkcia na odoslanie formulára pre editáciu
    function submitEditForm() {
        document.getElementById('editForm').submit();
    }


    /* document.addEventListener('DOMContentLoaded', function() {
        const

     category
    Select = document.getElementById('category');
        const
            inputOptions = document.getElementById('input-options');

        categorySelect.addEventListener('change', function() {
            if (categorySelect.value === 'input') {
                inputOptions.style.display = 'block';
            } else {
                inputOptions.style.display = 'none';
            }
        });


        const
            addOptionButton = document.getElementById('add-option');
        if (addOptionButton) {
            addOptionButton.addEventListener('click', function() {
                const inputOptions = document.getElementById('input-options');
                const inputField = document.createElement('input');
                inputField.type = 'text';
                inputField.name = 'input_options[]';
                inputField.classList.add('shadow', 'appearance-none', 'border', 'rounded', 'w-full', 'py-2',
                    'px-3', 'text-gray-700', 'leading-tight', 'focus:outline-none',
                    'focus:shadow-outline', 'dark:bg-gray-700', 'dark:text-white');
                inputField.placeholder = 'Enter option';
                inputOptions.appendChild(inputField);
            });
        }
    }); */
</script>