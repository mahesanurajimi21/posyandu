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
            <h1 class="m-0">Edit Data Posyandu </h1>
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
                    $edpos     = trim(mysqli_real_escape_string($con, $_POST['edtnmapos']));
                    $eddusun    = trim(mysqli_real_escape_string($con, $_POST['edtdusun']));
                    $edrumah    = trim(mysqli_real_escape_string($con, $_POST['edtrmh']));
                    $edrw    = trim(mysqli_real_escape_string($con, $_POST['edtrw']));
                    $edrt    = trim(mysqli_real_escape_string($con, $_POST['edtrt']));
                    $idps    = trim(mysqli_real_escape_string($con, $_POST['idpsd2']));


                    

            $cekdata = mysqli_query($con, "SELECT * FROM tbl_lokasi_posyandu" )
            or die(mysqli_error($con));

            if (mysqli_num_rows($cekdata)<0)
            {
              ?>
              <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
              <script> 
              swal("Error", "Nama Posyandu yang diupdate sudah ada, silahkan ganti yang lain!", "error");

              setTimeout(function() {
              window.location.href = "../admin_datalokasi_posyandu";

              }, 2500);
              </script>
              <?php
            } else {

              $ambilidyangbarumasuk = mysqli_query($con,"SELECT id FROM tbl_dusun WHERE nama_dusun='$eddusun'") or die (mysqli_error($con));
            $arr = mysqli_fetch_assoc($ambilidyangbarumasuk);            
            if (mysqli_num_rows($ambilidyangbarumasuk)>0)
                {                              
                  $id_dusun = $arr['id'];                  
                }
                else
                {
                  $id_dusun="0";
                } 

                $ambilidrt = mysqli_query($con,"SELECT id FROM tbl_rt WHERE no_rt ='$edrt'") or die (mysqli_error($con));
            $arr = mysqli_fetch_assoc($ambilidrt);            
            if (mysqli_num_rows($ambilidrt)>0)
                {                            
                  $kd_rt = $arr['id'];                  
                }
                else
                {
                  $kd_rt="0";
                }

                $ambilidrt = mysqli_query($con,"SELECT id FROM tbl_rt WHERE no_rw ='$edrw'") or die (mysqli_error($con));
            $arr = mysqli_fetch_assoc($ambilidrt);            
            if (mysqli_num_rows($ambilidrt)>0)
                {                            
                  $kd_rw = $arr['id'];                  
                }
                else
                {
                  $kd_rw="0";
                }

                
                    
            mysqli_query($con, "UPDATE tbl_lokasi_posyandu SET nama_posyandu = '$edpos', kode_dusun='$id_dusun', dusun = '$eddusun', rumah = '$edrumah',
            kode_rw='$kd_rw', rw = '$edrw', kode_rt='$kd_rt', rt = '$edrt' WHERE id='$idps'")or die(mysqli_error($con)); 

            mysqli_query($con, "UPDATE tbl_pengukuran_imunisasi SET posyandu= '$edpos' WHERE kode_psd='$idps'")

            or die(mysqli_error($con));
            ?>
              <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
              <script> 
              swal("Sukses", "Data Telah Diedit", "success");

              setTimeout(function() {
              window.location.href = "../admin_datalokasi_posyandu";

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

