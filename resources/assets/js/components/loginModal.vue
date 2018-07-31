<template>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

<div class="err" v-if="errors.length > 0">

    <ul class="list-group" v-for="error in errors">
        <li style="text-align: center;
        list-style:none;
        margin-bottom: 13px;
        font-size:17px;
        color:red">
                            {{error}}
        </li>
    </ul>
</div>

            <div class="form-group row">
                <div class="col-md-12">
                    <input type="email" class="form-control" autofocus placeholder="moktar@gmail.com" v-model="email">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <input type="text" class="form-control" placeholder="******" v-model="password">
                </div>
            </div>

        </div>

        <div class="form-group ">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember" v-model="remember">

                    <label class="form-check-label" for="remember">
                        Remember Me
                    </label>
                </div>
        </div>


            <div class="col-md-6">
                <button type="button" class="btn btn-danger" :disabled="!isValidLoginForm" @click="loginAttempt()">
                    Login
                </button>
            </div>

        </div>


    </div>
</div>
</div>

</template>

<script>

import axios from 'axios'
export default {
    data(){
        return {
            password : '',
            email : '',
            remember : true,
            loading : false,
            errors : []
        }
    },

methods : {
             isValidEmail(){
                    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email)) {
                      return true
                     }
                      return false
             },

            loginAttempt(){

                this.errors = [],
                this.loading = true

                axios.post('/login',{

                    email: this.email ,
                    password: this.password ,
                    remember: this.remember

                }).then( response => {  location.reload()
                }).catch( error => {
                    this.loading = false
                    if(error.response.status == 422){
                        this.errors.push('we are sorry please enter your info again ')
                    }else{
                        this.errors.push('something wrong please refresh page and try again')
                    }
                })
            }

},

computed : {
        isValidLoginForm(){
            return this.isValidEmail() && this.password && !this.loading
    }
}

}
</script>
