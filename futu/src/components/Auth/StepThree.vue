<template>
  <div class="form-step form-three">
    <div class="bg-sbg">
      <img src="/images/security.png" alt="" class="w-[50px] mb-[10px]" />
    </div>
    <h2 class="text-[24px] font-[600]">Security</h2>
    <div class="mt-3">
      <label for="email">Email</label>
      <input
        class="px-5 py-2 rounded-lg border-2 w-full"
        type="email"
        v-model.trim="$store.state.customer.email"
        name="email"
        id="email"
        placeholder="text@gmail.com"
      />
      <template v-if="errors.email">
        <p class="text-red-600">{{ errors.email }}</p>
      </template>
    </div>
    <div class="mt-3">
      <label for="password">Password</label>
      <input
        class="px-5 py-2 rounded-lg border-2 w-full"
        type="password"
        v-model.trim="$store.state.customer.password"
        name="password"
        id="password"
        placeholder="at least 8 characters"
      />
      <template v-if="errors.password">
        <p class="text-red-600">{{ errors.password }}</p>
      </template>
    </div>
    <div class="mt-3">
      <label for="c-password">Comfirm Password</label>
      <input
        class="px-5 py-2 rounded-lg border-2 w-full"
        type="password"
        v-model.trim="$store.state.customer.passwordComfirm"
        name="c_password"
        id="c-password"
        placeholder="at least 8 characters"
      />
      <template v-if="errors.passwordComfirm">
        <p class="text-red-600">{{ errors.passwordComfirm }}</p>
      </template>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  name: "StepThree",
  props: ["errors"],
  data() {
    return {};
  },
});
</script>

<style scoped></style>
