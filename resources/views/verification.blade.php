@extends('layouts.app')

@section('content')
    @if(isset($user))
        <div>
            Verification email has been sent to {{$user->defaultEmail()->email}}
        </div>
    @else
        Error
    @endif
@endsection
