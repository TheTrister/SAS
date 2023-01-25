    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?php echo base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- <script src=".<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script> -->
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url(); ?>/assets/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
    <script>
        $(function() {
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieData = {
                labels: [
                    'aldi',
                    'IE',
                    'FireFox',
                    'Safari',
                    'Opera',
                    'Navigator',
                ],
                datasets: [{
                    data: [700, 500, 400, 600, 300, 100],
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }]
            }
            var pieOptions = {
                maintainAspectRatio: true,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })

            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Digital Goods',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [28, 48, 40, 19, 86, 27, 90]
                }, ]
            }
            // var temp0 = areaChartData.datasets[0]
            // var temp1 = areaChartData.datasets[1]
            // barChartData.datasets[0] = temp1
            // barChartData.datasets[1] = temp0

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })
            //---------------------
            //- STACKED BAR CHART -
            //---------------------
            var stackedBarChartCanvas = $('#stackedBarChart1').get(0).getContext('2d')
            var stackedBarChartData = $.extend(true, {}, barChartData)

            var stackedBarChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        stacked: true,
                        data: [28, 48, 40, 19, 86, 27, 90]
                    }],
                    yAxes: [{
                        stacked: true

                    }]
                }
            }

            new Chart(stackedBarChartCanvas, {
                type: 'bar',
                data: stackedBarChartData,
                options: stackedBarChartOptions
            })


        })
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#id_jurusan').change(function() {
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
                        $('#id_kelas').html(html);

                    }
                });
                return false;
            });

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

        });
    </script>
    <script>
        //DATA SISWA
    $('#btn-tambah').click(function(event){
      var form = new FormData($('#form_tambah')[0]);
      $.ajax({
        type: "post",
        data:form,
        url:'<?php echo base_url('SAS/tambah_data_siswa') ?>',
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
      url:'<?php echo base_url('SAS/edit_data_siswa') ?>',
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
      url:'<?php echo base_url('SAS/delete_data_siswa') ?>',
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
      url:'<?php echo base_url('SAS/ambil_detail_data_siswa') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){
       $('[name="id"]').val(hasil['ID']);
       $('[name="nis"]').val(hasil['NIS']);
       $('[name="nama"]').val(hasil['NAMA']);
       $('[name="jurusan_edit"]').val(hasil['ID_JURUSAN']);
       $('[name="kelas_edit"]').val(hasil['ID_KELAS']);
       $('[name="password"]').val(hasil['PASSWORD']);
     }
   });
   }
    function get_id_delete(x){
     $.ajax({
      type: "post",
      data:'id='+x,
      url:'<?php echo base_url('SAS/ambil_detail_data_siswa') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){
       $('[name="id"]').val(hasil['ID']);
     }
   });
   }

   //DATA USER
   $('#btn-tambah_user').click(function(event){
      var form = new FormData($('#form_tambah')[0]);
      $.ajax({
        type: "post",
        data:form,
        url:'<?php echo base_url('SAS/tambah_data_user') ?>',
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
      url:'<?php echo base_url('SAS/edit_data_user') ?>',
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
      url:'<?php echo base_url('SAS/delete_data_user') ?>',
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
      url:'<?php echo base_url('SAS/ambil_detail_data_user') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){
       $('[name="id"]').val(hasil['ID']);
       $('[name="username"]').val(hasil['USERNAME']);
       $('[name="password"]').val(hasil['PASSWORD']);
     }
   });
   }
   function get_id_delete_user(x){
     $.ajax({
      type: "post",
      data:'id='+x,
      url:'<?php echo base_url('SAS/ambil_detail_data_user') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){
       $('[name="id"]').val(hasil['ID']);
     }
   });
   }
   //DATA JURUSAN
   $('#btn-tambah-jurusan').click(function(event){
      var form = new FormData($('#form_tambah')[0]);
      $.ajax({
        type: "post",
        data:form,
        url:'<?php echo base_url('SAS/tambah_data_jurusan') ?>',
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
      url:'<?php echo base_url('SAS/edit_data_jurusan') ?>',
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
      url:'<?php echo base_url('SAS/delete_data_jurusan') ?>',
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
      url:'<?php echo base_url('SAS/ambil_detail_data_jurusan') ?>',
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
      url:'<?php echo base_url('SAS/ambil_detail_data_jurusan') ?>',
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
        url:'<?php echo base_url('SAS/tambah_data_kelas') ?>',
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
      url:'<?php echo base_url('SAS/edit_data_kelas') ?>',
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
      url:'<?php echo base_url('SAS/delete_data_kelas') ?>',
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
      url:'<?php echo base_url('SAS/ambil_detail_data_kelas') ?>',
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
      url:'<?php echo base_url('SAS/ambil_detail_data_kelas') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){
       $('[name="id"]').val(hasil['ID']);
     }
   });
   }

    </script>

    </body>

    </html>

    </html>