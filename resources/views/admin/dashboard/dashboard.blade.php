@extends('layouts/adminLayout')

@section('title', 'Dashboard')

@push('vendor-style')
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endpush

@push('vendor-script')
    <script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endpush

@push('page-script')
    <script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endpush

@section('content')
@endsection
