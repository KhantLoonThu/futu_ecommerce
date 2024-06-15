<template>
  <header class="w-full h-screen relative">
    {{ JSON.stringify($store.state.customer, null, 2) }}
    <!-- Sign Up Page -->
    <div
      class="z-[-10] max-w-4xl my-[35px] mx-auto flex flex-col lg:grid lg:grid-cols-2 md:grid md:grid-cols-2 border-2 border-gray-500 rounded-xl"
    >
      <div class="w-full h-full bg-gray-100 p-[3rem] rounded-l-lg">
        <h3 class="text-center text-[24px] font-[600]">
          Please Register To Continue <br />
          <h3 class="gradient-text">Shopping</h3>
        </h3>
        <ul class="ms-[30%]">
          <li class="flex items-center py-10 relative">
            <span
              class="number-ball"
              :class="{ active: activeStep === 'StepOne' }"
              >1</span
            >
            <p class="ms-5">Personal</p>
          </li>
          <li class="flex items-center py-10 relative">
            <span
              class="number-ball"
              :class="{ active: activeStep === 'StepTwo' }"
              >2</span
            >
            <p class="ms-5">Contact</p>
          </li>
          <li class="flex items-center py-10 relative">
            <span
              class="number-ball"
              :class="{ active: activeStep === 'StepThree' }"
              >3</span
            >
            <p class="ms-5">Security</p>
          </li>
        </ul>
      </div>
      <form
        method="post"
        class="p-[3rem]"
        enctype="multipart/form-data"
        @submit.prevent="handleForm()"
      >
        <div class="mt-3">
          <!-- main form inputs -->
          <keep-alive>
            <component :is="activeStep" :errors="errors" />
          </keep-alive>

          <div class="mt-8">
            <button
              class="py-3 px-5 rounded-lg border-2"
              @click.prevent="previousStep()"
            >
              Back
            </button>
            <button
              class="py-3 px-5 rounded-lg border-2 ms-4"
              @click.prevent="validateAndNextStep()"
              v-show="activeStep !== 'StepThree'"
            >
              Next Step
            </button>
            <button
              class="py-3 px-5 rounded-lg border-2 ms-4"
              v-show="activeStep === 'StepThree'"
            >
              Submit
            </button>
          </div>
        </div>
      </form>
    </div>
  </header>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import StepOne from "../components/Auth/StepOne.vue";
import StepTwo from "../components/Auth/StepTwo.vue";
import StepThree from "../components/Auth/StepThree.vue";
import SignupValidation from "../services/Validation/SignupValidation";
import StepValidator from "../services/Validation/StepValidator";

export default defineComponent({
  components: { StepOne, StepTwo, StepThree },
  name: "Signup",
  data() {
    return {
      activeStep: "StepOne" as string,
      // errors: [] as string[],
      errors: {} as Record<string, string>,
    };
  },
  methods: {
    previousStep() {
      if (this.activeStep === "StepThree") {
        this.activeStep = "StepTwo";
      } else if (this.activeStep === "StepTwo") {
        this.activeStep = "StepOne";
      }
    },
    validateAndNextStep() {
      if (this.validation()) {
        this.nextStep();
      }
    },

    nextStep() {
      if (this.activeStep === "StepOne") {
        // change to next page
        this.activeStep = "StepTwo";
      } else if (this.activeStep === "StepTwo") {
        this.activeStep = "StepThree";
      }
    },
    validation() {
      this.errors = {}; // Reset errors
      const customer = this.$store.state.customer;
      if (this.activeStep === "StepOne") {
        this.errors = StepValidator.validateStepOne(customer);
      } else if (this.activeStep === "StepTwo") {
        this.errors = StepValidator.validateStepTwo(customer);
      } else if (this.activeStep === "StepThree") {
        this.errors = StepValidator.validateStepThree(customer);
      }
      return Object.keys(this.errors).length === 0;
    },
    handleForm() {
      if (!this.validation()) return;
      // validation

      // console.log(this.customer);
      this.$store.dispatch("signUpCustomer", this.$store.state.customer);
    },
  },
});
</script>

<style scoped>
.number-ball {
  width: 2rem;
  height: 2rem;
  border-radius: 50%;
  background-color: #cfcfcf;
  display: flex;
  justify-content: center;
  align-items: center;
}

.number-ball.active {
  background: #fff;
  color: #000;
}

.active {
  animation: neon 1.5s ease-in-out infinite alternate;
}

@keyframes neon {
  0%,
  100% {
    box-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #008cff, 0 0 40px #008cff,
      0 0 50px #008cff, 0 0 60px #008cff;
  }
  50% {
    box-shadow: 0 0 10px #008cff, 0 0 20px #008cff, 0 0 30px #008cff,
      0 0 40px #008cff, 0 0 50px #008cff, 0 0 60px #008cff, 0 0 70px #008cff;
  }
}

ul li:not(:last-child)::before {
  content: "";
  position: absolute;
  left: 15px;
  top: 70%;
  width: 2px;
  height: calc(100% - 45px);
  background: #cecece;
}
</style>
