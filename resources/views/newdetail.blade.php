<!DOCTYPE html>
<html lang="en">
<head>
    <title>Health - News Details</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assetpatient/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetpatient/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetpatient/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assetpatient/css/tooplate-style.css') }}">
</head>

<body id="top">

<!-- MENU -->
<section class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <a href="{{ route('hospital.home') }}" class="navbar-brand">
                <i class="fa fa-h-square"></i>ealth Center
            </a>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ route('hospital.home') }}">Home</a></li>
            <li><a href="{{ route('hospital.home') }}#news">News</a></li>
        </ul>
    </div>
</section>

<!-- NEWS DETAIL -->
<section id="news-detail">
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <img src="{{ asset('assetpatient/images/news-image3.jpg') }}" class="img-responsive">
                <h2>Review Annual Medical Research</h2>
                <p>
                    Aenean molestie porttitor lorem sed semper. Aliquam semper iaculis libero.
                </p>
            </div>

            <div class="col-md-4">
                <h4>Recent Posts</h4>
                <img src="{{ asset('assetpatient/images/news-image1.jpg') }}" class="img-responsive">
            </div>

        </div>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <div class="container text-center">
        <p>© 2024 Health Center</p>
    </div>
</footer>

<!-- JS -->
<script src="{{ asset('assetpatient/js/jquery.js') }}"></script>
<script src="{{ asset('assetpatient/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assetpatient/js/wow.min.js') }}"></script>
<script src="{{ asset('assetpatient/js/custom.js') }}"></script>

</body>
</html>
