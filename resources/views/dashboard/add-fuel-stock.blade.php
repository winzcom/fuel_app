@extends('layouts.dashboard')
@section('title', 'Add Fuel Stock')
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
                                <select name="fuel" id="" class="form-control">
                                    @foreach($fuels as $fuel)
                                        <option value="{{$fuel->id}}">{{$fuel->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Fuel quantity in Litter : </label>

                            <div class="col-sm-6">
                                <input name="quantity" min="0" value="" class="form-control input-lg" type="number" required placeholder="Fuel quantity in Litter">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn blue btn-block margin-top-10"><i class="fa fa-paper-plane"></i> Add Quantity</button>
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
