import { createStore } from "vuex";
import State from "@/types/state";
import axios from "axios";
import { Customer } from "@/types/customer";

const store = createStore<State>({
  state: {
    theme: "light",
    customer: {
      firstName: "",
      lastName: "",
      birthDate: "",
      image: null,
      phoneNumber: "",
      address: "",
      city: "",
      state: "",
      country: "",
      email: "",
      password: "",
      passwordComfirm: "",
    },
    birthDate: {
      day: "",
      month: "",
      year: "",
    },
    serverErrors: [],
  },
  mutations: {
    updateCustomer(state, payload: Customer) {
      state.customer = payload;
    },
    updateCustomerImage(state, file: File) {
      state.customer.image = file;
    },
    setServerErrors(state, errors: string[]) {
      state.serverErrors = errors;
    },
    clearServerErrors(state) {
      state.serverErrors = [];
    },
  },
  actions: {
    async signUpCustomer(context, payload: Customer) {
      try {
        const formData = new FormData();
        Object.entries(payload).forEach(([key, value]) => {
          formData.append(key, value);
        });
        if (payload.image) {
          formData.append("image", payload.image);
        }

        let response = await axios.post(
          "http://localhost/projects_with_kk/FuTu/futu/src/services/customer.php",
          payload
        );
        console.log(response);

        context.commit("updateCustomer", payload);
      } catch (error) {
        if (axios.isAxiosError(error) && error.response) {
          const status = error.response.status;
          const data = error.response.data;
          if (status === 422 || status === 409) {
            context.commit(
              "setServerErrors",
              data.errors || ["An error occurred"]
            );
          } else {
            context.commit("setServerErrors", [
              data.message || "An error occurred",
            ]);
          }
        } else {
          context.commit("setServerErrors", [
            "An error occurred during the request",
          ]);
        }
        console.log("Server ERROR: ", error);
      }
    },
  },
  getters: {},
});

export default store;
