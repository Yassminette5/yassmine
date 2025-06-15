<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Formini</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />

  <!-- CSS externes -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="{{ asset('frontOffice/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('frontOffice/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('frontOffice/css/responsive.css') }}">

  <!-- Styles personnalisés -->
  <style>
    .owl-nav {
      position: absolute;
      top: 30%;
      left: -60px;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .course_owl-carousel .item .box {
      height: 100%;
      min-height: 450px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      background: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }

    .course_owl-carousel .item .img-box img {
      height: 250px;
      object-fit: cover;
      width: 100%;
    }

    .owl-nav i.custom-nav-btn {
      width: 50px;
      height: 50px;
      background-color: #be2623;
      color: white;
      font-size: 20px;
      text-align: center;
      line-height: 50px;
      border-radius: 50%;
      cursor: pointer;
    }
     
    nav {
      background-color: #0e3746;
      padding: 15px 0;
    }
    nav .nav-container {
      max-width: 1200px;
      margin: auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 20px;
    }
    nav .nav-container a {
      color: white;
      margin-left: 20px;
      text-decoration: none;
      font-weight: 500;
    }
    .container {
      text-align: center;
      padding: 60px;
    }
   
    p {
      font-size: 1.2em;
      margin-top: 10px;
    }
    .slider_section {
  position: relative;
  height: 90vh; /* hauteur visible */
  overflow: hidden;
}

.slider_bg_box {
  position: absolute;
  width: 100%;
  height: 100%;
  z-index: -1;
}

.slider_bg_box .bg_img_box img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

  </style>
</head>

<body>

  <nav>
   <div class="nav-container" style="flex-direction: column; align-items: center;">
  
  <div style="display: flex; gap: 30px;">
    <a href="{{ route('home') }}">Accueil</a>
    <a href="{{ route('about') }}">À propos</a>
    <a href="{{ url('/register') }}">S'inscrire</a>
    <a href="{{ url('/login') }}">S'authentifier</a>
  </div>
</div>

  </nav>


    <!-- SLIDER -->
    <section class="slider_section">
      <div class="slider_bg_box">
        <div class="bg_img_box">
          <img src="{{ asset('frontOffice/images/slider-bg.jpg') }}" alt="">
        </div>
      </div>
      <div id="customCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="row">
                <div class="col-md-7 mx-auto">
                  <div class="detail-box">
                    <h1>Bienvenu à <br> Formini</h1>
                    <p>Formini offre un espace dédié à la création et au partage de formations pour tous.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- D'autres slides peuvent être ajoutés ici -->
        </div>
      </div>
    </section>
  </div>

  <!-- SECTION ABOUT -->
  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="{{ asset('frontOffice/images/formini.jpeg') }}" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>Qui sommes-nous ?</h2>
            </div>
            <p>
              Nous sommes une équipe passionnée dédiée à offrir des solutions éducatives innovantes et accessibles.
            </p>
            <a href="/about">En savoir plus</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION COURS -->
  <section class="course_section layout_padding">
    <div class="course_bg_box">
      <div class="bg_img_box">
        <img src="{{ asset('frontOffice/images/course-bg.jpg') }}" alt="">
      </div>
    </div>
    <div class="container-fluid pr-0">
      <div class="heading_container">
        <h2>Popular Courses</h2>
        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
      </div>
      <div class="course_container position-relative">
        <div class="course_owl-carousel owl-carousel owl-theme">
          <!-- Cours 1 -->
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="{{ asset('frontOffice/images/c1.jpg') }}" alt="">
              </div>
              <div class="detail-box">
                <h4>Learn JavaScript</h4>
                <p>Introduction au JavaScript moderne.</p>
                <a href="/register" class="btn btn-danger">Voir le détail</a>
              </div>
            </div>
          </div>
          <!-- Cours 2 -->
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="{{ asset('frontOffice/images/c2.jpg') }}" alt="">
              </div>
              <div class="detail-box">
                <h4>Learn Python</h4>
                <p>Base solide pour le développement Python.</p>
                <a href="/register" class="btn btn-danger">Voir le détail</a>
              </div>
            </div>
          </div>
          <!-- Cours 3 -->
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="{{ asset('frontOffice/images/c3.jpg') }}" alt="">
              </div>
              <div class="detail-box">
                <h4>Learn HTML</h4>
                <p>Apprenez à structurer vos pages web efficacement.</p>
                <a href="/register" class="btn btn-danger">Voir le détail</a>
              </div>
            </div>
          </div>
          <!-- Cours 4 -->
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="{{ asset('frontOffice/images/c4.jpg') }}" alt="">
              </div>
              <div class="detail-box">
                <h4>Learn Java</h4>
                <p>Les bases de la programmation orientée objet.</p>
                <a href="/register" class="btn btn-danger">Voir le détail</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <section class="info_section">
    <div class="container">
      <div class="info_top">
        <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="info_detail">
              <h4>Formini</h4>
              <p>Nous sommes une équipe engagée à offrir des solutions innovantes et accessibles, tout en garantissant la qualité et l’excellence.</p>
              <div class="social_box">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
            <h4>CONTACT</h4>
            <div class="contact_nav">
              <a href="#"><i class="fa fa-map-marker"></i><span> Tunis, Tunisie</span></a>
              <a href="#"><i class="fa fa-phone"></i><span> +216 12 345 678</span></a>
              <a href="#"><i class="fa fa-envelope"></i><span> contact@formini.com</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="footer_section">
      <p>© 2025 Tous droits réservés - Formini</p>
    </footer>
  </section>

  <!-- JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  <!-- Script Owl Carousel -->
  <script>
    $(".course_owl-carousel").owlCarousel({
      loop: true,
      margin: 15,
      nav: true,
      autoplay: true,
      autoplayTimeout: 1000,
      autoplayHoverPause: true,
      navText: [
        '<i class="fa fa-chevron-left custom-nav-btn"></i>',
        '<i class="fa fa-chevron-right custom-nav-btn"></i>'
      ],
      responsive: {
        0: { items: 1 },
        768: { items: 2 },
        992: { items: 3 },
        1200: { items: 4 }
      }
    });
  </script>
</body>
</html>
