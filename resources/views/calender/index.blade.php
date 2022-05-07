<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="panel panel-default">
                        @include('calender.full-calender')
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>


