<script setup lang="ts">
import { useRouter } from 'vue-router'
const props = defineProps(['pageTitle', 'subPageTitle'])
const router = useRouter()
const goPrevious = () => {
  router.back()
}
</script>

<template>
  <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <h2 class="text-title-md2 font-semibold text-black dark:text-white">
      {{ props.pageTitle }}
    </h2>

    <nav>
      <ol class="flex items-center gap-2">
        <li>
          <router-link class="font-medium" to="/"> Dashboard / </router-link>
        </li>
        <li
          @click="subPageTitle && goPrevious()"
          class="font-medium"
          :class="subPageTitle ? 'previous cursor-pointer' : 'text-primary'"
        >
          {{ pageTitle }}
        </li>
        <li v-if="subPageTitle" class="text-primary font-medium">/ {{ subPageTitle }}</li>
      </ol>
    </nav>
  </div>
</template>
