@extends('layouts.dashboard')
@section('title', 'MAchine Edit')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    {!! Form::model($machine,['route'=>['machine-update',$machine->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
                    <div class="form-body">


                        <div class="form-group">
                            <label class="col-sm-3 control-label">Machine Name : </label>

                            <div class="col-sm-6">
                                <input name="name" value="{{ $machine->name }}" class="form-control input-lg" type="text" required placeholder="Machine Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Machine Code : </label>

                            <div class="col-sm-6">
                                <input name="code" value="{{ $machine->code }}" class="form-control input-lg" type="text" required placeholder="Machine Code">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Machine Fuel : </label>

                            <div class="col-sm-6">
                                <select name="fuel_id" id="" class="form-control input-lg">
                                    @foreach($fuel as $c)
                                        @if($c->id == $machine->fuel_id)
                                            <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
                                        @else
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn blue btn-block margin-top-10">Update Machine</button>
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

