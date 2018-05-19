@extends('layouts.app')

@section('content')
    @if(Auth::user())
        <div>
            Verification email has been sent to {{Auth::user()->defaultEmail()->email}}
            Please verify email
        </div>
    @else
        Error
    @endif
@endsection
