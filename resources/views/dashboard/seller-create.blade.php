@extends('layouts.dashboard')
@section('title', 'Seller Create')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    {!! Form::open(['method'=>'post','class'=>'form-horizontal']) !!}
                    <div class="form-body">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Seller Name : </label>

                            <div class="col-sm-6">
                                <input name="name" value="" class="form-control input-lg" type="text" required placeholder="Seller Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Seller Email : </label>

                            <div class="col-sm-6">
                                <input name="email" value="" class="form-control input-lg" type="email" required placeholder="Seller Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Seller Password : </label>

                            <div class="col-sm-6">
                                <input name="password" value="" class="form-control input-lg" type="password" required placeholder="Seller Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Seller Phone : </label>

                            <div class="col-sm-6">
                                <input name="phone" value="" class="form-control input-lg" type="number" required placeholder="Seller Phone Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Seller Machines : </label>

                            <div class="col-sm-6">
                                <select name="machines[]" id="" class="select2-multi form-control input-lg" multiple="multiple" required>
                                    @foreach($machine as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Seller Status : </label>

                            <div class="col-sm-6">
                                <select name="status" id="" class="form-control input-lg" required>
                                    <option value="">Select One</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn blue btn-block margin-top-10"><i class="fa fa-paper-plane"></i> Create Seller</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div><!---ROW-->


@endsection
@section('scripts')

    <script src="{{asset('js/select2.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>

@endsection
