<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('projects.store') }}" class="space-y-6">
                    @csrf

                    <!-- Title -->
                    <div>
                        <x-input-label for="contact_name" :value="__('Title')"/>
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                      :value="old('title')" required autofocus autocomplete="title"/>
                        <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                    </div>

                    <!-- Description -->
                    <div>
                        <x-input-label for="description" :value="__('Description')"/>
                        <x-text-input id="description" class="block mt-1 w-full" type="text" name="description"
                                      :value="old('description')" required autocomplete="description"/>
                        <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                    </div>

                    <!-- Deadline -->
                    <div>
                        <x-input-label for="deadline_at" :value="__('Deadline')"/>
                        <x-text-input id="deadline_at" class="block mt-1 w-full" type="date" name="deadline_at"
                                      :value="old('deadline_at')" required autocomplete="deadline_at"/>
                        <x-input-error :messages="$errors->get('deadline_at')" class="mt-2"/>
                    </div>

                    <!-- Assigned User -->
                    <div>
                        <x-input-label for="user_id" :value="__('Assigned user')"/>
                        <select id="user_id" name="user_id" class="block mt-1 w-full" required>
                            <option value="">-- Select user --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" @selected(old('user_id') == $user->id)>
                                    {{ $user->first_name . ' ' . $user->last_name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('user_id')" class="mt-2"/>
                    </div>


                    <!-- Client -->
                    <div>
                        <x-input-label for="client_id" :value="__('Client')"/>
                        <select id="client_id" name="client_id" class="block mt-1 w-full" required>
                            <option value="">-- Select client --</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}" @selected(old('client_id') == $client->id)>
                                    {{ $client->company_name}}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('client_id')" class="mt-2"/>
                    </div>


                    <!-- Status -->
                    <div>
                        <x-input-label for="status" :value="__('Status')"/>
                        <select id="status" name="status" class="block mt-1 w-full" required>
                            <option value="">-- Select  --</option>
                        @foreach(\App\Enums\ProjectStatus::cases() as $status)
                                <option value="{{ $status->value }}" @selected(old('status') == $status->value)>
                                    {{ $status->value}}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('client_id')" class="mt-2"/>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6">
                        <x-primary-button class="w-full bg-blue-500 text-white hover:bg-blue-600">
                            {{ __('Save') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
