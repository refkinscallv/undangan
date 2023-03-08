<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title><?= $site->title ?></title>
  <link rel="shortcut icon" href="<?= base_url("images/assets/" . $site->icon_dark) ?>">

  <meta name="description" content="<?= $site->description ?>">
  <meta name="keywords" content="<?= $site->keywords ?>">
  <meta name="referrer" content="no-referrer-when-downgrade">
  <meta name="robots" content="all">
  <meta content="id_ID" property="og:locale">
  <meta content="Onvit" property="og:site_name">
  <meta content="website" property="og:type">
  <meta content="<?= base_url() ?>" property="og:url">
  <meta content="<?= $site->title ?>" property="og:title">
  <meta content="<?= $site->description ?>" property="og:description">
  <meta content="<?= base_url("images/assets/" . $site->icon_dark) ?>" property="og:image">
  <meta content="500" property="og:image:width">
  <meta content="500" property="og:image:height">

  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <!--====== Scroll To Top Area Start ======-->
  <div id="scrollUp" title="Scroll To Top" class="bg-primary">
    <i class="fas fa-arrow-up text-white"></i>
  </div>
  <!--====== Scroll To Top Area End ======-->

  <div class="main">
    <!-- ***** Header Start ***** -->
    <header class="navbar navbar-sticky navbar-expand-lg navbar-dark">
      <div class="container position-relative">
        <a class="navbar-brand" href="index.html">
          <img class="navbar-brand-regular" src="<?= base_url("images/assets/" . $site->icon_light) ?>" alt="brand-logo" style="width:50px">
          <img class="navbar-brand-sticky" src="<?= base_url("images/assets/" . $site->icon_dark) ?>" alt="sticky brand-logo" style="width:50px">
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="navbarToggler" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-inner">
          <!--  Mobile Menu Toggler -->
          <button class="navbar-toggler d-lg-none" type="button" data-toggle="navbarToggler" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <nav>
            <ul class="navbar-nav" id="navbar-nav">
              <li class="nav-item"><a class="nav-link scroll" href="<?= base_url() ?>">Home</a></li>
              <li class="nav-item"><a class="nav-link scroll" href="#features">Fitur</a></li>
              <li class="nav-item"><a class="nav-link scroll" href="#screenshots">Template</a></li>
              <li class="nav-item"><a class="nav-link scroll" href="#review">Testimoni</a></li>
              <li class="nav-item"><a class="nav-link scroll" href="#pricing">Paket Harga</a></li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:;" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Akun</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="#">Masuk</a></li>
                  <li><a class="dropdown-item" href="#">Daftar</a></li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <!-- ***** Header End ***** -->

    <?= $content; ?>

    <!--====== Footer Area Start ======-->
    <footer class="footer-area footer-fixed">
      <!-- Footer Top -->
      <div class="footer-top ptb_100">
        <div class="container">
          <div class="row">
            <div class="col-12 col-sm-12 col-lg-4">
              <!-- Footer Items -->
              <div class="footer-items">
                <!-- Logo -->
                <a class="navbar-brand" href="#">
                  <img class="logo" src="<?= base_url("images/assets/" . $site->icon_dark) ?>" alt="" style="width:50px">
                </a>
                <p class="mt-2 mb-3"><?= $site->description ?></p>
                <!-- Social Icons -->
                <div class="social-icons d-flex">
                  <a class="facebook" href="#">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-facebook-f"></i>
                  </a>
                  <a class="google-plus" href="#">
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-instagram"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-4">
              <!-- Footer Items -->
              <div class="footer-items">
                <!-- Footer Title -->
                <h3 class="footer-title mb-2">Informasi</h3>
                <ul>
                  <li class="py-2"><a href="#">Tentang Kami</a></li>
                  <li class="py-2"><a href="#">Kebijakan Privasi</a></li>
                  <li class="py-2"><a href="#">Syarat & Ketentuan</a></li>
                  <li class="py-2"><a href="#">Afiliasi</a></li>
                </ul>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-4">
              <!-- Footer Items -->
              <div class="footer-items">
                <!-- Footer Title -->
                <h3 class="footer-title mb-2">Bantuan</h3>
                <ul>
                  <li class="py-2"><a href="#">Hubungi Kami</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer Bottom -->
      <div class="footer-bottom">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <!-- Copyright Area -->
              <div class="copyright-area d-flex flex-wrap justify-content-center justify-content-sm-between text-center py-4">
                <!-- Copyright Left -->
                <div class="copyright-left">&copy; Copyrights <?= date("Y") . " " . $site->title ?> All rights reserved.</div>
                <!-- Copyright Right -->
                <!-- <div class="copyright-right">Made with <i class="fas fa-heart"></i> By <a href="#">Themeland</a></div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!--====== Footer Area End ======-->
  </div>


  <!-- ***** All jQuery Plugins ***** -->

  <!-- jQuery(necessary for all JavaScript plugins) -->
  <script src="assets/js/jquery/jquery.min.js"></script>

  <!-- Bootstrap js -->
  <script src="assets/js/bootstrap/popper.min.js"></script>
  <script src="assets/js/bootstrap/bootstrap.min.js"></script>

  <!-- Plugins js -->
  <script src="assets/js/plugins/plugins.min.js"></script>

  <!-- Active js -->
  <script src="assets/js/active.js"></script>
</body>

</html>