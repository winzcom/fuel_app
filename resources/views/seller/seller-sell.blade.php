@extends('layouts.seller')
@section('title', 'Sell Now')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    {!! Form::open(['method'=>'post','class'=>'form-horizontal']) !!}
                    <div class="form-body">


                        <div class="form-group">
                            <label class="col-sm-3 control-label">Customer Name : </label>

                            <div class="col-sm-6">
                                <input name="name" value="" class="form-control input-lg" type="text" required placeholder="Customer Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Customer Email : </label>

                            <div class="col-sm-6">
                                <input name="email" value="" class="form-control input-lg" type="email"  placeholder="Customer Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Customer Phone : </label>

                            <div class="col-sm-6">
                                <input name="phone" value="" class="form-control input-lg" type="text"  placeholder="Customer Phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Customer Address : </label>

                            <div class="col-sm-6">
                                <input name="address" value="" class="form-control input-lg" type="text" placeholder="Customer Address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Machine Name : </label>

                            <div class="col-sm-6">
                                <select name="machine_id" id="" class="form-control input-lg" required>
                                    @foreach($machines->machines as $c)
                                        @if($c->id == $machine->id)
                                            <option value="{{ $c->id }}" selected >{{ $c->name }} -- {{ $c->fuel->name }}</option>
                                        @else
                                            <option value="{{ $c->id }}" >{{ $c->name }} -- {{ $c->fuel->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">How Much Litter : </label>

                            <div class="col-sm-6">
                                <input name="quantity" value="" class="form-control input-lg" type="number" required placeholder="How Much Litter">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn blue btn-block margin-top-10"><i class="fa fa-paper-plane"></i> Create Customer & Continue</button>
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

