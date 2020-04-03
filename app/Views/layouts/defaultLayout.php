<?php
$defbase = PROOT . "public/dashboard/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Pigeon</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700|Roboto:300,400,700&display=swap" rel="stylesheet">
  <link href="<?= $defbase ?>vendoor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= $defbase ?>vendoor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= $defbase ?>vendoor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
  <link href="<?= $defbase ?>vendoor/aos/aos.css" rel="stylesheet">
  <link href="<?= $defbase ?>vendoor/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= $defbase ?>csss/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
  <div class="site-wrap">
	<div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">
      <div class="container">
        <div class="row">
          <div class="col-6 col-lg-2">
            <div class="row align-items-center">
              <div class="col-6"><img src="<?= $defbase ?>img/logo.png" width="80" height="80">
              </div>
              <div class="col-6">
                <h1 class="mb-0 site-logo" style="color:black;font-weight:bold;">Pigeon<a href="#" class="mb-0"></a></h1>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-10 d-none d-lg-block">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active"><a href="<?= PROOT ?>" class="nav-link">Home</a></li>
                <li><a class="btn btn-outline-primary mr-3" href="<?= PROOT ?>user/login" class="nav-link">Login</a></li>
                <li><a class="btn btn-primary" href="<?= PROOT ?>user/register" class="nav-link">Register</a></li>
              </ul>
            </nav>
          </div>
          <div class="col-6 d-inline-block d-lg-none ml-md-0 py-3" style="position: relative; top: 3px;">
	<a href="#" class="burger site-menu-toggle js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
              <span></span>
            </a>         
 </div>
        </div>
      </div>
    </header>
    <?= $this->content('body'); ?>
  </div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <script src="<?= $defbase ?>vendoor/jquery/jquery.min.js"></script>
  <script src="<?= $defbase ?>vendoor/jquery/jquery-migrate.min.js"></script>
  <script src="<?= $defbase ?>vendoor/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= $defbase ?>vendoor/easing/easing.min.js"></script>
  <script src="<?= $defbase ?>vendoor/sticky/sticky.js"></script>
  <script src="<?= $defbase ?>vendoor/aos/aos.js"></script>
  <script src="<?= $defbase ?>vendoor/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?= $defbase ?>jss/main.js"></script>
</body>
</html>
