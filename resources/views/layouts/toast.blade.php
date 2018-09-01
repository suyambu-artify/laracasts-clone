<style>
    #alert1{
      position: fixed;
    	right: 10px;
    	bottom: 10px;
    }
</style>

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block" id="alert1">
         <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert">&nbsp; X</button>
    </div>
@endif


@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block" id="alert1">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert">&nbsp; X</button>
    </div>
@endif


@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block" id="alert1">
         <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert">&nbsp; X</button>
    </div>
@endif


@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block" id="alert1">
         <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert">&nbsp; X</button>
    </div>
@endif


@if ($errors->any())
    <div class="alert alert-danger" id="alert1">
         Please check the form below for errors
        <button type="button" class="close" data-dismiss="alert">&nbsp; X</button>
    </div>
@endif
