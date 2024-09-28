<!DOCTYPE html>
<html lang="en">
<head>
  
<?php 
  require_once "../database/config.php";
  include "../list_head_link.php";
  $halaman = 'image_slider';
  session_start();
  
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
            <h1 class="m-0">Image Slider (Carousel)</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

      <?php

        if(isset($_POST['image1']))
    {
        $file        = $_FILES['filegambar1']['name'];
        $ekstensi    = explode (".", $file);
        $file_name   = "carousel".round(microtime(true)).".".end($ekstensi);
        $sumber      = $_FILES['filegambar1']['tmp_name'];
        $target_dir  = "../auth/img/";
        $target_path = "img/".$file_name;
        $target_file = $target_dir.$file_name;
        $upload      = move_uploaded_file($sumber, $target_file);

        mysqli_query($con, "UPDATE tbl_image_sliderr SET path_image='$target_path' WHERE Id='1'")
        or die(mysqli_error($con));

            ?>
              <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
              <script> 
              swal("Sukses", "Gambar Slider Carousel 1 Telah Diubah", "success");

              setTimeout(function() {
              window.location.href = "../image_slider";

              }, 2500);
              </script>

                    <?php

    }
        if(isset($_POST['image2']))
        {
        $file        = $_FILES['filegambar2']['name'];
        $ekstensi    = explode (".", $file);
        $file_name   = "carousel".round(microtime(true)).".".end($ekstensi);
        $sumber      = $_FILES['filegambar2']['tmp_name'];
        $target_dir  = "../auth/img/";
        $target_path = "img/".$file_name;
        $target_file = $target_dir.$file_name;
        $upload      = move_uploaded_file($sumber, $target_file);

        mysqli_query($con, "UPDATE tbl_image_sliderr SET path_image='$target_path' WHERE Id='2'")
            or die(mysqli_error($con));

            ?>
              <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
              <script> 
              swal("Sukses", "Gambar Slider Carousel 2 Telah Diubah", "success");

              setTimeout(function() {
              window.location.href = "../image_slider";

              }, 2500);
              </script>

                    <?php
        }
        if(isset($_POST['image3']))
        {
        $file        = $_FILES['filegambar3']['name'];
        $ekstensi    = explode (".", $file);
        $file_name   = "carousel".round(microtime(true)).".".end($ekstensi);
        $sumber      = $_FILES['filegambar3']['tmp_name'];
        $target_dir  = "../auth/img/";
        $target_path = "img/".$file_name;
        $target_file = $target_dir.$file_name;
        $upload      = move_uploaded_file($sumber, $target_file);

        mysqli_query($con, "UPDATE tbl_image_sliderr SET path_image='$target_path' WHERE Id='3'")
            or die(mysqli_error($con));

            ?>
              <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
              <script> 
              swal("Sukses", "Gambar Slider Carousel 3 Telah Diubah", "success");

              setTimeout(function() {
              window.location.href = "../image_slider";

              }, 2500);
              </script>

                    <?php
        }
        if(isset($_POST['image4']))
        {
        $file        = $_FILES['filegambar4']['name'];
        $ekstensi    = explode (".", $file);
        $file_name   = "carousel".round(microtime(true)).".".end($ekstensi);
        $sumber      = $_FILES['filegambar4']['tmp_name'];
        $target_dir  = "../auth/img/";
        $target_path = "img/".$file_name;
        $target_file = $target_dir.$file_name;
        $upload      = move_uploaded_file($sumber, $target_file);

        mysqli_query($con, "UPDATE tbl_image_sliderr SET path_image='$target_path' WHERE Id='4'")
            or die(mysqli_error($con));

            ?>
              <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
              <script> 
              swal("Sukses", "Gambar Slider Carousel 4 Telah Diubah", "success");

              setTimeout(function() {
              window.location.href = "../image_slider";

              }, 2500);
              </script>

                    <?php
        }


        ?>

</div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
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
