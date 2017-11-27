@extends('layouts.dashboard')
@section('title', 'Edit Menu')

@section('content')


    <div class="row">
        <div class="col-md-12">

            <div class="portlet light bordered">
                <div class="portlet-body form">
                    {!! Form::model($menu,['route'=>['menu-update',$menu->id],'method'=>'PUT']) !!}
                    <div class="form-body">
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label"><strong>Menu Name</strong></label>

                                <div class="col-md-8">
                                    <input class="form-control input-lg" name="name" value="{{ $menu->name }}"
                                           type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row margin-top-10">
                            <div class="form-group">
                                <label class="col-md-3 control-label"><strong>Menu Description</strong></label>

                                <div class="col-md-6">
                                    <textarea name="description" id="" cols="30" rows="20"
                                              class="wysihtml5 input-lg">{{ $menu->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-3 col-md-6">
                                <button type="submit" class="btn blue btn-block margin-top-20">Update Menu</button>
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

    <link href="{{asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}" type="text/javascript"></script>

    <script src="{{asset('assets/pages/scripts/components-editors.min.js')}}" type="text/javascript"></script>

@endsection