<div class="container">
    
<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
        <div style="margin: 1.5rem;">
            <a href="<?php echo base_url()?>Admin/country" class="btn btn-primary">
            Back</a>
        </div>
            <div class="card-body p-0">
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Update Country</h1>
                            </div>
                            <?php $i=1; foreach($data as $row) { ?>
                                <form method="post">
                                <div class="form-group" >
                                        <div class="row">
                                            <div class="col-sm-3"align="right" style="margin-top:0.5rem">Country Name</div>
                                            <div class="col-sm-6">
                                                <input  maxlength="20" required class="form-control form-control-user" type="text" name="country" id="country" value="<?php echo $row->country ?>" >
                                            </div>
                                        </div>
                                    </div>

                                      

                                    <div class="row">
                                        <div class="col-md-3 mx-auto">
                                            <input class="btn btn-primary mx-auto" type="submit" name="update"  value="Update User"/>
                                        </div>
                                        <div class="col-md-3 mx-auto">
                                            <a class="btn btn-primary" href="<?php echo base_url('Admin/country');?>">
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