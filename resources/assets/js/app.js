

require('./bootstrap');

window.Vue = require('vue');

window.events = new Vue();
window.noty = function(notification){
  window.events.$emit('notification',notification);
}

Vue.component('vue-login', require('./components/LoginModal.vue'));
Vue.component('all-lessons',require('./components/Lessons.vue'));
Vue.component('vue-noty',require('./components/Noty.vue'));

const app = new Vue({
    el: '#app'
});
