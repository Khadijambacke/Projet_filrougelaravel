<!DOCTYPE html>
<html lang="en">
<head>
    <title>Health Center</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assetpatient/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetpatient/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetpatient/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assetpatient/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assetpatient/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetpatient/css/tooplate-style.css') }}">
</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

<!-- ================= HEADER ================= -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-5">
                <p>Welcome to a Professional Health Care</p>
            </div>
            <div class="col-md-8 col-sm-7 text-align-right">
                <span><i class="fa fa-phone"></i> 010-060-0160</span>
                <span><i class="fa fa-calendar-plus-o"></i> Mon-Fri 6:00-22:00</span>
                <span><i class="fa fa-envelope-o"></i> info@company.com</span>
            </div>
        </div>
    </div>
</header>

<!-- ================= MENU ================= -->
<section class="navbar navbar-default navbar-static-top">
    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a href="#top" class="navbar-brand">
                <i class="fa fa-h-square"></i>ealth Center
            </a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#top" class="smoothScroll">Home</a></li>
                <li><a href="#about" class="smoothScroll">About</a></li>
                <li><a href="#team" class="smoothScroll">Doctors</a></li>
                <li><a href="#news" class="smoothScroll">News</a></li>
                <li><a href="#appointment" class="smoothScroll">Appointment</a></li>
                <li><a href="#google-map" class="smoothScroll">Contact</a></li>
            </ul>
        </div>

    </div>
</section>

<!-- ================= HOME / SLIDER ================= -->
<section id="home" class="slider" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">

            <div class="owl-carousel owl-theme">

                <div class="item item-first">
                    <div class="caption">
                        <div class="col-md-offset-1 col-md-10">
                            <h3>Let's make your life happier</h3>
                            <h1>Healthy Living</h1>
                        </div>
                    </div>
                </div>

                <div class="item item-second">
                    <div class="caption">
                        <div class="col-md-offset-1 col-md-10">
                            <h3>New Lifestyle</h3>
                            <h1>Your Health Benefits</h1>
                        </div>
                    </div>
                </div>

                <div class="item item-third">
                    <div class="caption">
                        <div class="col-md-offset-1 col-md-10">
                            <h3>Professional Doctors</h3>
                            <h1>Medical Care</h1>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- ================= ABOUT ================= -->
<section id="about">
    <div class="container">
        <h2>About Us</h2>
        <p>Professional medical services.</p>
    </div>
</section>

<!-- ================= TEAM ================= -->
<section id="team" data-stellar-background-ratio="1">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12">
                <div class="about-info">
                    <h2>Our Doctors</h2>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-4 col-sm-6">
                <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                    <img src="{{ asset('assetpatient/images/team-image1.jpg') }}" class="img-responsive" alt="">
                    <div class="team-info">
                        <h3>Dr. John Doe</h3>
                        <p>General Practitioner</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                    <img src="{{ asset('assetpatient/images/team-image2.jpg') }}" class="img-responsive" alt="">
                    <div class="team-info">
                        <h3>Dr. Jane Smith</h3>
                        <p>Dental Surgeon</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="team-thumb wow fadeInUp" data-wow-delay="0.6s">
                    <img src="{{ asset('assetpatient/images/team-image3.jpg') }}" class="img-responsive" alt="">
                    <div class="team-info">
                        <h3>Dr. Alex Brown</h3>
                        <p>Cardiology</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- ================= NEWS ================= -->
<section id="news" data-stellar-background-ratio="2">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12">
                <div class="section-title">
                    <h2>Latest News</h2>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                    <a href="#">
                        <img src="{{ asset('assetpatient/images/news-image1.jpg') }}" class="img-responsive" alt="">
                    </a>
                    <div class="news-info">
                        <span>March 08, 2024</span>
                        <h3><a href="#">About Amazing Technology</a></h3>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="news-thumb wow fadeInUp" data-wow-delay="0.6s">
                    <a href="#">
                        <img src="{{ asset('assetpatient/images/news-image2.jpg') }}" class="img-responsive" alt="">
                    </a>
                    <div class="news-info">
                        <span>February 20, 2024</span>
                        <h3><a href="#">Introducing a new healing process</a></h3>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="news-thumb wow fadeInUp" data-wow-delay="0.8s">
                    <a href="#">
                        <img src="{{ asset('assetpatient/images/news-image3.jpg') }}" class="img-responsive" alt="">
                    </a>
                    <div class="news-info">
                        <span>January 27, 2024</span>
                        <h3><a href="#">Review Annual Medical Research</a></h3>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- ================= APPOINTMENT ========npm run dev========= -->
<section id="appointment">
  <h2>Prendre un rendez-vous</h2>

  <form action="#" method="post">
    <input type="text" name="name" placeholder="Nom complet" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="tel" name="phone" placeholder="Téléphone" required>

    <input type="date" name="date" required>
    <input type="time" name="time" required>

    <textarea name="message" placeholder="Message (optionnel)"></textarea>

    <button type="submit">Confirmer le rendez-vous</button>
  </form>
</section>

<!-- ================= MAP ================= -->
<section id="map">
  <h2>Nous trouver</h2>

  <iframe
    src="https://www.google.com/maps?q=Paris&t=&z=13&ie=UTF8&iwloc=&output=embed"
    width="100%"
    height="350"
    style="border:0;"
    allowfullscreen=""
    loading="lazy">
  </iframe>
</section>


<!-- ================= JS ================= -->
<script src="{{ asset('assetpatient/js/jquery.js') }}"></script>
<script src="{{ asset('assetpatient/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assetpatient/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assetpatient/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('assetpatient/js/wow.min.js') }}"></script>
<script src="{{ asset('assetpatient/js/smoothscroll.js') }}"></script>
<script src="{{ asset('assetpatient/js/custom.js') }}"></script>
</body>
</html>
