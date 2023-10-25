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

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Recipe name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Calories
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">

                    </th>
                </tr>
                </thead>
                <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$recipe->name}}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$recipe->calorie_count}}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        #{{$recipe->price ?? '-'}}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <button
                            type="button"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                            data-te-toggle="modal"
                            data-te-target="#exampleModalTips"
                            data-te-ripple-init
                            data-te-ripple-color="light">
                            Click to see USD price
                        </button>
                    </th>
                </tr>
                </tbody>
            </table>
        </div>

                        </div>
            </div>
        </div>
    </div>


    <div class="fixed inset-0 z-50 flex items-center justify-center overflow-x-hidden overflow-y-auto outline-none focus:outline-none hidden" id="exampleModalTips">
        <div class="relative w-auto max-w-md">
            <!-- Modal content -->
            <div class="relative flex flex-col p-6 bg-white  shadow-md rounded-lg">
                <!-- Close button -->
                <button class="absolute top-0 right-0 p-2 -mt-4 -mr-4 text-2xl text-gray-600 dark:text-gray-400 rounded-full hover:bg-gray-200 dark:hover-bg-gray-700 focus:outline-none focus:bg-gray-200 dark:focus:bg-gray-700" onclick="hideModal()">
                    &times;
                </button>
                <!-- Modal body -->
                <div class="mt-4">
                    <!-- Your content goes here -->
                    <!-- Example: Display the cost in USD -->
                    <p class="text-2xl font-semibold text-gray-800 dark:text-black-300">Cost in USD: ${{$recipe->usd}}</p>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script>
    // Function to show the modal
    function showModal() {
        document.getElementById('exampleModalTips').classList.remove('hidden');
    }

    // Attach a click event listener to the button
    document.querySelector('[data-te-toggle="modal"]').addEventListener('click', showModal);

    // Function to hide the modal
    function hideModal() {
        document.getElementById('exampleModalTips').classList.add('hidden');
    }

    // Attach a click event listener to the close button
    document.querySelector('.modal-close-button').addEventListener('click', hideModal);




</script>
