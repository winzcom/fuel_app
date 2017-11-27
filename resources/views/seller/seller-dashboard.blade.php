@extends('layouts.seller')
@section('title', 'Seller Dashboard')

@section('content')


        <!-- START -->
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat yellow">
        <div class="visual">
            <i class="fa fa-list"></i>
        </div>
        <div class="details">
            <div class="number">{!! $total_customer !!}</div>
            <div class="desc">Total Customer</div>
        </div>
    </div>
</div>
<!-- END -->


<!-- START -->
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat green">
        <div class="visual">
            <i class="fa fa-list"></i>
        </div>
        <div class="details">
            <div class="number">{!! $total_machine !!}</div>
            <div class="desc">Total Machine</div>
        </div>
    </div>
</div>
<!-- END -->


<!-- START -->
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat blue">
        <div class="visual">
            <i class="fa fa-list"></i>
        </div>
        <div class="details">
            <div class="number">{!! $total_fuel !!}</div>
            <div class="desc">Total Fuel</div>
        </div>
    </div>
</div>
<!-- END -->

<!-- START -->
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat blue">
        <div class="visual">
            <i class="fa fa-list"></i>
        </div>
        <div class="details">
            <div class="number">{!! $total_seller !!}</div>
            <div class="desc">Total Seller</div>
        </div>
    </div>
</div>
<!-- END -->


@endsection