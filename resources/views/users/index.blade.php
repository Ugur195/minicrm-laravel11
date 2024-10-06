<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('users.create') }}"
                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add new user
                    </a>
                    <table class="min-w-full table-auto">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">{{ __('ID') }}</th>
                            <th class="px-4 py-2">{{ __('FIRST NAME') }}</th>
                            <th class="px-4 py-2">{{ __('LAST NAME') }}</th>
                            <th class="px-4 py-2">{{ __('Email') }}</th>
                            <th class="px-4 py-2 text-right">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="border px-4 py-2">{{ $user->id }}</td>
                                <td class="border px-4 py-2">{{ $user->first_name }}</td>
                                <td class="border px-4 py-2">{{ $user->last_name }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2 text-right">
                                    <a href="{{ route('users.edit', $user) }}" class="text-blue-500 mr-3">Edit</a>
                                    <form method="POST" action="{{ route('users.destroy', $user) }}" class="inline"
                                          onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
