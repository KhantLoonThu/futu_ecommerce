<template>
  <div class="form-step form-one">
    <!-- {{ computedBirthDate }} -->
    <div class="bg-svg">
      <img
        class="w-[50px] mb-[10px]"
        src="/images/personal-information.png"
        alt=""
      />
    </div>
    <h3 class="text-[24px] font-[600]">
      Personal
      <span
        style="font-family: 'Odor Mean Chey', sans-serif"
        class="gradient-text inline"
        >Information</span
      >
    </h3>
    <p>Enter Your Personal Information Correctly</p>
    <div class="mt-3">
      <label for="first-name">First Name</label>
      <input
        class="py-2 px-3 rounded-lg border-2 w-full"
        type="text"
        name="first_name"
        v-model.trim="$store.state.customer.firstName"
        id="first-name"
        placeholder="Example: John"
      />
      <template v-if="errors.firstName">
        <p class="text-red-600">{{ errors.firstName }}</p>
      </template>
    </div>
    <div class="mt-3">
      <label for="last-name">Last Name</label>
      <input
        class="py-2 px-3 rounded-lg border-2 w-full"
        type="text"
        name="last_name"
        v-model.trim="$store.state.customer.lastName"
        id="last-name"
        placeholder="Example: Doe"
      />
      <template v-if="errors.lastName">
        <p class="text-red-600">{{ errors.lastName }}</p>
      </template>
    </div>
    <div class="birth mt-3">
      <label for="birth">Date of Birth</label>
      <div class="grouping flex justify-between items-center" id="birth">
        <input
          class="py-2 px-3 rounded-lg border-2 w-1/3 me-3 my-3"
          type="text"
          pattern="[0-9]*"
          v-model.trim="$store.state.birthDate.day"
          name="day"
          placeholder="day"
          min="0"
          max="31"
        />
        <input
          class="py-2 px-3 rounded-lg border-2 w-1/3 me-3 my-3"
          type="text"
          pattern="[0-9]*"
          v-model.trim="$store.state.birthDate.month"
          name="month"
          placeholder="month"
          min="0"
          max="12"
        />
        <input
          class="py-2 px-3 rounded-lg border-2 w-1/3 my-3"
          type="text"
          pattern="[0-9]*"
          name="year"
          v-model.trim="$store.state.birthDate.year"
          @input="addToVuex()"
          placeholder="year"
          min="0"
          max="2050"
        />
      </div>
      <template v-if="errors.birthDate">
        <p class="text-red-600">{{ errors.birthDate }}</p>
      </template>
    </div>
    <div class="mt-3">
      <label for="image">Profile Image</label>
      <input
        type="file"
        class="py-2 px-3 rounded-lg border-2 w-full"
        name="image"
        id="image"
        @change.prevent="handleImage($event)"
      />

      <template v-if="errors.image">
        <p class="text-red-600">{{ errors.image }}</p>
      </template>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  name: "StepOne",
  data() {
    return {};
  },
  props: ["errors"],
  methods: {
    handleImage(event: Event) {
      const target = event.target as HTMLInputElement;
      if (target.files && target.files.length > 0) {
        const file = target.files[0];
        this.$store.commit("updateCustomerImage", file);
        console.log(this.$store.state.customer.image);
      }
    },
    // handleImage(event: Event) {
    //   const target = event.target as HTMLInputElement;
    //   if (target.files && target.files.length > 0) {
    //     const file = target.files[0];
    //     if (file.type.startsWith("image/")) {
    //     } else {
    //       console.log("Invalid file type");
    //     }
    //   }
    // },

    addToVuex() {
      // adding img to the vuex image
      const { day, month, year } = this.$store.state.birthDate;
      if (day && month && year) {
        const formattedDay = day.length === 1 ? "0" + day : day;
        const formattedMonth = month.length === 1 ? "0" + month : month;
        this.$store.state.customer.birthDate = `${year}-${formattedMonth}-${formattedDay}`;

        // this.customer.birthDate = `${year}-${String(month).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
        // we can use padStart to format date
      } else {
        console.log("Date empty");
        this.$store.state.customer.birthDate = "";
      }
    },
  },
});
</script>

<style scoped></style>
