@vite('resources/js/user-dashboard-scripts.js')

@include('components.create-user-modal')
@include('components.edit-user-modal')


<x-app-layout>

    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <button x-data class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="$dispatch('open-modal', 'create-user-modal')">Create New User</button>
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
                        <button x-data class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded edit-btn" type="button" data-user="{{ json_encode($user) }}" @click="$dispatch('open-modal', 'edit-user-modal')">Edit</button>
                        <form class="m-0" id=" deleteForm" action='{{ route("user.delete", $user->id) }}' method="POST">
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
