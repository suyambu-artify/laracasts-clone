

require('./bootstrap');

window.Vue = require('vue');

Vue.component('vue-login', require('./components/LoginModal.vue'));
Vue.component('vue-lessons',require('./components/Lessons.vue'));

const app = new Vue({
    el: '#app'
});
