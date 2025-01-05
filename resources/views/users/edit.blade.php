<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Edit User
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-back-button></x-back-button>
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg max-w-2xl">
                <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data" id="edit-form" class="bg-white dark:bg-gray-200 p-6 overflow-hidden shadow-sm sm:rounded-lg max-w-2xl">
                    @method('put')
                    @csrf
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <x-input-label for="name">Name</x-input-label>
                            <x-text-input name="name" id="name" value="{{ $user->name }}" placeholder="Product Name..."></x-text-input>
                        </div>
                        <div>
                            <x-input-label for="email">Email</x-input-label>
                            <x-text-input name="email" id="email" value="{{ $user->email }}" placeholder="Dimensions..."></x-text-input>
                        </div>
                        <div>
                            <x-input-label for="password">Password (optional)</x-input-label>
                            <x-text-input name="password" id="id" placeholder="new password"></x-text-input>
                        </div>
                        <div>
                            <div>Role:</div>
                            <select value="admin">
                                {{-- <option value="customer" {{ $user->role == 'customer' ? 'selected="selected' : '' }}>Customer</option>
                                <option value="employee" {{ $user->role == 'employee' ? 'selected="selected' : '' }}>Employee</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected="selected' : '' }}>Admin</option> --}}
                            </select>
                        </div>
                        <div>
                            <div>Current Status:</div>
                            <div>{{ $user->status }}</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-blue-800">
                            Confirm
                        </button>
                        {{-- <button type="button" class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                            <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                            Delete
                        </button> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
