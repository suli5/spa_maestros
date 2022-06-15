import './bootstrap';
//IMPORTAMOS VUE
import vue from 'vue'
window.Vue = vue;

//AHORA AQUI LLAMAMOS A NUESTRO COMPONENTE PRINCIPAL App.vue

import App from './components/App.vue';

//IMPORTAMOS AXIOS PARA LAS PETICIONES
import VueAxios from 'vue-axios';
import axios from 'axios';

//IMPORTAMOS Y CONFIGURAMOS EL VUE-ROUTER
import VueRouter from 'vue-router';
import {routes} from './routes';
import Vue from 'vue';
Vue.use(VueRouter);
Vue.use(VueAxios, axios);
const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router,
    render: h =>h(App)
});