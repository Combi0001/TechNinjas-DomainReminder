<div id="alerts">
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                <span class="alert-message">{{$error}}</span>
                <span class="alert-remove"><i class="fa fa-times" aria-hidden="true"></i></span>
            </div>
        @endforeach
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            <span class="alert-message">{{session('success')}}</span>
            <span class="alert-remove"><i class="fa fa-times" aria-hidden="true"></i></span>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            <span class="alert-message">{{session('error')}}></span>
            <span class="alert-remove"><i class="fa fa-times" aria-hidden="true"></i></span>
        </div>
    @endif
</div>