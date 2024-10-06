<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Edit Client') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md overflow-hidden sm:rounded-lg p-6">
                <form method="POST" action="{{ route('clients.update', $client) }}">
                    @method('PUT')
                    @csrf

                    <h3 class="text-2xl font-semibold text-gray-700 mt-6 border-b-2 pb-2">
                        {{ __('Contact Information') }}
                    </h3>

                    <!-- Name -->
                    <div class="mt-4">
                        <x-input-label for="contact_name" :value="__('Name')" />
                        <x-text-input id="contact_name" class="block mt-1 w-full" type="text" name="contact_name"
                                      :value="old('contact_name', $client->contact_name)" required />
                        <x-input-error :messages="$errors->get('contact_name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div class="mt-4">
                        <x-input-label for="contact_email" :value="__('Email')" />
                        <x-text-input id="contact_email" class="block mt-1 w-full" type="text" name="contact_email"
                                      :value="old('contact_email', $client->contact_email)" required />
                        <x-input-error :messages="$errors->get('contact_email')" class="mt-2" />
                    </div>

                    <!-- Phone -->
                    <div class="mt-4">
                        <x-input-label for="contact_phone_number" :value="__('Phone number')" />
                        <x-text-input id="contact_phone_number" class="block mt-1 w-full" type="text" name="contact_phone_number"
                                      :value="old('contact_phone_number', $client->contact_phone_number)" required />
                        <x-input-error :messages="$errors->get('contact_phone_number')" class="mt-2" />
                    </div>


                    <h3 class="text-2xl font-semibold text-gray-700 mt-6 border-b-2 pb-2">
                        {{ __('Company Information') }}
                    </h3>

                    <!-- Company Name -->
                    <div class="mt-4">
                        <x-input-label for="company_name" :value="__('Company Name')" />
                        <x-text-input id="company_name" class="block mt-1 w-full" type="text" name="company_name"
                                      :value="old('company_name', $client->company_name)" required />
                        <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                    </div>

                    <!-- VAT -->
                    <div class="mt-4">
                        <x-input-label for="company_vat" :value="__('Company VAT')" />
                        <x-text-input id="company_vat" class="block mt-1 w-full" type="text" name="company_vat"
                                      :value="old('company_vat', $client->company_vat)" required />
                        <x-input-error :messages="$errors->get('company_vat')" class="mt-2" />
                    </div>

                    <!-- Address -->
                    <div class="mt-4">
                        <x-input-label for="company_address" :value="__('Company Address')" />
                        <x-text-input id="company_address" class="block mt-1 w-full" type="text" name="company_address"
                                      :value="old('company_address', $client->company_address)" required autofocus />
                        <x-input-error :messages="$errors->get('company_address')" class="mt-2" />
                    </div>

                    <!-- City -->
                    <div class="mt-4">
                        <x-input-label for="company_city" :value="__('Company city')" />
                        <x-text-input id="company_city" class="block mt-1 w-full" type="text" name="company_city"
                                      :value="old('company_city', $client->company_city)" required autofocus />
                        <x-input-error :messages="$errors->get('company_city')" class="mt-2" />
                    </div>

                    <!-- Zip Code -->
                    <div class="mt-4">
                        <x-input-label for="company_zip" :value="__('Company zip')" />
                        <x-text-input id="company_zip" class="block mt-1 w-full" type="text" name="company_zip"
                                      :value="old('company_zip', $client->company_zip)" required autofocus />
                        <x-input-error :messages="$errors->get('company_zip')" class="mt-2" />
                    </div>

                    <!-- Save Button -->
                    <div class="flex justify-end mt-6">
                        <x-primary-button class="bg-blue-600 text-white hover:bg-blue-700">
                            {{ __('Save Changes') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
