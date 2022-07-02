<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@chenfengyuan/datepicker@1.0.10/dist/datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@chenfengyuan/datepicker@1.0.10/dist/datepicker.min.css">
<script type="text/javascript">$(function (){
        $('[data-toggle="datepicker"]').datepicker();
    });</script>
<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="panel panel-default">
                        <div class="panel-heading text-2xl">
                            Отчетна дейност
                        </div>

                        <form class = "form-inline my-2 my-lg-0" type="get" action="{{url ('/search')}}">
                            <input data-toggle="datepicker" name="from" value="{{(request()->input('from') ?? old('from'))}}" class = "mr-sm-2 appearance-none border-2 border-black-200 rounded py-1 px-1" >
                            <input data-toggle="datepicker" name="to" value="{{(request()->input('to') ?? old('to'))}}" class = "mr-sm-2 appearance-none border-2 border-black-200 rounded py-1 px-1">
                            <select name="user" class = "mr-sm-2">
                                <option value="">Специалист</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}" {{$user->id == (request()->input('user') ?? old('user')) ?'selected':' '}}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <select name="client" class = "mr-sm-2">
                                <option value="">Клиент</option>
                                @foreach($clients as $client)
                                <option value="{{ $client->id }}" {{$client->id == (request()->input('client') ?? old('client')) ?'selected':' '}}>{{ $client->name }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-primary mr-2" type="submit">Търсене</button>
                            <a href = "{{url('/reports')}}">
                                <button class="btn btn-primary" type="button">Изчисти</button>
                            </a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </x-slot>

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
         <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
             <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg p-3">
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Специалист
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Клиент
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Дейност
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Начало
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Край
                            </th>
                        </tr>
                      </thead>

                      <tbody class="bg-white divide-y divide-gray-200">

                        @foreach($reports as $report)
                            <tr class="text-center">
                                <div class="flex items-center">
                                    <div class="text-sm text-gray-500">
                                        <td>
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $report->user->name }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-sm font-medium text-gray-900">
                                                {{$report->client->name}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-sm font-medium text-gray-900">
                                                {{$report->title}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-sm font-medium text-gray-900">
                                                {{$report->start}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-sm font-medium text-gray-900">
                                                {{$report->end}}
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
