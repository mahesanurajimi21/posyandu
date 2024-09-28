<!DOCTYPE html>
<html lang="en">
<head>
  
<?php 
  include '../list_head_link.php';
  // require_once "../database/config.php"; 
$halaman = 'petugasganti_pass';
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
include '../petugas_sidebar.php';
?>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Ganti Password</h1>
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
            if(isset($_POST['updatepw']))
            {
                    $nip        = $_SESSION['nip'];
                    $pwbaru     = sha1(trim(mysqli_real_escape_string($con, $_POST['passbaru'])));
                    $pwbaru2    = trim(mysqli_real_escape_string($con, $_POST['passbaru']));
                    
                    $cekkarakter = strlen($pwbaru2);

                    if ($cekkarakter > 7)
                    {

                    ?>
                    </br>
                    <?php
                    mysqli_query($con, "UPDATE tbl_penggunaa SET kata_sandi='$pwbaru' WHERE NIP='$nip'")
                    or die(mysqli_error($con));
                    ?>
                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                  <script> 
                  swal("Success", "Password Telah Di Update", "success");

                  setTimeout(function() {
                  window.location.href = "../auth/logout.php";

                  }, 5000);
                  </script>
                  <?php
                    }
                    else 
                    {
                      ?>

                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                  <script> 
                  swal("Error", "Password Minimal 8 karakter", "error");

                  setTimeout(function() {
                  window.location.href = "../petugas_ganti_pass";

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
<!-- script diawah ini diambil dari assets_adminlte/pages/tables lalu copy pada baris no 1763 -->
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
<!-- <script src="../assets_adminlte/plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap 4 -->
<script src="../assets_adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
</body>
</html>

