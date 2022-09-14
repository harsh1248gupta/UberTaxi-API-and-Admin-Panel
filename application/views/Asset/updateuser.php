<div class="container">
    
<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
        
            <div class="card-body p-0">
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Update Driver</h1>
                            </div>

                            <?php $i=1; foreach($data as $row) { ?>
                                <form method="post">
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


                                    <div class="row">
                                        <div class="col-md-3 mx-auto">
                                            <input class="btn btn-primary mx-auto" type="submit" name="update"  value="Update User"/>
                                        </div>
                                        <div class="col-md-3 mx-auto">
                                            <a class="btn btn-primary" href="<?php echo base_url('Admin/customers');?>">
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