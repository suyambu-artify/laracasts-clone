<style>
    .alert{
        position: absolute;
        z-index: 999;
        display: flex;
        top: 8%;
        right: 1%;
    }
</style>

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
         <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert">&nbsp; X</button>
    </div>
@endif


@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert">&nbsp; X</button>
    </div>
@endif


@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
         <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert">&nbsp; X</button>
    </div>
@endif


@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block">
         <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert">&nbsp; X</button>
    </div>
@endif


@if ($errors->any())
    <div class="alert alert-danger">
         Please check the form below for errors
        <button type="button" class="close" data-dismiss="alert">&nbsp; X</button>
    </div>
@endif