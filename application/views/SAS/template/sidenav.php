<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4 ">
    <!-- Brand Logo -->
    <a href="<?php echo base_url() ?>SAS/index" class="brand-link border-dark" style="height: 55px">
        <img src="<?php echo base_url() ?>assets/Logo SAS.png" alt="AdminLTE Logo" class="brand-image" style="width: 160px">
        <span class="brand-text font-weight-light" style="opacity: 0">.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex border-dark">
            <div class="image">
                <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block" style="color: #000000;"><b>Admin</b></a>
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
                        <a href="<?php echo base_url() ?>SAS/data_siswa" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Tabel Data Siswa</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url() ?>SAS/data_hadir" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Tabel Kehadiran</p>
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
                                <a href="<?php echo base_url() ?>SAS/data_user" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data User</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo base_url() ?>SAS/data_jurusan" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Jurusan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url() ?>SAS/data_kelas" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Kelas</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </b>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>