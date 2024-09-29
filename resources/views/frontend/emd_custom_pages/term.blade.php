@extends('layouts.frontend.main')
@section('title', @$content->page_title->value)
@section('content')
<div class="container">
    <div class="top_badge">
        <span>{{ @$content->first_small_heading->value }}</span>
    </div>
    <div class="top_heading">
        <h3>{{ @$content->main_heading->value }}</h3>
    </div>
    <div class="custom-text d-flex-column mt-50">
        {!! @$content->main_content->value !!}
    </div>
</div>
@endsection