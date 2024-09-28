<!DOCTYPE html>
<html lang="en">
<head>
  
<?php 
  include '../list_head_link.php';
  $halaman = 'petugas_datapengukuran';
  session_start();
  require_once "../database/config.php"; 
  // skrip diatas require_once "../database/config.php"; (agar memunculkan data pengguna)
?>

</head>

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
            <h1 class="m-0">Data Pengukuran </h1>
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
                    $idpngukuran      = trim(mysqli_real_escape_string($con, $_POST['idpgk2']));
                    $edittanggal      = trim(mysqli_real_escape_string($con, $_POST['edttanggal']));
                    $editpengukuran   = trim(mysqli_real_escape_string($con, $_POST['edtpengukuran']));
                    $editusia         = trim(mysqli_real_escape_string($con, $_POST['edtusia']));
                    $editsuhu         = trim(mysqli_real_escape_string($con, $_POST['edtsuhu']));
                    $editbb           = trim(mysqli_real_escape_string($con, $_POST['edtbb']));
                    $edittb           = trim(mysqli_real_escape_string($con, $_POST['edttb']));
                    $editvitamin      = trim(mysqli_real_escape_string($con, $_POST['edtvit']));
                    $editketerangan   = trim(mysqli_real_escape_string($con, $_POST['edtketerangan']));
                    $editvaksin       = trim(mysqli_real_escape_string($con, $_POST['edtvaksin']));
                    $editposyandu     = trim(mysqli_real_escape_string($con, $_POST['edtposyandu']));
        
            $cekdata = mysqli_query($con, "SELECT * FROM tbl_pengukuran_imunisasi" )or die(mysqli_error($con));
            if (mysqli_num_rows($cekdata)<0)

            {
              ?>
              <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
              <script> 
              swal("Error", "Vitamin yang diupdate sudah ada, silahkan ganti yang lain!", "error");
              setTimeout(function() {
              window.location.href = "pengukuran.php?no_nik=<?=$nmrnik;?>& namanak=<?=$nmanak;?>";

              }, 2500);
              </script>
              <?php
            } else {

            $ambilidyangbarumasuk = mysqli_query($con,"SELECT id FROM tbl_vitamin WHERE nama_vitamin='$editvitamin'") or die (mysqli_error($con));
            $arr = mysqli_fetch_assoc($ambilidyangbarumasuk);            
            if (mysqli_num_rows($ambilidyangbarumasuk)>0)
                {
                  $erre2  = mysqli_fetch_assoc($ambilidyangbarumasuk);            
                  $kd_vit = $arr['id'];
                  
                }
                else
                {
                  $kd_vit="0";
                }
            
            $ambilidyangbarumasuk = mysqli_query($con,"SELECT id FROM tbl_vaksin WHERE nama_vaksin='$editvaksin'") or die (mysqli_error($con));
            $arr = mysqli_fetch_assoc($ambilidyangbarumasuk);           
            if (mysqli_num_rows($ambilidyangbarumasuk)>0)
                {
                  $erre2  = mysqli_fetch_assoc($ambilidyangbarumasuk);            
                  $kd_vak = $arr['id'];
                  
                }
                else
                {
                  $kd_vak="0";
                }
                
                $ambilidyangbarumasuk = mysqli_query($con,"SELECT id FROM tbl_lokasi_posyandu WHERE nama_posyandu='$editposyandu'") or die (mysqli_error($con));
            $arr = mysqli_fetch_assoc($ambilidyangbarumasuk);           
            if (mysqli_num_rows($ambilidyangbarumasuk)>0)
                {
                  $erre2  = mysqli_fetch_assoc($ambilidyangbarumasuk);            
                  $kd_posyandu = $arr['id'];
                  
                }
                else
                {
                  $kd_posyandu="0";
                }

                
                    
            mysqli_query($con, "UPDATE tbl_pengukuran_imunisasi SET kode_vaksin='$kd_vak', kode_vitamin='$kd_vit', tanggal='$edittanggal', pengukuran_ke='$editpengukuran',
            usia='$editusia', suhu_tubuh='$editsuhu', berat_badan='$editbb', tinggi_badan='$edittb', vitamin='$editvitamin',
            keterangan='$editketerangan', vaksin ='$editvaksin', kode_psd='$kd_posyandu', posyandu='$editposyandu'WHERE id='$idpngukuran'")
            or die(mysqli_error($con)); 

            ?>
              <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
              <script> 
              swal("Sukses", "Data Berhasil Diedit", "success");
              setTimeout(function() {
              window.location.href = "pengukuran.php?no_nik=<?=$nmrnik;?>& namanak=<?=$nmanak;?>";

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
  <aside class="control-sidebar control-sidebar-dark"></aside>
  
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

