<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Потребители') }}
        </h1>
    </x-slot>

    <div class="py-4">
        <div class="max-w-xl mx-auto sm:px-4 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if(count($errors) > 0)
                        @foreach($errors as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @endif

                    @if(session()->has('message'))
                        <div class="alert alert-primary" role="alert">
                            <strong>{{session()->get('message')}}</strong>
                        </div>
                    @endif


                    <form method="POST" action="{{ route('users.add') }}">
                    @csrf

                    <!-- Name -->
                        <div class="mt-4">
                            <x-label for="name" :value="__('Име')" />
                            <x-input id="name" class="block mt-1 w-full"
                                     type="name"
                                     name="name" :value="old('name')"
                                     required  />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Е-мейл')" />
                            <x-input id="email" class="block mt-1 w-full"
                                     type="email"
                                     name="email" :value="old('email')"
                                     required />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Парола')" />
                            <x-input id="password" class="block mt-1 w-full"
                                     type="password"
                                     name="password"
                                     required autocomplete="new-password" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-label for="password_confirmation" :value="__('Потвърди парола')" />
                            <x-input id="password_confirmation" class="block mt-1 w-full"
                                     type="password"
                                     name="password_confirmation" required />
                        </div>

                        <div class="flex items-center justify-center mt-4">
                            <x-button class="ml-4">
                                {{ __('Добави потребител') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
