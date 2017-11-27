@extends('layouts.home')
@section('title', 'About Us')
@section('content')



        <!-- =-=-=-=-=-=-= PAGE BREADCRUMB =-=-=-=-=-=-= -->
<section class="breadcrumbs-area parallex">
    <div class="container">
        <div class="row">
            <div class="page-title">
                <div class="col-sm-12 col-md-6 page-heading text-left">
                    <h3></h3>
                    <h2></h2>
                </div>
                <div class="col-sm-12 col-md-6 text-right">

                </div>
            </div>
        </div>
    </div>
</section>
<!-- =-=-=-=-=-=-= PAGE BREADCRUMB END =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= About Us =-=-=-=-=-=-= -->
<section class="padding-top-70 white" id="about-compnay">
    <div class="container">
        <div class="row">
            <div class="about">
                <div class="col-md-4 col-sm-12 hidden-sm col-xs-12">
                    <img class="img-responsive center-block" alt="" src="{{ asset('images') }}/{{ $about->image }}">
                </div>
                <!-- end col-md-6 -->
                <div class="col-md-8 col-sm-12 company-history">
                    <h2>{{ $about->title }}</h2>
                    <p>{!! $about->description !!}</p>
                </div>
                <!-- end col-md-5 -->
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- =-=-=-=-=-=-= About Us END =-=-=-=-=-=-= -->

<!-- =-=-=-=-=-=-= SEPARATOR Fun Facts =-=-=-=-=-=-= -->
<div class="parallex section-padding fun-facts-bg text-center" >
    <div class="container">
        <div class="row">
            <!-- countTo -->
            <div class="col-xs-6 col-sm-3 col-md-3">
                <div class="statistic-percent" data-perc="356">
                    <div class="facts-icons"> <span class="flaticon-pie-chart-1"></span> </div>
                    <div class="fact">
                        <span class="percentfactor">356</span>
                        <p>Happy Members</p>
                    </div>
                    <!-- end fact -->
                </div>
                <!-- end statistic-percent -->
            </div>
            <!-- end col-xs-6 col-sm-3 col-md-3 -->
            <!-- countTo -->
            <div class="col-xs-6 col-sm-3 col-md-3">
                <div class="statistic-percent" data-perc="90">
                    <div class="facts-icons"> <span class="flaticon-graph-3"></span> </div>
                    <div class="fact">
                        <span class="percentfactor">90</span>
                        <p>Our Profit</p>
                    </div>
                    <!-- end fact -->
                </div>
                <!-- end statistic-percent -->
            </div>
            <!-- end col-xs-6 col-sm-3 col-md-3 -->
            <!-- countTo -->
            <div class="col-xs-6 col-sm-3 col-md-3">
                <div class="statistic-percent" data-perc="274">
                    <div class="facts-icons"> <span class="flaticon-diagram"></span> </div>
                    <div class="fact">
                        <span class="percentfactor">274</span>
                        <p>Our Clients</p>
                    </div>
                    <!-- end fact -->
                </div>
                <!-- end statistic-percent -->
            </div>
            <!-- end col-xs-6 col-sm-3 col-md-3 -->
            <!-- countTo -->
            <div class="col-xs-6 col-sm-3 col-md-3">
                <div class="statistic-percent" data-perc="434">
                    <div class="facts-icons"> <span class="flaticon-receipt"></span> </div>
                    <div class="fact">
                        <span class="percentfactor">434</span>
                        <p>Completed Projects</p>
                    </div>
                    <!-- end fact -->
                </div>
                <!-- end statistic-percent -->
            </div>
            <!-- end col-xs-6 col-sm-3 col-md-3 -->
        </div>
        <!-- End row -->
    </div>
    <!-- end container -->
</div>
<!-- =-=-=-=-=-=-= SEPARATOR END =-=-=-=-=-=-= -->

@endsection