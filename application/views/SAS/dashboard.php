<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Dashboard </b> </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <input type="date" name="tanggal" id="id_tanggal" class="form-control">
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-4 col-7">
                    <!-- small box -->
                    <div class="small-box" style="background-color: #9ED2E9 ;">
                        <div class="inner">
                            <h3>1000</h3>

                            <p>Jumlah Siswa</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user" style="color: #000000;"></i>
                        </div>
                        <a href="#" class="small-box-footer bg-white">
                            <font color="black">More info <i class="fas fa-chevron-right"></i></font>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-7">
                    <!-- small box -->
                    <div class="small-box" style="background-color: #9ED2E9 ;">
                        <div class="inner">
                            <h3>852</h3>

                            <p>Hadir</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user" style="color: #000000;"></i>
                        </div>
                        <a href="#" class="small-box-footer bg-white">
                            <font color="black">More info <i class="fas fa-chevron-right"></i></font>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-7">
                    <!-- small box -->
                    <div class="small-box" style="background-color: #9ED2E9 ;">
                        <div class="inner">
                            <h3>71</h3>

                            <p>Sakit</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user" style="color: #000000;"></i>
                        </div>
                        <a href="#" class="small-box-footer bg-white">
                            <font color="black">More info <i class="fas fa-chevron-right"></i></font>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-7">
                    <!-- small box -->
                    <div class="small-box" style="background-color: #9ED2E9 ;">
                        <div class="inner">
                            <h3>42</h3>

                            <p>Izin</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user" style="color: #000000;"></i>
                        </div>
                        <a href="#" class="small-box-footer bg-white">
                            <font color="black">More info <i class="fas fa-chevron-right"></i></font>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-7">
                    <!-- small box -->
                    <div class="small-box" style="background-color: #9ED2E9 ;">
                        <div class="inner">
                            <h3>35</h3>

                            <p>Alpa</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user" style="color: #000000;"></i>

                        </div>
                        <a href="#" class="small-box-footer bg-white">
                            <font color="black">More info <i class="fas fa-chevron-right"></i></font>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-7">
                    <!-- small box -->
                    <div class="small-box" style="background-color: #9ED2E9 ;">
                        <div class="inner">
                            <h3>55</h3>

                            <p>Terlambat</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user" style="color: #000000;"></i>
                        </div>
                        <a href="#" class="small-box-footer bg-white">
                            <font color="black">More info <i class="fas fa-chevron-right"></i></font>
                        </a>
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- PIE CHART -->
                    <div class="card card-info">

                        <div class="card-body">
                            <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col (LEFT) -->
                <div class="col-md-6">
                    <!-- STACKED BAR CHART -->
                    <div class="card card-info">

                        <div class="card-body">
                            <div class="chart">
                                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.col (RIGHT) -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->