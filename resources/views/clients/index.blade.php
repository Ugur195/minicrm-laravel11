<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-4">
                    <a href="{{ route('clients.create') }}"
                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add new client
                    </a>

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($clients as $client)
                            <div class="border rounded-lg p-4 bg-gray-100">
                                <h3 class="font-bold text-lg text-blue-700 mb-2">{{ $client->company_name }}</h3>
                                <p><strong>VAT:</strong> {{ $client->company_vat }}</p>
                                <p><strong>Address:</strong> {{ $client->company_address }}</p>
                                <div class="flex justify-end space-x-4 mt-4">
                                    <a href="{{ route('clients.edit', $client) }}" class="text-blue-500">Edit</a>
                                    @can(\App\Enums\PermissionEnum::DELETE_CLIENTS->value)
                                        <form method="POST" action="{{ route('clients.destroy', $client) }}"
                                              onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Delete</button>
                                        </form>
                                    @endcan

                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        {{$clients->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
