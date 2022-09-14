<div class="container">
    
<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
        <div style="margin: 1.5rem;">
            <a href="<?php echo base_url()?>Admin/drivers" class="btn btn-primary">
            Back</a>
        </div>
            <div class="card-body p-0">
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Add New Driver</h1>
                            </div>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group" >
                                                    <input  maxlength="20" required class="form-control form-control-user" type="text" name="first_name" id="first_name" placeholder="First Name">
                                                </div>


                                                <div class="form-group">
                                                    <input required class="form-control form-control-user" type="email" name="email" id="email" placeholder  ="Email Address">   
                                                </div>
                                                
                                                <div class="form-group">
                                                    <input maxlength="10" required class="form-control form-control-user" type="password" name="password" id="phone" placeholder="Password">                   
                                                </div>
                                                
                                            </div>
                                            <div class="col-lg-6">
                                                
                                                <div class="form-group" >
                                                    <input  maxlength="20" required class="form-control form-control-user" type="text" name="last_name" id="last_name" placeholder="Last Name">
                                                </div>

                                                <div class="form-group">
                                                    <input maxlength="10" required class="form-control form-control-user" type="number" name="phone" id="phone" placeholder="Mobile">                   
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <input type="submit" value="upload" style="display: none;"/>
                                                        <input  type="file" name="userfile" />
                                                    </div>
                                                </div>

                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container" style="margin-top: 5rem;">
                                        <div class="row" >
                                            <h1 class="h4 text-gray-900 mb-4">Add Driver Vehicle Type Details</h1>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        Vehicle Type
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <select name="vtype">
                                                                <option>Select Vehicle Type 
                                                                    <?php foreach ($data as $data) {; ?>
                                                                        <option value="<?php echo $data['name'] ?>"><?php echo $data['name'] ?></option>
                                                                    <?php ;} ?>
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">Vehicle Company</div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input maxlength="10" required class="form-control form-control-user" type="text" name="vcompany" placeholder="Vehicle Company Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">Model Name</div>
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                            <input maxlength="10" required class="form-control form-control-user" type="text" name="vmodel" placeholder="Model Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        Number of Seats
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <select name="seats">
                                                                <option>Select No of Seats 
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-sm-6">Model Year</div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input maxlength="10" required class="form-control form-control-user" type="number" name="modelyear" placeholder="Model Year">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">Plate No.</div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input maxlength="10" required class="form-control form-control-user" type="text" name="plate" placeholder="Plate No">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">Vehicle Color</div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input maxlength="10" required class="form-control form-control-user" type="text" name="color" placeholder="Vehicle Company Name">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" >
                                        <div class="col-lg-12" style="align-items: center;" align="center">
                                            <input class="btn btn-primary" id="adddriver" type="submit" name="save" value="Save"/>
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
<!-- 
        <script type="text/javascript">
            $(document).ready(function()
            {
                $('#adddriver').click(function()
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
                                url: "<?php echo base_url('/Admin/adddriver'); ?>",
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
 -->
