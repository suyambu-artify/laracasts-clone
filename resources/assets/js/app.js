

require('./bootstrap');

window.Vue = require('vue');

window.events = new Vue();
window.noty = function(notification){
  window.events.$emit('notification',notification);
}

window.ErrorHandler(function(error){
  if (error.response.status == 422) {
    window.noty({
      message : 'please enter all fields',
      type : 'danger'
    })
  }else{
    window.noty({
      message : 'something wrong refresh the page and try again',
      type : 'warning'
    })
  }
})



Vue.component('vue-login', require('./components/LoginModal.vue'));
Vue.component('all-lessons',require('./components/Lessons.vue'));
Vue.component('vue-noty',require('./components/Noty.vue'));

const app = new Vue({
    el: '#app'
});
