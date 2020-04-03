
<?php
$base = PROOT . "public/dashboard/";
?>
<!doctype html>
<html lang="en">
<head>
    <?= $this->content('head'); ?>
    <title><?= $this->siteTitle() ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?= $base ?>vendoor/icofont/icofont.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= $base ?>css/style.css">
    <link rel="stylesheet" href="<?= $base ?>css/custom.css">
    <link href="<?= $base ?>vendoor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700|Roboto:300,400,700&display=swap" rel="stylesheet">
    <link href="<?= $base ?>vendoor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $base ?>vendoor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?= $base ?>vendoor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
    <link href="<?= $base ?>vendoor/aos/aos.css" rel="stylesheet">
    <link href="<?= $base ?>vendoor/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= $base ?>csss/style.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        .fa-trash-o:hover {
            color: blue;
        }
    </style>
    <style>
        .change:hover {
            background-color: red;
            color: #fff;
            border-radius: 25%;
            margin-right: 5px;
            margin-left: 5px;
        }
    </style>
    <style>
        .fa-times:hover {
            color: black;
        }
    </style>
</head>
<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" style="background:#58a0c3;">
            <div class="p-4 pt-5">
                <a href="#" class="img logo rounded-circle mb-3" style="background-image: url('<?= $base ?>img/logo.png');"></a>
		<div class="mb-3">
                <h6 style='font-weight:bold; text-align:center'>Welcome</h6>
                <h4 style='font-weight:bold;color:white; text-align:center;'><?=$_SESSION['name']?></h4>
                </div>               
		 <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="<?= PROOT ?>dashboard/" style="color:black; font-weight:bold;">Home</a>
                    </li>
                    <li>
                        <a href='<?= PROOT ?>campaign/' style="color:black;font-weight:bold;">Previous Campaigns</a>
                    </li>
                    <li>
                        <a href="<?= PROOT ?>subscriber/" style="color:black;font-weight:bold;">Subscribers</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="content" class="p-1 p-md-3">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item mr-2">
                                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle btn btn-primary" class="nav-link"><i class="fa fa-envelope pr-2"></i>Launch Campaigns</a>
                                <ul class="collapse list-unstyled" id="pageSubmenu">
                                    <li>
                                        <a href="<?= PROOT ?>campaign/launch?service=smtp" style="text-align: center" title="Click on the link below">Gmail SMTP</a>
                                    </li>
                                    <li>
                                        <a style="text-align:center" title="Click on the link below" onclick="displayInfo();">Amazon SES</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item ">
                                <a class="btn btn-primary" href='<?= PROOT ?>subscriber/add' data-toggle="modal" data-target="#example" class="nav-link"><i class="pr-2 fa fa-plus"></i> Add Subscriber</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="modal" data-target=".bs-example-modal-sm" style="color:black"><i class="pr-1 fa fa-sign-out"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <?= $this->content('body'); ?>
        </div>
    </div>
    <div class="modal fade " id="example" role="dialog" style="border-radius:25px;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel2" style="color:black;font-weight:bold;">Subscriber Information</h5>
                    <button type="button" class="close text-black" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="text-center">
                                <form class="mt-2" id="subinfoForm">
                                    <fieldset>
                                        <h6 class="text-left">Email Address*</h6>
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fa fa-envelope" style="color: blue;"></i> </span>
                                            </div>
                                            <input type="email" class="form-control" id='addsubscriberemail' name='addsubscriberemail' type="email" required>
                                        </div>
                                        <h6 class="text-left">Name*</h6>
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fa fa-user" style="color: blue;"></i> </span>
                                            </div>
                                            <input type="text" class="form-control" id='addsubscribername' name='addsubscribername' type="text" required>
                                        </div>
                                        <h6 class="text-left">Category*</h6>
                                      	<div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fa fa-list-alt" style="color: blue;"></i> </span>
                                            </div>
                                            <select class="form-control selectpicker" id="addsubscribercategory" name="addsubscribercategory">
                                                <?php
                                                $categories = categoryList();
                                                foreach ($categories as $category) {
                                                ?>
                                                    <option value="<?= $category ?>"><?= $category ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <p class="text-left"><a style="color:darkblue;border-radius:5px;" onclick="myCategory();"><i class="pr-2 fa fa-plus"></i>Add New Category</a></p>
                                        <div style="display:none" id="addcategoryform">
                                            <form class="mt-2">
                                                <div class="row">
                                                    <div class="form-group input-group col-9">

                                                        <input type="text" class="form-control" id='addnewcategory' name='addnewcategory' type="text" required="" placeholder="Category">

                                                    </div>
                                                    <div class="form-group col-3">
                                                        <button type="button" id="addcategory" style="height:38px;background:green;color:white;" class="btn btn-block"><i class="pr-2 fa fa-plus" style="vertical-align:top;text-align:center"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="form-group mt-2">
                                            <button type="button" id="submit" class="btn btn-primary btn-block">Add</button>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel2" style="color:black;font-weight:bold;">Logout</h5>
                    <button type="button" class="close text-black" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="color: black"><i class="fa fa-question-circle"></i> Are you sure you want to log-off?</div>
                <div class="modal-footer"><a href="<?= PROOT ?>user/logout" class="btn btn-danger">Logout</a>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= $base ?>js/jquery.min.js"></script>
    <script src="<?= $base ?>js/popper.js"></script>
    <script src="<?= $base ?>js/bootstrap.min.js"></script>
    <script src="<?= $base ?>js/main.js"></script>
    <script src="<?= $base ?>vendoor/jquery/jquery.min.js"></script>
    <script src="<?= $base ?>vendoor/jquery/jquery-migrate.min.js"></script>
    <script src="<?= $base ?>vendoor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= $base ?>vendoor/easing/easing.min.js"></script>
    <script src="<?= $base ?>vendoor/sticky/sticky.js"></script>
    <script src="<?= $base ?>vendoor/aos/aos.js"></script>
    <script src="<?= $base ?>vendoor/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?= $base ?>jss/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?= $base ?>js/modal_process.js"></script>
    <script src="<?= $base ?>js/campaign_search.js"></script>
</body>
</html>
