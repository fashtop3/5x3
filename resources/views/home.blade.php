@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p>Welcome to Glochis Platform</p>
                    <br>
                    @if($user->payment == false)
                        <div class="col-md-6">
                            <p>Already Made Payment?</p>
                            <form action="{{ route('teller') }}" method="post">
                                {{--<button type="file" class="btn btn-success">Upload Teller</button>--}}
                                <label class="control-label">Select File</label>
                                <input id="input-4" name="input4[]" type="file" multiple class="file-loading">
                            </form>

                        </div>

                        <div class="col-md-6">
                            <p>Payment Details</p>
                            <p>XYZ BANK</p>
                        </div>


                    @elseif(isset($upline))
                        <p>Upline: {{$upline->name}}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Teller</div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Upload</th>
                                <th>Confirmed</th>
                                <th>Date Added</th>
                                <th>Date Modified</th>
                            </tr>
                            <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).on('ready', function() {
            $("#input-4").fileinput({showCaption: false});
        });
    </script>
@endsection
