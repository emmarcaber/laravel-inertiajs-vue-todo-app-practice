<script setup>
defineProps({
    class: {
        type: String,
        default: ''
    },
    width: {
        type: String,
        default: ''
    }
})
</script>

<template>
    <th :class="class" class="border px-4 py-2" :width="width"><slot /></th>
</template>