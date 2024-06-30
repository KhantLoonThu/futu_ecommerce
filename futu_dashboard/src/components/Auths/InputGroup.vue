<script lang="ts">
import { defineComponent } from 'vue'
export default defineComponent({
  data() {
    return {}
  },
  props: {
    label: String,
    type: String,
    placeholder: String,
    modelValue: String, // Ensure to match the type you expect
    errorEmail: String,
    errorPassword: String
  },
  emits: ['update:modelValue']
})
</script>

<template>
  <div class="mb-2">
    <label class="mb-2.5 block font-medium text-black dark:text-white">{{ label }}</label>
    <div class="relative">
      <input
        :type="type"
        :placeholder="placeholder"
        :value="modelValue"
        :class="[
          'w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input text-black dark:text-white',
          errorEmail
            ? 'border-rose-600 focus:border-rose-600'
            : 'focus:border-primary dark:focus:border-primary',
          errorPassword
            ? 'border-rose-600 focus:border-rose-600'
            : 'focus:border-primary dark:focus:border-primary'
        ]"
        @input="$emit('update:modelValue', $event.target?.value)"
        class=""
      />

      <span class="absolute right-4 top-4">
        <slot></slot>
      </span>
    </div>
  </div>
</template>
