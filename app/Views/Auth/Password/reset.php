<?php $this->setSiteTitle('Reset Password'); ?>
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
        <div class="container-fluid my-0 py-5 min-vh-100">
            <div class="container-fluid px-md-5 mt-3 mb-3">
                <div class="row mx-lg-4  mx-auto px-auto">
                    <div class="col-6 mt-5 " style="margin-right:100px">
                        <h2 class="display-4 font-weight-bold text-white " data-aos="fade-right" style="font-family: 'Open Sans', sans-serif;">Welcome to Pigeon</h2>
                        <i>
                            <h6 class="mt-4" data-aos="fade-right" data-aos-delay="200" style="color:#fff;font-weight:bolder;font-size:1.8em;font-family:Times New Roman;">&ldquo;Pigeon makes it easy to send campaigns to the right people at the right time—and most importantly, to motivate customers to come back into our app.&rdquo;</h6>
                            <p class="mt-4 text-right" data-aos="fade-right" data-aos-delay="200" style="color:black">~Manish Sharma</p>
                        </i>
                    </div>
                    <div class="col-4">
                        <div id="first">
                            <div class="myform form mt-4" style="background-color: rgb(255,255,255);border-radius:25px;">
                                <form action="" method="post" style="padding: 20px">
                                    <div class="form-group mt-3">
                                        <label for="password" style="color: black; font-weight:bold;">Password</label>
                                        <span style="color:red">*</span></label>
                                        <input type="password" name="password" id="password" class="form-control" aria-describedby="emailHelp" placeholder="" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm" style="color: black; font-weight:bold;">ConfirmPassword</label>
                                        <span style="color:red">*</span></label>
                                        <input type="password" name="confirm" id="confirm" class="form-control" aria-describedby="emailHelp" placeholder="" required="">
                                    </div>
                                    <?php
                                    if (!empty($this->displayErrors)) {
                                        if ($this->displayErrors === "no") {
                                            echo '<script>swal("Congrats!", "Your Password has been changed successfully", "success").then(function() {
												window.location = "../user/login";
											});</script>';
                                        } else {
                                            echo '<p id="errorval" style="color:red; font-weight:bold; font-size:small;" class="form-group">';
                                            echo $this->displayErrors;
                                            echo '</p>';
                                        }
                                    }
                                    ?>
                                    <div class="col-md-14 form-group text-center ">
                                        <button type="submit" class=" btn btn-block mybtn btn-primary ">Reset Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $this->end(); ?>