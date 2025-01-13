<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Users
        </h2>
    </x-slot>

   <div class="py-12 m-4 flex flex-col">
        <a type="button" href="{{ route('users.create') }}" class="m-4 mb-4 w-fit text-white bg-blue-200 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 focus:outline-none dark:focus:ring-blue-800">
            + Add New User
        </a>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border">
            <table class="w-full text-sm text-left rtl:text-right ">
                <thead class="text-xs uppercase bg-gray-300 border-gray-800 border-b-2 sm:rounded-t-lg">
                    <tr class="divide-x divide-gray-500">
                        <th scope="col" class="px-6 py-3">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr class="border-b border-gray-200 justify-items-center items-center divide-x">

                        <td class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap bg-gray-50">
                            {{($user->id) }}
                        </td>
                        <th scope="row" class="px-6 py-2 font-bold">
                            {{ ($user->name) }}
                        </th>
                        <td class="px-6 py-2">
                            {{($user->email) }}
                        </td>
                        <td class="px-6 py-2">
                            {{ $user->role }}
                        </td>
                        <td class="px-6 py-2">
                            {{ $user->status }}
                        </td>
                        <td class="h-full py-2 flex justify-center justify-items-center align-center items-center">
                            <a type="button" href="{{ route('users.edit',$user) }}" class="shrink focus:outline-none text-gray-800 bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:focus:ring-yellow-900">
                                Edit
                            </a>
                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" type="button">
                                Disable
                            </button>
                        </td>
                    </tr>
                    @empty
                    <p>No items to display.</p>
                    @endforelse
                </tbody>
            </table>
            <div class='justify-between justify-items-center m-4'>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
