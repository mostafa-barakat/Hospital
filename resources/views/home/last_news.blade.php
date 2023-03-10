<div class="page-section bg-light">
    <div class="container">
        <h1 class="text-center wow fadeInUp" style="font-size: 2.5rem">Latest News</h1>
        <div class="row mt-5">
            @foreach ($news as $new)
            <div class="col-lg-4 py-2 wow zoomIn">
                    <div class="card-blog">
                        <div class="header">
                            <div class="post-category">
                                <a href="#">{{ $new->event }}</a>
                            </div>
                            <a href="{{ route('home.news' ,$new->id ) }}" class="post-thumb">
                                <img src="{{ $new->image }}" alt="">
                            </a>
                        </div>
                        <div class="body">
                            <h5 class="post-title"><a href="{{ route('home.news' ,$new->id) }}">{{ $new->content }}</a></h5>
                            <div class="site-info">
                                <div class="avatar mr-2">
                                    <span>{{ $new->publisher }}</span>
                                </div>
                                <span class="mai-time"></span> {{ $new->updated_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>
            </div>
            @endforeach
            <div class="col-12 text-center mt-4 wow zoomIn">
                <a href="{{ route('home.all_news') }}" class="btn btn-primary">Read More</a>
            </div>

        </div>
    </div>
</div>
