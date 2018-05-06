@extends('layouts.app')
@section('title', 'Domains')
@section('content')

    <div class="container">
        <h1>Just Your Domains</h1>
        <span> <a href="/domains/create">+Add</a> | <a>Delete</a></span>
        @if(count($domains) > 0)
            <table class="table table-striped">
                <tr>
                    <td></td>
                    <td>Domain</td>
                    <td>Status</td>
                    <td></td>
                </tr>
            @foreach($domains as $domain)
                    <tr>
                        <td>
                            <button type="button" data-toggle="collapse" data-target="#{{$domain->id}}">
                                <i class="fas fa-angle-right"></i>
                            </button>
                        </td>
                        <td>{{$domain->domain}}</td>
                        <td>{{$domain->status}}</td>
                        <td colspan="2">
                            <table>
                                <tr id="{{$domain->id}}" class="collapse in">
                                <td>Expiry: {{$domain->expiry}}</td>
                                <td>Registration Date: {{$domain->registration_date}}</td>
                                <td>Last Checked: {{$domain->last_checked}}</td>

                                </tr>
                            </table>
                        </td>

                        <td></td>
                    </tr>

            {{--<div class="well">--}}
                {{--<h3><a href="/domains/{{$domain->id}}">{{$domain->domain}}</a></h3>--}}
                {{--<small>Status {{$domain->status}}</small>--}}
            {{--</div>--}}
            @endforeach
            </table>
    {{--{{$domains->links()}}--}}
        @else
            <p>No Domains Found For U!</p>
        @endif

    </div>
@endsection
