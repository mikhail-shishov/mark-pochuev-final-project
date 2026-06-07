@extends("layouts.front")
@section("title", "Home")
@section("content")
    <header class="masthead" style="background-image: url('{{asset("vendor/clean-blog/assets/img/home-bg.jpg")}}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div id="posts-container" data-next-page-url="{{ $posts->nextPageUrl() }}">
                    @foreach($posts as $post)
                        <div class="post-preview">
                            <a href="{{ route('posts.show', $post) }}">
                                <h2 class="post-title">{{ $post->title }}</h2>
                                <h3 class="post-subtitle">{{ \Illuminate\Support\Str::words(strip_tags($post->content), 12, "...") }}</h3>
                            </a>
                            <p class="post-meta">
                                Posted on {{ $post->published_at }}
                            </p>
                        </div>
                    @endforeach
                </div>


{{--                <div class="d-flex @if($posts->onFirstPage()) justify-content-end @else justify-content-between @endif mb-4">--}}
{{--                    @if (!$posts->onFirstPage())--}}
{{--                        <a class="btn btn-primary text-uppercase" href="{{ $posts->previousPageUrl() }}">Newer Posts</a>--}}
{{--                    @endif--}}
{{--                    @if ($posts->hasMorePages())--}}
{{--                        <a class="btn btn-primary text-uppercase" href="{{ $posts->nextPageUrl() }}">Older Posts</a>--}}
{{--                    @endif--}}
{{--                </div>--}}


                <div id="loading-spinner" class="text-center d-none my-4">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
