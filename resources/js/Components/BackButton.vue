<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    href: {
        type: String,
        required: true
    }
});
</script>

<template>
    <Link :href="href">
    <button
        class="bg-gray-500 hover:bg-gray-700 text-white text-sm font-semibold py-1 px-3 rounded inline-flex items-center gap-1 mb-4">
        Back
    </button>
    </Link>
</template>