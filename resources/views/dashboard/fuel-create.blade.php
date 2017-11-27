@extends('layouts.dashboard')
@section('title', 'Fuel Create')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    {!! Form::open(['method'=>'post','class'=>'form-horizontal']) !!}
                    <div class="form-body">


                        <div class="form-group">
                            <label class="col-sm-3 control-label">Fuel Name : </label>

                            <div class="col-sm-6">
                                <input name="name" value="" class="form-control input-lg" type="text" required placeholder="Fuel Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Currency : </label>

                            <div class="col-sm-6">
                                <select name="currency_id" id="" class="form-control input-lg" required>
                                    <option value="">Select One</option>
                                    @foreach($currency as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Fuel Rate / Litter : </label>

                            <div class="col-sm-6">
                                <input name="rate" value="" class="form-control input-lg" type="number" required placeholder="Fuel Rate Par Litter">
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label class="col-sm-3 control-label">Fuel quantity in Litter : </label>

                            <div class="col-sm-6">
                                <input name="quantity" min="0" value="{{old('quantity')}}" class="form-control input-lg" type="number" required placeholder="Fuel quantity in Litter">
                            </div>
                        </div> -->

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn blue btn-block margin-top-10"><i class="fa fa-paper-plane"></i> Create Fuel</button>
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

