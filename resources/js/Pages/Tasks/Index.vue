<script setup>
import TableCell from '@/Components/Table/TableCell.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({
    tasks: {
        type: Array,
        default: () => []
    }
})

const form = useForm({});
const showDeleteModal = ref(false)
const postIdToDelete = ref(null)

const deletePost = (id) => {
    form.delete(route('tasks.destroy', id));
}

function openDeleteModal(id) {
    postIdToDelete.value = id;
    showDeleteModal.value = true;
}

function confirmDelete() {
    deletePost(postIdToDelete.value);
    showDeleteModal.value = false;
}
</script>

<template>
    <Head title="Manage Posts" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Manage Tasks
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <Link href="tasks/create">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                            Create Task
                        </button>
                        </Link>

                        <table class="table-auto w-full my-4">
                            <thead>
                                <tr class="text-left bg-gray-200">
                                    <TableCell>ID</TableCell>
                                    <TableCell>Title</TableCell>
                                    <TableCell>Content</TableCell>
                                    <TableCell class="text-center" width="180px">Action</TableCell>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(task, index) in tasks" :key="task.id" class="text-left hover:bg-gray-100">
                                    <TableCell>{{ index + 1 }}</TableCell>
                                    <TableCell>{{ task.title }}</TableCell>
                                    <TableCell>{{ task.description }}</TableCell>
                                    <TableCell class="text-center">
                                        <Link :href="route('tasks.edit', task.id)">
                                            <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-semibold py-1 px-2 rounded">
                                                Edit
                                            </button>
                                        </Link>
                                        <button @click="openDeleteModal(task.id)" class=" ml-2 bg-red-500 hover:bg-red-700 text-white font-semibold py-1 px-2 rounded">
                                            Delete
                                        </button>
                                    </TableCell>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

    <div v-if="showDeleteModal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-md w-full max-w-sm p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Confirm Deletion</h2>
            <p class="text-gray-600 mb-6">Are you sure you want to delete this task?</p>
            <div class="flex justify-end">
                <button @click="confirmDelete" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-1 px-2 rounded">
                    Delete
                </button>
                <button @click="showDeleteModal = false" class="ml-2 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-1 px-2 rounded">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</template>