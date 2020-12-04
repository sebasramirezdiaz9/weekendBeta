/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.prototype.route = window.route;
import alvue from '@myshell/alvue'
import { ServerTable } from 'vue-tables-2';
import VModal from 'vue-js-modal';
import VueFlatPickr from 'vue-flatpickr-component';
import 'sweetalert2/src/sweetalert2.scss';
import flatPickr from 'vue-flatpickr-component';
import 'flatpickr/dist/flatpickr.css';
import vSelect from 'vue-select';
import 'vue-select/dist/vue-select.css';

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


Vue.component('flat-pickr',flatPickr);   

import UserIndex from './components/users/UserIndex';
import CreateUser from './components/users/UserCreate';
import EmployeeIndex from './components/employees/EmployeeIndex';
import EmployeeCreate from './components/employees/EmployeeCreate';
import PatientsCreate from './components/patients/PatientsCreate';
import PatientsIndex from './components/patients/PatientsIndex';
import MedicineCreate from './components/medicine/MedicineCreate';
import MedicineIndex from './components/medicine/MedicineIndex'
import DateCreate from './components/dates/DateCreate';
import DateIndex from './components/dates/DateIndex';
import InventoryIndex from './components/inventory/InventoryIndex'
import ProviderCreate from './components/provider/ProviderCreate';
import ProviderIndex from './components/provider/ProviderIndex';

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
        EmployeeIndex,
        EmployeeCreate,
        PatientsCreate,
        PatientsIndex,
        MedicineCreate,
        MedicineIndex,
        DateCreate,
        DateIndex,
        InventoryIndex,
        ProviderCreate,
        ProviderIndex

    }
});
