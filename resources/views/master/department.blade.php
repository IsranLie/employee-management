@extends('app') @section('contents')
<main
    x-data="departmentPage()"
    class="flex-grow p-4 transition-all duration-200 ease-in-out"
>
    <div
        class="bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 p-3 sm:p-4 rounded-lg shadow mb-4"
    >
        <div
            class="flex flex-col space-y-2 sm:space-y-0 sm:flex-row sm:items-center sm:justify-between"
        >
            <h2 class="text-xl sm:text-2xl font-bold">
                {{ $title }}
            </h2>
            <nav class="text-xs sm:text-sm" aria-label="Breadcrumb">
                <ol class="list-reset flex text-gray-600 dark:text-gray-300">
                    <li>
                        <a
                            href="{{ route('home') }}"
                            class="hover:underline text-blue-600 dark:text-blue-400"
                        >
                            Home
                        </a>
                    </li>
                    <li><span class="mx-1 sm:mx-2">/</span></li>
                    <li class="text-gray-500 dark:text-gray-400 truncate">
                        {{ $title }}
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div
        class="bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 p-2 rounded-lg"
    >
        <div class="my-2 p-4">
            <button
                @click="openAddModal()"
                class="inline-flex items-center gap-2 rounded-md bg-green-600 px-2 py-2 text-white shadow-md transition hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50"
            >
                <i data-lucide="plus" class="w-5 h-5"></i>
                Add Department
            </button>
        </div>

        <div
            class="bg-white border border-gray-200 dark:border-gray-700 dark:bg-gray-800 text-gray-800 dark:text-gray-200 p-4 rounded-lg"
        >
            <table id="datatable" class="display" x-cloak>
                <thead>
                    <tr>
                        <th class="flex justify-center">No.</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th class="flex justify-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $item)
                    <tr>
                        <td class="flex justify-center">
                            {{ $loop->iteration }}
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ formatDatetime($item->created_at) }}</td>
                        <td class="flex gap-2 justify-center">
                            <a
                                href="#"
                                @click.prevent="openEditModal({{ $item }})"
                                class="inline-flex items-center justify-center rounded-md bg-blue-600 p-2 text-white hover:bg-blue-700 transition"
                                title="Update"
                            >
                                <i data-lucide="pen" class="w-4 h-4"></i>
                            </a>
                            <a
                                href="#"
                                @click.prevent="openDeleteModal('{{ $item->id }}')"
                                class="inline-flex items-center justify-center rounded-md bg-red-600 p-2 text-white hover:bg-red-700 transition"
                                title="Delete"
                            >
                                <i data-lucide="trash" class="w-4 h-4"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Add or Update -->
    <div
        x-show="showFormModal"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
        x-cloak
    >
        <div
            class="w-full max-w-md bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg"
            @click.away="closeFormModal()"
            @keydown.escape.window="closeFormModal()"
        >
            <h2
                class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-2"
                x-text="formMode === 'add' ? 'Add Department' : 'Update Department'"
            ></h2>
            <hr class="mb-4 border-t-2 border-gray-200 dark:border-gray-600" />
            <form x-ref="departmentForm" @submit.prevent="submitForm">
                @csrf
                <template x-if="formMode === 'edit'">
                    <input type="hidden" name="_method" value="PUT" />

                    <input type="hidden" name="id" x-model="formData.id" />
                </template>

                <div class="mb-4">
                    <label
                        for="name"
                        class="block text-gray-700 dark:text-gray-200 mb-1"
                    >
                        Department Name
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        x-model="formData.name"
                        class="w-full px-3 py-2 border rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-400"
                        placeholder="Department name"
                        required
                    />
                </div>
                <div class="flex justify-end gap-2">
                    <button
                        type="button"
                        @click="closeFormModal()"
                        class="px-4 py-2 rounded-md bg-gray-300 dark:bg-gray-600 hover:bg-gray-400 dark:hover:bg-gray-500 text-gray-800 dark:text-white"
                    >
                        Cancel
                    </button>
                    <button
                        type="submit"
                        class="px-4 py-2 rounded-md bg-green-600 hover:bg-green-700 text-white"
                    >
                        <span
                            x-text="formMode === 'add' ? 'Submit' : 'Update'"
                        ></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Delete -->
    <div
        x-show="showDelete"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
        x-cloak
    >
        <div
            class="w-full max-w-md bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg"
            @click.away="closeDeleteModal()"
            @keydown.escape.window="closeDeleteModal()"
        >
            <h2
                class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-2"
            >
                Confirm Delete
            </h2>
            <hr class="mb-4 border-t-2 border-gray-200 dark:border-gray-600" />
            <p class="text-gray-700 dark:text-gray-300 mb-6">
                Are you sure you want to delete this data? This action cannot be
                undone.
            </p>
            <div class="flex justify-end gap-2">
                <button
                    type="button"
                    @click="closeDeleteModal()"
                    class="px-4 py-2 rounded-md bg-gray-300 dark:bg-gray-600 hover:bg-gray-400 dark:hover:bg-gray-500 text-gray-800 dark:text-white"
                >
                    Cancel
                </button>
                <button
                    type="button"
                    @click="deleteDepartment"
                    class="px-4 py-2 rounded-md bg-red-600 hover:bg-red-700 text-white"
                >
                    Delete
                </button>
            </div>
        </div>
    </div>

    <!-- Alert -->
    <div
        x-show="showAlert"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-x-full"
        x-transition:enter-end="opacity-100 transform translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-x-0"
        x-transition:leave-end="opacity-0 transform translate-x-full"
        class="fixed top-0 right-0 mt-20 mr-4 p-4 rounded-md shadow-lg z-50 w-80 flex items-start gap-3"
        :class="{
                'bg-green-300': type === 'success',
                'bg-red-300': type === 'error',
                'bg-blue-300': type === 'info'
            }"
        x-cloak
    >
        <i x-ref="alertIcon" class="w-6 h-6"></i>
        <p
            x-text="message"
            class="text-gray-600 text-sm font-bold flex-grow"
        ></p>
        <button
            @click="showAlert = false; clearTimeout(timeoutId);"
            class="absolute top-1 right-2 text-xl text-gray-600 font-bold"
        >
            &times;
        </button>
    </div>
</main>

<script>
    function departmentPage() {
        return {
            showFormModal: false,
            formMode: "add", // 'add' or 'edit'
            formData: {
                id: "",
                name: "",
            },

            // Delete Modal State
            showDelete: false,
            deletingDepartmentId: null,

            // Alert State
            showAlert: false,
            message: "",
            type: "",
            timeoutId: null,

            // --- MODAL FUNCTIONS ---
            openAddModal: function () {
                this.formMode = "add";
                this.resetFormData();
                this.showFormModal = true;
            },

            openEditModal: function (department) {
                this.formMode = "edit";
                this.formData.id = department.id;
                this.formData.name = department.name;
                this.showFormModal = true;
            },

            resetFormData: function () {
                this.formData = {
                    id: "",
                    name: "",
                };
                // Clear validation errors displayed client-side
                if (this.$refs.departmentForm) {
                    this.$refs.departmentForm
                        .querySelectorAll(".error-message")
                        .forEach((el) => (el.textContent = ""));
                }
            },

            closeFormModal: function () {
                this.showFormModal = false;
                this.resetFormData();
            },

            openDeleteModal: function (departmentId) {
                this.deletingDepartmentId = departmentId;
                this.showDelete = true;
            },

            closeDeleteModal: function () {
                this.showDelete = false;
                this.deletingDepartmentId = null;
            },

            // --- FORM SUBMISSION FUNCTION ---
            submitForm: async function () {
                const form = this.$refs.departmentForm;
                const formData = new FormData(form);

                // Bersihkan error sebelumnya
                form.querySelectorAll(".error-message").forEach(
                    (el) => (el.textContent = "")
                );

                let url = "";
                let method = "POST";

                if (this.formMode === "edit") {
                    url = `/department/${this.formData.id}`;
                    formData.append("_method", "PUT");
                } else {
                    url = "/department";
                }

                // Ambil token CSRF dari meta tag
                const csrfToken = document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content");

                try {
                    const response = await fetch(url, {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": csrfToken,
                        },
                        body: formData,
                    });

                    let data = {};
                    try {
                        data = await response.json();
                    } catch (e) {
                        console.error("Gagal parsing JSON:", e);
                    }

                    if (response.ok) {
                        this.show(
                            data.message || "Berhasil menyimpan data.",
                            "success"
                        );
                        this.closeFormModal();
                        window.location.reload();
                    } else {
                        let errorMessage =
                            data.message ||
                            "Terjadi kesalahan tidak diketahui.";

                        if (response.status === 422 && data.errors) {
                            for (const field in data.errors) {
                                const inputElement = form.querySelector(
                                    `[name="${field}"]`
                                );
                                if (inputElement) {
                                    let errorEl =
                                        inputElement.nextElementSibling;
                                    if (
                                        !errorEl ||
                                        !errorEl.classList.contains(
                                            "error-message"
                                        )
                                    ) {
                                        errorEl = document.createElement("p");
                                        errorEl.className =
                                            "text-red-500 text-xs italic mt-1 error-message";
                                        inputElement.parentNode.insertBefore(
                                            errorEl,
                                            inputElement.nextSibling
                                        );
                                    }
                                    errorEl.textContent =
                                        data.errors[field].join(", ");
                                }
                            }
                            this.show(
                                "Mohon periksa kembali input Anda.",
                                "error"
                            );
                        } else {
                            this.show(errorMessage.trim(), "error");
                        }
                    }
                } catch (error) {
                    console.error("Error submitting form:", error);
                    this.show(
                        "Gagal terhubung ke server. Silakan coba lagi.",
                        "error"
                    );
                }
            },

            // --- DELETE SUBMISSION FUNCTION ---
            deleteDepartment: async function () {
                if (!this.deletingDepartmentId) return;

                const csrfToken = document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content");

                try {
                    const response = await fetch(
                        `/department/${this.deletingDepartmentId}`,
                        {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": csrfToken,
                                Accept: "application/json",
                            },
                        }
                    );

                    const data = await response.json();

                    if (response.ok) {
                        this.show(
                            data.message || "Data berhasil dihapus!",
                            "success"
                        );
                        this.closeDeleteModal();
                        window.location.reload();
                    } else {
                        this.show(
                            data.message || "Gagal menghapus data.",
                            "error"
                        );
                    }
                } catch (error) {
                    console.error("Gagal menghapus:", error);
                    this.show("Gagal menghubungi server.", "error");
                }
            },

            // --- ALERT FUNCTIONS ---
            show: function (msg, type = "info", duration = 3000) {
                this.showAlert = true;
                this.message = msg;
                this.type = type;

                clearTimeout(this.timeoutId);

                this.$nextTick(() => {
                    this.updateLucideIcon();
                });

                this.timeoutId = setTimeout(() => {
                    this.showAlert = false;
                }, duration);
            },

            updateLucideIcon: function () {
                const iconElement = this.$refs.alertIcon;
                if (iconElement) {
                    while (iconElement.firstChild) {
                        iconElement.removeChild(iconElement.firstChild);
                    }

                    let iconName;
                    let iconColorClass;

                    if (this.type === "success") {
                        iconName = "badge-check";
                        iconColorClass = "text-green-600";
                    } else if (this.type === "error") {
                        iconName = "badge-alert";
                        iconColorClass = "text-red-600";
                    } else if (this.type === "info") {
                        iconName = "badge-info";
                        iconColorClass = "text-blue-600";
                    } else {
                        iconName = "info";
                        iconColorClass = "text-gray-600";
                    }

                    iconElement.setAttribute("data-lucide", iconName);
                    iconElement.className = `w-6 h-6 ${iconColorClass}`;

                    lucide.createIcons();
                }
            },
        };
    }
</script>
@endsection
