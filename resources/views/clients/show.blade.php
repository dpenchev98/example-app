<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Потребителска карта на') }} {{$client->name}}
        </h1>
    </x-slot>
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>




    <div class="py-4">
        <div class="w-1/2 mx-auto sm:px-4 lg:px-4">
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

                        <table class="divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Начален час
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Краен час
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Дейност
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Специалист
                                </th>
                            </tr>
                            </thead>


                            <tbody class="bg-white divide-y divide-gray-200">

                            @foreach($client->events as $event)
                                <tr class="text-center">
                                    <div class="flex items-center">
                                        <div class="text-sm text-gray-500">
                                            <td>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{$event->start}}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{$event->end}}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{$event->title}}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{$event->user->name}}
                                                </div>
                                            </td>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
