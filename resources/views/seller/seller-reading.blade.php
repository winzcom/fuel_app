@extends('layouts.seller')
@section('title', 'Seller Machine Reading')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
@endsection
@section('content')
    @if(count($reading))

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-10">
                                {!! Form::open(['route'=>'seller-reading-search','method'=>'post','class'=>'form-inline margin-bottom-5']) !!}

                                <div class="form-group">
                                    <label for="exampleInputName2">Start Date</label>
                                    <input type="text" name="start_date" class="form-control" id="start_date" placeholder="start Date" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail2">End Date</label>
                                    <input type="text" name="end_date" class="form-control" id="end_date" placeholder="End Date" required>
                                </div>
                                &nbsp;&nbsp;<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> View Reading</button>

                                {!! Form::close() !!}
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="sample_1">

                            <thead>
                            <tr>
                                <th>SL#</th>
                                <th>Reading Date</th>
                                <th>Name</th>
                                <th>Fuel</th>
                                <th>Start Reading</th>
                                <th>Current Reading</th>
                                <th>Actual Sell</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=0;@endphp
                            @foreach($reading as $p)
                                @php $i++;@endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ date('d-F-y',strtotime($p->created_at)) }}</td>
                                    <td>{{ $p->machine->name }}</td>
                                    <td>{{ $p->machine->fuel->name }}</td>
                                    <td>{{ $p->start_reading }} Litter</td>
                                    <td>{{ $p->current_reading }} Litter</td>
                                    <td>@php $sell = 0 @endphp
                                        @foreach($invoice as $inv)
                                            @if($inv->pay_date == date('Y-m-d',strtotime($p->created_at)) )
                                                @if($inv->machine_id == $p->machine_id)
                                                    @php $sell = $sell + $inv->quantity @endphp
                                                @else
                                                    @php continue; @endphp
                                                @endif
                                            @else
                                                @php continue; @endphp
                                            @endif
                                        @endforeach
                                        @if($sell != 0)
                                            {{ $sell }} / Litter
                                        @else
                                            <span class="label label-default"><b>Not Sell</b></span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div><!-- ROW-->

        <div class="text-center">
            {!! $reading->render() !!}
        </div>

    @else

        <div class="text-center">
            <h3>No Reading Available</h3>
        </div>
    @endif

@endsection
@section('scripts')

    <script src="{{ asset('js/jquery-ui.min.js') }}" type="text/javascript"></script>

    <script>

        $(function() {
            $('#start_date').datepicker({
                dateFormat: "yy-mm-dd",
            }).on('changeDate', function(e) {
                $(this).datepicker('hide');
            });

        });
        $(function() {
            $('#end_date').datepicker({
                dateFormat: "yy-mm-dd",
            }).on('changeDate', function(e) {
                $(this).datepicker('hide');
            });

        });
    </script>

@endsection
