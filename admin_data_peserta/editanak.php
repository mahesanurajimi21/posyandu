<!DOCTYPE html>
<html lang="en">
<head>
  
<?php 
  include '../list_head_link.php';
  $halaman = 'admin_datapeserta';
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
            <h1 class="m-0">Edit Data Anak </h1>
            <?php
          
            ?>
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
         

                    $nnik         = trim(mysqli_real_escape_string($con, $_POST['newnik']));
                    $nikka       = trim(mysqli_real_escape_string($con, $_POST['nibu2']));
                    $aranank     = trim(mysqli_real_escape_string($con, $_POST['arananak']));
                    $tmpan       = trim(mysqli_real_escape_string($con, $_POST['tmpanak']));
                    $tglan       = trim(mysqli_real_escape_string($con, $_POST['tglanak']));
                    $jnsk        = trim(mysqli_real_escape_string($con, $_POST['jkanak']));
                    $rwan        = trim(mysqli_real_escape_string($con, $_POST['rwanak']));
                    $rtan        = trim(mysqli_real_escape_string($con, $_POST['rtanak']));
                    $dsun        = trim(mysqli_real_escape_string($con, $_POST['dsunank']));

                    // echo "UPDATE tbl_anak SET  nik='$nikka', ... WHERE nik='$nikka'";


            $cekdata = mysqli_query($con, "SELECT * FROM tbl_anak")
            or die(mysqli_error($con));

            if (mysqli_num_rows($cekdata)<0)
            {
              ?>
              <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                  <script> 
                  swal("Gagal", "Data Syudah ada dalah database", "error");

                  setTimeout(function() {
                  window.location.href = "dataanak.php?no_kk=<?=$kkanak;?>&kode_peserta=<?=$kodepeserta;?>";

                  }, 1000);
                  </script>
              <?php
            } else {

            $ambilidyangbarumasuk = mysqli_query($con,"SELECT id FROM tbl_dusun WHERE nama_dusun='$dsun'") or die (mysqli_error($con));
            $arr = mysqli_fetch_assoc($ambilidyangbarumasuk);
            if (mysqli_num_rows($ambilidyangbarumasuk)>0)
                {
                  $erre2  = mysqli_fetch_assoc($ambilidyangbarumasuk);            
                  $kodusun = $arr['id'];
                  
                }
                else
                {
                  $kodusun="0";
                }

                $ambilidrt = mysqli_query($con,"SELECT id FROM tbl_rt WHERE no_rt ='$rtan'") or die (mysqli_error($con));
            $arr = mysqli_fetch_assoc($ambilidrt);            
            if (mysqli_num_rows($ambilidrt)>0)
                {                            
                  $kd_rt = $arr['id'];                  
                }
                else
                {
                  $kd_rt="0";
                }

                $ambilidrt = mysqli_query($con,"SELECT id FROM tbl_rt WHERE no_rw ='$rwan'") or die (mysqli_error($con));
            $arr = mysqli_fetch_assoc($ambilidrt);            
            if (mysqli_num_rows($ambilidrt)>0)
                {                            
                  $kd_rw = $arr['id'];                  
                }
                else
                {
                  $kd_rw="0";
                }
                
                    
              mysqli_query($con, "UPDATE tbl_anak SET kode_dusun='$kodusun', nik='$nikka', nonik='$nnik', nama_anak='$aranank', tempat_lahir='$tmpan',
              tanggal_lahir='$tglan', jenis_kelamin='$jnsk', kode_rw='$kd_rw', rw='$rwan', kode_rt='$kd_rt', rt='$rtan', dusun='$dsun' WHERE nik='$nikka'")
              or die(mysqli_error($con));
              
              mysqli_query($con, "UPDATE tbl_pengukuran_imunisasi SET  nik='$nikka', nonik='$nnik', nama_anak='$aranank' WHERE nik='$nikka'")
              or die(mysqli_error($con));

            ?>
             <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                  <script> 
                  swal("Success", "Data Berhasil Ditambahkan", "success");

                  setTimeout(function() {
                  window.location.href = "dataanak.php?no_kk=<?=$nikka;?>&kode_peserta=<?=$kodepeserta;?>";

                  }, 1500);
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

