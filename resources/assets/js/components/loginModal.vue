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

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="email" class="form-control" name="email"  required autofocus placeholder="moktar@gmail.com">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="password"  required autofocus placeholder="******">
                        </div>
                    </div>

                </div>

                <div class="form-group ">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">

                            <label class="form-check-label" for="remember">
                                Remember Me
                            </label>
                        </div>
                </div>


                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary">
                            Login
                        </button>
                    </div>

                </div>


            </div>
        </div>
    </div>

</template>

<script>
    export default {

    }
</script>
