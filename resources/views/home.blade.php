@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <form action="{{ route('logout') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="submit" value="Logout" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
