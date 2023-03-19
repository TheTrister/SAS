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
                    &ensp;<b>Data Perizinan</b>
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
                                <form action="<?php site_url() ?>perizinan" method="POST">
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
                                <label class="text-dark" for="b"><i>Status</i></label>
                                <div class="input-group">
                                    <select name="validasi" id="id_validasi" class="btn btn-outline-dark shadow border-dark" style="width: 100px;">
                                        <option value=""></option>
                                        <option value="I" <?php if ($input_status == 'I') { echo 'selected';}?>>Belum Validasi</option>
                                        <option value="IV" <?php if ($input_status == 'IV') { echo 'selected';}?>>Sudah Validasi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="">
                                <label class="text-dark" for="b"><i>Jurusan</i></label>
                                <div class="input-group">
                                    <select name="jurusan" id="idjurusan" class="btn btn-outline-dark shadow border-dark" style="width: 100px;">
                                        <?php
                                        $input_jurusan = $this->session->userdata('jurusan_kehadiran');
                                        $jurusan_filter = $this->db->query("SELECT * FROM jurusans WHERE ID ='$input_jurusan' ")->row();
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
                                        $kelas_filter = $this->db->query("SELECT * FROM kelas WHERE ID_JURUSAN ='$input_jurusan' ")->row();
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
                <table class="table table-bordered table-hover" id="table" width="100%" cellspacing="0" style="font-size:12px">
                    <thead style="background-color: #9ED2E9 ;">
                        <tr style="color: #fff ;">
                            <th width="20px">
                                <center>NO</center>
                            </th>
                            <th>
                                <center>NIS</center>
                            </th>
                            <th>
                                <center>NAMA</center>
                            </th>
                            <th>
                                <center>KETERANGAN</center>
                            </th>
                            <th>
                                <center>STATUS</center>
                            </th>
                            <th>
                                <center>AKSI</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (is_array($data_perizinan_sakit) || is_object($data_perizinan_sakit)) { ?>
                            <?php $i = 1; ?>
                            <?php foreach ($data_perizinan_sakit as $dt) { ?>
                            <?php $perizinan = $this->db->query("SELECT * FROM keterangan__izins WHERE ID_KEHADIRAN = '$dt->ID_KETERANGAN' AND STATUS LIKE '%$filter_validasi%' ORDER BY STATUS ASC ")->row(); 
                                // echo $this->db->last_query();
                            ?>
                            <?php $nama = $this->db->query("SELECT * FROM siswas WHERE NIS = '$dt->NIS' ")->row(); ?>
                                <tr>
                                    <td>
                                        <center><?php if($dt) echo $i++ ?></center>
                                    </td>
                                    <td>
                                        <center><?php if($dt) echo $dt->NIS ?></center>
                                    </td>
                                    <td>
                                        <center><?php if($dt) echo $nama->NAMA ?></center>
                                    </td>
                                    <td>
                                        <center><?php if($perizinan) echo $perizinan->KETERANGAN ?></center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php 
                                                if($perizinan->STATUS == 0)
                                                {
                                            ?>
                                                <button class="btn btn-danger btn-sm" disabled>Belum Validasi</button>
                                            <?php
                                                } else if ($perizinan->STATUS == 01){
                                            ?>
                                                <button class="btn btn-success btn-sm" disabled>Sudah Validasi</button>
                                            <?php
                                                }
                                            ?>
                                            
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php 
                                                if($perizinan->STATUS == 0)
                                                {
                                            ?>
                                                <a href="<?php echo base_url()?>Perizinan/validasi_sakit/<?= $dt->ID_KETERANGAN?>" class="btn btn-warning">Validasi</a>
                                            <?php
                                                }
                                            ?>
                                            
                                        </center>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>