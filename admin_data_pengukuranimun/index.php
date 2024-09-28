<!DOCTYPE html>
<html lang="en">
<head>
  
<?php 
  require_once "../database/config.php"; 
  include '../list_head_link.php';
  $halaman = 'admin_datapengukuran';
  session_start();
  $peran = "admin";
  // skrip diatas require_once "../database/config.php"; (agar memunculkan data pengguna)

  if ($_SESSION['peran']!=$peran)
  // if (!isset($_SESSION['nip']))
  {
    echo "<script>window.location='../auth';</script>";
  } 
  else
  {
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
            <h1 class="m-0">Pelayanan Imunisasi</h1>
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

          <div class="card">
            <div class="card-header" style="background-color:#4682B4">
               <h3 class="card-title"><font color ="#fffff"><i class="nav-icon fas fa-users">&nbsp</i> Data Peserta</font></h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="width:5%">NO</th>
                      <!-- <th >No NIK</th> -->
                      <th >NIK</th>
                      <th >Nama Anak</th>
                      <th> Tanggal Lahir</th>
                      <th >Jenis Kelamin</th>
                      <th >Nama Ibu</th>
                      <th >Nama Ayah</th>        
                      <th ><center>Aksi</center></th>
                    </tr>
                    </thead>
                  
                  <tbody>
                  <?php
                    $no=1;
                    $sql_pengguna = mysqli_query($con, " SELECT * FROM tbl_anak ") or die (mysqli_error($con));
                    // $ceknilaikembali = mysqli_num_rows($sql_pengguna);
                    // echo $ceknilaikembali;
                    if(mysqli_num_rows($sql_pengguna) > 0)
                    {
                        while($data = mysqli_fetch_array($sql_pengguna))
                        {
                            ?>
                            <tr>
                                <td>
                                <?=$no++;?>
                                </td>

                                <!-- <td>
                                <?=$data['nik'];?>
                                </td> -->

                                <td>
                                <?=$data['nonik'];?>
                                </td>
                               
                                <td>
                                <?=$data['nama_anak'];?>
                                </td>

                                <td>
                                <?=$data['tanggal_lahir'];?>
                                </td>

                                <td>
                                <?=$data['jenis_kelamin'];?>
                                </td>

                                <td>
                                  <?php
                                  $nkk = $data['nkk'];
                                  $panggilpeseta = mysqli_query($con,"SELECT nama_ibu FROM tbl_peserta WHERE nkk='$nkk'") or die (mysqli_error($con));
                                  $array = mysqli_fetch_assoc($panggilpeseta);
                                  $namaibu = $array['nama_ibu'];
                                  ?>
                                  <?=$namaibu;?>
                                </td>

                                <td>
                                <?php
                                  $nkk = $data['nkk'];
                                  $panggilpeseta = mysqli_query($con,"SELECT nama_ayah FROM tbl_peserta WHERE nkk='$nkk'") or die (mysqli_error($con));
                                  $array = mysqli_fetch_assoc($panggilpeseta);
                                  $namaayah = $array['nama_ayah'];
                                  ?>
                                  <?=$namaayah;?>
                                </td>

                                <td>
                                <center>
                                <a class="btn btn-xs bg-gradient"style="background-color:#4682B4" href="pengukuran.php?no_nik=<?=$data['nik'];?> & namanak=<?=$data['nama_anak'];?>">
                                <font color="#fffff"><i class="nav-icon fas fa-clipboard">&nbsp</i>Pengukuran</a></font>

                                <a href="#" class="btn btn-xs bg-gradient-success" role="button" onclick="window.open('print.php?nik=<?=$data['nik'];?>&anak=<?=$data['nama_anak'];?>&namaibu=<?= $namaibu;?>&nkk=<?= $nkk;?>&namaayah=<?= $namaayah;?>&kelamin=<?=$data['jenis_kelamin'];?>&tgllahir=<?=$data['tanggal_lahir'];?>', 
                                'newwindow','width=800,height=600'); 
                                return false;" ><i class="nav-icon fas fa-print">&nbsp</i>Print</a>
  
                                 </td>
                                  
                        </tr>
                        <?php
                        }
                    } 
                    else 
                    {
                        echo "<tr><td colspan=\"3\" align=\"center\"><h6><b>Data Tidak Ditemukan</b></h6></td></tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

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
<!-- <script src="../assets_adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
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

</body>
</html>
<?php
  }
  ?>
