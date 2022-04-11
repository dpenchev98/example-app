<x-app-layout>
    <x-slot name="header">
        <span class="font-extralight text-xl">
            Промяна на парола
        </span>
    </x-slot>

    <div class="py-4">
        <div class="max-w-lg mx-auto sm:px-4 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if(session()->has('message'))
                        <div class="alert alert-primary" role="alert">
                            <strong>{{session()->get('message')}}</strong>
                        </div>
                    @endif

                    <x-auth-validation-errors/>
                    <form method="POST" action="{{ route('changepassword') }}">
                    @csrf

                <!-- Password -->
                        <div class="mt-4">
                        <x-label for="password" :value="__('Стара парола')" />
                            <x-input id="password" class="block mt-1 "
                                     type="password"
                                     name="password"
                                     required autocomplete="password" />
                        </div>

                <!-- New Password -->
                        <div class="mt-4">
                        <x-label for="new_password" :value="__('Нова парола')" />
                            <x-input id="new_password" class="block mt-1"
                                     type="password"
                                     name="new_password"
                                     required />
                        </div>
                 <!-- Confirm New Password -->
                        <div class="mt-4">
                        <x-label for="new_password_confirmation" :value="__('Потвърди нова парола')" />
                            <x-input id="password_confirmation" class="block mt-1"
                                     type="password"
                                     name="new_password_confirmation"
                                     required />
                        </div>

                        <div class="flex items-center justify-center mt-4">
                            <x-button class="ml-4">
                                {{ __('Запази нова парола') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
