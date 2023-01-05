<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Prakerin 2022</span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
    <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      <a class="btn btn-primary" href="<?php echo base_url('Template/login');?>">Logout</a>
    </div>
  </div>
</div>
</div>
<script src="<?php echo base_url();?>/assets/vvendors/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>/assets/vvendors/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url();?>/assets/vvendors/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url();?>/assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url();?>/assets/vvendors/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url();?>/assets/js/demo/chart-area-demo.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script src="<?php echo base_url();?>/assets/vvendors/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/assets/vvendors/datatables/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function() {
    $('#table').DataTable();
  });
</script>
<script>
    //detail
    function submit(x){
     $.ajax({
      type: "post",
      data:'id='+x,
      url:'<?php echo base_url('Template/ambil_detail') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){
       $('[name="absen"]').val(hasil['id']);
       $('[name="nama"]').val(hasil['nama']);
       $('[name="umur"]').val(hasil['umur']);
       $('[name="jk"]').val(hasil['kelamin']);
       $('[name="agama"]').val(hasil['agama']);
       $('[name="file"]').val(hasil['file']);
       $('[name="username"]').val(hasil['username']);
       $('[name="password"]').val(hasil['password']);
     }
   });
   }

    //insert data
    $('#btn-tambah').click(function(event){
      var form = new FormData($('#form_tambah')[0]);
      $.ajax({
        type: "post",
        data:form,
        url:'<?php echo base_url('Template/insert_data') ?>',
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

    //edit
    function edit(x){
     $.ajax({
      type: "post",
      data:'id='+x,
      url:'<?php echo base_url('Template/ambil_detail') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){
       $('[name="absen"]').val(hasil['id']);
       $('[name="nama"]').val(hasil['nama']);
       $('[name="umur"]').val(hasil['umur']);
       $('[name="jk"]').val(hasil['kelamin']);
       $('[name="agama"]').val(hasil['agama']);
       $('[name="file"]').val(hasil['file']);
       $('[name="username"]').val(hasil['username']);
       $('[name="password"]').val(hasil['password']);
     }
   });
   }
   $('#btn-edit').click(function(event){
     $.ajax({
      type: "post",
      data:{'form_edit':$('#form_edit').serialize()},
      url:'<?php echo base_url('Template/form_edit') ?>',
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
 </script>
 <script type="text/javascript">
  var ctx = document.getElementById("myPieChart");
  var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ["pria", "wanita"],
      datasets: [{
        data:[
            <?php echo $pria; ?>,
            <?php echo $wanita; ?>
        ],
        backgroundColor: ['#4e73df', '#1cc88a'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false
      },
      cutoutPercentage: 80,
    },
  });

var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["January", "February", "March", "April", "May", "June"],
    datasets: [{
      label: "Revenue",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: [2000, 4500, 6000, 7000, 9000, 14000],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 10000,
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '$' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});
</script>
</body>
</html>