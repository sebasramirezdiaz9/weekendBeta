/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.prototype.route = window.route;
import * as VueGoogleMaps from "vue2-google-maps";
import alvue from '@myshell/alvue'
import { ServerTable } from 'vue-tables-2';
import VModal from 'vue-js-modal';
import VueFlatPickr from 'vue-flatpickr-component';
import 'sweetalert2/src/sweetalert2.scss';
import flatPickr from 'vue-flatpickr-component';
import 'flatpickr/dist/flatpickr.css';
import vSelect from 'vue-select';
import 'vue-select/dist/vue-select.css';
import StarRating from 'vue-star-rating';
import VueApexCharts from 'vue-apexcharts'


// CommonJS

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.use(ServerTable);
Vue.use(VModal);
Vue.use(alvue);
Vue.use(VueApexCharts);
 
Vue.component('apexchart', VueApexCharts)
Vue.component('flat-pickr',flatPickr);   
Vue.component('StarRating', StarRating);
import UserIndex from './components/users/UserIndex';
import CreateUser from './components/users/UserCreate';



import ShowPlaces from './components/places/ShowPlaces';
import ShowFavoritePlaces from './components/favorite_places/ShowFavoritePlaces';
import ShowPlacesPopulars from './components/places_populars/ShowPlacesPopulars';

import PlacesCharts from './components/dashboard/PlacesCharts';
import CustomersCharts from './components/dashboard/CustomersCharts';

import ProfileIndex from './components/profile/ProfileIndex';

Vue.use(VueGoogleMaps, {
    load: {
        key: process.env.MIX_GOOGLE_API_KEY,
        libraries: 'places',
    },
    installComponents: true


}),

Vue.component('v-select', vSelect);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.mixin({
    methods: {
        $route: route,
    },
});

const app = new Vue({
    el: '#app',
    components:{
        UserIndex,
        CreateUser,
        ShowPlaces,
        ShowFavoritePlaces,
        ShowPlacesPopulars,
        PlacesCharts,
        CustomersCharts,
        ProfileIndex
    }
});
