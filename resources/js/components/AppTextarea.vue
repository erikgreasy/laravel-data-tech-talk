<script lang="ts" setup>
interface Props {
  modelValue: string | number;
  label: string;
  error: string | null | undefined;
}

defineProps<Props>()
</script>

<template>
  <div class="mb-5">
    <label
        class="block mb-2 text-sm font-medium"
        :class="{'text-red-700': error}"
    >
      {{ label }}
    </label>

    <textarea
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        class="border text-sm rounded-lg block w-full p-2.5"
        :class="{'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500': error}"
    ></textarea>

    <p v-if="error" class="mt-2 text-sm text-red-600 dark:text-red-500">
      {{ error }}
    </p>
  </div>
</template>
