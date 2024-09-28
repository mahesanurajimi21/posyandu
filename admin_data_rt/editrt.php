<!DOCTYPE html>
<html lang="en">
<head>
  
<?php 
  include '../list_head_link.php';
  $halaman = 'datapengguna';
  session_start();
  require_once "../database/config.php"; 


  // skrip diatas require_once "../database/config.php"; (agar memunculkan data pengguna)
?>

</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  
<!-- Navbar -->
   <?php
  include '../navigasi_atas.php';
  ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<?php
include '../sidebar.php';
?>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Data RT dan RW </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4">

          <?php
            if(isset($_POST['edit']))
        {
                    $rtt     = trim(mysqli_real_escape_string($con, $_POST['rtm']));
                    $rww    = trim(mysqli_real_escape_string($con, $_POST['rwm']));
                    $idd     = trim(mysqli_real_escape_string($con, $_POST['idrt2']));

                    

            $cekdata = mysqli_query($con, "SELECT * FROM tbl_rt" )
            or die(mysqli_error($con));

            if (mysqli_num_rows($cekdata)<0)
            {
              ?>
              <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
              <script> 
              swal("Error", "Nomer RT dan RW yang diupdate sudah ada, silahkan ganti yang lain!", "error");

              setTimeout(function() {
              window.location.href = "../admin_data_rt";

              }, 2500);
              </script>
              <?php
            } else {
                    
            mysqli_query($con, "UPDATE tbl_rt SET no_rt = '$rtt', no_rw = '$rww' WHERE id='$idd'")
            or die(mysqli_error($con));
            
            mysqli_query($con, "UPDATE tbl_peserta SET kode_rt = '$idd', rt='$rtt', kode_rw='$idd', rw='$rww'  WHERE kode_rt='$idd' OR kode_rw='$idd'")
            or die(mysqli_error($con));

            mysqli_query($con, "UPDATE tbl_anak SET kode_rt = '$idd', rt='$rtt', kode_rw='$idd', rw='$rww'  WHERE kode_rt='$idd' OR kode_rw='$idd'")
            or die(mysqli_error($con));

            mysqli_query($con, "UPDATE tbl_lokasi_posyandu SET kode_rw='$idd', rw='$rww', kode_rt='$idd', rt='$rtt'  WHERE kode_rt='$idd' OR kode_rw='$idd'")
            or die(mysqli_error($con));

            ?>
              <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
              <script> 
              swal("Sukses", "Data Telah Diedit", "success");

              setTimeout(function() {
              window.location.href = "../admin_data_rt";

              }, 2500);
              </script>

              <?php  
            }       
        }                   
          ?>     

          </div>          
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php
include '../footer.php';
  ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="../assets_adminlte/plugins/jquery/jquery.min.js"></script>
<script src="../assets_adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets_adminlte/dist/js/adminlte.js"></script>
<script src="../assets_adminlte/plugins/chart.js/Chart.min.js"></script>
<script src="../assets_adminlte/dist/js/pages/dashboard3.js"></script>


</body>
</html>

