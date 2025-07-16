@extends('Desarrollo.layout_desarrollo')

@section('template-blank-development')
    @push('CSS')
        <link rel="stylesheet" type="text/css" href="{{ url('vendors/styles/core.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('vendors/styles/icon-font.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('vendors/styles/style.css') }}">
    	<link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}">

        <style>
            .general-container {
                background-color: transparent !important;
                padding: 0px;
            }
        </style>
    @endpush

    <div class="row">
        <div class="col-md-3 pb-4">
            <div class="card-box pd-30 height-100-p">
                <div class="progress-box text-center">
                     <input type="text" class="knob dial1" value="80" data-width="120" data-height="120" data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#1b00ff" data-angleOffset="180" readonly>
                    <h5 class="text-blue padding-top-10 h5">My Earnings</h5>
                    <span class="d-block">80% Average <i class="fa fa-line-chart text-blue"></i></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 pb-4">
            <div class="card-box pd-30 height-100-p">
                <div class="progress-box text-center">
                     <input type="text" class="knob dial2" value="70" data-width="120" data-height="120" data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#00e091" data-angleOffset="180" readonly>
                    <h5 class="text-light-green padding-top-10 h5">Business Captured</h5>
                    <span class="d-block">75% Average <i class="fa text-light-green fa-line-chart"></i></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 pb-4">
            <div class="card-box pd-30 height-100-p">
                <div class="progress-box text-center">
                     <input type="text" class="knob dial3" value="90" data-width="120" data-height="120" data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#f56767" data-angleOffset="180" readonly>
                    <h5 class="text-light-orange padding-top-10 h5">Projects Speed</h5>
                    <span class="d-block">90% Average <i class="fa text-light-orange fa-line-chart"></i></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 pb-4">
            <div class="card-box pd-30 height-100-p">
                <div class="progress-box text-center">
                     <input type="text" class="knob dial1" value="80" data-width="120" data-height="120" data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#1b00ff" data-angleOffset="180" readonly>
                    <h5 class="text-blue padding-top-10 h5">My Earnings</h5>
                    <span class="d-block">80% Average <i class="fa fa-line-chart text-blue"></i></span>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="bg-white pd-20 card-box mb-30">
                <div id="chart1"></div>
            </div>
        </div>
    </div>
     


        @push('JS')

            <script src="{{ url('vendors/scripts/core.js') }}"></script>
            <script src="{{ url('vendors/scripts/script.min.js') }}"></script>
            <script src="{{ asset('src/plugins/jQuery-Knob-master/jquery.knob.min.js')}}"></script>
            <script src="{{ asset('src/plugins/highcharts-6.0.7/code/highcharts.js')}}"></script>
            <script src="{{ asset('src/plugins/highcharts-6.0.7/code/highcharts-more.js')}}"></script>
        	<script src="{{ asset('vendors/scripts/highchart-setting.js')}}"></script>
        	<script src="{{ asset('https://code.highcharts.com/highcharts-3d.js')}}"></script>
            <script src="{{ asset('vendors/scripts/dashboard2.js')}}"></script>

        @endpush
    @endsection
