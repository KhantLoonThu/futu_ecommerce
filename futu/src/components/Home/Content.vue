<template>
  <div class="main-content text-center absolute top-[40%] left-[50%]">
    <h1 class="text-[22px] lg:text-[48px] md:text-[32px] font[600] pb-[10px]">
      Welcome To
      <span
        class="gradient-text"
        style="font-family: 'Odor Mean Chey', sans-serif"
        >FUTU eCommerce</span
      >
    </h1>
    <p class="mt-[20px] text-[18px] font[400]">
      Explore our vast collection of products and enjoy a seamless shopping
      experience. From electronics to fashion, we have everything you need to
      elevate your lifestyle. Sign in to unlock exclusive deals and personalized
      recommendations tailored just for you.
    </p>
    <div class="mt-[50px]">
      <router-link
        :to="{ name: 'Login' }"
        class="py-4 px-8 rounded-lg bg-gradient-to-tr from-[#ff00bf] to-[#008cff] text-white text-[20px]"
        >Get Started</router-link
      >
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  name: "ContentComponet",
});
</script>

<style scoped>
.main-content {
  transform: translate(-50%, -50%);
}

@keyframes neon {
  /* 0%,
  100% {
    text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 20px #ff00ff, 0 0 30px #ff00ff,
      0 0 40px #ff00ff, 0 0 50px #ff00ff, 0 0 60px #ff00ff;
  }
  50% {
    text-shadow: 0 0 10px #fff, 0 0 20px #ff00ff, 0 0 30px #ff00ff,
      0 0 40px #ff00ff, 0 0 50px #ff00ff, 0 0 60px #ff00ff, 0 0 70px #ff00ff;
  } */
}

.border-gradient {
  border-radius: 0.75rem;
  border-image: linear-gradient(to right, #ff00bf, #008cff) 1;
  /* border-image-slice: 1; */
}

@media (max-width: 640px) {
  .main-content {
    position: relative;
    margin-top: 50px;
  }
}
</style>
