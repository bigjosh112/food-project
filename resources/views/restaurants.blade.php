<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div>
                    <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Search Restaurants</label>
                    <form action="{{route('search-restaurant')}}" method="post">
                        @csrf
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="text" name="restaurant" id="restaurant" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <x-primary-button class="ml-4">
                            {{ __('Search') }}
                        </x-primary-button>
                    </form>

                </div>
            </div>
                    <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-3 gap-5">

                        @foreach($restaurants as $restaurant)
                        <!--Card 1-->
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
            </div>
        </div>
</x-app-layout>


