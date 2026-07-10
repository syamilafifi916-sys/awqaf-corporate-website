<script setup>
defineProps({
    class: {
        type: String,
        default: 'h-10 w-10',
    },
});
</script>

<template>
    <svg :class="$props.class" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="48" height="48" rx="12" fill="#064E3B" />
        <path
            d="M24 32L15 23L24 14L33 23L24 32Z"
            fill="#10B981"
        />
        <path
            d="M24 26L19.5 21.5L24 17L28.5 21.5L24 26Z"
            fill="#F0B429"
        />
    </svg>
</template>
