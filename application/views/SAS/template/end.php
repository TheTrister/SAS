    <!-- jQuery -->
    <script src="<?php echo base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?php echo base_url() ?>/assets/plugins/chart.js/Chart.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?php echo base_url() ?>/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    
    <script src="<?php echo base_url() ?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <!-- <script src=".<?php echo base_url() ?>/assets/plugins/daterangepicker/daterangepicker.js"></script> -->
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>/assets/dist/js/adminlte.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url(); ?>/assets/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
    
    <script type="text/javascript">
        $(document).ready(function() {

            // $('#id_jurusan').change(function() {
            //     var id = $(this).val();
            //     $.ajax({
            //         url: "<?php echo site_url('SAS/get_kelas'); ?>",
            //         method: "POST",
            //         data: {
            //             id: id
            //         },
            //         async: true,
            //         dataType: 'json',
            //         success: function(data) {

            //             var html = '';
            //             var i;
            //             for (i = 0; i < data.length; i++) {
            //                 html += '<option value=' + data[i].ID + '>' + data[i].KELAS + '</option>';
            //             }
            //             $('#id_kelas').html(html);

            //         }
            //     });
            //     return false;
            // });

            $('#idjurusan').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo site_url('SAS/get_kelas'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {

                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].ID + '>' + data[i].KELAS + '</option>';
                        }
                        $('#idkelas').html(html);

                    }
                });
                return false;
            });

            $('#idjurusan_edit').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo site_url('SAS/get_kelas'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {

                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].ID + '>' + data[i].KELAS + '</option>';
                        }
                        $('#idkelas_edit').html(html);

                    }
                });
                return false;
            });
            $('#idjurusan_tambah').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo site_url('SAS/get_kelas'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {

                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].ID + '>' + data[i].KELAS + '</option>';
                        }
                        $('#idkelas_tambah').html(html);

                    }
                });
                return false;
            });

        });
    </script>
    <script>
        //DATA SISWA
    $('#btn-tambah').click(function(event){
      var form = new FormData($('#form_tambah')[0]);
      $.ajax({
        type: "post",
        data:form,
        url:'<?php echo base_url('Siswa/tambah_data_siswa') ?>',
        dataType: 'json',
        cache:'false',
        contentType: false,
        processData: false,
        success: function(hasil){

          if (hasil.hasil) {
            $('#insert').hide('slow');
            location.reload();
          }
        }
      });
    });

    $('#btn-edit').click(function(event){
     $.ajax({
      type: "post",
      data:{'form_edit':$('#form_edit').serialize()},
      url:'<?php echo base_url('Siswa/edit_data_siswa') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){

       if (hasil.hasil) {
        $('#edit').hide('slow');
        location.reload();
      }
    }
  });
   });
    $('#btn-delete').click(function(event){
     $.ajax({
      type: "post",
      data:{'form_delete':$('#form_delete').serialize()},
      url:'<?php echo base_url('Siswa/delete_data_siswa') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){

       if (hasil.hasil) {
        $('#hapus').hide('slow');
        location.reload();
      }
    }
  });
   });

    function edit_data_siswa(x){
     $.ajax({
      type: "post",
      data:'id='+x,
      url:'<?php echo base_url('Siswa/ambil_detail_data_siswa') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){
       $('[name="id"]').val(hasil['id']);
       $('[name="nis"]').val(hasil['NIS']);
       $('[name="nama"]').val(hasil['NAMA']);
       $('[name="jurusan_edit"]').val(hasil['ID_JURUSAN']);
       $('[name="kelas_edit"]').val(hasil['ID_KELAS']);
       $('[name="password"]').val(hasil['PASSWORD']);
       $('[name="email"]').val(hasil['EMAIL']);
      }
   });
   }
    function get_id_delete(x){
     $.ajax({
      type: "post",
      data:'id='+x,
      url:'<?php echo base_url('Siswa/ambil_detail_data_siswa') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){
       $('[name="id"]').val(hasil['id']);
     }
   });
   }

   //DATA USER
   $('#btn-tambah_user').click(function(event){
      var form = new FormData($('#form_tambah')[0]);
      $.ajax({
        type: "post",
        data:form,
        url:'<?php echo base_url('User/tambah_data_user') ?>',
        dataType: 'json',
        cache:'false',
        contentType: false,
        processData: false,
        success: function(hasil){

          if (hasil.hasil) {
            $('#insert').hide('slow');
            location.reload();
          }
        }
      });
    });

    $('#btn-edit_user').click(function(event){
     $.ajax({
      type: "post",
      data:{'form_edit':$('#form_edit').serialize()},
      url:'<?php echo base_url('User/edit_data_user') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){

       if (hasil.hasil) {
        $('#edit').hide('slow');
        location.reload();
      }
    }
  });
   });
   $('#btn-delete_user').click(function(event){
     $.ajax({
      type: "post",
      data:{'form_delete':$('#form_delete').serialize()},
      url:'<?php echo base_url('User/delete_data_user') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){

       if (hasil.hasil) {
        $('#hapus').hide('slow');
        location.reload();
      }
    }
  });
   });
   function edit_data_user(x){
     $.ajax({
      type: "post",
      data:'id='+x,
      url:'<?php echo base_url('User/ambil_detail_data_user') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){
       $('[name="id"]').val(hasil['id']);
       $('[name="username"]').val(hasil['USERNAME']);
       $('[name="password"]').val(hasil['PASSWORD']);
       $('[name="level"]').val(hasil['LEVEL']);
     }
   });
   }
   function get_id_delete_user(x){
     $.ajax({
      type: "post",
      data:'id='+x,
      url:'<?php echo base_url('User/ambil_detail_data_user') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){
       $('[name="id"]').val(hasil['id']);
     }
   });
   }
   //DATA JURUSAN
   $('#btn-tambah-jurusan').click(function(event){
      var form = new FormData($('#form_tambah')[0]);
      $.ajax({
        type: "post",
        data:form,
        url:'<?php echo base_url('Jurusan/tambah_data_jurusan') ?>',
        dataType: 'json',
        cache:'false',
        contentType: false,
        processData: false,
        success: function(hasil){

          if (hasil.hasil) {
            $('#insert').hide('slow');
            location.reload();
          }
        }
      });
    });

    $('#btn-edit-jurusan').click(function(event){
     $.ajax({
      type: "post",
      data:{'form_edit':$('#form_edit').serialize()},
      url:'<?php echo base_url('Jurusan/edit_data_jurusan') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){

       if (hasil.hasil) {
        $('#edit').hide('slow');
        location.reload();
      }
    }
  });
   });
   $('#btn-delete-jurusan').click(function(event){
     $.ajax({
      type: "post",
      data:{'form_delete':$('#form_delete').serialize()},
      url:'<?php echo base_url('Jurusan/delete_data_jurusan') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){

       if (hasil.hasil) {
        $('#hapus').hide('slow');
        location.reload();
      }
    }
  });
   });
   function edit_data_jurusan(x){
     $.ajax({
      type: "post",
      data:'id='+x,
      url:'<?php echo base_url('Jurusan/ambil_detail_data_jurusan') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){
       $('[name="id"]').val(hasil['ID']);
       $('[name="jurusan"]').val(hasil['JURUSAN']);
     }
   });
   }
   function get_id_delete_jurusan(x){
     $.ajax({
      type: "post",
      data:'id='+x,
      url:'<?php echo base_url('Jurusan/ambil_detail_data_jurusan') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){
       $('[name="id"]').val(hasil['ID']);
     }
   });
   }
   //DATA KELAS
   $('#btn-tambah-kelas').click(function(event){
      var form = new FormData($('#form_tambah')[0]);
      $.ajax({
        type: "post",
        data:form,
        url:'<?php echo base_url('Kelas/tambah_data_kelas') ?>',
        dataType: 'json',
        cache:'false',
        contentType: false,
        processData: false,
        success: function(hasil){

          if (hasil.hasil) {
            $('#insert').hide('slow');
            location.reload();
          }
        }
      });
    });

    $('#btn-edit-kelas').click(function(event){
     $.ajax({
      type: "post",
      data:{'form_edit':$('#form_edit').serialize()},
      url:'<?php echo base_url('Kelas/edit_data_kelas') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){

       if (hasil.hasil) {
        $('#edit').hide('slow');
        location.reload();
      }
    }
  });
   });
   $('#btn-delete-kelas').click(function(event){
     $.ajax({
      type: "post",
      data:{'form_delete':$('#form_delete').serialize()},
      url:'<?php echo base_url('Kelas/delete_data_kelas') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){

       if (hasil.hasil) {
        $('#hapus').hide('slow');
        location.reload();
      }
    }
  });
   });
   function edit_data_kelas(x){
     $.ajax({
      type: "post",
      data:'id='+x,
      url:'<?php echo base_url('Kelas/ambil_detail_data_kelas') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){
       $('[name="id"]').val(hasil['ID']);
       $('[name="kelas"]').val(hasil['KELAS']);
       $('[name="jurusan"]').val(hasil['ID_JURUSAN']);
     }
   });
   }
   function get_id_delete_kelas(x){
     $.ajax({
      type: "post",
      data:'id='+x,
      url:'<?php echo base_url('Kelas/ambil_detail_data_kelas') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){
       $('[name="id"]').val(hasil['ID']);
     }
   });
   }

   //DATA KEHADIRAN
   $('#btn-edit-kehadiran').click(function(event){
     $.ajax({
      type: "post",
      data:{'form_tambah':$('#form_tambah').serialize()},
      url:'<?php echo base_url('Kehadiran/edit_data_pelanggaran') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){

       if (hasil.hasil) {
        $('#tambah').hide('slow');
        location.reload();
      }
    }
  });
   });
   function edit_data_pelanggaran(x){
     $.ajax({
      type: "post",
      data:'id='+x,
      url:'<?php echo base_url('Kehadiran/ambil_data_pelanggaran') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){
       $('[name="id"]').val(hasil['ID']);
       $('[name="kode_pelanggaran"]').val(hasil['PELANGGARAN']);
       $('[name="keterangan_pelanggaran"]').val(hasil['KETERANGAN']);
     }
   });
   }

    </script>

    </body>

    </html>

    </html>