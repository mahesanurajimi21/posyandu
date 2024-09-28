<!DOCTYPE html>
<html lang="en">
<head>
  
<?php 
  include '../list_head_link.php';
  $halaman = 'admin_dasbor';
  session_start();
  $peran = "admin";

  if ($_SESSION['peran']!=$peran)
  {
    echo "<script>window.location='../auth';</script>";
  } else{
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
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3" id=1km>
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                  require_once '../database/config.php';
                  $sql_jmlpengguna = mysqli_query($con, "SELECT * FROM tbl_peserta")
                  or die(mysqli_error($con));
                  $jmlpengguna = mysqli_num_rows($sql_jmlpengguna);
                ?>
                  <a href="../admin_data_peserta/index.php"><h3><font color ="#fffff"><?=$jmlpengguna;?></font></h3></a>
                  <a href="../admin_data_peserta/index.php"> <p><b><font color ="#fffff">DATA PESERTA</font></b></p></a>
              </div>
                <div class="icon">
                  <i class="fas fa-restroom"></i>
                </div>
               <a href="../admin_data_peserta/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
             </div>
            </div> 

            
              <div class="col-lg-3">
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <?php
                        require_once '../database/config.php';
                        $sql_jmlpengguna = mysqli_query($con, "SELECT * FROM tbl_anak")
                        or die(mysqli_error($con));
                        $jmlpengguna = mysqli_num_rows($sql_jmlpengguna);
                      ?>
                        <a href="../admin_data_pengukuranimun/index.php"><h3><font color ="#fffff"><?=$jmlpengguna;?></font></h3></a>
                        <a href="../admin_data_pengukuranimun/index.php"> <p><b><font color ="#fffff">DATA ANAK</font></b></p></a>
                    </div>
                    <div class="icon">
                  <i class="fas fa-child"></i>
                </div>
              <a href="../admin_data_pengukuranimun/index.php" class="small-box-footer"><font color ="#fffff">More info <i class="fas fa-arrow-circle-right"></font></i></a>
             </div>
            </div> 
            
          
            <div class="col-lg-3" id=1kamarluas>
              <div class="small-box bg-primary">
                <div class="inner">
                <?php
                  require_once '../database/config.php';
                  $sql_jmlpengguna = mysqli_query($con, "SELECT * FROM tbl_penggunaa")
                  or die(mysqli_error($con));
                  $jmlpengguna = mysqli_num_rows($sql_jmlpengguna);
                ?>
                  <a href="../admin_data_pengguna/index.php"><h3><font color ="#fffff"><?=$jmlpengguna;?></font></h3></a>
                  <a href="../admin_data_pengguna/index.php"> <p><b><font color ="#fffff">DATA PENGGUNA</font></b></p></a>
                </div>
              <div class="icon">
                <i class="fas fa-users"></i>
                  </div>
                <a href="../admin_data_pengguna/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          
            <div class="col-lg-3" id="1kamarluas">
              <div class="small-box bg-primary">
                <div class="inner">
                  <?php
                    require_once '../database/config.php';
                    $sql_jmlpengguna = mysqli_query($con, "SELECT * FROM tbl_pengukuran_imunisasi")
                    or die(mysqli_error($con));
                    $jmlpengguna = mysqli_num_rows($sql_jmlpengguna);
                  ?>
                    <a href="../admin_data_riwayat/index.php"><h3><font color ="#fffff"><?=$jmlpengguna;?></font></h3></a>
                    <a href="../admin_data_riwayat/index.php"> <p><b><font color ="#fffff">RIWAYAT PENGUKURAN IMUNISASI</font></b></p></a>
                   </div>
                   <div class="icon">
                  <i class="fas fa-clipboard"></i>
                </div>
              <a href="../admin_data_riwayat/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>          
           

          </div>          
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
<!-- Bootstrap -->
<script src="../assets_adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="../assets_adminlte/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../assets_adminlte/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="assets_adminlte/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets_adminlte/dist/js/pages/dashboard3.js"></script>



</body>
</html>
<?php
  }
  ?>