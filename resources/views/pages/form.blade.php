<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Добавяне на новa страница') }}
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


                    <form method="POST" action="{{ route('calender.action') }}">
                        @csrf
                        <div>
                            <x-label for="title" :value="__('Заглавие')" />
                            <textarea type="text" id="title" class="block mt-1 w-full"  name="title"></textarea>
                        </div>
                        <div class="mt-2">
                            <x-label for="content" :value="__('Съдържание')" />
                            <textarea type="text" id="content" class="block mt-1 w-full"  name="content"></textarea>
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
