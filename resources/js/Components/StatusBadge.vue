<script setup>
const props = defineProps({
    status: {
        type: Boolean,
        required: true,
    }
})
</script>

<template>
    <span :class="{
        'text-green-500': status === true,
        'text-red-500': status === false,
    }" class="font-bold">
        {{ status ? '&#x2713;' : 'X' }}
    </span>
</template>