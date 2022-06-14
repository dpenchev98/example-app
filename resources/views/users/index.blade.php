<x-app-layout>
<x-slot name="header">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading text-xl">
                        Потребители
                    </div>

                    <div class="panel-body">
                        <div style="margin-bottom: 10px;">
                            <a href="/users/add" class="btn btn-primary">
                                Добави нов потребител
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-slot>

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg p-3">

                @if(session()->has('message'))
                    <div class="alert alert-primary" role="alert">
                        <strong>{{session()->get('message')}}</strong>
                    </div>
                @endif

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ИД
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Име
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Мейл
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Опции
                        </th>
                    </tr>
                    </thead>


                    <tbody class="bg-white divide-y divide-gray-200">

                    @foreach($users as $user)
                        <tr class="text-center">
                            <div class="flex items-center">
                                <div class="text-sm text-gray-500">
                                    <td>
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $user->id }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $user->name }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $user->email  }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href = "/users/{{$user->id}}/edit" class="btn btn-success">Редактирай</a>
                                        <a href = "/users/{{$user->id}}/delete" class="btn btn-danger">Изтрий</a>
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
