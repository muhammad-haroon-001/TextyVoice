@extends('layouts.frontend.main')
@section('title', 'Blog')
@section('content')
    <section class="container">
        <div class="blog_section d-flex-jc-ai-g d-flex-column">
            <div class="top_badge">
                <span>OUR BLOG</span>
            </div>
            <div class="top_heading">
                <h3>Our Latest 👨‍💻 Blog's </h3>
            </div>
        </div>
        <img src="{{asset('storage/'.$blogs[0]['images']['300x300'])}}" alt="ddd">

        @dd($blogs[0]['images']['300x300'])
        <div class="blog-list-container d-flex">
            @foreach ($blogs as $index => $item)
                @if ($index == 0)
                    <div class="blog-left d-flex-column">
                        <div class="blog-image">
                            <img src="{{asset('storage/'.$item['images']['300x300'])}}" alt="{{ $item['title'] }}">
                        </div>
                        <div class="blog-info d-flex">
                            <div class="blog-trend">
                                <p>trending</p>
                            </div>
                            <div class="blog-date">
                                <p>{{ \Carbon\Carbon::parse($item['created_at'])->format('d M, Y') }}</p>
                            </div>
                        </div>
                        <div class="blog-title">
                            <h2>{{ $item['title'] }}</h2>
                        </div>
                        <div class="blog-detail d-flex">
                            <a class="blog-read-more cursor-pointer d-flex-10" href="{{ route('single.blog', $item['slug']) }}">
                                <p>read more</p>
                                <img src="{{ asset('assets/frontend/image/read-more.svg') }}" alt="read-more">
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
            <div class="blog-right d-flex-column">
                @foreach ($blogs as $innerIndex => $innerItem)
                    @if ($innerIndex > 0 && $innerIndex < 3)
                        <div class="blog-top g-1">
                            <div class="blog-top-image">
                                <img src="{{asset('storage/'.$innerItem['images']['300x300'])}}" alt="{{ $innerItem['title'] }}">
                            </div>
                            <div class="blog-top-2 d-flex-column">
                                <div class="blog-info d-flex">
                                    <div class="blog-trend">
                                        <p>trending</p>
                                    </div>
                                    <div class="blog-date">
                                        <p>{{ \Carbon\Carbon::parse($innerItem['created_at'])->format('d M, Y') }}</p>
                                    </div>
                                </div>
                                <div class="blog-top-title">
                                    <p>{{ $innerItem['title'] }}</p>
                                </div>
                                <div class="blog-detail d-flex">
                                    <a href="{{ route('single.blog', $innerItem['slug']) }}" class="blog-read-more cursor-pointer d-flex-10">
                                        <p>read more</p>
                                        <img src="{{ asset('assets/frontend/image/blog-top-read.svg') }}" alt="read-more">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="blog-list-container-new d-flex">
            @foreach ($blogs as $finalIndex => $finalItem)
                @if ($finalIndex > 2)
                    <div class="blog-item d-flex-column">
                        <div class="blog-thumbnail">
                            <img src="{{asset('storage/'.$finalItem['images']['300x300'])}}" alt="{{ $finalItem['title'] }}">
                        </div>
                        <div class="blog-metadata d-flex">
                            <div class="blog-trend">
                                <p>Trending</p>
                            </div>
                            <div class="blog-date">
                                <p>{{ \Carbon\Carbon::parse($finalItem['created_at'])->format('d M, Y') }}</p>
                            </div>
                        </div>
                        <div class="blog-title">
                            <h2>{{ $finalItem['title'] }}</h2>
                        </div>
                        <div class="blog-footer d-flex">
                            <a class="blog-read-more cursor-pointer d-flex-10" href="{{ route('single.blog', $finalItem['slug']) }}">
                                <p>Read More</p>
                                <img src="{{ asset('assets/frontend/image/blog-top-read.svg') }}" alt="read-more">
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
@endsection
