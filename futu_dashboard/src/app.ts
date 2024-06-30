import { createApp } from 'vue'
import { createPinia } from 'pinia'
import VueApexCharts from 'vue3-apexcharts'
import App from './App.vue'
import router from './router'
import store from './stores'
import PrimeVue from 'primevue/config'
import Aura from '@primevue/themes/aura'
import Toast from 'primevue/toast'
import ToastService from 'primevue/toastservice'
import Button from 'primevue/button'
import DataTable from 'primevue/datatable'
import Column from 'primevue/column'
import Editor from 'primevue/editor'

const app = createApp(App)
app.use(createPinia())
app.use(router)
app.use(store)
app.use(PrimeVue, {
  theme: {
    preset: Aura
  }
})
app.component('Button', Button)
app.component('Toast', Toast)
app.use(ToastService)
app.component('DataTable', DataTable)
app.component('Column', Column)
app.component('Editor', Editor)
app.use(VueApexCharts)
app.mount('#app')
