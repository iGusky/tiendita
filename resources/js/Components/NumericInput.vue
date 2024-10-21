<script setup lang="ts">
import {onMounted, ref} from 'vue';

const model = defineModel<string>({required: true});

defineProps({
    min: Number | undefined,
    max: Number | undefined,
})

const input = ref<HTMLInputElement | null>(null);

onMounted(() => {
    if (input.value?.hasAttribute('autofocus')) {
        input.value?.focus();
    }
});

defineExpose({focus: () => input.value?.focus()});
</script>

<template>
    <input
        class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        v-model="model"
        type="number"
        ref="input"
        :min="min"
        :max="max"
    />
</template>
