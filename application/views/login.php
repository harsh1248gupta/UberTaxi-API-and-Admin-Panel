<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css');?>" type="text/css">
        <link rel="stylesheet"  href="<?php echo base_url('assets/css/sb-admin-2.min.css');?> ">
    </head>
    <style>
        @media only screen and (min-width:320px) and (max-width:500px) {
            .container{
                position: absolute;
                top:-25px;
            }
            .bg{
                height: 100vh;
                width: 80vh;
            }
        }

        @media only screen and (min-width:500px) and (max-width:780px) {
            .container{
                position: absolute;
                top:5rem;
                left:2rem;
            }
            .bg{
                height: 100vh;
                width: 105vh;
            }
        }

        @media only screen and (min-width:780px) and (max-width:1140px) {
            .container{
                position: absolute;
                top:25rem;
                left:12rem;
            }
            .bg{
                height: 100vh;
                width: 120vh;
            }
        }
        @media only screen and (min-width:1140px) and (max-width:2560px) {
            .container{
                position: absolute;
                top:1rem;
                left:5rem;
            }
            .bg{
                height: 100vh;
                width: 220vh;
            }
        }
    </style>
    <body  class="bg-gradient-dark" style="overflow:hidden;box-sizing:border-box;margin:0;padding:0;background-position:center">
    <img class="bg" src="<?php echo base_url('assets/img/bg.jpeg');?>" >
        
            <div class="container" >
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-12 col-md-9">
                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                        <img  src="<?php echo base_url('assets/img/poster.jpeg');?>" >
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Welcome</h1>
                                            </div>
											<div class="text-center" style="margin-bottom:2rem;">
                                                <img src="<?php echo base_url('assets/img/logo.jpeg');?>" style="width: 200px; height: 80px;">
                                            </div>
                                            <form class="user" action="<?php echo base_url('Admin/auth');?>" method="post" >
                                                
												<div class="form-gp" style="text-align: center;margin-bottom:1rem;color:red;">
                                                    <?php echo $this->session->flashdata('Login_failed');?>
                                                    <?php echo $this->session->flashdata('Enter_Credentials');?>
                                                </div>
												
												<div class="form-group">
                                                    <input type="email" required class="form-control form-control-user" name ="email" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address....">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" required class="form-control form-control-user" name ="password" id="password" placeholder="Password....">
                                                </div>
                                                <input class="btn btn-primary btn-user btn-block" type="submit" value="Submit">
                                            </from>
                                            <hr>
                                            <!-- <div class="text-center">
                                                <a href="#" class="small">Forgot Password?</a>
                                            </div> -->
                                            <!--<div class="text-center">
                                                <a href="<?php echo base_url('Admin/register') ?>" class="small">Create an Account!</a>
                                            </div>-->
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