<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('За връзка с нас') }}
        </h1>
    </x-slot>

        <div class="py-4">
            <div class="max-w-lg mx-auto sm:px-4 lg:px-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b">

                        @if(session()->has('message'))
                            <div class="alert alert-primary" role="alert">
                                <strong>{{session()->get('message')}}</strong>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('contact') }}">
                            @csrf
                            <div>
                                <x-label for="name" :value="__('Име')" />
                                <x-input id="name" class="block mt-1 w-full"
                                         type="text"
                                         name="name" value="{{Auth::user()?Auth::user()->name:''}}"
                                         required autofocus />
                            </div>
                            <div class="mt-4">
                                <x-label for="email" :value="__('Е-мейл')" />
                                <x-input id="email" class="block mt-1 w-full"
                                         type="email"
                                         name="email" value="{{Auth::user()?Auth::user()->email:''}}"
                                         required />

                            </div>
                            <div class="mt-4">
                                <x-label for="subject" :value="__('Относно')" />
                                <x-input id="subject" class="block mt-1 w-full"
                                         type="text"
                                         name="subject"
                                         required autofocus />
                            </div>
                            <div class="mt-4">
                                <x-label for="message" :value="__('Съобщение')" />
                                <textarea type="text" id="message" class="block mt-1 w-full"  name="message"></textarea>
                            </div>
                            <div class="flex items-center justify-center mt-4">
                                <x-button class="ml-4">
                                    {{ __('Изпрати') }}
                                </x-button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
</x-app-layout>






