<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Потребителска карта на клиент') }}
        </h1>
    </x-slot>




    <div class="py-4">
        <div class="max-w-lg mx-auto sm:px-4 lg:px-4">
            @if(Auth::user()&&Auth::user()->isAdmin == 1)
                <span class="text-base md:hover:text-center text-red-700 font-bold"><</span>
                <a href="/clients" class="text-base md:hover:text-center text-red-700 font-bold no-underline hover:underline">
                    Назад
                </a>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b">

                    @if(session()->has('message'))
                        <div class="alert alert-primary" role="alert">
                            <strong>{{session()->get('message')}}</strong>
                        </div>
                    @endif

                    <form method="GET" action="{{ route ('clients.show',  $client  )}}">
                        @csrf
                        <div>
                            <x-label for="name" :value="__('Име')" />
                            <x-input id="name" class="block mt-1 w-full"
                                     type="text"
                                     name="name" value="{{$client->name}}"
                                     required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="email" :value="__('Специалист')" />
                            <x-input id="email" class="block mt-1 w-full"
                                     type="email"
                                     name="email" value="{{Auth::user()?Auth::user()->email:''}}"
                                     required />
                        </div>
                        <div class="mt-4">
                            <x-label for="  " :value="__('Дейност')" />
                            <x-input id="   " class="block mt-1 w-full"
                                     type="text"
                                     name=" " value="{{"  "}}"
                                     required />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
