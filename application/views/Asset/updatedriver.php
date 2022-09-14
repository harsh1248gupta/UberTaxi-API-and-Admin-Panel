<div class="container">
    
<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="p-5">
                            
                            <?php $i=1; foreach($data as $row) { ?>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Update Driver</h1>
                                    </div>
                                    <div class="form-group" >
                                        <div class="row">
                                            <div class="col-sm-3"align="right" style="margin-top:0.5rem">First Name</div>
                                            <div class="col-sm-6">
                                                <input  maxlength="20" required class="form-control form-control-user" type="text" name="first_name" id="first_name" value="<?php echo $row->first_name ?>" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" >
                                    <div class="row">
                                            <div class="col-sm-3"align="right" style="margin-top:0.5rem">Last Name</div>
                                            <div class="col-sm-6">
                                                <input  maxlength="20" required class="form-control form-control-user" type="text" name="last_name" id="last_name" value="<?php echo $row->last_name ?>" >
                                            </div>
                                        </div>
                                    </div>
                                    
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-3"align="right" style="margin-top:0.5rem">Email</div>
                                                <div class="col-sm-6">
                                                    <input required class="form-control form-control-user" type="email" name="email" id="email" value="<?php echo $row->email ?>" >   
                                                </div>
                                            </div>
                                        </div>
                                        
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3"align="right" style="margin-top:0.5rem">Phone</div>
                                            <div class="col-sm-6">
                                                <input maxlength="10" required class="form-control form-control-user" type="number" name="phone" id="phone" value="<?php echo $row->phone ?>" >
                                            </div>
                                        </div>
                                    </div>
<hr>
                                    <div class="text-center" style="margin-top: 5rem;">
                                        <h1 class="h4 text-gray-900 mb-4">Update Vehicle Details</h1>
                                    </div>

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
                                                                    <?php foreach ($vehicle as $data) {; ?>
                                                                        <option value="<?php echo $data['name'] ?>"><?php echo $data['name'] ?></option>
                                                                    <?php ;} ?>
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        Vehicle Company
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input maxlength="10" required class="form-control form-control-user" type="text" name="vcompany" value="<?php echo $row->vcompany ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        Model Name
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input maxlength="10" required class="form-control form-control-user" type="text" name="vmodel" value="<?php echo $row->vmodel ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        Number Of Seats
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
                                                    <div class="col-sm-6">
                                                        Model Year
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input maxlength="10" required class="form-control form-control-user" type="text" name="modelyear" value="<?php echo $row->modelyear ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        Plate No.
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input maxlength="10" required class="form-control form-control-user" type="text" name="plate" value="<?php echo $row->plate ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        Vehicle Color
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input maxlength="10" required class="form-control form-control-user" type="text" name="color" value="<?php echo $row->color ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-3 mx-auto">
                                            <input class="btn btn-primary mx-auto" type="submit" name="update"  value="Update User"/>
                                        </div>
                                        <div class="col-md-3 mx-auto">
                                            <a class="btn btn-primary" href="<?php echo base_url('Admin/drivers`');?>">
                                                Cancel
                                            </a>
                                        </div>
                                    </div>
                                </form>         
                                <?php } ?>                                                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>