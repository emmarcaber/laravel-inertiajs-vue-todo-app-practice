<script setup>
import BackButton from '@/Components/BackButton.vue';
import PageHeader from '@/Components/PageHeader.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import Checkbox from '@/Components/Checkbox.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, useForm } from "@inertiajs/vue3";
import TextArea from '@/Components/TextArea.vue';

const props = defineProps({
    task: {
        type: Object,
        required: true,
    }
})

const form = useForm({
    title: props.task.title,
    description: props.task.description,
    completed: props.task.completed,
})

const submit = () => {
    form.put(route('tasks.update', props.task.id))
}
</script>

<template>

    <Head title="Create Post" />

    <AuthenticatedLayout>
        <template #header>
            <PageHeader title="Create Task" />
        </template>

        <div class="py-12">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <BackButton :href="route('tasks.index')" />

                        <form @submit.prevent="submit">
                            <div class="mb-4">
                                <InputLabel for="title" value="Title" />
                                <TextInput id="title" v-model="form.title" type="text" class="mt-1 block w-full" />
                                <InputError :message="form.errors.title" class="mt-2" />
                            </div>

                            <div class="mb-4">
                                <InputLabel for="description" value="Description" />
                                <TextArea id="description" v-model="form.description" class="mt-1 block w-full" />
                                <InputError :message="form.errors.description" class="mt-2" />
                            </div>

                            <div class="mb-4">
                                <label class="flex items-center">
                                    <Checkbox name="completed" v-model:checked="form.completed" />
                                    <span class="ms-2 text-sm text-gray-600 font-bold">Completed</span>
                                </label>
                            </div>

                            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Save
                            </PrimaryButton>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>