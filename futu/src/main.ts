import { createApp } from "vue";
import App from "./App.vue";
import "./assets/global.css";
import "./assets/tailwind.css";
import router from "./router";
import store from "./store";
import "./axios";
import axios from "axios";

const csrfToken = document
  .querySelector('meta[name="csrf-token"]')
  ?.getAttribute("content");
if (csrfToken) {
  axios.defaults.headers.common["X-CSRF-TOKEN"] = csrfToken;
}

createApp(App).use(router).use(store).mount("#app");
