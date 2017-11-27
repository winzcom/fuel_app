@extends('layouts.dashboard')
@section('title', 'Machine Start Reading')
@section('content')


    @if(count($machine))

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
                                <th>Machine Name</th>
                                <th>Machine Code</th>
                                <th>Machine Fuel</th>
                                <th>Fuel Rate / Litter</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $i=0; @endphp
                            @foreach($machine as $p)
                                @php $i++ @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->code }}</td>
                                    <td>{{ $p->fuel->name }}</td>
                                    <td>{{ $p->fuel->currency->name }} - {{ $p->fuel->rate }} </td>
                                    <td>
                                        <a href="{{ route('add-start-reading',$p->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Start Reading</a>
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
            {!! $machine->render() !!}
        </div>
    @else

        <div class="text-center">
            <h3>No Fuel Available</h3>
        </div>
        @endif

@endsection

