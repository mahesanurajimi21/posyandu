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
            <h1 class="m-0">Data Pengguna / Tambah Pengguna </h1>
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
          
                    $nkkpeserta   = trim(mysqli_real_escape_string($con, $_POST['nmerkk']));
                    $nikbunda     = trim(mysqli_real_escape_string($con, $_POST['nikibuu']));
                    $nmabunda     = trim(mysqli_real_escape_string($con, $_POST['nmaibuu']));
                    $nikbpa       = trim(mysqli_real_escape_string($con, $_POST['nikayhh']));
                    $nmabpa       = trim(mysqli_real_escape_string($con, $_POST['nmaayhh']));
                    $rwpsrta      = trim(mysqli_real_escape_string($con, $_POST['rwpsrt']));
                    $rtpsrta      = trim(mysqli_real_escape_string($con, $_POST['rtpsrt']));
                    $dusunpsrta   = trim(mysqli_real_escape_string($con, $_POST['dsunpsrtaa']));
                    $smpnhp       = trim(mysqli_real_escape_string($con, $_POST['tbhnohp']));



            $cekdata = mysqli_query($con, "SELECT * FROM tbl_peserta WHERE nkk='$nkkpeserta'OR nik_ibu='$nikbunda'")
            or die(mysqli_error($con)); 

            if (mysqli_num_rows($cekdata) > 0)
            {
                ?>
              <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
              <script> 
              swal("Error", "NKK dan NIK ibu sudah digunakan, silahkan ganti yang lain", "error");

              setTimeout(function() {
              window.location.href = "../admin_data_peserta";

              }, 1000);
              </script>
                    <?php 
            }   else 
            {

            $ambilidyangbarumasuk = mysqli_query($con,"SELECT id FROM tbl_dusun WHERE nama_dusun='$dusunpsrta'") or die (mysqli_error($con));
            $arr = mysqli_fetch_assoc($ambilidyangbarumasuk);           
            if (mysqli_num_rows($ambilidyangbarumasuk)>0)
                  {                                
                    $id_dusun = $arr['id'];                    
                  }
                  else
                  {
                    $id_dusun="0";
                  }

                  $ambilidyangbarumasuk = mysqli_query($con,"SELECT id FROM tbl_rt WHERE no_rt='$rtpsrta'") or die (mysqli_error($con));
              $arr = mysqli_fetch_assoc($ambilidyangbarumasuk);              
              if (mysqli_num_rows($ambilidyangbarumasuk)>0)
                  {           
                    $kodert = $arr['id'];
                    
                  }
                  else
                  {
                    $kodert="0";
                  }

              $ambilidyangbarumasuk = mysqli_query($con,"SELECT id FROM tbl_rt WHERE no_rw='$rwpsrta'") or die (mysqli_error($con));
              $arr = mysqli_fetch_assoc($ambilidyangbarumasuk);              
              if (mysqli_num_rows($ambilidyangbarumasuk)>0)
                  {                       
                    $koderw = $arr['id'];
                    
                  }
                  else
                  {
                    $koderw="0";
                  }

                mysqli_query($con, "INSERT INTO tbl_peserta VALUES ('$id_dusun','','$nkkpeserta','$nikbunda',
                '$nmabunda','$nikbpa','$nmabpa','$koderw','$rwpsrta', '$kodert', '$rtpsrta','$dusunpsrta','$smpnhp')")
            or die(mysqli_error($con));



            ?>
              <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
              <script> 
              swal("Sukses", "Data Telah Ditambahkan", "success");

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

<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            
            <div class="modal-body">
            <form role="form" class="form-layout" action="hapuspengguna.php" method="post">
            <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                  Anda Yakin Ingin Menghapus Data Ini?
                </div>
              <input type="text" name="nik_anak" id="nip_pengguna" hidden>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-md" data-dismiss="modal">
                <i class="nav-icon fas fa-times"></i>Batalkan</button>
              <button type="submit" class="btn btn-danger btn-md">
                <i class="nav-icon fas fa-trash"></i>Ya,Hapus Data</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <script type="text/javascript">
        $('#modal-default').on('show.bs.modal', function(e){
          //get data id attribute of the clicked element
          var kodeee = $(e.relatedTarget).data('kodee');
          $(e.currentTarget).find('input[name="nip_pengguna"]').val(kodee);
        });
        </script>
</body>
</html>

