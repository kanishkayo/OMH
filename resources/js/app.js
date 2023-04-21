/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');
// import 'vuetify/dist/vuetify';
import Vuetify from 'vuetify';
import 'material-design-icons-iconfont/dist/material-design-icons.css'; // Ensure you are using css-loader
import '@mdi/font/css/materialdesignicons.css';// Ensure you are using css-loader
import 'vuetify/dist/vuetify.min.css';
import router from "./router";
import * as VueGoogleMaps from 'vue2-google-maps';



import 'font-awesome-animation/css/font-awesome-animation.min.css'
import Vue from 'vue';
import VSwitch from 'v-switch-case';
import moment from 'moment'
Vue.use(require('vue-moment'));
Vue.prototype.moment = moment;








Vue.use(Vuetify);
Vue.use(VSwitch);

Vue.use(VueGoogleMaps, {
    load: {
      key: 'AIzaSyBKwT3-cq00IaM04TcHh1UiePAgjbp9LN4',
      libraries: 'places',
    },
});


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('apilogin', require('./components/Login.vue').default);
Vue.component('Dashboard', require('./components/DashboardMain.vue').default);

Vue.component('Dashboard', require('./components/DashboardMain.vue').default);
Vue.component('Landing', require('./components/Landing.vue').default);











/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    vuetify: new Vuetify({

    }),
});
