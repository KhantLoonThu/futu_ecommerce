<template>
  <header class="w-full h-screen relative">
    <!-- navbar -->
    <the-nav class="z-50" />

    <!-- bg colors -->
    <background-color></background-color>
    <!-- main content -->
    <content></content>
    <!-- Ensure the navbar is on top -->
  </header>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import BackgroundColor from "../components/Home/BackgroundColor.vue";
import Content from "../components/Home/Content.vue";
import TheNav from "../components/Home/TheNav.vue";

export default defineComponent({
  components: { TheNav, Content, BackgroundColor },
  name: "Home",
  data() {
    return {};
  },
});
</script>

<style scoped>
.main-circle,
.circle-2 {
  filter: blur(150px);
}

.circle-1 {
  filter: blur(100px);
}

.main-circle {
  transform: translate(-50%, -50%);
}
</style>
