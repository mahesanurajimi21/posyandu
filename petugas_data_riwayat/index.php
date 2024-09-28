<!DOCTYPE html>
<html lang="en">
<head>
  
<?php 
  require_once "../database/config.php"; 
  include '../list_head_link.php';
  $halaman = 'petugas_datariwayat';
  session_start();
  $peran = "Petugas";
  

  if ($_SESSION['peran']!=$peran)
  // if (!isset($_SESSION['nip']))
  {
    echo "<script>window.location='../auth';</script>";
  } else

  {

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
            <h1 class="m-0">Riwayat Pengukuran</h1>
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
              <!-- <input type="date" class="btn btn-default btn-md"> -->

              <!-- <a href="tambahpengguna.php" class="btn btn-default btn-md" style="background-color:#001f3f;"
               role="button"><font color ="#fffff"><i class="nav-icon fas fa-plus"></i>Tambah Data</font></a> -->
               
              

                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th style="width:5%">NO</th>
                    <th>Nama</th>
                    <th>No NIK</th>
                    <th>Tanggal Imunisasi</th>
                    <th>Imunisasi Ke</th>
                    <th>Usia</th>
                    <th>Suhu Tubuh</th>
                    <th>BB(Kg)</th>
                    <th>TB(Cm)</th>
                    <th>Vitamin</th>
                    <th>Keterangan</th>
                    <th>Vaksin</th>
                    <th>Posyandu</th>
                                                
                    <!-- <th style="width:20%"><center>ACTION</center></th> -->
                  </tr>
                  </thead>
                  
                  <tbody>
                  <?php
                    $no=1;
                    $sql_pengguna = mysqli_query($con, " SELECT * FROM tbl_pengukuran_imunisasi") or die (mysqli_error($con));

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

                                <td>
                                <?php
                                  $id = $data['id'];
                                  $panggilpeseta = mysqli_query($con,"SELECT nama_anak FROM tbl_pengukuran_imunisasi WHERE id='$id'") or die (mysqli_error($con));
                                  $array = mysqli_fetch_assoc($panggilpeseta);
                                  $namaibu = $array['nama_anak'];
                                  ?>
                                  <?=$namaibu;?>                                
                                </td>

                                <td>
                                <?php
                                  $id = $data['id'];
                                  $panggilpeseta = mysqli_query($con,"SELECT nonik FROM tbl_pengukuran_imunisasi WHERE id='$id'") or die (mysqli_error($con));
                                  $array = mysqli_fetch_assoc($panggilpeseta);
                                  $na = $array['nonik'];
                                  ?>
                                  <?=$na;?>                                
                                </td>
                               
                                <td>
                                <?=$data['tanggal'];?>
                                </td>

                                <td>
                                <?=$data['pengukuran_ke'];?>
                                </td>

                                <td>
                                <?=$data['usia'];?> Bulan
                                </td>

                                <td>
                                <?=$data['suhu_tubuh'];?> °C
                                </td>

                                <td>
                                <?=$data['berat_badan'];?> Kg
                                </td>

                                <td>
                                <?=$data['tinggi_badan'];?> Cm
                                </td>

                                <td>
                                <?=$data['vitamin'];?>
                                </td>

                                <td>
                                <?=$data['keterangan'];?>
                                </td>

                                <td>
                                <?=$data['vaksin'];?>
                                </td>

                                <td>
                                <?=$data['posyandu'];?>
                                </td>
                                

                                <!-- <td>
                                  <?php
                                  $nkk = $data['nkk'];
                                  $panggilpeseta = mysqli_query($con,"SELECT nama_ibu FROM tbl_peserta WHERE nkk='$nkk'") or die (mysqli_error($con));
                                  $array = mysqli_fetch_assoc($panggilpeseta);
                                  $namaibu = $array['nama_ibu'];
                                  ?>
                                  <?=$namaibu;?>
                                </td> -->

                                <!-- <td>
                                <center>
                                <a class="btn btn-xs bg-gradient-primary" href="pengukuran.php?no_nik=<?=$data['nik'];?> & namanak=<?=$data['nama_anak'];?>">
                                <i class="nav-icon fas fa-clipboard">&nbsp</i>Pengukuran</a>
                                </td> -->
                                  
                        </tr>
                        <?php
                        }
                    } 
                    else 
                    {
                        echo "<tr><td colspan=\"7\" align=\"center\"><h6><b>Data Tidak Ditemukan</b></h6></td></tr>";
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
      "buttons": ["print", "colvis"]
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
