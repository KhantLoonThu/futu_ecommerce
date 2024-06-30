<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'AppVue',
  async mounted() {
    console.log(this.$store.getters.isAuthenticated)
  }
})
</script>

<template>
  <RouterView />
</template>
