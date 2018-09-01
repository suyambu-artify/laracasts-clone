<template>

    <div v-if="notification" class="alert notyalert" :class="type">
    {{notification.message}}

  </div>
</template>

<script>
export default {

    created(){
      window.events.$on('notification',(payload)=>{
        this.notification = payload;
        setTimeout(()=>{this.notification=null},2500)
      })

    },

    data(){
      return {
        notification:null,
      }
    },

    computed : {
        type(){
          return `alert-${this.notification.type}`
        }
    }
}
</script>

<style>
  .notyalert {
  	position: fixed;
  	right: 10px;
  	bottom: 10px;
  }
</style>
