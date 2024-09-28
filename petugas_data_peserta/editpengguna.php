<!DOCTYPE html>
<html lang="en">
<head>
  
<?php 
  include '../list_head_link.php';
  $halaman = 'petugas_datapeserta';
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
            <h1 class="m-0">Data Pengguna / Edit Pengguna </h1>
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

                    $kk            = trim(mysqli_real_escape_string($con, $_POST['nmrkk']));
                    $nikk          = trim(mysqli_real_escape_string($con, $_POST['nmrnikibu']));
                    $nmibune       = trim(mysqli_real_escape_string($con, $_POST['aranibu']));
                    $nkkbpane      = trim(mysqli_real_escape_string($con, $_POST['nmrnikayh']));
                    $nmbapane      = trim(mysqli_real_escape_string($con, $_POST['aranayah']));
                    $rwnee         = trim(mysqli_real_escape_string($con, $_POST['rwpeserta']));
                    $rtnee         = trim(mysqli_real_escape_string($con, $_POST['rtpeserta']));
                    $dusunee       = trim(mysqli_real_escape_string($con, $_POST['dsunpsrtaa']));
                    $kodee         = trim(mysqli_real_escape_string($con, $_POST['kdpst2']));
                    $hp            = trim(mysqli_real_escape_string($con, $_POST['edtnohp']));

            $cekdata = mysqli_query($con, "SELECT * FROM tbl_peserta")
            or die(mysqli_error($con));

            if (mysqli_num_rows($cekdata)<0)
            {
              ?>
              <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
              <script> 
              swal("Error", "NKK yang diupdate sudah ada, silahkan ganti yang lain!", "error");

              setTimeout(function() {
              window.location.href = "../admin_data_peserta";

              }, 2500);
              </script>
              <?php
            } else {

            $ambilidyangbarumasuk = mysqli_query($con,"SELECT id FROM tbl_dusun WHERE nama_dusun='$dusunee'") or die (mysqli_error($con));
            $arr = mysqli_fetch_assoc($ambilidyangbarumasuk);            
            if (mysqli_num_rows($ambilidyangbarumasuk)>0)
                {                            
                  $id_dusun = $arr['id'];                  
                }
                else
                {
                  $id_dusun="0";
                }
                
                $ambilidrt = mysqli_query($con,"SELECT id FROM tbl_rt WHERE no_rt ='$rtnee'") or die (mysqli_error($con));
            $arr = mysqli_fetch_assoc($ambilidrt);            
            if (mysqli_num_rows($ambilidrt)>0)
                {                            
                  $id_rt = $arr['id'];                  
                }
                else
                {
                  $id_rt="0";
                }

                $ambilidrt = mysqli_query($con,"SELECT id FROM tbl_rt WHERE no_rw ='$rwnee'") or die (mysqli_error($con));
            $arr = mysqli_fetch_assoc($ambilidrt);            
            if (mysqli_num_rows($ambilidrt)>0)
                {                            
                  $id_rw = $arr['id'];                  
                }
                else
                {
                  $id_rw="0";
                }
                    
              mysqli_query($con, "UPDATE tbl_peserta SET kode_dusun='$id_dusun', kode='$kodee', nkk='$kk', nik_ibu='$nikk', nama_ibu='$nmibune', nik_ayah='$nkkbpane',
              nama_ayah='$nmbapane', kode_rw='$id_rw', rw='$rwnee', kode_rt='$id_rt', rt='$rtnee', dusun='$dusunee',nohp='$hp' WHERE kode='$kodee'")or die(mysqli_error($con)); 

              mysqli_query($con, "UPDATE tbl_anak SET kode_peserta='$kodee', nkk='$kk', dusun='$dusunee',
              kode_dusun='$id_dusun' WHERE kode_peserta='$kodee'")or die(mysqli_error($con)); 

              mysqli_query($con, "UPDATE tbl_pengukuran_imunisasi SET kd_peserta='$kodee' WHERE kd_peserta='$kodee'")or die(mysqli_error($con)); 
              // script diatas berfungsi agar ketika kita mengupdate atau edit data nomer kk pada tabel peserta,
              // maka nomer kk yang ada pada tabel anak juga ikut ter update
            ?>
              <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
              <script> 
              swal("Sukses", "Data Telah Diedit", "success");

              setTimeout(function() {
              window.location.href = "../admin_data_peserta";

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

