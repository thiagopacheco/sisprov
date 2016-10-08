@if(Session::has('error'))
    <div class="alert alert-warning alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <i class="glyphicon glyphicon-alert"></i> {{ Session::get('error') }}
    </div>
@endif