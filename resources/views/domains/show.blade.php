@extends('layouts.app')
@section('title', 'Domain')
@section('content')

    <div class="container">
        <h1>Just a Single Domain</h1>
        <h2>{{$domain->domain}}</h2>
        Expiry: {{$domain->expiry}}

    </div>
@endsection
