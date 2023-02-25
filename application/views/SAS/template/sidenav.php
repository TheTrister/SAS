<?php if ($this->session->userdata('level') == "admin") { ?>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4 ">
        <!-- Brand Logo -->
        <a href="<?php echo base_url() ?>SAS/index" class="brand-link border-dark" style="height: 55px">
            <img src="<?php echo base_url() ?>assets/LogoColor.png" alt="AdminLTE Logo" class="brand-image" style="width: 140px; margin-right: auto; margin-left: 45px;">
            <span class="brand-text font-weight-light" style="opacity: 0">.</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex border-dark">
                <div class="image">
                    <!-- <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
                </div>
                <div class="info">
                    <a href="#" class="d-block" style="color: #000000; font-size: 18px; "><b><?php echo $this->session->userdata('user') ?> ( <?php echo $this->session->userdata('level') ?> )</b></a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <b>
                    <li class="nav-header">MENU</li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>SAS/index" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Siswa/data_siswa" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Data Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Kehadiran/data_hadir" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Kehadiran Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Perizinan/perizinan" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Perizinan</p>
                            </a>
                        </li>
                    </b>
                </ul>
                <div class="" style="position: fixed; left: 0; bottom: 0; ">
                    <b>
                    <a href="<?php echo base_url() ?>SAS/logout" class="nav-link"><img src="<?php echo base_url() ?>assets/right-from-bracket-solid.svg" alt="" width="20px"> Logout</a>
                    </b>
                </div>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
<?php } ?>
<?php if ($this->session->userdata('level') == "walkel") { ?>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4 ">
        <!-- Brand Logo -->
        <a href="<?php echo base_url() ?>SAS/index" class="brand-link border-dark" style="height: 55px">
            <img src="<?php echo base_url() ?>assets/LogoColor.png" alt="AdminLTE Logo" class="brand-image" style="width: 140px; margin-right: auto; margin-left: 45px;">
            <span class="brand-text font-weight-light" style="opacity: 0">.</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex border-dark">
                <div class="image">
                    <!-- <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
                </div>
                <div class="info">
                    <a href="#" class="d-block" style="color: #000000; font-size: 18px; "><b><?php echo $this->session->userdata('user') ?> ( <?php echo $this->session->userdata('level') ?> )</b></a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <b>
                    <li class="nav-header">MENU</li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>SAS/index" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Kehadiran/data_hadir" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Kehadiran Siswa</p>
                            </a>
                        </li>
                    </b>
                </ul>
                <div class="" style="position: fixed; left: 0; bottom: 0; ">
                    <b>
                    <a href="<?php echo base_url() ?>SAS/logout" class="nav-link"><img src="<?php echo base_url() ?>assets/right-from-bracket-solid.svg" alt="" width="20px"> Logout</a>
                    </b>
                </div>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
<?php } ?>
<?php if ($this->session->userdata('level') == "superadmin") { ?>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar main-sidebar-custom sidebar-light-primary elevation-4 ">
        <!-- Brand Logo -->
        <a href="<?php echo base_url() ?>SAS/index" class="brand-link border-dark " style="height: 55px;  ">
            <img src="<?php echo base_url() ?>assets/LogoColor.png" alt="AdminLTE Logo" class="brand-image" style="width: 140px; margin-right: auto; margin-left: 45px;">
            <!-- <span class="brand-text font-weight-light" style="opacity: 0">.</span> -->
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex border-dark">
                <div class="image">
                    <!-- <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
                </div>
                <div class="info">
                    <a href="#" class="d-block" style="color: #000000; font-size: 18px;"><b><?php echo $this->session->userdata('user') ?> ( <?php echo $this->session->userdata('level') ?> )</b></a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <b>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-header">MENU</li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>SAS/index" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Siswa/data_siswa" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Data Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Kehadiran/data_hadir" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Kehadiran Siswa</p>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="<?php echo base_url() ?>Perizinan/perizinan" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Perizinan</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Manage Owner
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>User/data_user" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data User</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>Jurusan/data_jurusan" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Jurusan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>Kelas/data_kelas" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Kelas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>feedback/feedback" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Feedback</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </b>
                <div class="" style="position: fixed; left: 0; bottom: 0; ">
                    <b>
                    <a href="<?php echo base_url() ?>SAS/logout" class="nav-link"><img src="<?php echo base_url() ?>assets/right-from-bracket-solid.svg" alt="" width="20px"> Logout</a>
                    </b>
                </div>
            </nav>
        </div>

    </aside>
<?php } ?>