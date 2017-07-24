@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p>Welcome to Glochis Platform</p>
                    @if($user->payment == false)
                        <a href="{{ route('activate') }}" class="btn btn-success">Activate Account</a>
                    @elseif(isset($upline))
                        <p>Upline: {{$upline->name}}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
