<template>
  {{ category }}
  <form
    action="#"
    @submit.prevent="handleSubmit"
    method="POST"
    enctype="multipart/form-data"
    class="py-3 px-10 pb-10"
  >
    <div class="relative mt-3">
      <label for="input-label" class="block text-sm font-medium mb-2 dark:text-white"
        >Category Name <sup class="text-[14px] text-red">*</sup></label
      >
      <input
        type="text"
        id="input-label"
        class="py-3 px-4 block w-full border border-slate-200 rounded-lg text-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:border-blue-500"
        placeholder="eg. Electronic Devices"
        v-model="category.name"
      />
    </div>
    <div class="mt-8">
      <label for="description">Description</label>
      <Editor
        id="description"
        api-key="ts05ud75ibtz61z1nlu3irhcbh8rh9ezb95yzqith7dpuzqj"
        :init="{
          toolbar_mode: 'sliding',
          plugins:
            'anchor autolink charmap codesample emoticons image link lists media table visualblocks wordcount autocorrect typography inlinecss tinymcespellchecker linkchecker',
          toolbar:
            'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | removeformat'
        }"
        v-model="category.description"
      />
    </div>
    <div class="mt-5">
      <span>Image <sup class="text-red text-[14px]">*</sup></span>
      <label
        class="block dark:bg-neutral-900 rounded-lg border-2 border-slate-200 dark:border-slate-600 mt-2"
      >
        <span class="sr-only">Choose photo</span>
        <input
          type="file"
          class="block w-full text-sm text-slate-600 file:me-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold p-5 file:bg-blue-600 focus:outline-none file:text-white hover:file:bg-blue-700 file:disabled:opacity-50 file:disabled:pointer-events-none dark:text-neutral-500 dark:file:bg-blue-500 dark:hover:file:bg-blue-400"
        />
      </label>
    </div>
    <div
      class="mt-5 bg-blue-100 border border-blue-200 text-sm text-blue-800 rounded-lg p-4 dark:bg-blue-800/10 dark:border-blue-900 dark:text-blue-500"
      role="alert"
    >
      <span class="font-bold">Info: </span> <span class="text-lg text-red">*</span> means this field
      is required
    </div>
    <div class="mt-5">
      <Button class="btn" type="submit" label="Add Category" :loading="loading" />
    </div>
  </form>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import Editor from '@tinymce/tinymce-vue'
import Button from 'primevue/button'

export default defineComponent({
  name: 'CategoryCreation',
  components: {
    Editor,
    Button
  },
  data() {
    return {
      //
      loading: false,
      category: {
        name: '',
        description: '',
        image: '',
        createdBy: this.$store.getters.admin
      }
    }
  },
  methods: {
    handleSubmit() {
      this.loading = true
      console.log('Form Submitted')
      setTimeout(() => {
        this.loading = false
      }, 2000)
    }
  },
  mounted() {}
})
</script>

<style scoped>
.btn {
  @apply w-full py-3 bg-blue-600 text-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 rounded-lg !important;
}
</style>
