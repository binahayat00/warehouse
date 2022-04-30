window.Vue = require('vue').default;
import VueRouter from 'vue-router';
import VueTree from '@ssthouse/vue-tree-chart';
import Business from "./components/Business";
import Request from "./components/Request";
import Status from "./components/Status";
import Login from "./components/Login";
import Print from 'vue-print-nb';
import User from "./components/User";
import Permission from "./components/Permission";
import PeykManagement from "./components/PeykManagement";
import Vehicle from "./components/Vehicle";
import MyRequest from "./components/MyRequest";

Vue.use(VueRouter);
Vue.use(Print);
const axios = require('axios').default;
window.axios = axios;


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('vue-tree', VueTree);
// const files = require.context('./', true, /\.vue$/i)
Vue.component('sidebar', require('./components/Sidebar.vue').default);

const routes = [
    {path: '/request', component:Request, name: 'request'},
    {path: '/status', component:Status, name: 'status'},
    {path: '/business', component:Business, name: 'business'},
    {path: '/login', component:Login, name: 'login'},
    {path: '/user', component:User, name: 'user'},
    {path: '/permission', component:Permission, name: 'permission'},
    {path: '/peyk_management', component:PeykManagement, name: 'peyk_management'},
    {path: '/vehicle', component:Vehicle, name: 'vehicle'},
    {path: '/myrequest', component:MyRequest, name: 'myrequest'},
]

const router = new VueRouter({
    routes,
    linkActiveClass: 'myActiveLink'

})
const app = new Vue({router,
    el: '#app',
});
