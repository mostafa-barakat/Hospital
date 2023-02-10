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
    <div class="container my-5 d-flex justify-content-around align-items-center">
        <div class="image">
            <img src="{{ asset( $news->image ) }}" width="500px" alt="image" style="">
        </div>
        <div class="content">
            <h3 style="font-size: 25px; font-weight: bold" class="mb-3">Title : {{ $news->content }}</h3>
            <span style="font-size: 20px">Event : {{ $news->event  }}</span>
            <p style="font-size: 20px" class="my-3">Publisher : {{ $news->publisher }}</p>
            <p style="font-size: 20px" class="mb-3">Create : {{ $news->created_at->format('d F, Y') }}</p>
            <p style="font-size: 20px" class="mb-3">Update : {{ $news->updated_at->diffForHumans() }} </p>
        </div>
    </div>
    @include('home.banner_home')

    @include('home.footer')

    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/wow/wow.min.js') }}"></script>

    <script src="{{ asset('assets/js/theme.js') }}"></script>

</body>

</html>

