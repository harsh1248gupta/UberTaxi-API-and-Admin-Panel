<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Create an Account</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css');?>" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <link rel="stylesheet"  href="<?php echo base_url('assets/css/sb-admin-2.min.css');?> ">
    </head>
    <body  class="bg-gradient-dark" style="overflow:hidden;box-sizing:border-box;margin:0;padding:0;background-position:center">
    <img src="<?php echo base_url('assets/img/11.jpeg');?>" style="width: 100%; height: 80%;overflow:hidden;">
    <div class="container" style="margin-top: -60rem;">
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
                                                <h1 class="h4 text-gray-900 mb-4">Create an Account</h1>
                                            </div>
                                            <form class="user" method="POST" >
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" id="name" placeholder  ="Enter Your Name">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address....">
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" class="form-control form-control-user" id="phone" placeholder  ="Enter Mobile Number...">
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="password" class="form-control form-control-user" id="password" placeholder  ="Password...">
                                                    </div>
                                                    
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="password" class="form-control form-control-user" id="cpassword" placeholder  ="Confirm Password...">
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group">
                                                    <div class="custom-control custom-checkbox small">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                                                    </div>
                                                </div> -->
<!--                                                 <a href="<?php echo base_url('Admin/otpverify') ?>"></a>
 -->                                                <input type="button" class="btn btn-primary btn-user btn-block" value="Register" id="butsave">
                                                
                                            </form>
                                            
                                            <hr>
                                            
                                            <div class="text-center">
                                                <a href="<?php echo base_url('Admin/login') ?>" class="small">Already have an account? Login!</a>
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

        <script type="text/javascript">
            $(document).ready(function()
            {
                $('#butsave').click(function()
                {
                    var name =$('#name').val();
                    var email =$('#email').val();
                    var phone =$('#phone').val();
                    var password =$('#password').val();
                    var cpassword =$('#cpassword').val();
                    
                    console.log(name);
                    console.log(email);
                    console.log(phone);
                    console.log(password);
                    console.log(cpassword);
                    if(name!="" && email!=""  && phone!="" && password!="" && cpassword!="")
                    {
                        jQuery.ajax(
                            {
                                type: "POST",
                                url: "<?php echo base_url('Admin/savedata'); ?>",
                                dataType: "html",
                                data: {name:name, email:email, phone:phone, password:password, cpassword:cpassword},
                                success: function(res)
                                {
                                    if (res == 1) {
                                        alert('Data Inserted Successfully');
                                    } else {
                                        alert('error')
                                    }
                                },
                                error:function(){
                                    alert('data not saved');
                                }
                            }
                        );
                    }
                    else{
                        alert('please fill all the details first');
                    }
                });
            });
        </script>
    </body>
</html>