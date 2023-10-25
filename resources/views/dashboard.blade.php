<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Search Recipes</label>
                        <form action="{{route('search-recipe')}}" method="post">
                            @csrf
                            <div class="relative mt-2 rounded-md shadow-sm">
                                <input type="text" name="recipe" id="recipe" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            <x-primary-button class="ml-4">
                                {{ __('Search') }}
                            </x-primary-button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
