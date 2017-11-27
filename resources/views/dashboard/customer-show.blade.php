@extends('layouts.dashboard')
@section('title', 'All Customer')
@section('content')


    @if(count($customer))

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
                            @foreach($customer as $p)
                                @php $i++;@endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>
                                        @if($p->email != null)
                                            {{ $p->email }}
                                        @else
                                            <span class="label label-default">Not Available</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($p->address != null)
                                            {{ $p->address }}
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
                                        <a href="{{ route('customer-edit',$p->id) }}" class="btn purple btn-sm"><i class="fa fa-edit"></i> Edit invoice</a>
                                        <a href="{{ route('customerId-invoice',$p->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> View Invoice</a>
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
            {!! $customer->render() !!}
        </div>
    @else

        <div class="text-center">
            <h3>No Customer Available</h3>
        </div>
    @endif

@endsection


