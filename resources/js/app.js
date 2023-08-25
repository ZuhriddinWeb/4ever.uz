import { createApp } from 'vue'
import App from './components/App.vue';
import store from './store'
import axios from 'axios'
import router from './router'
import 'swiper/css';
import 'ag-grid-community/styles/ag-grid.css'; // Core grid CSS, always needed
import 'ag-grid-community/styles/ag-theme-alpine.css'; // Optional theme CSS
import 'ag-grid-community/styles/ag-theme-material.css'; // Optional theme CSS
import { AgGridVue } from "ag-grid-vue3";  // the AG Grid Vue Component
import Swal from 'sweetalert2'
import VueTree from "@ssthouse/vue3-tree-chart";
import "@ssthouse/vue3-tree-chart/dist/vue3-tree-chart.css";

window.Swal = Swal
axios.defaults.baseURL = "/api/";
window.axios = axios
axios.defaults.withCredentials = false;
window.store = store
window.router = router


store.dispatch('getUser').then(()=>{
    createApp(App)
    .component('AgGridVue', AgGridVue)
    .component('vue-tree', VueTree)
    .use(store)
    .use(router)
    .mount('#app')
})


// 42706921090039 AB7800808
// arabova199207 mD5mkVJtpD

// async function logJSONData() {
//     const response = await fetch("https://cbu.uz/uz/arkhiv-kursov-valyut/json/RUB/2019-01-01/");
//     const jsonData = await response.json();
//     console.log(jsonData);
//   }

//   logJSONData() 