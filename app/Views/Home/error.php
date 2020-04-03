<?php
$base = PROOT . "public/dashboard/";
?>
<?php $this->start('head'); ?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,900" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="<?= $base ?>css/errorpagestyle.css" />
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<main id="main">
    <div class="hero-section">
        <div class="wave">
            <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
                        <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z" id="Path"></path>
                    </g>
                </g>
            </svg>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col hero-text-image">
                    <div class="row justify-content-center text-center">
                        <div id="notfound">
                            <div class="notfound">
                                <div class="notfound-404">
                                    <h1>404</h1>
                                </div>
                                <h2>We are sorry, Page not found!</h2>
                                <p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
                                <a class="btn btn-primary" href="<?=PROOT?>Home/">Back To Homepage</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<footer class="footer" role="contentinfo">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-5">
                <h4 class="section-heading">About us</h2>
                    <p>Pigeon is a free open source platform to launch your campaigns and grow your business.</p>
                    <p class="social">
                        <a href="https://twitter.com/ManishS77291587"><span class="icofont-twitter"></span></a>
                        <a href="https://www.facebook.com/profile.php/manishsharma"><span class="icofont-facebook"></span></a>
                        <a href="https://www.linkedin.com/in/manish-sharma-694263157"><span class="icofont-linkedin"></span></a>
                        <a href="https://github.com/maniSHarma7575"><span class="icofont-github"></span></a>
                    </p>
            </div>
            <div class="d-flex align-content-end row justify-content-center font-weight-bold ">
                <div class="border-top container-fluid p-2">
                    <p class="text-center pt-3">Pigeon &copy; 2020 , This is the introductory project assigned by <a href='https://coloredcow.com/' target="blank" class="text-white"><img src="https://coloredcow.com/wp-content/themes/ColoredCow/dist/img/logo.png" alt='ColoredCow' width="120" class="mb-2"></a> for the internship.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php $this->end(); ?>