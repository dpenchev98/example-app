<x-app-layout>
<x-slot name="header">
<div class="bg-gray-100 font-sans leading-normal tracking-normal">
    <!--Container-->
    <div class="container w-full md:max-w-3xl mx-auto pt-20">
        <div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">

            <!--Title-->
            <div class="container w-full md:max-w-lg">
                @if(Auth::user()&&Auth::user()->isAdmin == 1)
				<span class="text-base md:text-sm text-green-500 font-bold"><</span>
                <a href="/pages" class="text-base md:text-lg text-green-500 font-bold no-underline hover:underline">Назад</a>
                @endif
                <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">
                    {{$page->title}}
                </h1>
                <p class="text-sm md:text-base font-normal text-gray-600">
                    Публикувано от {{$page->createdby->name}} на {{$page->created_at}}
                </p>
            </div>
            <div class = "mt-8 mx-auto">
                {!! $page->content !!}

            </div>
        </div>
    </div>
</div>
</x-slot>
</x-app-layout>
