<div class="container">
    
<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
        <div style="margin: 1.5rem;">
            <a href="<?php echo base_url()?>Admin/city" class="btn btn-primary">
            Back</a>
        </div>
            <div class="card-body p-0">
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Update City</h1>
                            </div>
                            <?php $i=1; foreach($data as $row) { ?>
                                <form method="post" enctype="multipart/form-data" >
                                    <div class="form-group" >
                                        <select name="country">
                                            <option> Select Country
                                        <?php foreach ($country as $country) {;?>
                                            <option value="<?php echo $country['country'] ?>"><?php echo $country['country'] ?></option>
                                        <?php ;} ?>
                                            </option>
                                        </select>
                                        <!-- <input  maxlength="20" required class="form-control form-control-user" type="text" name="country" id="country" placeholder="Country Name"> -->
                                    </div>

                                    <div class="form-group" >
                                        <input  required class="form-control form-control-user" type="text" name="city" id="city" value="<?php echo $row->city ?>">
                                    </div>
                                    
                                    <div class="form-group" >
                                        <div class="col-lg-12" style="align-items: center;" align="center">
                                            <input class="btn btn-primary" id="adddata" type="submit" name="adddata" value="Save"/>
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