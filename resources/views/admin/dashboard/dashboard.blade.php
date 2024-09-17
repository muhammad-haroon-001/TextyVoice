@extends('layouts/adminLayout')
@section('title', 'Dashboard')

@section('content')
    <section class="dashboard">
        <h3>Welcome , {{ Auth::user()->name }}</h3>
    </section>
@endsection