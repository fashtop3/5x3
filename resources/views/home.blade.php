@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <br>
                    @if($user->payment == false)
                        <p>Welcome to Glochis Platform</p>
                        <a href="" class="btn btn-success">Activate Account</a>
                    @elseif($upline)
                        <p>Upline: {{$upline->name}}</p>
                    @else

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
