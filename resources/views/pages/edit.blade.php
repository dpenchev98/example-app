<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Редактиране на  страница') }}
        </h1>
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

                @if(session()->has('message'))
                    <div class="alert alert-primary" role="alert">
                        <strong>{{session()->get('message')}}</strong>
                    </div>
                @endif

                <x-auth-validation-errors/>
                <form method="POST" action="{{ route('pages.update',$page) }}">
                    @csrf

                    <div>
                        <x-label for="title" :value="__('Заглавие')" />
                        <textarea id="title" class="block mt-1 w-full"  name="title">{{$page->title}}</textarea>
                    </div>


                    <div class="mt-4">
                        <x-label for="content" :value="__('Съдържание')" />
                        <textarea id="content" class="block mt-1 w-full"  name="content">{{$page->content}}</textarea>
                    </div>

                    <div class="flex items-center justify-center mt-4">
                        <x-button class="ml-4">
                            {{ __('Редактирай страница') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</x-app-layout>
