<div class="row">
    <div class="col-md-10 offset-md-1">
        @if (Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
        @endif

        @if (Session::get('error'))
        <div class="alert alert-danger" role="alert">
        {{Session::get('error')}}
        </div>
        @endif
    </div>
</div>
