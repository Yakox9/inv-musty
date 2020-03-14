require('./bootstrap');

import Vue from 'vue';
import Vuetify from 'vuetify';
import App from '@/js/views/App';
import Routes from '@/js/routes.js';
Vue.use(Vuetify);

new Vue({
    
    el: '#app',
    router: Routes,
    vuetify : new Vuetify(),
    render: h => h(App),
}).$mount('#app');

