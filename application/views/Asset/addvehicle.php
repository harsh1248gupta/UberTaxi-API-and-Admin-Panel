<div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-12 col-md-9">
                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <div class="row">
                                    
                                    <div class="col-lg-12">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Update Profile</h1>
                                            </div>
                                            
                                                <form method="post" enctype="multipart/form-data" class="user">
                                                <table align="center" width="100%" border="1" cellspacing="5" cellpadding="5">
                                                    <tr>
                                                        <td width="230">Vehicle Type </td>
                                                        <td width="329"><input type="text" name="vehicle" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="230">Cost</td>
                                                        <td width="329"><input type="number" name="cost" /></td>
                                                    </tr>
                                                    <!-- <tr>
                                                        <td width="230">Enter Your Mobile </td>
                                                        <td width="329"><input type="number" name="mobile" /></td>
                                                    </tr> -->
                                                    <!-- THIS IS FOR IMAGE UPLOADING  -->
                                                    <tr>
                                                        <?php echo form_open_multipart('Admin/addvehicle');?>
                                                        <td><input type="submit" value="upload" /></td>
                                                        <td><input  type="file" name="userfile" /></td>
                                                    </tr>
                                                    <!-- END OF IMAGE UPLOADING -->
                                                    <tr>
                                                    <tr>
                                                        <td colspan="2" align="center">
                                                        <input class="btn btn-primary" type="submit" name="update" value="Update Records"/></td>
                                                    </tr>
                                                    
                                                </table>
                                                </form>
                                               
                                                                        
                                                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>