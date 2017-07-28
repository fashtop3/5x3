@extends('adminlte::page')

@section('title', 'Glochis Club')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>150</h3>

                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>

                            <p>Bounce Rate</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>44</h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->


            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <!-- START ACCORDION & CAROUSEL-->
                <h2 class="page-header">Glochis  Exclusive</h2>

                <div class="row">

                    <div class="col-md-6">
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Account Details</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">

                                {{ $user->data->acct_name }} <br />
                                {{ $user->data->acct_number }} <br />
                                {{ $user->bank()->name }}

                                @if($user->payment == false)
                                    <div class="col-md-6">
                                        @if(is_null($receipt))
                                            <p>Already Made Payment?</p>
                                            <div class="row col-md-12">
                                                <form class="form-horizontal" action="{{ route('teller') }}" method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">

                                                        <div class="col-md-9">
                                                            <input name="receipt" type="file" class="form-control" />
                                                        </div>

                                                        <div class="col-md-2">
                                                            <button class="btn btn-success" type="submit">Upload</button>
                                                        </div>

                                                        <div class="col-md-12 alert">
                                                            @if ($errors->has('receipt'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('receipt') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        @endif
                                        @if (Session::has('r-upload'))
                                            <div class="col-md-12 alert alert-success">
                                                <strong>{{ session('r-upload') }}</strong>
                                            </div>
                                        @endif
                                    </div>

                                    @if(is_null(auth()->user()->receipt()->first()))
                                        <div class="col-md-6">
                                            <h4>Payment Details</h4>
                                            <p>XYZ BANK</p>
                                        </div>
                                    @endif


                                @elseif(isset($upline))
                                    <p>Upline: {{$upline->name}}</p>
                                @endif



                            </div>


                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Teller</div>

                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th class="text-center">ID</th>
                                                    <th class="text-center">Confirmed</th>
                                                    <th class="text-center">Date Added</th>
                                                    <th></th>
                                                </tr>
                                                <tbody>
                                                @if(!is_null($receipt))
                                                    <tr class="text-center">
                                                        <td>{{ $receipt->id }}</td>
                                                        {{--                                <td>{{ $receipt->upload }}</td>--}}
                                                        <td>{!! $receipt->confirmed ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>' !!}</td>
                                                        <td>{{ $receipt->created_at->diffForHumans() }}</td>
                                                        <td></td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td colspan="5" class="text-warning text-center">No upload found.</td>
                                                    </tr>
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">News</h3>
                            </div>
                            <div class="box-body">
                                <div class="box-group" id="accordion">
                                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                    <div class="panel box box-primary">
                                        @foreach($messages as $message)
                                            <div class="box-header with-border">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                        {{$message->title}}
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="box-body">
                                                    {{$message->body}}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>

                </div>
                <!-- /.row -->
                <!-- END ACCORDION & CAROUSEL-->

            </div>


        </section>
        <!-- /.content -->

@stop