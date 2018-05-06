@extends('layouts.app')
@section('title', 'Domains')

@section('content')
    <div class="jumbotron text-center">
    <h1>Add Domain</h1>
    {!! Form::open(['action' => 'DomainsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('domain', 'Domain Name')}}
        {{Form::text('domain', '', ['class'=> 'form-control', 'placeholder'=> 'Domain Name'])}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
    </div>
@endsection