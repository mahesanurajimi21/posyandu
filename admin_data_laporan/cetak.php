<!DOCTYPE html>
<html lang="en">
<head>
  
<?php 
  require_once "../database/config.php"; 
  include '../list_head_link.php';
  $halaman = 'admin_datalaporan';
  session_start();
  $peran = "admin";
  

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
include '../sidebar.php';
?>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Data Laporan Pengukuran Anak Dari Semua Posyandu</h1>
            
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
               <h3 class="card-title"><font color ="#fffff"><i class="nav-icon fas fa-clipboard">&nbsp</i> Laporan Per Bulan</font></h3>
              </div>
<?php
 if(isset($_POST['btnTampil']))
 {

    $awal  = trim(mysqli_real_escape_string($con, $_POST['TglAwal']));
    $akhir  = trim(mysqli_real_escape_string($con, $_POST['TglAkhir']));  
    
 }
?>
              <!-- /.card-header -->
              <div class="card-body">
              <form role="form" class="form-layout" action="" method="post">													
                  <div class="row">
                    <div class="col-lg-3">
                      <input name="TglAwal" type="date" class="form-control" size="10" /> 
                    </div>
                    <div class="col-lg-3">
                    <input name="TglAkhir" type="date" class="form-control" size="10" />
                    </div>

                    <div class="col-lg-3">			
                    <input name="btnTampil" class="btn btn-warning" type="submit" value="Tampilkan" />

                    <a href="#" class="btn  btn-md" style="background-color:#4682B4" role="button" onclick="window.open('print.php?awal=<?=$awal;?>&akhir=<?=$akhir;?>', 
                'newwindow','width=800,height=800'); 
                return false;" ><font color ="#fffff"><i class="nav-icon fas fa-print">&nbsp</i>CETAK LAPORAN</font></a>
                    </div>	
                  </div>
                </form>  
                
                

              <table id="example2" class="table table-bordered table-striped">
                 <thead>
                  <tr>
                  <th style="width:5%">NO</th>
                    <th>Tgl Ukur</th>
                    <th>Anak</th>
                    <th>Usia</th>
                    <th>Ukur Ke</th>                   
                    <th>Suhu</th>
                    <th>BB(Kg)</th>
                    <th>TB(Cm)</th>
                    <th>Vitamin</th>
                    <th>Ket</th>
                    <th>Vaksin</th>
                    <th>Posyandu</th>                            
                    
                  </tr>
                  </thead>
                  
                  <tbody>
                    <?php
                    $urut = 1;
                    if(isset($_POST['btnTampil']))
                    {
                      $tglawal   = trim(mysqli_real_escape_string($con, $_POST['TglAwal']));
                      $tglahir   = trim(mysqli_real_escape_string($con, $_POST['TglAkhir']));

                      $panggildatabes = mysqli_query($con,"SELECT * FROM tbl_pengukuran_imunisasi WHERE tanggal BETWEEN '$tglawal' AND '$tglahir'") or die (mysqli_error($con));
                      if (mysqli_num_rows($panggildatabes)>0)
                      {
                        while($dataukur=mysqli_fetch_array($panggildatabes))
                        {
                          ?>
                          <tr>
                            <td>
                              <?=$urut++;?>
                            </td>

                            <td>
                                <?=$dataukur['tanggal'];?>
                                </td>

                                <td>
                                <?php
                                  $nkk = $dataukur['nik'];
                                  $panggilpeseta = mysqli_query($con,"SELECT nama_anak FROM tbl_anak WHERE nik='$nkk'") or die (mysqli_error($con));
                                  $array = mysqli_fetch_assoc($panggilpeseta);
                                  $namaanak = $array['nama_anak'];
                                  ?>
                                  <?=$namaanak;?>
                                </td>

                                <td>
                                <?=$dataukur['usia'];?> Bulan
                                </td>

                                <td>
                                <?=$dataukur['pengukuran_ke'];?>
                                </td>                                

                                <td>
                                <?=$dataukur['suhu_tubuh'];?> °C
                                </td>

                                <td>
                                <?=$dataukur['berat_badan'];?> Kg
                                </td>

                                <td>
                                <?=$dataukur['tinggi_badan'];?> Cm
                                </td>

                                <td>
                                <?=$dataukur['vitamin'];?>
                                </td>

                                <td>
                                <?=$dataukur['keterangan'];?>
                                </td>

                                <td>
                                <?=$dataukur['vaksin'];?>
                                </td>

                                <td>
                                <?=$dataukur['posyandu'];?>
                                </td>
                        </tr>
                          <?php
                        }
                      }

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
      "searching": false,
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
            <form role="form" class="form-layout" action="hapusvaksin.php" method="post">
            <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                  Anda Yakin Ingin Menghapus Data Ini?
                </div>
              <input type="text" name="dt_vaksin" id="dt_vaksin" >
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

      <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#8B0000;">
              <h5 class="modal-title"><font color="#ffffff">Tambah Data Pengukuran</font></h5>
            </div>
           <div class="modal-body">
          
           <form role="form" class="form-layout" action="tambahpengukuran.php" method="post">

            <div class="form-group">           
                <label for="exampleInputEmail1">Nama Anak</label>
                <input type="text" class="form-control" name="tbhanak" placeholder="nama Anak.." required autofocus>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Usia</label>
                <input type="text" class="form-control" name="tbhusia" placeholder="Per Bulan.." required autofocus>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Jenis Kelamin</label>
                <select name="tbhjk" id="tbhjk">
                <option>Laki-Laki</option>
                <option>Perempuan</option>
               </select>
                <!-- <input type="text" class="form-control" name="tbhjk" placeholder="nama vaksin.." required autofocus> -->
                <!-- <br><input type="radio" name="tbhjk" value="Laki-laki"> Laki-laki</br>
                <input type="radio" name="tbhjk" value="Perempuan"> Perempuan<br> -->
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Tanggal Pengukuran</label>
                <input type="date" class="form-control" name="tbhtgl" placeholder="nama vaksin.." required autofocus>
            </div>

            <div class="row" >
            <div class="form-group">          
                <label for="exampleInputEmail1">Berat Badan(Kg)</label>
                <center> <input type="text" class="form-control" name="tbhbb" placeholder="Kg.." required autofocus></center> 
            </div>
              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  
            <div class="form-group">           
                <label for="exampleInputEmail1">Tinggi Badan(Cm)</label>
                <center> <input type="text" class="form-control" name="tbhtb" placeholder="Cm.." required autofocus></center>
            </div>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Vaksin</label>
                <!-- <input type="text" class="form-control" name="tbhvaksin" placeholder="nama vaksin.." required autofocus> -->
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="tbhvaksin">
              <?php
               $sql_vaksin = mysqli_query($con, " SELECT * FROM tbl_vaksin") or die (mysqli_error($con));
                if (mysqli_num_rows($sql_vaksin) > 0)
                {
                  while($vks = mysqli_fetch_array($sql_vaksin))
                  {
                    ?>
                  <option value="" hidden selected>Pilih Vaksin..</option>

                   <option value="<?=$vks['nama_vaksin'];?>"> <?=$vks['nama_vaksin'];?> </option>
                    <?php
                  }

                } 
                else
                {
                  ?>
                    <option value="belum ada Vaksin"> belum ada Vaksin </option>
                    <?php
                }
                ?>
                </select>
            </div>
            
            <div class="form-group">           
                <label for="exampleInputEmail1">Posyandu</label>
                <!-- <input type="text" class="form-control" name="tbhpos" placeholder="Cm.." required autofocus> -->
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="tbhpos">
              <?php
               $sql_pos = mysqli_query($con, " SELECT * FROM tbl_lokasi_posyandu") or die (mysqli_error($con));
                if (mysqli_num_rows($sql_pos) > 0)
                {
                  while($pos = mysqli_fetch_array($sql_pos))
                  {
                    ?>
                  <option value="" hidden selected>Pilih Posyandu..</option>

                   <option value="<?=$pos['nama_posyandu'];?>"> <?=$pos['nama_posyandu'];?> </option>
                    <?php
                  }

                } 
                else
                {
                  ?>
                    <option value="belum ada Posyandu"> Belum Ada Posyandu </option>
                    <?php
                }
                ?>
                </select>
            </div>
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-md"  data-dismiss="modal">
                <i class="nav-icon fas fa-times">&nbsp</i>Tutup</button>
              <button type="submit" name ="simpan"class="btn btn-default btn-md"style="background-color:#1E90FF;">
              <font color="#ffffff"><i class="nav-icon fas fa-plus">&nbsp</i> Tambah</font></button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#8B0000;">
              <h5 class="modal-title"><font color="#ffffff">Edit Data RT dan RW</font></h5>
            </div>
            <div class="modal-body">
            <form role="form" class="form-layout" action="editvaksin.php" method="post">
            <div class="form-group">           
                <label for="exampleInputEmail1">ID</label>
                <input type="text" class="form-control" name="idpi"  disabled>
                <input type="text" class="form-control" name="idpi2" hidden>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Nama Anak</label>
                <input type="text" class="form-control" name="edtanak">
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Nama Usia</label>
                <input type="text" class="form-control" name="edtusia">
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Jenis Kelamin</label>
                <input type="text" class="form-control" name="edtjk">
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Tanggal Pengukuran</label>
                <input type="date" class="form-control" name="edttgl">
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">BB</label>
                <input type="text" class="form-control" name="edtbb">
            </div>
            <div class="form-group">           
                <label for="exampleInputEmail1">TB</label>
                <input type="text" class="form-control" name="edttb">
            </div>
            <div class="form-group">           
                <label for="exampleInputEmail1">Vaksin</label>
                <input type="text" class="form-control" name="edtvaksin">
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Posyandu</label>
                <input type="text" class="form-control" name="edtposyandu">
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-md"  data-dismiss="modal">
                <i class="nav-icon fas fa-times">&nbsp</i>Tutup</button>
              <button type="submit" name ="edit"class="btn btn-info btn-md"><i class="nav-icon fas fa-edit">&nbsp</i>Edit Data</font></button>
            </form>
            </div>
            
              </div>
          <!-- /.modal-content -->
           </div>
        <!-- /.modal-dialog -->
        </div>
      </div>
      <!-- /.modal -->

      <script type="text/javascript">
        $('#modal-default').on('show.bs.modal', function(e){
          //get data id attribute of the clicked element
          var vksin = $(e.relatedTarget).data('id');
          $(e.currentTarget).find('input[name="dt_vaksin"]').val(vksin);
         });
        </script> 

      <script type="text/javascript">
        $('#modal-edit').on('show.bs.modal', function(e){
          //get data id attribute of the clicked element
          var anak = $(e.relatedTarget).data('nama_anak');
          var usia = $(e.relatedTarget).data('usia');
          var jnsk = $(e.relatedTarget).data('jenis_kelamin');
          var tgluk = $(e.relatedTarget).data('tanggal');
          var brt = $(e.relatedTarget).data('berat_badan');
          var tgi = $(e.relatedTarget).data('tinggi_badan');
          var vksin = $(e.relatedTarget).data('vaksin');
          var psdu = $(e.relatedTarget).data('posyandu');
          var id = $(e.relatedTarget).data('id');

          $(e.currentTarget).find('input[name="edtanak"]').val(anak);
          $(e.currentTarget).find('input[name="edtusia"]').val(usia);
          $(e.currentTarget).find('input[name="edtjk"]').val(jnsk);
          $(e.currentTarget).find('input[name="edttgl"]').val(tgluk);
          $(e.currentTarget).find('input[name="edtbb"]').val(brt);
          $(e.currentTarget).find('input[name="edttb"]').val(tgi);
          $(e.currentTarget).find('input[name="edtvaksin"]').val(vksin);
          $(e.currentTarget).find('input[name="edtposyandu"]').val(psdu);
          $(e.currentTarget).find('input[name="idpi"]').val(id);
          $(e.currentTarget).find('input[name="idipi2"]').val(id);
  
        });
        </script>

</body>
</html>
<?php
  }
  ?>
