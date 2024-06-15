<template>
  <div
    class="w-full h-[91vh] lg:h-[90vh] md:h-[90vh] sm:h-[91vh] overflow-hidden relative z-[-1]"
  >
    <div
      class="main-circle w-[450px] z-0 h-[450px] bg-gradient-to-b from-[#9e21f7] to-[#fe6c4c] absolute top-[70%] left-[40%] rounded-full"
    ></div>
    <div
      class="main-circle w-[450px] z-0 h-[450px] bg-gradient-to-b from-[#fa39ad] to-[#fe6c4c] absolute top-[90%] left-[60%] rounded-full"
    ></div>
    <div
      class="circle-1 w-[450px] z-0 h-[450px] bg-gradient-to-b from-[#49cbff] to-[#49cbff] absolute top-[-30%] left-[-10%] rounded-full"
    ></div>
    <div
      class="circle-2 w-[450px] z-0 h-[450px] bg-gradient-to-b from-[#fa39ad] to-[#fa39ad] absolute top-[10%] right-[-20%] rounded-full"
    ></div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  name: "BackgroundColor",
});
</script>

<style scoped>
.main-circle,
.circle-2 {
  filter: blur(130px);
}

.circle-1 {
  filter: blur(30px);
}

.main-circle {
  transform: translate(-50%, -50%);
}
</style>
