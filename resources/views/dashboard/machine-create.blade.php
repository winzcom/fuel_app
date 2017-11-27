@extends('layouts.dashboard')
@section('title', 'Machine Create')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    {!! Form::open(['method'=>'post','class'=>'form-horizontal']) !!}
                    <div class="form-body">


                        <div class="form-group">
                            <label class="col-sm-3 control-label">Machine Name : </label>

                            <div class="col-sm-6">
                                <input name="name" value="" class="form-control input-lg" type="text" required placeholder="Machine Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Machine Code : </label>

                            <div class="col-sm-6">
                                <input name="code" value="" class="form-control input-lg" type="text" required placeholder="Machine Code">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Machine Fuel : </label>

                            <div class="col-sm-6">
                                <select name="fuel_id" id="" class="form-control input-lg" required>
                                    <option value="">Select One</option>
                                    @foreach($fuel as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn blue btn-block margin-top-10"><i class="fa fa-paper-plane"></i> Create Machine</button>
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

