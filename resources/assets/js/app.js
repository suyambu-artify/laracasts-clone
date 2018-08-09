

require('./bootstrap');

window.Vue = require('vue');

Vue.component('vue-login', require('./components/LoginModal.vue'));
Vue.component('all-lessons',require('./components/Lessons.vue'));

const app = new Vue({
    el: '#app'
});
