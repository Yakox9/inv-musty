require('./bootstrap');

import Vue from 'vue';
import Vuetify from 'vuetify';
import App from '@/js/views/App';
import Routes from '@/js/routes.js';

const vuetify = new Vuetify();
Vue.use(vuetify);

new Vue({
    
    el: '#app',
    router: Routes,
    render: h => h(App),
}).$mount('#app');

