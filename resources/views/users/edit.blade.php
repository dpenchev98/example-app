<x-app-layout>
<x-slot name="header">
    <h1 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Редактиране на  потребител ') }}
    </h1>
</x-slot>

<div class="py-4">
    <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
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

                <x-auth-validation-errors/>
                    <form method="POST" action="{{ route('users.updateProfile', $user) }}">
                    @csrf
                    <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Име')" />
                            <x-input id="name" class="block mt-1 w-full"
                                     type="text"
                                     name="name" value="{{$user->name}}"
                                     required autofocus />
                        </div>
                        <div class="flex items-center justify-center mt-4">
                            <x-button class="ml-4">
                                {{ __('Редактирай') }}
                            </x-button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

    <div class="py-4">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors/>
                    <form method="POST" action="{{ route('users.updateEmail', $user) }}">
                    @csrf
                    <!-- Email -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Е-мейл')" />
                            <x-input id="email" class="block mt-1 w-full"
                                     type="email"
                                     name="email" value="{{$user->email}}"
                                     required />
                        </div>
                        <div class="flex items-center justify-center mt-4">
                            <x-button class="ml-4">
                                {{ __('Редактирай') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors/>
                    <form method="POST" action="{{ route('users.updatePassword', $user) }}">
                        @csrf
                    <!-- Password -->
                        <div class="mt-4">
                        <x-label for="password" :value="__('Стара парола')" />
                        <x-input id="password" class="block mt-1 w-full"
                                 type="password"
                                 name="password"
                                 required autocomplete="password" />
                        </div>

                    <!-- New Password -->
                        <div class="mt-4">
                            <x-label for="new_password" :value="__('Нова парола')" />
                            <x-input id="new_password" class="block mt-1 w-full"
                                     type="password"
                                     name="new_password"
                                     required />
                        </div>
                            <div class="flex items-center justify-center mt-4">
                                <x-button class="ml-4">
                                    {{ __('Редактирай') }}
                                </x-button>
                           </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
