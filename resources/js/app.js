

require('./bootstrap');

window.Vue = require('vue');

// VueRouter
import VueRouter from 'vue-router';
Vue.use(VueRouter);

// VueAxios
// import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(axios);

// Component
import Create from './Create.vue';
import Index from './Index.vue';


// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const routes = [
    {
        name: 'index',
        path: '/',
        component: Index
    },
    {
        name: 'create',
        path: '/create',
        component: Create
    }
];

const router = new VueRouter({
    mode: 'history',
     routes: routes
});

const app = new Vue({
    router
}).$mount('#app');
