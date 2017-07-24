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
                        <div class="col-md-6">
                            <p>Already Made Payment?</p>
                            <a href="" class="btn btn-success">Upload Teller</a>
                        </div>

                        <div class="col-md-6">
                            <p>Payment Details</p>
                            <p>XYZ BANK</p>
                        </div>


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
