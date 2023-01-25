<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <!-- <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Kehadiran Siswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Kehadiran Siswa</li>
                    </ol>
                </div>
            </div> -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card-header border-white" style="background-color: #9ED2E9 ;">
            <h3>
                <font size="">
                    &ensp;<b>Data Kehadiran</b>
                </font>
            </h3>
        </div>
        <!-- Default box -->
        <div class="card">
            <div class="card-header border-white">
                <h3 class="card-title"></h3>
                <div class="card-tools">
                    <div class="mr-3">
                        <div class="form-row">
                            <div class="">
                                <label class="text-dark" for="b"><i>Bulan</i></label>
                                <div class="input-group">
                                    <input type="number" name="month" id="month" class="btn btn-outline-dark shadow border-dark " style="width: 100px;">
                                </div>
                            </div>
                            <div class="">
                                <label class="text-dark" for="b"><i>Tahun</i></label>
                                <div class="input-group">
                                    <input type="number" name="month" id="month" class="btn btn-outline-dark shadow border-dark" style="width: 100px;">
                                </div>
                            </div>
                            <div class="">
                                <label class="text-dark" for="b"><i>Jurusan</i></label>
                                <div class="input-group">
                                    <input type="number" name="month" id="month" class="btn btn-outline-dark shadow border-dark" style="width: 100px;">
                                </div>
                            </div>
                            <div class="">
                                <label class="text-dark" for="b"><i>Jurusan</i></label>
                                <div class="input-group">
                                    <input type="number" name="month" id="month" class="btn btn-outline-dark shadow border-dark" style="width: 100px;">
                                    <div class="input-group-append">
                                        <button class="btn btn-dark border-dark shadow" name="submit" title="Cari Data" type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                    <div class="btn-group" style="color: #000;">
                                        <button class="btn btn-dark dropdown-toggle" type="submit" data-toggle="dropdown" aria-expanded="false"></button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="" class="dropdown-item" data-target="#insert" data-toggle="modal"><i class="fas fa-plus"></i> Tambah Data</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover table-responsive shadow" id="table" width="100%" cellspacing="0" style="font-size:12px" >
                    <thead style="background-color: #9ED2E9 ;">
                        <tr class="text-center" style="color: #fff;">
                            <th >No.</th>
                            <th >Nama</th>
                            <th >NIS</th>

                            <?php

                            $a_tgl = 1;
                            $jml_tgl = date('t', strtotime('1-' . $m . '-' . $y));
                            while ($a_tgl <= $jml_tgl) {

                            ?>
                                <th><?= $a_tgl ?></th>
                            <?php
                                $tgl_h[$a_tgl] = array();
                                $tgl_t[$a_tgl] = array();
                                $tgl_i[$a_tgl] = array();
                                $tgl_s[$a_tgl] = array();
                                $tgl_a[$a_tgl] = array();
                                $a_tgl++;
                            }
                            ?>
                            <th class="bg-success">Hadir</th>
                            <th class="bg-warning">Terlambat</th>
                            <th class="bg-secondary">Izin</th>
                            <th class="bg-primary">Sakit</th>
                            <th class="bg-danger">Alpha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_siswa as $siswa) {
                            $nis = $siswa->NIS;
                            // array keteranga
                            $jml_h[$nis] = array();
                            $jml_t[$nis] = array();
                            $jml_i[$nis] = array();
                            $jml_s[$nis] = array();
                            $jml_a[$nis] = array();

                        ?>
                            <tr class="text-center">
                                <td><?= $no++ ?>.</td>
                                <th width="200px"><?= $siswa->NAMA ?></th>
                                <td><?= $siswa->NIS ?></td>
                                <?php
                                $a_tgl = 1;
                                $jml_tgl = date('t', strtotime('1-' . $m . '-' . $y));
                                while ($a_tgl <= $jml_tgl) {
                                    $hadir = $this->model_SAS->getPerDay_hadir($y . '-' . $m . '-' . $a_tgl, $siswa->NIS);
                                    if (empty($hadir)) {
                                        echo "<th></th>";
                                    } else {
                                        echo '<th>' . $hadir->STATUS . '</th>';

                                        if ($hadir->STATUS == 'h') {
                                            $jml_h[] = 1;
                                            $tgl_h[$a_tgl]['jml'] = 1;
                                        } elseif ($hadir->STATUS == 't') {
                                            $jml_t[] = 1;
                                            $tgl_t[$a_tgl]['jml'] = 1;
                                        } elseif ($hadir->STATUS == 'i') {
                                            $jml_i[] = 1;
                                            $tgl_i[$a_tgl]['jml'] = 1;
                                        } elseif ($hadir->STATUS == 's') {
                                            $jml_s[] = 1;
                                            $tgl_s[$a_tgl]['jml'] = 1;
                                        } elseif ($hadir->STATUS == 'a') {
                                            $jml_a[] = 1;
                                            $tgl_a[$a_tgl]['jml'] = 1;
                                        }
                                    }
                                    $a_tgl++;
                                }
                                ?>
                                <td><?= array_sum($jml_h) ?></td>
                                <td><?= array_sum($jml_t) ?></td>
                                <td><?= array_sum($jml_i) ?></td>
                                <td><?= array_sum($jml_s) ?></td>
                                <td><?= array_sum($jml_a) ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr class="text-right bg-success">
                            <th colspan="3">Jml Hadir</th>
                            <?php
                            $a_tgl = 1;
                            $jml_tgl = date('t', strtotime('1-' . $m . '-' . $y));
                            while ($a_tgl <= $jml_tgl) {

                            ?>
                                <th><?= array_sum($tgl_h[$a_tgl]) ?></th>
                            <?php
                                $a_tgl++;
                            }
                            ?>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="text-right bg-warning">
                            <th colspan="3">Jml Terlambat</th>
                            <?php
                            $a_tgl = 1;
                            $jml_tgl = date('t', strtotime('1-' . $m . '-' . $y));
                            while ($a_tgl <= $jml_tgl) {

                            ?>
                                <th><?= array_sum($tgl_t) ?></th>
                            <?php
                                $a_tgl++;
                            }
                            ?>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="text-right bg-secondary">
                            <th colspan="3">Jml Izin</th>
                            <?php
                            $a_tgl = 1;
                            $jml_tgl = date('t', strtotime('1-' . $m . '-' . $y));
                            while ($a_tgl <= $jml_tgl) {

                            ?>
                                <th><?= array_sum($tgl_i[$a_tgl]) ?></th>
                            <?php
                                $a_tgl++;
                            }
                            ?>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="text-right bg-primary">
                            <th colspan="3">Jml Sakit</th>
                            <?php
                            $a_tgl = 1;
                            $jml_tgl = date('t', strtotime('1-' . $m . '-' . $y));
                            while ($a_tgl <= $jml_tgl) {

                            ?>
                                <th><?= array_sum($tgl_s[$a_tgl]) ?></th>
                            <?php
                                $a_tgl++;
                            }
                            ?>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="text-right bg-danger">
                            <th colspan="3">Jml Alpha</th>
                            <?php
                            $a_tgl = 1;
                            $jml_tgl = date('t', strtotime('1-' . $m . '-' . $y));
                            while ($a_tgl <= $jml_tgl) {

                            ?>
                                <th><?= array_sum($tgl_a[$a_tgl]) ?></th>
                            <?php
                                $a_tgl++;
                            }
                            ?>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>