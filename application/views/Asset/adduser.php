<div class="container">
    
<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
        <div style="margin: 1.5rem;">
            <a href="<?php echo base_url()?>Admin/customers" class="btn btn-primary">
            Back</a>
        </div>
            <div class="card-body p-0">
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Add New User</h1>
                            </div>
                                <form method="post">
                                    <div class="form-group" >
                                        <input  maxlength="20" required class="form-control form-control-user" type="text" name="first_name" id="first_name" placeholder="First Name">
                                    </div>

                                    <div class="form-group" >
                                        <input  maxlength="20" required class="form-control form-control-user" type="text" name="last_name" id="last_name" placeholder="Last Name">
                                    </div>

                                    <div class="form-group">
                                        <input required class="form-control form-control-user" type="email" name="email" id="email" placeholder  ="Email Address">   
                                    </div>

                                    <!-- <div class="form-group">
                                        <input minlength="6" maxlength="15" required class="form-control form-control-user" type="password" name="password" id="password" placeholder  ="Password" >
                                    </div> -->

                                    <div class="form-group">
                                        <input maxlength="10" required class="form-control form-control-user" type="number" name="phone" id="phone" placeholder="Mobile">                   
                                    </div>

                                    <div class="form-group" >
                                        <div class="col-lg-12" style="align-items: center;" align="center">
                                            <input class="btn btn-primary" id="adddata" type="submit" name="save" value="Save"/>
                                        </div>
                                    </div>
                                </form>                                                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>

        <script type="text/javascript">
            $(document).ready(function()
            {
                $('#adddata').click(function()
                {
                    var first_name =$('#first_name').val();
                    var last_name =$('#last_name').val();
                    var email =$('#email').val();
                    var phone =$('#phone').val();
                    // var password =$('#password').val();
                        
                    
                    console.log(first_name);
                    console.log(last_name);
                    console.log(email);
                    console.log(phone);
                    // console.log(password);
                    if(first_name!="" && last_name!="" && email!="" && phone!="" /* && password!="" */)
                    {
                        jQuery.ajax(
                            {
                                type: "post",
                                url: "<?php echo base_url('/Admin/adduser'); ?>",
                                dataType: "html",
                                data: {first_name:first_name,last_name:last_name, email:email, phone:phone/* , password:password */},
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

