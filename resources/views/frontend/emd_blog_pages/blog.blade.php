@extends('layouts.frontend.main')

@section('content')
   <div class="container">
    <div class="bg-red py-5">
        <h1>blog page</h1>
        @foreach ($blogs as $item)
            <h3>{{ $item->title }}</h3>
            <a href="{{ route('single.blog', $item->slug) }}" class="text-white">Readmore</a>
        @endforeach
    </div>
   </div>
@endsection