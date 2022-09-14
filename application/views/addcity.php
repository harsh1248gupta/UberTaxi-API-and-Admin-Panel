<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Panel Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css');?>" rel="stylesheet">

        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css');?>" type="text/css">
        <link rel="stylesheet"  href="<?php echo base_url('assets/css/sb-admin-2.min.css');?> ">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    </head>
    <body>
    <div id="wrapper">
        <!--///////////////////////////----------SIDEBAR---------//////////////////////////////-->
       <?php $this->load->view('sidebar.php');?>
        <!--///////////////////////////----------CONTENT-WRAPPER---------//////////////////////////////-->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- //////////////////////------Topbar-------------////////////////////// -->
                <?php $this->load->view('header.php');?>
              <!--///////////////////////////----------CONTENT---------//////////////////////////////-->
                <?php $this->load->view('Asset/addcity');?>
                 <!--///////////////////////////----------FOOTER---------//////////////////////////////-->   
                <?php $this->load->view('footer');?>

            </div>
        </div>
    </div>
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('assets/js/demo/datatables-demo.js')?>"></script>

    </body>
</html>