@extends('layouts.frontend.main')
@section('content')
    <div class="container">
        <div class="blog_section d-flex-jc-ai-g d-flex-column">
            <div class="top_badge">
                <span>NEW BLOG</span>
            </div>
            <div class="top_heading">
                <h3>{{ $blog->title }}</h3>
            </div>
        </div>
        <div class="d-flex-column blog-list-container single_blog_container">
            <div class="blog-header-image">
                <img src="{{ asset('assets/frontend/image/blog.jpg') }}" alt="blog-1">
            </div>
            <div class="blog-detail d-flex">
                <div class="blog-info d-flex">
                    <div class="blog-trend m10">
                        <p>Trending</p>
                    </div>
                    <div class="blog-date m10-0">
                        <p>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M, Y') }}</p>
                    </div>
                </div>
            </div>
            <div class="d-flex-column single-blog-content">
                <p>{!! $blog->description !!}</p>
            </div>

            <div class="blog-single-social d-flex">
                <div class="share-text">
                    <p>Like what you read? Share with a friend</p>
                </div>
                <div class="share-icons g-1">
                    <img src="{{ asset('assets/frontend/image/facebook.svg') }}" alt="facebook">
                    <img src="{{ asset('assets/frontend/image/twitter-blog.svg') }}" alt="twitter">
                    <img src="{{ asset('assets/frontend/image/linkedin-blog.svg') }}" alt="linkedin">
                    <img src="{{ asset('assets/frontend/image/pinterest-blog.svg') }}" alt="pinterest">
                </div>
            </div>

        </div>
        <div class="blog_section d-flex-jc-ai-g d-flex-column">
            <div class="top_heading">
                <h3>🔥 Trending Posts </h3>
            </div>
        </div>
        <div class="blog-list-container-new d-flex">
            <div class="blog-left d-flex-column">
                <div class="blog-image">
                    <img src="{{ asset('assets/frontend/image/blog.jpg') }}" alt="blog-1">
                </div>
                <div class="blog-info d-flex">
                    <div class="blog-trend">
                        <p>trending</p>
                    </div>
                    <div class="blog-date">
                        <p>17 September 24</p>
                    </div>
                </div>
                <div class="blog-title">
                    <h2>sfsdklfasd;fml</h2>
                </div>
                <div class="blog-detail d-flex">
                    <a class="blog-read-more cursor-pointer d-flex-10"
                        href="#">
                        <p>read more</p>
                        <img src="{{ asset('assets/frontend/image/blog-top-read.svg') }}"
                            alt="read-more">
                    </a>
                </div>
            </div>
            <div class="blog-left d-flex-column">
                <div class="blog-image">
                    <img src="{{ asset('assets/frontend/image/blog.jpg') }}" alt="blog-1">
                </div>
                <div class="blog-info d-flex">
                    <div class="blog-trend">
                        <p>trending</p>
                    </div>
                    <div class="blog-date">
                        <p>17 September 24</p>
                    </div>
                </div>
                <div class="blog-title">
                    <h2>sfsdklfasd;fml</h2>
                </div>
                <div class="blog-detail d-flex">
                    <a class="blog-read-more cursor-pointer d-flex-10"
                        href="#">
                        <p>read more</p>
                        <img src="{{ asset('assets/frontend/image/blog-top-read.svg') }}"
                            alt="read-more">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection