<?php
$base = PROOT . "public/dashboard/";
?>
<?php $this->start('head'); ?>
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
        <div class="col-12 hero-text-image">
          <div class="row">
            <div class="col-lg-7 text-center text-lg-left">
              <h1 data-aos="fade-right">Lauch your campaigns with Pigeon</h1>
              <p class="mb-5" data-aos="fade-right" data-aos-delay="100">Pigeon makes it easy to send campaigns to the right people at the right time—and most importantly, to motivate customers to come back into our app.</p>
            </div>
            <div class="col-lg-5 iphone-wrap text-center text-lg-right">
              <img src="<?= $base ?>img/email.jpg" class="wrap-image img-fluid" width="400" height="350" style=" border-radius: 25px;" data-aos="fade-right">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="site-section">
    <div class="container">
      <div class="row justify-content-center text-center mb-5">
        <div class="col-md-5">
          <h2 class="section-heading">Grow your Business with our services</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="feature-1 text-center">
            <div class="wrap-icon icon-1">
              <span class="icon lab la-aws"></span>
            </div>
            <h3 class="mb-3">Explore Our service</h3>
            <p>Lauch your campaign either using Gmail SMTP or AmazonSES</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-1 text-center">
            <div class="wrap-icon icon-1">
              <span class="icon la la-users"></span>
            </div>
            <h3 class="mb-3">Build your subscribers</h3>
            <p>Create your subscribers list by adding them to your account.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-1 text-center">
            <div class="wrap-icon icon-1">
              <span class="icon la la-envelope"></span>
            </div>
            <h3 class="mb-3">Lauch Email Campaigns</h3>
            <p>Launch your business propaganda in one click.</p>
          </div>
        </div>
      </div>
    </div>
  </div> 
  <div class="site-section pb-0">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4 mr-auto">
          <h2 class="mb-4">Build your audience on few clicks</h2>
          <p class="mb-4">When you add a new Subscriber to your list, we’ll automatically launch your campaigns reach your subscribers, and get the attention of your business deserves—across multiple marketing channels.</p>
        </div>
        <div class="col-md-6" data-aos="fade-left">
          <img src="https://cdn.pixabay.com/photo/2017/02/07/10/33/crowd-2045499_960_720.jpg" style=" border-radius: 25px;" alt="Image" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
  <div class="site-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4 ml-auto order-2">
          <h2 class="mb-4">Automate your work</h2>
          <p class="mb-4">When you set up email automations, Pigeon works for you, even when you’re not working. Set up a welcome series for new subscribers or a reminder email when people leave stuff behind in their online cart.</p>

        </div>
        <div class="col-md-6" data-aos="fade-right">
          <img style=" border-radius: 25px;" src="https://cdn.pixabay.com/photo/2018/01/11/10/46/businessman-3075837_960_720.jpg" alt="Image" class="img-fluid">
        </div>
      </div>
    </div>
  </div> 
  <div class="site-section">
    <div class="container">
      <div class="row justify-content-center text-center mb-5">
        <img style=" border-radius: 25px;" src="https://cdn.pixabay.com/photo/2018/03/22/02/37/email-3249062_960_720.png" alt="Image" class="img-fluid">
      </div>
    </div>
  </div>
</main>
<footer class="footer" role="contentinfo">
  <div class="container">
    <div class="row justify-content-center text-center mb-5">
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
