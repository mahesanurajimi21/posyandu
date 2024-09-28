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
          <div class="col-lg-6">

          <?php
            if(isset($_POST['simpan']))
        {
            $nmrnik           = $_GET['no_nik'];
            $nmanak           = $_GET['namanak'];
            $smpntanggal      = trim(mysqli_real_escape_string($con, $_POST['tang']));
            $smpnpengukuran   = trim(mysqli_real_escape_string($con, $_POST['tbhpengukuran']));
            $smpnusia         = trim(mysqli_real_escape_string($con, $_POST['tbhusia']));
            $smpnsuhu         = trim(mysqli_real_escape_string($con, $_POST['tbhsuhu']));
            $smpnbb           = trim(mysqli_real_escape_string($con, $_POST['tbhbb']));
            $smpntb           = trim(mysqli_real_escape_string($con, $_POST['tbhtb']));
            $smpnvitamin      = trim(mysqli_real_escape_string($con, $_POST['tbhvitamin']));
            $smpnketerangan   = trim(mysqli_real_escape_string($con, $_POST['tbhketerangan']));
            $smpnvaksin       = trim(mysqli_real_escape_string($con, $_POST['tbhvaksin']));
            $smpnposyandu     = trim(mysqli_real_escape_string($con, $_POST['tbhposyandu']));        
                    
            $cekdata = mysqli_query($con, "SELECT * FROM tbl_pengukuran_imunisasi")
            or die(mysqli_error($con)); 

            if (mysqli_num_rows($cekdata) < 0)
            {
                ?>
              <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
              <script> 
              swal("Error", "Pengkuran Sudah Ada, Silahkan Pilih Pengukuran Selanjutnya", "error");

              setTimeout(function() {
              window.location.href = "pengukuran.php?no_nik=<?=$nmrnik;?>& namanak=<?=$nmanak;?>";

              }, 2000);
              </script>

                    <?php 
            }   else 
            {

              $ambilidyangbarumasuk = mysqli_query($con,"SELECT id FROM tbl_vitamin WHERE nama_vitamin='$smpnvitamin'") or die (mysqli_error($con));
              $arr = mysqli_fetch_assoc($ambilidyangbarumasuk);           
              if (mysqli_num_rows($ambilidyangbarumasuk)>0)
                  {
                    $erre2  = mysqli_fetch_assoc($ambilidyangbarumasuk);            
                    $kodevitamin = $arr['id'];
                    
                  }
                  else
                  {
                    $kodevitamin="0";
                  }

              $ambilidyangbarumasuk = mysqli_query($con,"SELECT id FROM tbl_vaksin WHERE nama_vaksin='$smpnvaksin'") or die (mysqli_error($con));
              $arr = mysqli_fetch_assoc($ambilidyangbarumasuk);
              
              if (mysqli_num_rows($ambilidyangbarumasuk)>0)
                  {
                    $erre2  = mysqli_fetch_assoc($ambilidyangbarumasuk);            
                    $kodevaksin = $arr['id'];
                    
                  }
                  else
                  {
                    $kodevaksin="0";
                  }

                  $ambilidyangbarumasuk = mysqli_query($con,"SELECT id FROM tbl_lokasi_posyandu WHERE nama_posyandu='$smpnposyandu'") or die (mysqli_error($con));
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

                $ambilidyangbarumasuk = mysqli_query($con,"SELECT nonik FROM tbl_anak WHERE nik='$nmrnik'") or die (mysqli_error($con));
              $arr = mysqli_fetch_assoc($ambilidyangbarumasuk);              
              if (mysqli_num_rows($ambilidyangbarumasuk)>0)
                  {                       
                    $kdnonik = $arr['nonik'];
                    
                  }
                  else
                  {
                    $kdnonik="0";
                  }

                  $ambilidyangbarumasuk = mysqli_query($con,"SELECT kode_peserta FROM tbl_anak WHERE nik='$nmrnik'") or die (mysqli_error($con));
              $arr = mysqli_fetch_assoc($ambilidyangbarumasuk);              
              if (mysqli_num_rows($ambilidyangbarumasuk)>0)
                  {                       
                    $nkk_anak = $arr['kode_peserta'];
                    
                  }
                  else
                  {
                    $nkk_anak="0";
                  }

                 

              mysqli_query($con, "INSERT INTO tbl_pengukuran_imunisasi VALUES ('$nmrnik', '$nkk_anak', '$kdnonik','$nmanak','','$smpntanggal','$smpnpengukuran','$smpnusia',
              '$smpnsuhu', '$smpnbb','$smpntb', '$kodevitamin','$smpnvitamin','$smpnketerangan','$kodevaksin','$smpnvaksin','$kd_posyandu','$smpnposyandu')")
            or die(mysqli_error($con));
            ?>
              <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
              <script> 
              swal("Sukses", "Data Telah Ditambahkan", "success");

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
<!-- <script src="../assets_adminlte/dist/js/adminlte.min.js"></script> -->
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

<script src=".../assets_adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../assets_adminlte/plugins/toastr/toastr.min.js"></script>

</script>
</body>
</html>

