
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="_token" content="{{ csrf_token() }}">
@if (env('APP_ENV') == 'local')
    <meta name="robots" content="noindex, nofollow" />
@endif
<meta name="title" content="{{@$meta_title ?? @$meta_title}}">
<meta name="description" content="{{@$meta_description ?? @$meta_description}}">
<link rel="canonical" href="{{ url()->current() }}" />
<link rel="alternate" hreflang="x-default" href="{{ url()->current() }}" />
@isset($tool)
    <link rel="canonical" href="{{ url()->current() }}" />
    <link rel="alternate" hreflang="x-default" href="{{ url()->current() }}" />
    <link rel="alternate" hreflang="{{@$tool->language ?? 'en'}}" href="{{ url()->current() }}" />
@endisset
@isset($blogs)
    @foreach ($blogs as $blogData)
        <link rel="alternate" hreflang="x-default" href="{{ url()->current() . '/' . $blogData['slug'] }}" />
        @php
            $InnerChild  = App\Models\Emd\Blog::where('parent_id', $blogData['id'])->get();
        @endphp
        @foreach ($InnerChild as $InnerChildData)
            <link rel="alternate" hreflang="x-default" href="{{  config('app.url') . '/blog/' . $InnerChildData['slug'] }}" />
        @endforeach
    @endforeach
@endisset
@isset($blog)
    @php
        $InnerChild  = App\Models\Emd\Blog::where('parent_id', $blog->parent_id)->get();
    @endphp
    @foreach ($InnerChild as $InnerChildData)
        <link rel="alternate" hreflang="x-default" href="{{  config('app.url') . '/blog/' . $InnerChildData['slug'] }}" />
    @endforeach
@endisset
