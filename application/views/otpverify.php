<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Verify Your OTP</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css');?>" type="text/css">
        <link rel="stylesheet"  href="<?php echo base_url('assets/css/sb-admin-2.min.css');?> ">
    </head>
    <body  class="bg-gradient-primary">
        
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-12 col-md-9">
                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                        <img src="<?php echo base_url('assets/img/1.jpeg');?>" style="width: 450px; height: 550px;">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4" style="font-size: 40px;"><strong>Welcome</strong></h1>
                                            </div>
<!--                                             <img src="<?php echo base_url('assets/img/2.jpeg') ?>" alt="" style="height: 200px;width:300px">
 -->                                            <form class="user" action="<?php echo base_url('Admin/');?>" method="post" style="margin-top: 12rem;" >
                                                <div class="form-group">
                                                    <input type="number" required class="form-control form-control-user" name ="otp" id="otp" placeholder="Enter OTP....">
                                                </div>
                                                <input class="btn btn-primary btn-user btn-block" type="submit" value="Continue" style="margin-top: 2rem;">
                                            </from>
                                            <hr>
                                           
                                            <div class="text-center">
                                                <a href="<?php echo base_url('Admin/register') ?>" class="small">Create an Account!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        
        
        
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js');?>"></script>
        
    <script src="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css');?>"></script>
    <script src="<?php echo base_url('assets/vendor/fontawesome-free/js/sb-admin-2.min.js');?>"></script>



    </body>
</html>