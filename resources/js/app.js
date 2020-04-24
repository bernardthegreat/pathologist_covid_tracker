require('./bootstrap');

window.Vue = require('vue');


import DashboardComponent from './components/Dashboard.vue';

Vue.component('dashboard', DashboardComponent);
 
const app = new Vue({
    el: '#app'
});