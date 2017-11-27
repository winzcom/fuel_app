@extends('layouts.dashboard')
@section('title', 'Start Reading')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body">
                    <!-- Main content -->
                    <section class="content">
                        <section class="content invoice">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-xs-12">
                                    <h5 style="text-align: center;font-size: 16px;"
                                        class="page-header">
                                        <b>{{ $site_title }}</b><br><br>{{ $general->number }} |
                                        {{ $general->email }}<br>{{ URL::to('/') }}<br>
                                        <small style="margin-top: -15px;font-size: 14px;color: #333;"
                                               class="pull-right">Date: {{ \Carbon\Carbon::now()->format('d-F-Y : h:i A') }}
                                        </small>
                                    </h5>

                                </div>
                                <!-- /.col -->
                            </div>
                            <hr>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-6 invoice-col">
                                    <strong>Machine Name : </strong> {{ $machine->name }}<br>
                                    <strong>Machine Code : </strong> {{ $machine->code }}<br>
                                    <strong>Fuel Type : </strong> {{ $machine->fuel->name }}<br>
                                    <strong>Rate / Litter : </strong> {{ $machine->fuel->currency->name }} - {{ $machine->fuel->rate }}<br>
                                </div>
                                <div class="col-sm-6 invoice-col">
                                    @if($reading == null)
                                        {!! Form::open(['route'=>'update-start-reading','method'=>'post']) !!}
                                        <input type="hidden" name="machine_id" value="{{ $machine->id }}">
                                        <strong>Present Reading : </strong>
                                        <input type="number" name="start_reading" id="" class="form-control input-sm margin-top-10" placeholder="Enter Present Reading" required ><br>
                                        <button type="submit" class="btn btn-primary btn-sm margin-top-10" onclick="return confirm('Are you Sure..? Its Right..!')"><i class="fa fa-plus"></i> Add Present Reading</button>
                                        <a href="{{ route('start-reading') }}" class="btn btn-success btn-sm margin-top-10"><i class="fa fa-plus"></i> Add Another</a>
                                        {{ Form::close() }}
                                    @else
                                        @if($reading->start_reading_time != date('Y-m-d'))
                                            {!! Form::open(['route'=>'update-start-reading','method'=>'post']) !!}
                                            <input type="hidden" name="machine_id" value="{{ $machine->id }}">
                                            <strong>Present Reading : </strong>
                                            <input type="number" name="start_reading" id="" class="form-control input-sm margin-top-10" placeholder="Enter Present Reading" required ><br>
                                            <button type="submit" class="btn btn-primary btn-sm margin-top-10" onclick="return confirm('Are you Sure..? Its Right..!')"><i class="fa fa-plus"></i> Add Present Reading</button>
                                            <a href="{{ route('start-reading') }}" class="btn btn-success btn-sm margin-top-10"><i class="fa fa-plus"></i> Add Another</a>
                                            {{ Form::close() }}
                                        @else
                                            <span style="color: red" class="text-center"><b>You Can't Added Again.</b></span>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <!-- /.row -->
                        </section>
                    </section>

                </div> {{-- Body Close --}}
            </div> {{-- Border Close--}}
        </div> {{-- col-md-12 --}}
    </div><!-- ROW-->

@endsection


