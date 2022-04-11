<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Добавяне на нов клиент') }}
        </h2>
    </x-slot>


    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(count($errors) > 0)
                        @foreach($errors as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @endif




                    <form method="POST" action="{{ route('clients.add') }}">
                    @csrf
                        <div>
                            <x-label for="name" :value="__('Име')" />
                            <textarea id="name" class="block mt-1 w-full"  name="name"></textarea>
                        </div>
                        <div class="mt-4">
                            <x-label for="age" :value="__('Години')" />
                            <textarea type="text" id="age" class="block mt-1 w-full"  name="age"></textarea>
                        </div>
                        <div class="mt-4">
                            <x-label for="gender" :value="__('Пол')" />
                            <select id="gender" class="block mt-1"  name="gender">
                                <option>    </option>
                                <option value = "Мъж"> Мъж </option>
                                <option value = "Жена"> Жена </option>
                            </select>
                        </div>
                        <div class="mt-4">
                            <x-label for="notes" :value="__('Бележки')" />
                            <textarea type="text" id="notes" class="block mt-1 w-full"  name="notes"></textarea>
                        </div>
                        <div class="flex items-center justify-center mt-4">
                            <x-button class="ml-4">
                                {{ __('Добави') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
