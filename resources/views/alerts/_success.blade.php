@if(Session::has('success'))
    <div class="alert alert-success alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <i class="glyphicon glyphicon-ok-sign"></i> {{ Session::get('success') }}
    </div>
@endif