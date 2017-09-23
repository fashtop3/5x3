@extends('adminlte::page')

@section('title', 'Glochis Club')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes Row -->
            <div class="row">
                <div class="col-lg-6 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>Glochis Africa Dev Initiative</h3>
                            <p>Zenith Bank: 1015309878</p>
                        </div>
                    </div>
                </div>
                <!-- ./col -->

                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>Upline</h3>

                            <p>
                                @if(isset($upline))
                                    Upline: {{$upline->name}}
                                @else
                                    No Upline Yet
                                    <br>
                                    <br>
                                @endif
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>
                                @if($user->level_id == null)
                                    0
                                @else
                                    {{$user->level_id}}
                                @endif
                                <br>
                            </h3>

                            <p>Current Level</p>
                        </div>

                    </div>
                </div>

                {{--<div class="col-lg-3 col-xs-6">--}}
                    {{--<!-- small box -->--}}
                    {{--<div class="small-box bg-red">--}}
                        {{--<div class="inner">--}}
                            {{--<h3>Profile</h3>--}}

                                {{--@if(is_null($user->data))--}}
                                  {{--<p>Incomplete User Profile</p>--}}
                                {{--@else--}}
                                  {{--<p>Profile Complete</p>--}}
                                {{--@endif--}}
                        {{--</div>--}}
                            {{--@if(is_null($user->data))--}}
                              {{--<a href="{{ route('profile') }}" class="small-box-footer">Update Profile <i class="fa fa-arrow-circle-right"></i></a>--}}
                            {{--@endif--}}
                    {{--</div>--}}
                {{--</div>--}}
                <!-- ./col -->
            </div>
            <!-- End Small Boxes Row/ -->


            <!-- Main Panel Row -->
            <div class="row">
                <div class="row">

                    <!-- START ACCOUNT DETAILS SECTION-->
                        <div class="col-md-6">
                        <div class="box box-solid">
                                    <div class="box-header with-border">
                                          <h3 class="box-title">Account Details</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">

                                                @if(is_null($user->paid))
                                            <div class="col-md-12">
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
                                        @else
                                                        <?php try { ?>
                                                     <h4><strong>Name:</strong>    {{ $user->name }}</h4>
                                                      <h4><strong>Email: </strong>  {{ $user->email}}</h4>
                                                            <br>
                                                        <?php } catch(\Exception $e){ ?>

                                                <?php } ?>

                                                @endif


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
                                                                            <td>{!! $user->paid ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>' !!}</td>
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
                        </div>


                            <!-- /.box-body -->
                    </div>
                    <!-- END ACCOUNT DETAILS SECTION-->


                    <!-- START NEWS SECTION-->
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">News</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="box-group" id="accordion">
                                            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                            <div class="panel box box-warning">
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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Downlines</div>

                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th class="text-center">Level</th>
                                                    <th class="text-center">Match/Status</th>
                                                    <th class="text-center">Peak</th>
                                                    <th></th>
                                                </tr>
                                                <tbody>
                                                <?php $du = [0, 5, 25, 125]; $match = $user->downlines()  ?>
                                                @for($i=3; $i>=0; $i--)
                                                <tr class="text-center">
                                                    <td class="text-center">{{ $i }}</td>
                                                    @if(!$user->paid)
                                                        <td class="text-danger">Inactive</td>
                                                    @else
                                                        <td>
                                                            @if($i==0)
                                                                <span class="label label-success">Activation</span>
                                                            @elseif(($i==1))
                                                                @if($match >= 5)
                                                                    <span class="label label-success">Completed</span>
                                                                @else
                                                                    <span class="label label-default">{{ $match }}</span>
                                                                @endif
                                                            @elseif(($i==2))
                                                                @if($match >= 25)
                                                                    <span class="label label-success">Completed</span>
                                                                @else
                                                                    <span class="label label-default">{{ $match }}</span>
                                                                @endif
                                                            @elseif(($i==3))
                                                                @if($match >= 125)
                                                                    <span class="label label-success">Completed</span>
                                                                @else
                                                                    <span class="label label-default">{{ $match }}</span>
                                                                @endif
                                                            @endif
                                                        </td>
                                                    @endif
                                                    <td>{{ $du[$i] }}</td>
                                                </tr>
                                                @endfor
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- END NEWS SECTION-->

                </div>
            </div>

        </section>
        <!-- /.content -->

@stop

