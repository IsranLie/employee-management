@extends('app') @section('contents')

<main class="flex-1 p-4 transition-all duration-200 ease-in-out">
    <div
        class="bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 p-4 rounded-lg"
    >
        <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200">
            Home
        </h2>
        <p class="text-gray-600 mb-6 dark:text-gray-300">
            This is your main content area. The sidebar can be toggled using the
            menu button.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
            <div class="bg-blue-500 text-white p-4 rounded-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-100">Total Users</p>
                        <p class="text-2xl font-bold">1,234</p>
                    </div>
                    <i data-lucide="users" class="w-8 h-8 text-blue-200"></i>
                </div>
            </div>
            <div class="bg-green-500 text-white p-4 rounded-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100">Revenue</p>
                        <p class="text-2xl font-bold">$12,345</p>
                    </div>
                    <i
                        data-lucide="dollar-sign"
                        class="w-8 h-8 text-green-200"
                    ></i>
                </div>
            </div>
            <div class="bg-yellow-500 text-white p-4 rounded-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-yellow-100">Orders</p>
                        <p class="text-2xl font-bold">567</p>
                    </div>
                    <i
                        data-lucide="shopping-cart"
                        class="w-8 h-8 text-yellow-200"
                    ></i>
                </div>
            </div>
            <div class="bg-purple-500 text-white p-4 rounded-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-100">Messages</p>
                        <p class="text-2xl font-bold">89</p>
                    </div>
                    <i data-lucide="mail" class="w-8 h-8 text-purple-200"></i>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
