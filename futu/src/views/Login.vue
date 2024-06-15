<template>
  <header class="w-full h-screen relative">
    <!-- navbar -->
    <the-nav class="z-50" />

    <!-- colors -->
    <background-color></background-color>
    <!-- login page -->
    <div
      class="card w-[75%] lg:w-[30%] md:w-[50%] mx-auto absolute top-[50%] left-[50%] shadow-xl rounded-lg"
    >
      <!-- card header -->
      <div class="card-header py-5 bg-blue-500 text-white rounded-t-lg">
        <h2 class="text-[32px] font-[600] text-center">Log In</h2>
      </div>

      <!-- card body -->
      <div class="card-body p-5 bg-white text-black rounded-b-lg">
        <form action="" method="post">
          <div class="my-5">
            <!-- <label class="text-[23px] font-[500]" for="useremail"
                >Email <span class="text-red-600">*</span></label
              > -->
            <input
              type="email"
              name="useremail"
              id="useremail"
              placeholder="Enter Your Email"
              class="py-3 px-5 my-3 border-b-2 border-b-gray-500 focus:outline-none w-full"
            />
          </div>
          <div class="my-5 pb-[30px]">
            <!-- <label class="text-[23px] font-[500]" for="userpassword"
                >Password <span class="text-red-600">*</span></label
              > -->
            <input
              type="password"
              name="userpassword"
              id="userpassword"
              placeholder="Enter Your Password"
              class="py-3 px-5 my-3 border-b-2 border-b-gray-500 focus:outline-none w-full"
            />
          </div>
          <div
            class="my-5 border-t border-t-gray-500 pt-[30px] flex justify-between items-center"
          >
            <div>
              You don't have and account?
              <router-link class="text-blue-500" :to="{ name: 'Signup' }"
                >Sign Up</router-link
              >
            </div>
            <div class="text-end">
              <button class="py-4 px-8 rounded-lg bg-[#008cff] text-white">
                Submit
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Ensure the navbar is on top -->
  </header>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import TheNav from "../components/Home/TheNav.vue";

export default defineComponent({
  components: { TheNav },
  name: "Login",
});
</script>

<style scoped>
.card {
  transform: translate(-50%, -50%);
}
</style>
