

require('./bootstrap');

window.Vue = require('vue');

Vue.component('vue-login', require('./components/loginModal.vue'));

const app = new Vue({
    el: '#app'
});
