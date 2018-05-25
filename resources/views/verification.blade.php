@extends('layouts.app')

@section('content')
    <?php
        if (!isset($user)) {
            $user = Auth::user();
        }
    ?>
    <div>
        Verification email has been sent to {{$user->defaultEmail()->email}}<br/>
        Please verify email
    </div>
@endsection
