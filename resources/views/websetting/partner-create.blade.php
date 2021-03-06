@extends('layouts.dashboard')
@section('title', 'Partner Create')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    {!! Form::open(['method'=>'post','class'=>'form-horizontal','files'=>true]) !!}
                    <div class="form-body">


                        <div class="form-group">
                            <label class="col-sm-3 control-label">Partner Name : </label>

                            <div class="col-sm-6">
                                <input name="name" value="" class="form-control input-lg" type="text" required placeholder="Partner name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Partner Email : </label>

                            <div class="col-sm-6">
                                <input name="email" value="" class="form-control input-lg" type="email" required placeholder="Partner Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Partner Image : </label>

                            <div class="col-sm-6">
                                <input type="file" name="image" id="" class="form-control input-lg" required>
                                <b style="color:red; font-weight: bold; float: right;margin-right: 10px">Image Must be JPG or PNG & Dimensions: 325x260</b>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Partner Address : </label>

                            <div class="col-sm-6">
                                <input name="address" value="" class="form-control input-lg" type="text" required placeholder="Partner Address">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn blue btn-block margin-top-10">Create Partner</button>
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

