<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header border-white" style="background-color: #9ED2E9 ;">
                <h3>
                    <font size="">
                        &ensp;<b>Data Feedback</b>
                    </font>
                </h3>
            </div>
            <!-- <div class="card-header border-white">
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
            </div> -->
            <div class="card-body">
                <table class="table table-bordered table-hover" id="table" width="100%" cellspacing="0" style="font-size:12px">
                    <thead style="background-color: #9ED2E9 ;">
                        <tr style="color: #fff ;">
                            <th width="20px">
                                <center>NO</center>
                            </th>
                            <th>
                                <center>EMAIL</center>
                            </th>
                            <th>
                                <center>FEEDBACK</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (is_array($feedback) || is_object($feedback)) { ?>
                            <?php $i = 1; ?>
                            <?php foreach ($feedback as $dt) { ?>
                                <tr class="text-center">
                                    <td>
                                        <?php echo $i++ ?>
                                    </td>
                                    <td>
                                        <?php echo $dt->EMAIL ?>
                                    </td>
                                    <td>
                                        <?php echo $dt->FEEDBACK ?>
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