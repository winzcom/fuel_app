@extends('layouts.dashboard')
@section('title', 'Staff Seller')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    {!! Form::model($staff,['route'=>['staff_update',$staff->id],'method'=>'put','class'=>'form-horizontal']) !!}
                    <div class="form-body">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Seller Name : </label>

                            <div class="col-sm-6">
                                <input name="name" value="{{ $staff->name }}" class="form-control input-lg" type="text" required placeholder="Seller Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Seller Email : </label>

                            <div class="col-sm-6">
                                <input name="email" value="{{ $staff->email }}" class="form-control input-lg" type="email" required placeholder="Seller Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Seller Phone : </label>

                            <div class="col-sm-6">
                                <input name="phone" value="{{ $staff->phone }}" class="form-control input-lg" type="number" required placeholder="Seller Phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Seller Machines : </label>
                            <div class="col-sm-6">
                                {!! Form::select('machines[]',$machine,null,['class'=>'select2-multi form-control input-lg','multiple'=>'multiple','required'])  !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Seller Activity : </label>
                            <div class="col-sm-6">
                                <select name="status" id="" class="form-control input-lg" required>
                                    <option value="">Select One</option>
                                    @if($staff->status == 1)
                                        <option value="1" selected >Active</option>
                                        <option value="0">Inactive</option>
                                    @else
                                        <option value="1" >Active</option>
                                        <option value="0" selected>Inactive</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn blue btn-block margin-top-10">Update Seller</button>
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
@section('scripts')

    <script src="{{asset('js/select2.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! json_encode($staff->machines()->getRelatedIds()) !!}).trigger('change');
    </script>

@endsection

