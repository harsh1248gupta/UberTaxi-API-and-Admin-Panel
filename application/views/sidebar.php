<ul class="navbar-nav bg-gradient sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: black;">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url()?>Admin/home">
            <img src="<?php echo base_url('assets/img/whitelogo.png');?>" style="width: 80px;">

                <!-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>

                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup>
                </div> -->
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>Admin/home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            
            <!-- Heading -->
            <div class="sidebar-heading">
                Lists
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>Admin/customers">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Users</span></a>
            </li>

            <li class="nav-item" style="margin-top: -1rem;">
                <a class="nav-link" href="<?php echo base_url()?>Admin/drivers">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Driver</span></a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <div class="sidebar-heading">
                Location
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>Admin/country">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Country</span></a>
            </li>

            <li class="nav-item" style="margin-top: -1rem;">
                <a class="nav-link" href="<?php echo base_url()?>Admin/city">
                    <i class="fas fa-fw fa-table"></i>
                    <span>City</span></a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <div class="sidebar-heading">
                Vehicle Type
            </div>

            <li class="nav-item ">
                <a class="nav-link" href="<?php echo base_url()?>Admin/vehicle">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Vehicle Type</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">

            <div class="sidebar-heading">
                Rides
            </div>
            <!-- Nav Item - Tables -->

            <li class="nav-item ">
                <a class="nav-link" href="<?php echo base_url()?>Admin/ride">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Ride History</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
