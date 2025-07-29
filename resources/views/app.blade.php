<!DOCTYPE html>
<html lang="en" class="transition-colors duration-300">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link
            rel="icon"
            type="image/x-icon"
            href="{{ asset('img/logo.png') }}"
        />
        <title>{{ $title }} | E-Staff</title>

        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Icon -->
        <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <!-- DataTables -->
        <link
            rel="stylesheet"
            href="https://cdn.datatables.net/2.3.2/css/dataTables.tailwindcss.css"
        />
        <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.3.2/js/dataTables.tailwindcss.js"></script>
        <!-- Alpine JS Modal -->
        <script
            defer
            src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"
        ></script>
        <!-- Styles Page -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    </head>

    <body>
        <div
            x-data="logoutComponent()"
            class="min-h-screen flex flex-col bg-gray-100 dark:bg-gray-900 dark:text-gray-100 transition-all duration-200 ease-in-out"
        >
            <!-- HEADER -->
            <header
                class="bg-white dark:bg-gray-800 dark:text-white shadow-md p-4 flex justify-between items-center border-b border-gray-200 dark:border-gray-700 transition-all duration-200 ease-in-out"
            >
                <div class="flex items-center gap-3">
                    <button
                        id="menu-toggle"
                        class="text-gray-700 dark:text-gray-200 dark:hover:text-gray-400 hover:text-gray-900 focus:outline-none transition-colors duration-200"
                    >
                        <i
                            id="toggle-icon"
                            data-lucide="menu"
                            class="w-6 h-6"
                        ></i>
                    </button>
                    <h1
                        class="text-xl font-bold text-gray-700 dark:text-gray-200"
                    >
                        E-Staff
                    </h1>
                </div>

                <div class="flex items-center gap-3">
                    <!-- Theme Toggler -->
                    <button
                        id="theme-toggler"
                        class="text-gray-600 rounded-xl hover:text-gray-400 dark:text-gray-200 focus:outline-none transition-colors duration-200"
                        title="Switch Theme"
                    >
                        <i
                            id="theme-icon"
                            data-lucide="moon"
                            class="w-6 h-6"
                        ></i>
                    </button>

                    <!-- User Dropdown Trigger -->
                    <div class="relative">
                        <button
                            id="user-toggle"
                            class="flex items-center gap-2 focus:outline-none rounded-xl dark:hover:bg-gray-700"
                        >
                            <i
                                data-lucide="user-circle"
                                class="w-8 h-8 text-gray-600 dark:text-gray-200"
                            ></i>
                            <span
                                class="text-sm text-gray-600 dark:text-gray-200"
                                >Admin</span
                            >
                            <i
                                id="user-toggle-arrow"
                                data-lucide="chevron-down"
                                class="w-3 h-3 text-gray-600 dark:text-gray-200"
                            ></i>
                        </button>
                        <!-- Dropdown content -->
                        <div
                            id="user-dropdown"
                            class="absolute right-0 mt-2 w-40 bg-white dark:bg-gray-800 rounded-md shadow-lg border hidden z-50"
                        >
                            <ul
                                class="py-2 px-2 text-sm text-gray-700 dark:text-gray-200"
                            >
                                <li>
                                    <a
                                        href="#"
                                        class="flex items-center gap-2 block px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200 group"
                                    >
                                        <i
                                            data-lucide="user"
                                            class="w-4 h-4 text-gray-600 group-hover:text-blue-600 dark:text-gray-200"
                                        ></i>
                                        Profile
                                    </a>
                                </li>
                                <hr class="my-2" />
                                <li>
                                    <a
                                        href="#"
                                        @click.prevent="showLogout = true"
                                        class="flex items-center gap-2 block px-4 py-2 rounded-lg hover:bg-blue-50 hover:text-red-600 transition-colors duration-200 group"
                                    >
                                        <i
                                            data-lucide="log-out"
                                            class="w-4 h-4 text-gray-600 group-hover:text-red-600 dark:text-gray-200"
                                        ></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>

            <div class="flex flex-1">
                <!-- SIDEBAR -->
                <aside
                    id="sidebar"
                    class="hidden md:block bg-white w-64 min-h-screen shadow-lg transition-all duration-200 ease-in-out dark:bg-gray-800 text-gray-800 dark:text-gray-200 border-r border-gray-200 dark:border-gray-700"
                >
                    <div class="p-4">
                        <nav class="space-y-2 font-semibold">
                            <a
                                href="{{ route('home') }}"
                                class="flex items-center gap-3 py-3 px-4 rounded-lg text-blue-600 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200 group
                                {{ $title === 'Home' ? 'bg-blue-50' : '' }}
                                "
                            >
                                <i
                                    data-lucide="home"
                                    class="w-5 h-5 group-hover:text-blue-600"
                                ></i>
                                <span class="sidebar-text">Home</span>
                            </a>

                            <div class="group">
                                <button
                                    id="dropdownMasterBtn"
                                    type="button"
                                    class="flex items-center text-blue-600 w-full justify-between gap-3 py-3 px-4 rounded-lg hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200 group {{
                                        $title === 'Employees' ||
                                        $title === 'Departments' ||
                                        $title === 'Shifts' ||
                                        $title === 'Users'
                                            ? 'bg-blue-50'
                                            : ''
                                    }}"
                                >
                                    <div class="flex items-center gap-3">
                                        <i
                                            data-lucide="file-text"
                                            class="w-5 h-5 group-hover:text-blue-600"
                                        ></i>
                                        <span class="sidebar-text"
                                            >Data Master</span
                                        >
                                    </div>
                                    <i
                                        id="dropdownArrow"
                                        data-lucide="chevron-down"
                                        class="w-4 h-4 transition-transform duration-200"
                                    ></i>
                                </button>
                                <div
                                    id="dropdownMasterContent"
                                    class="ml-9 mt-2 space-y-2 transition-all duration-200 {{
                                        $title === 'Employees' ||
                                        $title === 'Departments' ||
                                        $title === 'Shifts' ||
                                        $title === 'Users'
                                            ? ''
                                            : 'hidden'
                                    }}"
                                >
                                    <a
                                        href="{{ route('employee') }}"
                                        class="block py-2 px-3 rounded-lg text-sm text-blue-600 hover:bg-blue-100 hover:text-blue-600 {{
                                            $title === 'Employees'
                                                ? 'bg-blue-50'
                                                : ''
                                        }}"
                                    >
                                        Employee
                                    </a>
                                    <a
                                        href="{{ route('department') }}"
                                        class="block py-2 px-3 rounded-lg text-sm text-blue-600 hover:bg-blue-100 hover:text-blue-600  {{
                                            $title === 'Departments'
                                                ? 'bg-blue-50'
                                                : ''
                                        }}"
                                    >
                                        Department
                                    </a>
                                    <a
                                        href="{{ route('shift') }}"
                                        class="block py-2 px-3 rounded-lg text-sm text-blue-600 hover:bg-blue-100 hover:text-blue-600 {{
                                            $title === 'Shifts'
                                                ? 'bg-blue-50'
                                                : ''
                                        }}"
                                    >
                                        Shift
                                    </a>
                                    <a
                                        href="{{ route('user') }}"
                                        class="block py-2 px-3 rounded-lg text-sm text-blue-600 hover:bg-blue-100 hover:text-blue-600 {{
                                            $title === 'Users'
                                                ? 'bg-blue-50'
                                                : ''
                                        }}"
                                    >
                                        User
                                    </a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </aside>

                <div class="flex flex-col flex-1">
                    <!-- MAIN CONTENT -->
                    @yield('contents')

                    <footer
                        class="bg-gray-100 dark:bg-gray-800 text-center text-sm text-gray-500 dark:text-gray-400 py-4 border-t border-gray-200 dark:border-gray-700"
                    >
                        © 2025 E-Staff - All right reserved.
                    </footer>
                </div>
            </div>

            <!-- Modal Logout -->
            <div
                x-show="showLogout"
                class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
                x-cloak
            >
                <div
                    class="w-full max-w-md bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg"
                    @click.away="closeLogoutModal()"
                    @keydown.escape.window="closeLogoutModal()"
                >
                    <h2
                        class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-2"
                    >
                        Confirm Logout
                    </h2>
                    <hr class="mb-4" />
                    <p class="text-gray-700 dark:text-gray-300 mb-6">
                        Are you sure you want to logout?
                    </p>
                    <div class="flex justify-end gap-2">
                        <button
                            type="button"
                            @click="closeLogoutModal()"
                            class="px-4 py-2 rounded-md bg-gray-300 dark:bg-gray-600 hover:bg-gray-400 dark:hover:bg-gray-500 text-gray-800 dark:text-white"
                        >
                            Cancel
                        </button>
                        <button
                            type="button"
                            @click="logoutUser"
                            class="px-4 py-2 rounded-md bg-red-600 hover:bg-red-700 text-white"
                        >
                            Logout
                        </button>
                    </div>
                    <form
                        id="logoutForm"
                        action="{{ route('logout') }}"
                        method="POST"
                        class="hidden"
                    >
                        @csrf
                    </form>
                </div>
            </div>
        </div>

        <script>
            tailwind.config = {
                darkMode: "class",
            };

            // Inisialisasi semua icon lucide
            lucide.createIcons();

            document.addEventListener("DOMContentLoaded", () => {
                const toggleBtn = document.getElementById("menu-toggle");
                const sidebar = document.getElementById("sidebar");
                const sidebarTexts = document.querySelectorAll(".sidebar-text");

                const themeToggler = document.getElementById("theme-toggler");
                const html = document.documentElement;

                const userToggle = document.getElementById("user-toggle");
                const userDropdown = document.getElementById("user-dropdown");
                const userToggleArrow =
                    document.getElementById("user-toggle-arrow");

                let isCollapsed = false;

                // Auto-hide sidebar on small screens (mobile)
                if (window.innerWidth < 768) {
                    isCollapsed = true;
                    sidebar.classList.add("hidden");
                    sidebar.classList.remove("w-64", "w-40", "w-26");
                    sidebarTexts.forEach((text) => {
                        text.classList.add("hidden");
                    });
                }

                // Sidebar Toggle
                toggleBtn.addEventListener("click", () => {
                    isCollapsed = !isCollapsed;

                    if (window.innerWidth < 768) {
                        if (!isCollapsed) {
                            sidebar.classList.remove("hidden");
                            sidebar.classList.add("w-40");
                            sidebarTexts.forEach((text) => {
                                text.classList.remove("hidden");
                            });
                        } else {
                            sidebar.classList.add("hidden");
                            sidebar.classList.remove("w-40");
                            sidebarTexts.forEach((text) => {
                                text.classList.add("hidden");
                            });
                        }
                    } else {
                        sidebar.classList.toggle("w-64", !isCollapsed);
                        sidebar.classList.toggle("w-26", isCollapsed);
                        sidebarTexts.forEach((text) => {
                            text.classList.toggle("hidden", isCollapsed);
                        });
                    }
                });

                // Load saved theme from localStorage on page load
                const savedTheme = localStorage.getItem("theme");

                if (savedTheme === "dark") {
                    html.classList.add("dark");
                    updateThemeIcon(true);
                } else {
                    updateThemeIcon(false);
                }

                // Fungsi untuk update icon
                function updateThemeIcon(isDark) {
                    const iconElement =
                        themeToggler.querySelector("svg") ||
                        themeToggler.querySelector("i");

                    if (iconElement) {
                        if (isDark) {
                            // Dark mode - tampilkan icon sun (matahari)
                            iconElement.innerHTML =
                                '<circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/>';
                            iconElement.setAttribute("data-lucide", "sun");

                            if (iconElement.classList) {
                                iconElement.classList.remove("lucide-moon");
                                iconElement.classList.add("lucide-sun");
                            } else {
                                const currentClass =
                                    iconElement.getAttribute("class") || "";
                                const newClass = currentClass.replace(
                                    "lucide-moon",
                                    "lucide-sun"
                                );
                                iconElement.setAttribute("class", newClass);
                            }
                        } else {
                            iconElement.innerHTML =
                                '<path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path>';
                            iconElement.setAttribute("data-lucide", "moon");

                            if (iconElement.classList) {
                                iconElement.classList.remove("lucide-sun");
                                iconElement.classList.add("lucide-moon");
                            } else {
                                const currentClass =
                                    iconElement.getAttribute("class") || "";
                                const newClass = currentClass.replace(
                                    "lucide-sun",
                                    "lucide-moon"
                                );
                                iconElement.setAttribute("class", newClass);
                            }
                        }

                        // Pastikan SVG attributes tetap ada
                        if (iconElement.tagName === "SVG") {
                            iconElement.setAttribute(
                                "xmlns",
                                "http://www.w3.org/2000/svg"
                            );
                            iconElement.setAttribute("width", "24");
                            iconElement.setAttribute("height", "24");
                            iconElement.setAttribute("viewBox", "0 0 24 24");
                            iconElement.setAttribute("fill", "none");
                            iconElement.setAttribute("stroke", "currentColor");
                            iconElement.setAttribute("stroke-width", "2");
                            iconElement.setAttribute("stroke-linecap", "round");
                            iconElement.setAttribute(
                                "stroke-linejoin",
                                "round"
                            );
                        }
                    }
                }

                // Theme toggle logic
                themeToggler.addEventListener("click", (e) => {
                    e.preventDefault();
                    const isDark = html.classList.contains("dark");

                    if (isDark) {
                        html.classList.remove("dark");
                        localStorage.setItem("theme", "light");
                        updateThemeIcon(false);
                    } else {
                        html.classList.add("dark");
                        localStorage.setItem("theme", "dark");
                        updateThemeIcon(true);
                    }
                });

                // Dropdown user info toggle
                userToggle.addEventListener("click", (e) => {
                    e.stopPropagation();
                    userDropdown.classList.toggle("hidden");
                    userToggleArrow.classList.toggle("rotate-180");
                });

                document.addEventListener("click", (e) => {
                    if (
                        !userDropdown.contains(e.target) &&
                        !userToggle.contains(e.target)
                    ) {
                        userDropdown.classList.add("hidden");
                        userToggleArrow.classList.remove("rotate-180"); // reset saat klik di luar
                    }
                });
            });

            const dropdownBtn = document.getElementById("dropdownMasterBtn");
            const dropdownContent = document.getElementById(
                "dropdownMasterContent"
            );
            const dropdownArrow = document.getElementById("dropdownArrow");

            dropdownBtn.addEventListener("click", () => {
                dropdownContent.classList.toggle("hidden");
                dropdownArrow.classList.toggle("rotate-180");
            });

            // Datatable
            $(document).ready(function () {
                $("#datatable").DataTable({
                    scrollX: true,
                });
            });

            // Logout
            function logoutComponent() {
                return {
                    showLogout: false,
                    closeLogoutModal() {
                        this.showLogout = false;
                    },
                    logoutUser() {
                        document.getElementById("logoutForm").submit();
                    },
                };
            }
        </script>
    </body>
</html>
