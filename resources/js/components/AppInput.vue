<script lang="ts" setup>
type InputType = 'text' | 'date';

interface Props {
  modelValue: string | number;
  label: string;
  type?: InputType | null;
  error: string | undefined;
}

withDefaults(defineProps<Props>(), {
  type: 'text'
})
</script>

<template>
  <div class="mb-5">
    <label
        class="block mb-2 text-sm font-medium"
        :class="{'text-red-700': error}"
    >
      {{ label }}
    </label>

    <input
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        :type="type"
        class="border text-sm rounded-lg block w-full p-2.5"
        :class="{'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500': error}"
    >

    <p v-if="error" class="mt-2 text-sm text-red-600 dark:text-red-500">
      {{ error }}
    </p>
  </div>
</template>
