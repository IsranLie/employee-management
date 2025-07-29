@extends('app') @section('contents')

<main class="flex-1 p-4 transition-all duration-200 ease-in-out">
    <div
        class="bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 p-4 rounded-lg"
    >
        <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200">
            Home
        </h2>
        <p class="text-gray-600 mb-6 dark:text-gray-300">
            These statistics provide a quick overview of the running data and
            assist with operational monitoring.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
            <div class="bg-blue-500 text-white p-4 rounded-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-100">Employee</p>
                        <p class="text-2xl font-bold">{{ $employees }}</p>
                    </div>
                    <i data-lucide="users" class="w-8 h-8 text-blue-200"></i>
                </div>
            </div>
            <div class="bg-green-500 text-white p-4 rounded-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100">Department</p>
                        <p class="text-2xl font-bold">{{ $departments }}</p>
                    </div>
                    <i
                        data-lucide="landmark"
                        class="w-8 h-8 text-green-200"
                    ></i>
                </div>
            </div>
            <div class="bg-yellow-500 text-white p-4 rounded-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-yellow-100">Shift</p>
                        <p class="text-2xl font-bold">{{ $shifts }}</p>
                    </div>
                    <i
                        data-lucide="clock-3"
                        class="w-8 h-8 text-yellow-200"
                    ></i>
                </div>
            </div>
            <div class="bg-purple-500 text-white p-4 rounded-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-100">User</p>
                        <p class="text-2xl font-bold">{{ $users }}</p>
                    </div>
                    <i
                        data-lucide="user-round-cog"
                        class="w-8 h-8 text-purple-200"
                    ></i>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
