<template>
  <table-one pageHeader="Categories' Informations" addBtn="Add New Category"></table-one>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import type { Category } from '@/types/category'
import DataTable from 'primevue/datatable'
import Column from 'primevue/column'
// import Button from 'primevue/button'
import axios from 'axios'
import TableOne from '../Tables/TableOne.vue'

export default defineComponent({
  name: 'ListCategory',
  components: {
    DataTable,
    Column,
    TableOne
    // Button
  },
  props: {
    categories: {
      type: Array as () => Category[],
      required: true
    }
  },
  methods: {
    async getAllCategories() {
      try {
        let response = await axios.get(
          'http://localhost/futu_ecommerce/api/categories.php/categories'
        )

        console.log(response)
      } catch (error) {}
    }
  },
  async mounted() {
    await this.getAllCategories()
  }
})
</script>

<style scoped></style>
