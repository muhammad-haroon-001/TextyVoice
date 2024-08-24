@extends('layouts/adminLayout')

@section('title', 'Tools')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection



@section('content')
    <section class="tool-index">
        <div class="container">
            <div class="white-bg">
              @dd($tool)
            </div>
        </div>
    </section>
    @push('page-script')
        <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
        <script></script>
    @endpush
@endsection
