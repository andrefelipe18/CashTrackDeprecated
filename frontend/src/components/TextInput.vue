<script setup>


defineProps(['modelValue'])

defineEmits(['update:modelValue'])

const input = ref(null)

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus()
    }
});
</script>

<template>
    <input
        ref="input"
        class="input input-bordered w-full"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)" />
</template>
