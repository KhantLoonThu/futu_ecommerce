<template>
  <DefaultLayout>
    <div class="mx-auto max-w-242.5">
      <!-- Breadcrumb Start -->
      <BreadcrumbDefault :pageTitle="pageTitle" />
      <!-- Breadcrumb End -->
      <div
        class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark"
      >
        <list-category :categories="get_categories"></list-category>
      </div>
    </div>
  </DefaultLayout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import DefaultLayout from '@/layouts/DefaultLayout.vue'
import type { Category } from '@/types/category'
import ListCategory from '../../components/Categories/ListCategory.vue'
import BreadcrumbDefault from '@/components/Breadcrumbs/BreadcrumbDefault.vue'

export default defineComponent({
  name: 'CategoryView',
  components: {
    BreadcrumbDefault,
    DefaultLayout,
    ListCategory
  },
  data() {
    return {
      pageTitle: 'Categories',
      categories: []
    }
  },
  computed: {
    get_categories(): Category[] {
      return (this.categories = this.$store.state.categories)
    }
  }
})
</script>
