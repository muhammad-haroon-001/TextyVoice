@extends('layouts.frontend.main')

@section('content')
   <div class="container">
    <div class="bg-red py-5">
      {{$tool->tool_name}}
      {{-- {{$content->new->value}} --}}
    </div>
   </div>
@endsection