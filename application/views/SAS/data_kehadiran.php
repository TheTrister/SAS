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
                                <form action="<?php site_url() ?>data_hadir" method="POST">
                                    <label class="text-dark" for="b"><i>Bulan</i></label>
                                    <div class="input-group">
                                        <select name="month" id="id_bulan" class="btn btn-outline-dark shadow border-dark" style="width: 100px;">
                                            <option value=""></option>
                                            <option value="01" <?php if ($m == '01') {
                                                                    echo 'selected';
                                                                } ?>>Januari</option>
                                            <option value="02" <?php if ($m == '02') {
                                                                    echo 'selected';
                                                                } ?>>Februari</option>
                                            <option value="03" <?php if ($m == '03') {
                                                                    echo 'selected';
                                                                } ?>>Maret</option>
                                            <option value="04" <?php if ($m == '04') {
                                                                    echo 'selected';
                                                                } ?>>April</option>
                                            <option value="05" <?php if ($m == '05') {
                                                                    echo 'selected';
                                                                } ?>>Mei</option>
                                            <option value="06" <?php if ($m == '06') {
                                                                    echo 'selected';
                                                                } ?>>Juni</option>
                                            <option value="07" <?php if ($m == '07') {
                                                                    echo 'selected';
                                                                } ?>>Juli</option>
                                            <option value="08" <?php if ($m == '08') {
                                                                    echo 'selected';
                                                                } ?>>Agustus</option>
                                            <option value="09" <?php if ($m == '09') {
                                                                    echo 'selected';
                                                                } ?>>September</option>
                                            <option value="10" <?php if ($m == '10') {
                                                                    echo 'selected';
                                                                } ?>>Oktober</option>
                                            <option value="11" <?php if ($m == '11') {
                                                                    echo 'selected';
                                                                } ?>>November</option>
                                            <option value="12" <?php if ($m == '12') {
                                                                    echo 'selected';
                                                                } ?>>Desember</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="">
                                <label class="text-dark" for="b"><i>Tahun</i></label>
                                <div class="input-group">
                                    <select name="year" id="id_tahun" class="btn btn-outline-dark shadow border-dark" style="width: 100px;">
                                        <option value="<?= $y ?>"><?= $y ?></option>
                                        <?php for ($i = date('Y'); $i >= date('Y') - 8; $i -= 1) { ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="">
                                <label class="text-dark" for="b"><i>Jurusan</i></label>
                                <div class="input-group">
                                    <select name="jurusan" id="idjurusan" class="btn btn-outline-dark shadow border-dark" style="width: 100px;">
                                        <?php
                                        $input_jurusan = $this->session->userdata('jurusan_kehadiran');
                                        $jurusan_filter = $this->db->query("SELECT * FROM tb_jurusan WHERE ID ='$input_jurusan' ")->row();
                                        ?>
                                        <option value="<?php if ($this->session->userdata('jurusan_kehadiran')) $this->session->userdata('jurusan_kehadiran'); ?>"><?php if ($jurusan_filter) $jurusan_filter->JURUSAN ?></option>
                                        <?php if ($jurusan) { ?>
                                            <?php foreach ($jurusan as $key) { ?>
                                                <option value="<?php echo $key->ID ?>" <?php if ($input_jurusanCtrl == $key->ID) { echo 'selected';}?>><?php echo $key->JURUSAN ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="">
                                <label class="text-dark" for="b"><i>Kelas</i></label>
                                <div class="input-group">
                                    <select name="kelas" id="idkelas" class="btn btn-outline-dark shadow border-dark" style="width: 100px;">
                                        <?php
                                        $input_jurusan = $this->session->userdata('jurusan_kehadiran');
                                        $kelas_filter = $this->db->query("SELECT * FROM tb_kelas WHERE ID_JURUSAN ='$input_jurusan' ")->row();
                                        ?>
                                        <option value="<?php if ($this->session->userdata('kelas_kehadiran')) echo $this->session->userdata('kelas_kehadiran'); ?>"><?php if ($kelas_filter) echo $kelas_filter->KELAS ?></option>

                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-dark border-dark shadow" name="submit" title="Cari Data" type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                    <div class="btn-group" style="color: #000;">
                                        <button class="btn btn-dark dropdown-toggle" type="submit" data-toggle="dropdown" aria-expanded="false"></button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- <a href="" class="dropdown-item" data-target="#insert" data-toggle="modal"><i class="fas fa-plus"></i> Tambah Data</a> -->
                                            <a href="<?= base_url() ?>Kehadiran/export_data_kehadiran" class="dropdown-item">Export Data Excel</a>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover table-responsive shadow" id="table" width="100%" cellspacing="0" style="font-size:12px">
                    <thead style="background-color: #9ED2E9 ;">
                        <tr class="text-center" style="color: #fff;">
                            <th>No.</th>
                            <th>Nama</th>
                            <th>NIS</th>

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
                        if ($data_siswa) {
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
                                        $bulan = date('y-m');
                                        // $jumlah_hadir = $this->db->query("SELECT COUNT(*) AS jumlah FROM tb_kehadiran WHERE NIS = '$siswa->NIS' AND WAKTU LIKE'%$bulan%' AND STATUS = 'H' ")->row();
                                        // $jumlah_terlambat = $this->db->query("SELECT COUNT(*) AS jumlah FROM tb_kehadiran WHERE NIS = '$siswa->NIS' AND WAKTU LIKE'%$bulan%' AND STATUS = 'T' ")->row();
                                        // $jumlah_ijin = $this->db->query("SELECT COUNT(*) AS jumlah FROM tb_kehadiran WHERE NIS = '$siswa->NIS' AND WAKTU LIKE'%$bulan%' AND STATUS = 'I' ")->row();
                                        // $jumlah_sakit = $this->db->query("SELECT COUNT(*) AS jumlah FROM tb_kehadiran WHERE NIS = '$siswa->NIS' AND WAKTU LIKE'%$bulan%' AND STATUS = 'S' ")->row();
                                        // $jumlah_alpa = $this->db->query("SELECT COUNT(*) AS jumlah FROM tb_kehadiran WHERE NIS = '$siswa->NIS' AND WAKTU LIKE'%$bulan%' AND STATUS = 'A' ")->row();
                                        if (empty($hadir)) {
                                            echo "<th></th>";
                                        } else {




                                            if ($hadir->STATUS == 'H') {
                                                echo '<th>' . $hadir->STATUS .'-'.'AP'. '</th>';
                                                // echo '<th><a href="#tambah" data-toggle="modal" class="btn"  title="Keterangan Hadir" onclick="edit_data_pelanggaran(' . $hadir->ID . ')">' .  $hadir->STATUS . ' ' . $hadir->PELANGGARAN . '</a></th>';
                                                $jml_h[$siswa->NIS][$a_tgl] = 1;
                                                $tgl_h[$a_tgl][$siswa->NIS] = 1;
                                            } elseif ($hadir->STATUS == 'T') {
                                                echo '<th>' . $hadir->STATUS . '</th>';
                                                $jml_t[$siswa->NIS][$a_tgl] = 1;
                                                $tgl_t[$a_tgl][$siswa->NIS] = 1;
                                            } elseif ($hadir->STATUS == 'I') {
                                                echo '<th>' . 'I-BV' . '</th>';
                                                // $jml_i[$siswa->NIS][$a_tgl] = 1;
                                                // $tgl_i[$a_tgl][$siswa->NIS] = 1;
                                            } elseif ($hadir->STATUS == 'IV') {
                                                echo '<th>' . 'I' . '</th>';
                                                $jml_i[$siswa->NIS][$a_tgl] = 1;
                                                $tgl_i[$a_tgl][$siswa->NIS] = 1;
                                            } elseif ($hadir->STATUS == 'S') {
                                                echo '<th>' . $hadir->STATUS . '</th>';
                                                $jml_s[$siswa->NIS][$a_tgl] = 1;
                                                $tgl_s[$a_tgl][$siswa->NIS] = 1;
                                            } elseif ($hadir->STATUS == 'A') {
                                                echo '<th>' . $hadir->STATUS . '</th>';
                                                $jml_a[$siswa->NIS][$a_tgl] = 1;
                                                $tgl_a[$a_tgl][$siswa->NIS] = 1;
                                            } elseif ($hadir->STATUS == 'P') {
                                                $tes = $this->model_SAS->jmlGetPerDay_hadir($y . '-' . $m . '-' . $a_tgl, $siswa->NIS);
                                                //TANPA HADIR        
                                                if (count($tes) == 1) {
                                                    echo '<th>' . $hadir->STATUS . '-' . 'AS' . '</th>';
                                                } else {
                                                    echo '<th>' . 'H' . '</th>';
                                                    $jml_h[$siswa->NIS][$a_tgl] = 1;
                                                    $tgl_h[$a_tgl][$siswa->NIS] = 1;
                                                }
                                                // echo '<th><a href="#tambah" data-toggle="modal" class="btn"  title="Keterangan Hadir" onclick="edit_data_pelanggaran(' . $hadir->ID . ')">' .  $hadir->STATUS . ' ' . $hadir->PELANGGARAN . '</a></th>';
                                                
                                            }else{
                                                echo '<th>' . 'A' . '</th>';
                                                $jml_a[$siswa->NIS][$a_tgl] = 1;
                                                $tgl_a[$a_tgl][$siswa->NIS] = 1;
                                            }
                                        }
                                        $a_tgl++;
                                    }
                                    ?>
                                    <td><?= array_sum($jml_h[$siswa->NIS]) ?></td>
                                    <td><?= array_sum($jml_t[$siswa->NIS]) ?></td>
                                    <td><?= array_sum($jml_i[$siswa->NIS]) ?></td>
                                    <td><?= array_sum($jml_s[$siswa->NIS]) ?></td>
                                    <td><?= array_sum($jml_a[$siswa->NIS]) ?></td>
                                    <!-- <td><?= $jumlah_hadir->jumlah ?></td>
                                    <td><?= $jumlah_terlambat->jumlah ?></td>
                                    <td><?= $jumlah_ijin->jumlah ?></td>
                                    <td><?= $jumlah_sakit->jumlah ?></td>
                                    <td><?= $jumlah_alpa->jumlah ?></td> -->
                                </tr>
                        <?php
                            }
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
                </table><br><br>
                <p>Keterangan : <br>
                    H-AP = Siswa hanya absen pada pagi hari <br>
                    H-AS = Siswa hanya absen pada sore hari <br>
                    I-BV = Keterangan izin siswa belum terverifikasi <br>
                </p>
            </div>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

<!-- PELANGGARAN DATA -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-gray-100" id="exampleModalLabel">TAMBAH PELANGARAN SISWA</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_tambah" method="post" action="<?php echo base_url('Kehadiran/tambah_pelanggaran') ?>" enctype="multipart/form-data">
                    <table class="table">
                        <tr>
                            <td>Kode Pelanggaran</td>
                            <input type="hidden" name="id">
                            <td><input type="text" name="kode_pelanggaran" id="id_kode_pelanggaran" value="" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>
                                <textarea name="keterangan_pelanggaran" id="id_keterangan_pelanggaran" value="" cols="15" rows="10" class="form-control"></textarea>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" id="btn-edit-kehadiran" data-dismiss="modal">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- IZIN / SAKIT DATA -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-gray-100" id="exampleModalLabel">EDIT DATA</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="<?php echo base_url() ?>assets/Logo SAS69.png" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" id="btn-edit" data-dismiss="modal">Edit</button>
            </div>
        </div>
    </div>
</div>