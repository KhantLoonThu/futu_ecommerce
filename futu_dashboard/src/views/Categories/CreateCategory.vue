<template>
  <DefaultLayout>
    <div class="mx-auto max-w-242.5">
      <!-- Breadcrumb Start -->
      <BreadcrumbDefault :pageTitle="pageTitle" :subPageTitle="pageTitle2" />
      <!-- Breadcrumb End -->
      <div
        class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark"
      >
        <category-creation></category-creation>
      </div>
    </div>
  </DefaultLayout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import DefaultLayout from '@/layouts/DefaultLayout.vue'
import BreadcrumbDefault from '@/components/Breadcrumbs/BreadcrumbDefault.vue'
import CategoryCreation from '../../components/Categories/CategoryCreation.vue'

export default defineComponent({
  name: 'CreateCategory',
  components: {
    DefaultLayout,
    BreadcrumbDefault,
    CategoryCreation
  },
  data() {
    return {
      pageTitle: 'Categories',
      pageTitle2: 'Create'
    }
  }
})
</script>

<style scoped></style>
