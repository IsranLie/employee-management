<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login | E-Staff</title>

        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

        <style>
            body {
                font-family: "Nunito", sans-serif;
            }
        </style>
    </head>

    <body class="min-h-screen bg-gray-200 flex items-center justify-center">
        <div class="w-full max-w-sm bg-white p-8 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">
                Login to E-Staff
            </h2>

            <form action="{{ route('home') }}" method="GET">
                <div class="mb-4">
                    <label
                        for="username"
                        class="block text-sm font-medium text-gray-700"
                        >Username</label
                    >
                    <input
                        type="username"
                        id="username"
                        autofocus
                        class="mt-1 w-full rounded-md border border-blue-100 px-3 py-2 shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    />
                </div>

                <div class="mb-4 relative">
                    <label
                        for="password"
                        class="block text-sm font-medium text-gray-700"
                        >Password</label
                    >
                    <input
                        type="password"
                        id="password"
                        placeholder="•••"
                        class="mt-1 w-full rounded-md border border-blue-100 px-3 py-2 pr-10 shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    />
                    <button
                        type="button"
                        id="togglePassword"
                        class="absolute right-3 top-9 text-gray-500 hover:text-gray-700"
                    >
                        <i data-lucide="eye" class="w-5 h-5"></i>
                    </button>
                </div>

                <button
                    type="submit"
                    class="w-full rounded-md bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700 transition"
                >
                    Login
                </button>
            </form>

            <p class="mt-4 text-center text-sm text-gray-600">
                Forgot password?
                <a href="#" class="text-indigo-600 hover:underline">Change</a>
            </p>
        </div>

        <script>
            tailwind.config = {
                darkMode: "class",
            };

            lucide.createIcons();

            const togglePassword = document.getElementById("togglePassword");
            const passwordInput = document.getElementById("password");

            togglePassword.addEventListener("click", () => {
                const type =
                    passwordInput.getAttribute("type") === "password"
                        ? "text"
                        : "password";
                passwordInput.setAttribute("type", type);

                // Toggle icon
                togglePassword.innerHTML = `<i data-lucide="${
                    type === "password" ? "eye" : "eye-off"
                }" class="w-5 h-5"></i>`;
                lucide.createIcons();
            });
        </script>
    </body>
</html>
