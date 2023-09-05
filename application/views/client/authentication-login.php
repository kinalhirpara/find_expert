<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="http://localhost/FindExpert/assets/client/images/favicon.png">
    <title>Matrix Template - The Ultimate Multipurpose client template</title>
    <!-- Custom CSS -->
    <link href="http://localhost/FindExpert/assets/client/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<style type="text/css">
    .bg-dark
    {
        background-color: #212529 !important;
    }
</style>
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div id="loginform">
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db"><img src="<?php echo base_url('assets/client/images/my_logo.png')?>" alt="logo" style="height:70px;width:210px" /></span>
                    </div>
                    <!-- Form -->
                    <form class="form-horizontal m-t-20" id="loginform" action="<?php echo site_url('client/login'); ?>">
                        <?php if($this->session->flashdata('invalid')){ ?>
                                  <div class="alert alert-danger" role="alert">
                                        <?php echo @$this->session->flashdata('invalid'); }?>
                                    </div>
                                    
                                    <?php if($this->session->flashdata('success')){ ?>
                                    <div class="alert alert-info" role="alert">
                                        <?php echo @$this->session->flashdata('success'); ?>
                                    </div>
                        <?php } ?>
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" name="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" required="">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required="">
                                </div><br>
                                <button class="btn btn-success float-right" type="submit">Login</button>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <button class="btn btn-info" id="to-recover" type="button"><i class="fa fa-lock m-r-5"></i> Lost password?</button>
                                        <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                                        <a href="<?php echo site_url('client/login/register'); ?>"><button class="btn btn-info float-right" id="to-recover" type="button"><i class=" fas fa-address-card m-r-5"></i> Register</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
               
                <div id="recoverform">
                    <div class="text-center">
                        <span class="text-white">Enter your e-mail address below and we will send you instructions how to recover a password.</span>
                    </div>
                    <div class="row m-t-20">
                        <!-- Form -->
                        <form class="col-12" method="post" action="<?php echo site_url('client/login/forget_password'); ?>">
                            <!-- email -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-lg" placeholder="Email Address" name="email" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <!-- pwd -->
                            <div class="row m-t-20 p-t-20 border-top border-secondary">
                                <div class="col-12">
                                    <a class="btn btn-success" href="#" id="to-login" name="action">Back To Login</a>
                                    <a href="<?php echo site_url('client/login/forget_password'); ?>"><button class="btn btn-info float-right" type="submit"  name="action">Recover</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
//     <script src="<?php echo base_url('assets/client/libs/jquery/dist/jquery.min.js')?>"></script>
//
//     <script src="<?php echo base_url('assets/client/libs/popper.js/dist/umd/popper.min.js')?>"></script>
//     <script src="<?php echo base_url('assets/client/libs/bootstrap/dist/js/bootstrap.min.js')?>"></script>
//     <!-- ============================================================== -->
//     <!-- This page plugin js -->
//     <!-- ============================================================== -->
//     <script>
//
//     $('[data-toggle="tooltip"]').tooltip();
//     $(".preloader").fadeOut();
//     // ==============================================================
//     // Login and Recover Password
//     // ==============================================================
//     $('#to-recover').on("click", function() {
//         $("#loginform").slideUp();
//         $("#recoverform").fadeIn();
//     });
//     $('#to-login').click(function(){
//
//         $("#recoverform").hide();
//         $("#loginform").fadeIn();
//     });
//     </script>

</body>

</html>
