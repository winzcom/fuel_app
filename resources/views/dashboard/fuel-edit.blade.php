@extends('layouts.dashboard')
@section('title', 'Fuel Edit')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    {!! Form::model($fuel,['route'=>['fuel-update',$fuel->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
                    <div class="form-body">


                        <div class="form-group">
                            <label class="col-sm-3 control-label">Fuel Name : </label>

                            <div class="col-sm-6">
                                <input name="name" value="{{ $fuel->name }}" class="form-control input-lg" type="text" required placeholder="Currency Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Currency : </label>

                            <div class="col-sm-6">
                                <select name="currency_id" id="" class="form-control input-lg">
                                    @foreach($currency as $c)
                                        @if($c->id == $fuel->currency_id)
                                            <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
                                        @else
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Fuel Rate / Litter : </label>

                            <div class="col-sm-6">
                                <input name="rate" value="{{ $fuel->rate }}" class="form-control input-lg" type="number" required placeholder="Conversion Rate">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Fuel Quantity / Litter : </label>

                            <div class="col-sm-6">
                                <input name="rate" min="0" value="{{ $fuel->quantity }}" class="form-control input-lg" type="number" required placeholder="Fuel Quantity">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn blue btn-block margin-top-10">Update Fuel</button>
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

