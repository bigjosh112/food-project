<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
            <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-3 gap-5">
                    <!--Card 1-->
                @foreach($sortedRestaurants as $restaurant)
                    <div class=" w-full lg:max-w-full lg:flex bg-purple-400 py-6">
                        <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal bg-purple-200">
                            <div class="flex items-center ">
                                <img class="w-10 h-10 rounded-full mr-4" src="{{asset("img/img.jpg")}}" alt="Avatar of Writer" style="width: 100px">
                                <div class="text-sm">
                                    <p class="text-black leading-none">{{$restaurant->name}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
</x-app-layout>


