<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-4">
                    <a href="{{ route('tasks.create') }}"
                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add new task
                    </a>

                    <table class="min-w-full bg-white border-collapse">
                        <thead>
                        <tr>
                            <th class="px-4 py-2 border">{{ __('TITLE') }}</th>
                            <th class="px-4 py-2 border">{{ __('ASSIGNED TO') }}</th>
                            <th class="px-4 py-2 border">{{ __('CLIENT') }}</th>
                            <th class="px-4 py-2 border">{{ __('DEADLINE') }}</th>
                            <th class="px-4 py-2 text-right border">{{ __('STATUS') }}</th>
                            <th class="px-4 py-2 text-right border">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td class="px-4 py-2 border">{{ $task->title }}</td>
                                <td class="px-4 py-2 border">{{ $task->user->first_name}} {{ $task->user->last_name}}</td>
                                <td class="px-4 py-2 border">{{ $task->client->company_name }}</td>
                                <td class="px-4 py-2 border">{{ $task->deadline_at}}</td>
                                <td class="px-4 py-2 text-right border">{{ $task->status }}</td>
                                <td class="px-4 py-2 text-right border">
                                    <a href="{{ route('tasks.edit', $task) }}" class="text-blue-500">Edit</a>
                                    @can(\App\Enums\PermissionEnum::DELETE_TASKS->value)
                                        <form method="POST" action="{{ route('tasks.destroy', $task) }}"
                                              class="inline-block" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 ml-4">Delete</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="mt-6">
                        {{ $tasks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
