

require('./bootstrap');

window.Vue = require('vue');

// VueRouter
import VueRouter from 'vue-router';
Vue.use(VueRouter);

// VueAxios
import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

// ElementUI
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
import locale from 'element-ui/lib/locale/lang/ja'
Vue.use(ElementUI, { locale })

import MuseUI from 'muse-ui';
import 'muse-ui/dist/muse-ui.css';
Vue.use(MuseUI);

// Component
import App from './App.vue';
import Home from './Home.vue';
import Create from './Create.vue';
import Index from './Index.vue';
import Edit from './Edit.vue';


// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const routes = [
    {
        name: 'Home',
        path: '/',
        component: Home
    },
    {
        name: 'create',
        path: '/create',
        component: Create
    },
    {
        name: 'songs',
        path: '/songs',
        component: Index
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: Edit
    }

];

const router = new VueRouter({
    mode: 'history',
     routes: routes
});

const app = new Vue(
    Vue.util.extend(
        { router }, App
    )
).$mount('#app');
