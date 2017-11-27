@extends('layouts.dashboard')
@section('title', 'Staff Password Change')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    {!! Form::model($staff,['route'=>['staff_change_pass_update',$staff->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
                    <div class="form-body">


                        <div class="form-group">
                            <label class="col-sm-3 control-label">Seller Name : </label>

                            <div class="col-sm-6">
                                <input name="name" value="{{ $staff->name }}" class="form-control input-lg" type="text" required disabled placeholder="Seller Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Staff Email : </label>

                            <div class="col-sm-6">
                                <input name="email" value="{{ $staff->email }}" class="form-control input-lg" type="text" required disabled placeholder="Seller Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Seller New Password : </label>

                            <div class="col-sm-6">
                                <input name="password" value="" class="form-control input-lg" type="password" required placeholder="Seller New Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Seller Confirm Password : </label>

                            <div class="col-sm-6">
                                <input name="password_confirmation" value="" class="form-control input-lg" type="password" required placeholder="Seller Confirm Password">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn blue btn-block margin-top-10">Update Seller Password</button>
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

