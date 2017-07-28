@extends('adminlte::page')

@section('content')

    <!-- PAGE CONTENT WRAPPER -->
    <div class="container">
    <div class="page-content-wrap">


        <div class="row">
            <div class="col-md-12">

                @if(Session::has('p-success'))
                    <div class="row col-md-12">
                        <div class="alert alert-success">{{ session('p-success') }}</div>
                    </div>
                @elseif (Session::has('p-error'))
                    <div class="row col-md-12">
                        <div class="alert alert-danger">{{ session('p-error') }}</div>
                    </div>
                @endif

                <form class="form-horizontal"
                      {{--@if(!$profile || !$bank)--}}
                      {{--action="{{ route('profile') }}"--}}
                      {{--@else--}}
                      {{--action="{{ route('profile.edit', ['id' => auth()->user()->id]) }}"--}}
                      {{--@endif--}}
                      method="post" action="{{ route('profile') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Profile/Bank</strong></h3>
                            <ul class="panel-controls">
                                {{--<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>--}}
                            </ul>
                        </div>

                        <div class="panel-body">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Gender</label>
                                        <div class="col-md-7 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <select name="data[gender]" class="form-control"
                                                        required>
                                                    {{--<option value="">--Choose--</option>--}}
                                                    <option {{ old('data.gender', @$user->data->gender)}} value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                            {{--<span class="help-block">Password field sample</span>--}}
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Phone</label>
                                        <div class="col-md-7">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-mobile-phone"></span></span>
                                                <input name="data[phone]" type="text" class="form-control"
                                                       value="{{ old('data.phone', @$user->data->phone) }}" required>
                                            </div>
                                            {{--<span class="help-block">This is sample of text field</span>--}}
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="col-md-5 control-label">State</label>
                                        <div class="col-md-7">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-institution"></span></span>
                                                <select name="data[state_id]" class="form-control" required>
                                                    @foreach(\App\State::all() as $state)
                                                        <option value="{{ $state->id }}"
                                                                {{ old('data.state_id', @$user->data->state_id)==$state->id? "selected='selected'":"" }}
                                                        >{{ $state->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {{--<span class="help-block">This is sample of text field</span>--}}
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-5 control-label">City</label>
                                        <div class="col-md-7">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                                <input name="data[city]" type="text" class="form-control"
                                                       value="{{ old('data.city', @$user->data->city) }}" required>
                                            </div>
                                            {{--<span class="help-block">This is sample of text field</span>--}}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Next Of Kin</label>
                                        <div class="col-md-7">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-share"></span></span>
                                                {{--<input type="text" class="form-control datepicker" value="2014-11-01">--}}
                                                <input type="text" name="data[next_of_kin_name]"
                                                       class="form-control"
                                                       value="{{ old('data.next_of_kin_name', @$user->data->next_of_kin_name) }}" required>
                                            </div>
                                            {{--<span class="help-block">Click on input field to get datepicker</span>--}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Next Of Kin Phone</label>
                                        <div class="col-md-7">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-share"></span></span>
                                                {{--<input type="text" class="form-control datepicker" value="2014-11-01">--}}
                                                <input type="text" name="data[next_of_kin_phone]"
                                                       class="form-control"
                                                       value="{{ old('data.next_of_kin_phone', @$user->data->next_of_kin_phone) }}" required>
                                            </div>
                                            {{--<span class="help-block">Click on input field to get datepicker</span>--}}
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Account Name</label>
                                        <div class="col-md-7">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-credit-card"></span></span>
                                                {{--<input type="text" class="form-control datepicker" value="2014-11-01">--}}
                                                <input type="text" name="data[acct_name]"
                                                       class="form-control"
                                                       value="{{ old('data.acct_name', @$user->data->acct_name) }}" required>
                                            </div>
                                            {{--<span class="help-block">Click on input field to get datepicker</span>--}}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Account Number</label>
                                        <div class="col-md-7">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-money"></span></span>
                                                {{--<input type="text" class="form-control datepicker" value="2014-11-01">--}}
                                                <input type="text" name="data[acct_number]"
                                                       class="form-control"
                                                        value="{{ old('data.acct_name', @$user->data->acct_name) }}" required>
                                            </div>
                                            {{--<span class="help-block">Click on input field to get datepicker</span>--}}
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Bank</label>
                                        <div class="col-md-7">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-building"></span></span>
                                                {{--<input type="text" class="form-control datepicker" value="2014-11-01">--}}
                                                <select name="data[bank_id]" class="form-control" required>
                                                    @foreach(\App\Bank::all() as $bank)
                                                        <option value="{{ $bank->id }}"
                                                                {{ old('data.bank_id', @@$user->data->bank_id)==$bank->id? "selected='selected'":"" }}
                                                        >{{ $bank->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            {{--<span class="help-block">Click on input field to get datepicker</span>--}}
                                        </div>
                                    </div>

                                    <div class="form-group">

                                    </div>

                                </div>

                            </div>

                            <div class="clearfix">
                                <button class="btn btn-primary pull-right">Submit</button>
                            </div>

                        </div>
                        <div class="panel-footer">

                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
    <!-- END PAGE CONTENT WRAPPER -->
    </div>
@endsection