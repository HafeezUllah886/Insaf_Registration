@php
    $page_title = "Dashboard";
    $page_dir = "Dashboard";
    $active = "dashboard";
    $menu = "open";
@endphp

@push('extra_css')
     <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
     <link href="{{ asset('assets/src/plugins/src/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
     <link href="{{ asset('assets/src/assets/css/dark/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('assets/src/assets/css/light/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('assets/src/assets/css/dark/components/list-group.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/src/assets/css/light/components/list-group.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/src/assets/css/dark/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/src/assets/css/light/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" />
     <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
@endpush

@extends('layout.main')
@section('content')
    <!-- CONTENT AREA -->
<div class="row layout-top-spacing">

    <div class="col-12">
        <div class="row">

                 <!-- Monthly Expenses -->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <a href="{{ url('/registraions/list/Pending') }}">
                        <div class="widget widget-card-four">
                            <div class="widget-content">
                                <div class="w-header">
                                    <div class="w-info">
                                        <h6 class="value">Pending</h6>
                                    </div>
                                </div>
                                <div class="w-content">
                                    <div class="w-info">
                                        <h3>{{ $pending }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Customer Dues -->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <a href="{{ url('/registraions/list/Approved') }}">
                    <div class="widget widget-card-four">
                        <div class="widget-content">
                            <div class="w-header">
                                <div class="w-info">
                                    <h6 class="value">Approved</h6>
                                </div>
                            </div>
                            <div class="w-content">
                                <div class="w-info">
                                    <h3>{{ $approved }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>

                 <!-- Supplier Dues -->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <a href="{{ url('/registraions/list/Rejected') }}">
                    <div class="widget widget-card-four">
                        <div class="widget-content">
                            <div class="w-header">
                                <div class="w-info">
                                    <h6 class="value">Rejected</h6>
                                </div>
                            </div>
                            <div class="w-content">
                                <div class="w-info">
                                    <h3>{{ $rejected }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>


        </div>

        <div class="row layout-top-spacing">




        </div>
    </div>

</div>
<!-- CONTENT AREA -->
@endsection

@push('extra_js')
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('assets/src/plugins/src/apex/apexcharts.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/src/assets/js/dashboard/dash_1.js') }}"></script> --}}
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

@endpush
