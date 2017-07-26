@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-8">
        <div class="row">
            <div class="">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <p>Welcome to Glochis Platform</p>
                        <br>
                        @if($user->payment == false)
                            <div class="col-md-6">
                                @if(is_null($receipt))
                                    <p>Already Made Payment?</p>
                                    <div class="row col-md-12">
                                        <form class="form-horizontal" action="{{ route('teller') }}" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <div class="col-md-6">
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
                </div>
            </div>
        </div>
        <div class="row">
            <div class="">
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
                                        <td class="text-warning">No upload found.</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>create+mess
    </div>

    <div class="col-md-4 ">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">News</div>

                <div class="panel-body">
                    @foreach($messages as $message)
                        <div>
                            <strong><p>{{$message->title}}</p></strong>
                            <p>{{$message->body}}</p>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
        </div>
    </div>

</div>
@endsection

@section('script')
@endsection
