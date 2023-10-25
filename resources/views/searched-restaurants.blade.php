<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach($restaurants as $restaurant)
                        <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$restaurant->name}}</h5>
                            {{--                            <p class="font-normal text-gray-700 dark:text-gray-400">{{$recipe->calorie_count}}.</p>--}}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    fetch('/all-users', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'url': '/payment',
            "X-CSRF-Token": document.querySelector('input[name=_token]').value
        },
    })
</script>
