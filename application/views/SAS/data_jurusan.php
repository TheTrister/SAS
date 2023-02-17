<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <!-- <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Siswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data User</li>
                    </ol>
                </div>
            </div> -->
        </div><!-- /.container-fluid -->
    </section>
    <?php echo $this->session->flashdata('pesan_jurusan'); ?>
    <!-- Main content -->
    <section class="content">
        <div class="card-header border-white" style="background-color: #9ED2E9 ;">
            <h3>
                <font size="">
                    &ensp;<b>Data Jurusan</b>
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
                                <div class="input-group">
                                    <div class="btn-group">
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
                <table class="table table-bordered table-hover" id="table" width="100%" cellspacing="0" style="font-size:12px">
                    <thead style="background-color: #9ED2E9 ;">
                        <tr style="color: #fff ;">
                            <th width="20px">
                                <center>NO</center>
                            </th>
                            <th>
                                <center>JURUSAN</center>
                            </th>
                            <th>
                                <center>AKSI</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (is_array($data_jurusan) || is_object($data_jurusan)) { ?>
                            <?php $i = 1; ?>
                            <?php foreach ($data_jurusan as $dt) { ?>
                                <tr>
                                    <td>
                                        <center><?php echo $i++ ?></center>
                                    </td>
                                    <td>
                                        <center><?php echo $dt->JURUSAN ?></center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="" data-toggle="modal" data-target="#edit" class="btn"><i class="fas fa-edit" class="btn" onclick="edit_data_jurusan(<?php echo $dt->ID ?>)" style="color: #f0ad4e;"></i></a>
                                            <a href="" data-toggle="modal" data-target="#hapus" class="btn"><i class="fas fa-trash" class="btn" class="btn" onclick="get_id_delete_jurusan(<?php echo $dt->ID ?>)" style="color: #d9534f;"></i></a>
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

<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-gray-100" id="exampleModalLabel">TAMBAH DATA</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_tambah" method="post" action="<?php echo base_url('SAS/tambah_data_jurusan') ?>" enctype="multipart/form-data">
                    <table class="table">
                        <tr>
                            <td>Nama Jurusan</td>
                            <td><input type="text" name="jurusan" id="idjurusan" value="" class="form-control" required></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" id="btn-tambah-jurusan" data-dismiss="modal">Tambah</button>
            </div>
        </div>
    </div>
</div>
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
                <form id="form_edit" method="post" action="<?php echo base_url('SAS/edit_data_jurusan') ?>" enctype="multipart/form-data">
                    <table class="table">
                        <tr>
                            <td>Nama Jurusan</td>
                            <td><input type="text" name="jurusan" id="idjurusan" value="" class="form-control" required></td>
                            <input type="hidden" name="id" id="">
                        </tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" id="btn-edit-jurusan" data-dismiss="modal">Edit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-gray-100" id="exampleModalLabel">NOTIF</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="form_delete" method="post" action="<?php echo base_url('SAS/delete_data_jurusan') ?>" enctype="multipart/form-data">
                apakah anda ingin menghapus data ini?
                <input type="hidden" name="id" id="">
            </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal" aria-label="Close">cancel</button>
                <button type="button" class="btn btn-info" id="btn-delete-jurusan" data-dismiss="modal">hapus</button>
            </div>
        </div>
    </div>
</div>