<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>One Health - Medical Center HTML5 Template</title>

    <link rel="stylesheet" href="{{ asset('assets/css/maicons.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendor/owl-carousel/css/owl.carousel.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendor/animate/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    @include('home.header')

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-4 py-2 wow zoomIn">
                @foreach ($news as $new)
                    <div class="card-blog mb-5">
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
                    @endforeach
            </div>
        </div>
    </div>

    @include('home.footer')

    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/wow/wow.min.js') }}"></script>

    <script src="{{ asset('assets/js/theme.js') }}"></script>

</body>

</html>

