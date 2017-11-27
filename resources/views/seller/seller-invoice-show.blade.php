@extends('layouts.seller')
@section('title', 'All Customer')
@section('content')


    @if(count($invoice))

        <div class="row">
            <div class="col-md-12">


                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">

                            <thead>
                            <tr>
                                <th>ID#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Machine</th>
                                <th>Fuel</th>
                                <th>Rate / L</th>
                                <th>Quantity / L</th>
                                <th>Total Bill</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $i=0;@endphp
                            @foreach($invoice as $p)
                                @php $i++;@endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $p->customer->name }}</td>
                                    <td>
                                        @if($p->customer->email != null)
                                            {{ $p->customer->email }}
                                        @else
                                            <span class="label label-default">Not Available</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($p->customer->address != null)
                                            {{ $p->customer->address }}
                                        @else
                                            <span class="label label-default">Not Available</span>
                                        @endif
                                    </td>
                                    <td>{{ $p->machine->name }}</td>
                                    <td>{{ $p->machine->fuel->name }}</td>
                                    <td>{{ $p->machine->fuel->currency->name }} - {{ $p->machine->fuel->rate }}</td>
                                    <td>{{ $p->quantity }} Litter</td>
                                    <td>{{ $p->machine->fuel->currency->name }} - {{ $p->machine->fuel->rate * $p->quantity }}</td>
                                    <td>
                                        <a href="{{ route('seller-customer-invoice',$p->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> View Invoice</a>
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
            {!! $invoice->render() !!}
        </div>
    @else

        <div class="text-center">
            <h3>No Customer Available</h3>
        </div>
    @endif

@endsection