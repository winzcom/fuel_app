@extends('layouts.dashboard')
@section('title', 'All Staff')
@section('content')


    @if(count($seller))

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
                                <th>Password</th>
                                <th>Machines</th>
                                <th>Activity</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($seller as $p)
                                <tr>

                                    <td>{{ $p->id }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->email }}</td>
                                    <td><a href="{{ route('staff_change_pass',$p->id) }}" class="btn btn-success btn-xs">Change Password</a></td>
                                    <td>
                                        @foreach($p->machines as $a)
                                            <span class="label label-default margin-bottom-5">{{ $a->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if($p->status == 1)
                                            <a href="{{ route('staff_inactive',$p->id) }}" class="btn btn-success btn-xs">Active</a>
                                        @else
                                            <a href="{{ route('staff_active',$p->id) }}" class="btn btn-warning btn-xs">Inactive</a>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('staff_edit',$p->id) }}" class="btn purple btn-xs" data-toggle="tooltip2" data-placement="top" title="Edit Seller"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-xs delete_button"
                                                data-toggle="modal" data-target="#DelModal"
                                                data-id="{{ $p->id }}" data-toggle="tooltip2" data-placement="top" title="Delete Staff">
                                            <i class='fa fa-trash'></i>
                                        </button>

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
            {!! $seller->render() !!}
        </div>
    @else

        <div class="text-center">
            <h3>No Seller Available</h3>
        </div>
        @endif

                <!-- Modal for DELETE -->
        <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-trash'></i> Delete !</h4>
                    </div>

                    <div class="modal-body">
                        <strong>Are you sure you want to Delete ?</strong>
                    </div>

                    <div class="modal-footer">

                        <form method="post" action="{{ route('staff_delete') }}" class="form-inline">
                            {!! csrf_field() !!}
                            {{ method_field('DELETE') }}
                            <input type="hidden" name="id" class="abir_id" value="0">

                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>

@endsection

@section('scripts')

    <script>
        $(function () {
            $('[data-toggle="tooltip2"]').tooltip()
        });
        $(document).ready(function () {

            $(document).on("click", '.delete_button', function (e) {
                var id = $(this).data('id');
                $(".abir_id").val(id);

            });

        });
    </script>

@endsection

