<!DOCTYPE html>
<html lang="en">
<head>
  
<?php 
  include '../list_head_link.php';
  $halaman = 'admin_data_dusun';
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
            <h1 class="m-0">Edit Data Dusun</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">

          <?php
            if(isset($_POST['edit']))
        {
                    $nmdusun     = trim(mysqli_real_escape_string($con, $_POST['nmdsn']));
                    $nmkadus    = trim(mysqli_real_escape_string($con, $_POST['nmkds']));
                    $kntakkadus    = trim(mysqli_real_escape_string($con, $_POST['ktkds']));
                    $iddusun     = trim(mysqli_real_escape_string($con, $_POST['idds2']));

                    

            $cekdata = mysqli_query($con, "SELECT * FROM tbl_dusun")
            or die(mysqli_error($con));

            if (mysqli_num_rows($cekdata)<0)
            {
              ?>
              <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
              <script> 
              swal("Error", "Kontak Kadus yang diupdate sudah ada, silahkan ganti yang lain!", "error");

              setTimeout(function() {
              window.location.href = "../admin_data_dusun";

              }, 2500);
              </script>
              <?php
            } else {
                    
            mysqli_query($con, "UPDATE tbl_dusun SET nama_dusun='$nmdusun', kadus='$nmkadus', kontak_kadus='$kntakkadus'
            WHERE id='$iddusun'")
            or die(mysqli_error($con)); 

            mysqli_query($con, "UPDATE tbl_peserta SET dusun='$nmdusun' WHERE kode_dusun='$iddusun'")
            or die(mysqli_error($con));

            mysqli_query($con, "UPDATE tbl_anak SET dusun='$nmdusun' WHERE kode_dusun='$iddusun'")
            or die(mysqli_error($con));

            mysqli_query($con, "UPDATE tbl_lokasi_posyandu SET dusun='$nmdusun' WHERE kode_dusun='$iddusun'")
            or die(mysqli_error($con));

            ?>
              <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
              <script> 
              swal("Sukses", "Data Telah Diedit", "success");

              setTimeout(function() {
              window.location.href = "../admin_data_dusun";

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

