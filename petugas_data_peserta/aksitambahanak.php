<!DOCTYPE html>
<html lang="en">
<head>
  
<?php
 
  include '../list_head_link.php';
  require_once "../database/config.php";
  session_start(); 
  $halaman = 'petugas_datapeserta';
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
            <h1 class="m-0">Data Peserta</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">

          <?php
            require_once "../database/config.php";

            $kodepeserta    = $_GET['kode_peserta'];
            $kkanak         = $_GET['no_kk'];
            $nikanak        = trim(mysqli_real_escape_string($con, $_POST['nikank']));
            $nmaanak        = trim(mysqli_real_escape_string($con, $_POST['nmaank']));
            $tmptlhiranak   = trim(mysqli_real_escape_string($con, $_POST['tmplahir']));
            $tgllahiranak   = trim(mysqli_real_escape_string($con, $_POST['tgllahir']));
            $jnsk           = trim(mysqli_real_escape_string($con, $_POST['jnskel']));
            $rwanak         = trim(mysqli_real_escape_string($con, $_POST['rwank']));
            $rtanak         = trim(mysqli_real_escape_string($con, $_POST['rtank']));
            $dsnanak        = trim(mysqli_real_escape_string($con, $_POST['dsunank']));

            $sql_cek_pengguna = mysqli_query($con, "SELECT * FROM tbl_anak") or die(mysqli_error($con));
            $cekdata          = mysqli_num_rows($sql_cek_pengguna);

                if ($cekdata < 0)
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
                }
                else
                {

                  $ambilidyangbarumasuk = mysqli_query($con,"SELECT id FROM tbl_dusun WHERE nama_dusun='$dsnanak'") or die (mysqli_error($con));
                  $arr = mysqli_fetch_assoc($ambilidyangbarumasuk);                  
                  if (mysqli_num_rows($ambilidyangbarumasuk)>0)
                      {                                
                        $kddusun = $arr['id'];                    
                      }
                      else
                      {
                        $kddusun="0";
                      }

                      $ambilidyangbarumasuk = mysqli_query($con,"SELECT id FROM tbl_rt WHERE no_rt='$rtanak'") or die (mysqli_error($con));
              $arr = mysqli_fetch_assoc($ambilidyangbarumasuk);              
              if (mysqli_num_rows($ambilidyangbarumasuk)>0)
                  {
                    $erre2  = mysqli_fetch_assoc($ambilidyangbarumasuk);            
                    $kodert = $arr['id'];
                    
                  }
                  else
                  {
                    $kodert="0";
                  }

              $ambilidyangbarumasuk = mysqli_query($con,"SELECT id FROM tbl_rt WHERE no_rw='$rwanak'") or die (mysqli_error($con));
              $arr = mysqli_fetch_assoc($ambilidyangbarumasuk);              
              if (mysqli_num_rows($ambilidyangbarumasuk)>0)
                  {
                    $erre2  = mysqli_fetch_assoc($ambilidyangbarumasuk);            
                    $koderw = $arr['id'];
                    
                  }
                  else
                  {
                    $koderw="0";
                  }

                      

                  mysqli_query($con, "INSERT INTO tbl_anak VALUES ('$kodepeserta','$kkanak', '','$nikanak','$nmaanak',
                      '$tmptlhiranak','$tgllahiranak','$jnsk', '$koderw','$rwanak','$kodert','$rtanak', '$kddusun','$dsnanak')")
                      or die(mysqli_error($con));  
                  ?>
                  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                  <script> 
                  swal("Success", "Data Berhasil Ditambahkan", "success");

                  setTimeout(function() {
                  window.location.href = "dataanak.php?no_kk=<?=$kkanak;?>&kode_peserta=<?=$kodepeserta;?>";

                  }, 1500);
                  </script>
                <?php
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
<script src="../assets_adminlte/plugins/jquery/jquery.min.js"></>
<!-- Bootstrap -->
<script src="../assets_adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="../assets_adminlte/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../assets_adminlte/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
//  <script src="assets_adminlte/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets_adminlte/dist/js/pages/dashboard3.js"></script>
<script src="../assets_adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets_adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../assets_adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets_adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets_adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets_adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets_adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets_adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../assets_adminlte/plugins/jszip/jszip.min.js"></script>
<script src="../assets_adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../assets_adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../assets_adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../assets_adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../assets_adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets_adminlte/dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
