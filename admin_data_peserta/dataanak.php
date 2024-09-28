<!DOCTYPE html>
<html lang="en">
<head>
  
<?php 
  require_once "../database/config.php"; 
  include '../list_head_link.php';
  $halaman = 'admin_datapeserta';
  session_start();
  $peran = "admin";

  $nkk = $_GET['no_kk'];
  $kdps = @$_GET['kode_peserta'];

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
            <h1 class="m-0">Data Peserta </h1>
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
                <h3 class="card-title"><font color ="#fffff"><i class="nav-icon fas fa-child">&nbsp</i> Data Anak Dari Nomer KK : <b> <?=$nkk;?></b></font></h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
              <!-- <a href="tambahpengguna.php" class="btn btn-default btn-md" style="background-color:#001f3f;"
               role="button"><font color ="#fffff"><i class="nav-icon fas fa-plus"></i>Tambah Data</font></a> -->
               <a class="btn btn-md bg-gradient-warning" href="../admin_data_peserta"><i class="nav-icon fas fa-chevron-left">&nbsp</i> Kembali</a>
               <button type="button" class="btn btn-md bg-gradient"style="background-color:#4682B4"data-toggle="modal" data-target="#modal-tambah">
               <font color ="#fffff"> <i class="nav-icon fas fa-plus">&nbsp</i>Tambah Data </font></button>
                   
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width:5%">NO</th>
                    <!-- <th>No NIK</th> -->
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th style="width:3%">RW</th>
                    <th style="width:3%">RT</th>
                    <th>Dusun</th>
                    <th><center>Aksi</center></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no=1;
                    $sql_pengguna = mysqli_query($con, " SELECT * FROM tbl_anak WHERE kode_peserta='$kdps'") or die (mysqli_error($con));
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
                                <?=$data['tempat_lahir'];?>
                                </td>

                                <td>
                                <?=$data['tanggal_lahir'];?>
                                </td>

                                <td>
                                <?=$data['jenis_kelamin'];?>
                                </td>
                                
                                <td>
                                <?=$data['rw'];?>
                                </td>

                                <td>
                                <?=$data['rt'];?>
                                </td>
                                
                                <td>
                                <?=$data['dusun'];?>
                                </td>

                                <td>
                                <center>
                                <button type="button" class="btn btn-xs bg-gradient-warning"
                                 data-toggle="modal" data-target="#modal-edit"data-nkk="<?=$data['nkk'];?>"data-nik="<?=$data['nik'];?>" data-nonik="<?=$data['nonik'];?>"
                                 data-nama_anak="<?=$data['nama_anak'];?>" data-tempat_lahir="<?=$data['tempat_lahir'];?>"
                                 data-tanggal_lahir="<?=$data['tanggal_lahir'];?>" data-jenis_kelamin="<?=$data['jenis_kelamin'];?>"
                                 data-rw="<?=$data['rw'];?>" data-rt="<?=$data['rt'];?>"
                                 data-dusun="<?=$data['dusun'];?>"
                                 ><i class="nav-icon fas fa-edit">&nbsp</i>Edit</button>

                                <button type="button" class="btn btn-xs bg-gradient-danger"
                                 data-toggle="modal" data-target="#modal-default"
                                 data-nik="<?=$data['nik'];?>"
                                 data-nonik="<?=$data['nonik'];?>">
                                 <i class="nav-icon fas fa-trash">&nbsp</i>Hapus</button>
                                  </center>
                                 </td>
                                  
                        </tr>
                        <?php
                        }
                    } 
                    else 
                    {
                        echo "<tr><td colspan=\"10\" align=\"center\"><h6><b>Data Tidak Ditemukan</b></h6></td></tr>";
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

<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            
            <div class="modal-body">
            <form role="form" class="form-layout" action="aksihapusanak.php" method="post">
            <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                  Anda Yakin Ingin Menghapus Data Ini?
                </div>
                <label for="exampleInputEmail1">Nomor NIK</label></br>
              <input type="text" name="hapusanak" id="hapusanak"hidden>
              <input type="text" name="busek" id="busek"disabled>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-md" data-dismiss="modal">
                <i class="nav-icon fas fa-times">&nbsp</i>Batalkan</button>
              <button type="submit" class="btn btn-danger btn-md">
                <i class="nav-icon fas fa-trash">&nbsp</i>Ya,Hapus Data</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- ======================MODAL TAMBAH DATA ANAK==================================== -->

      <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header" style="background-color:#4682B4;">
              <h5 class="modal-title"><font color="#ffffff">Tambah Data Anak</font></h5>
            </div>
            <div class="modal-body">
            <form role="form" class="form-layout" action="aksitambahanak.php?no_kk=<?=$nkk;?>&kode_peserta=<?=$kdps;?>" method="post">
          
            <!-- <div class="form-group">           
                <label for="exampleInputEmail1">No NIK</label>
                <input type="number" onkeyPress="if(this.value.length==16) return false;" class="form-control" name="nikank" placeholder="Nik anak..."required>
            </div> -->

            <div class="form-group">           
                <label for="exampleInputEmail1">NIK</label>
                <input type="number" onkeyPress="if(this.value.length==16) return false;" class="form-control" name="nikank" placeholder="Nomor NIK..."required>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" class="form-control" name="nmaank"placeholder="Nama anak..."required>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Tempat, Tanggal Lahir</label>
                <input type="text" class="form-control" name="tmplahir"placeholder="Tempat Lahir..."required>&nbsp
                <input type="date" class="form-control" name="tgllahir"placeholder="Tanggal Lahir..."required>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Jenis Kelamin</label>        
                <!-- <input type="text" class="form-control" name="jnskel"placeholder="Jenis Kelamin..."required> -->
                <select name="jnskel" id="jnskel">
                <option>Laki-Laki</option>
                <option>Perempuan</option>
               </select>              
            </div>
                       
            <div class="row">
            <div class="form-group"> &nbsp&nbsp&nbsp     
                <label for="exampleInputEmail1">RW</label> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <!-- <input type="text" class="form-control" name="rwank"placeholder="rw..."required> -->
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="rwank">
              <?php
               $sql_rwanak = mysqli_query($con, " SELECT * FROM tbl_rt") or die (mysqli_error($con));
                if (mysqli_num_rows($sql_rwanak) > 0)
                {
                  while($prw = mysqli_fetch_array($sql_rwanak))
                  {
                    ?>
                    <option value="" hidden selected>Pilih Rw..</option>
                    <option value="<?=$prw['no_rw'];?>"> <?=$prw['no_rw'];?> </option>
                    <?php
                  }
                } 
                else
                {
                  ?>
                  <option value="belum ada Rw"> belum ada dusun </option>
                <?php
                }
                ?>
                </select>
            </div>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <div class="form-group">           
                <label for="exampleInputEmail1">RT</label>
                <!-- <input type="text" class="form-control" name="rtank"placeholder="rt..."required> -->
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="rtank">
              <?php
               $sql_rtanak = mysqli_query($con, " SELECT * FROM tbl_rt") or die (mysqli_error($con));
                if (mysqli_num_rows($sql_rtanak) > 0)
                {
                  while($prt = mysqli_fetch_array($sql_rtanak))
                  {
                    ?>
                  <option value="" hidden selected>Pilih Rt..</option>
                  <option value="<?=$prt['no_rw'];?>"> <?=$prt['no_rw'];?> </option>
                    <?php
                  }
                } 
                else
                {
                  ?>
                    <option value="belum ada Rw"> belum ada dusun </option>
                    <?php
                }
                ?>
                    </select>
                </div> 
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Dusun</label>
                <!-- <input type="text" class="form-control" name="dsunank"placeholder="Dusun..."required> -->
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="dsunank">
              <?php
               $sql_dusunank = mysqli_query($con, " SELECT * FROM tbl_dusun") or die (mysqli_error($con));
               // skrip diatas berfungsi untuk memanggil tabel dusun
                if (mysqli_num_rows($sql_dusunank) > 0)
                // skrip diatas berfungsi untuk apakah ditabel dusun ada isinya
                  {
                    while($dusunank = mysqli_fetch_array($sql_dusunank))
                    // skrip diatas berfungsi untuk pengulangan yang diambil dari tabel dusun
                    {
                    ?>
                    <option value="" hidden selected>Pilih Dusun..</option>
                    <option value="<?=$dusunank['nama_dusun'];?>"> <?=$dusunank['nama_dusun'];?> </option>
                    <!-- skrip diatas berfungsi untuk menampilkan beberapa opsi isi data yang ada pada tabel dusun kolom nama_dusun -->
                      <?php
                    }
                  } 
                else
                {
                  ?>
                    <option value="belum ada dusun"> belum ada dusun </option>
                    <!-- skrip diatas berfungsi jika ditabel dusun belum ada isinya -->
                    <?php
                }
                ?>
                </select>
            </div>
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-md"  data-dismiss="modal">
                <i class="nav-icon fas fa-times">&nbsp</i>Tutup</button>
              <button type="submit" name ="simpan"class="btn btn-default btn-md"style="background-color:#4682B4">
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

      <!-- ============================MODAL EDIT DATA ANAK================================================= -->
      <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header" style="background-color:#4682B4;">
              <h5 class="modal-title"><font color="#ffffff">Edit Data Anak</font></h5>
            </div>
            <div class="modal-body">
            <form role="form" class="form-layout" action="editanak.php" method="post">

            

            <div class="form-group">           
                <label for="exampleInputEmail1">ID</label>
                <input type="number" class="form-control" name="nibu"disabled>
                <input type="number" class="form-control" name="nibu2"hidden>

            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">NIK</label>
                <input type="number" onkeyPress="if(this.value.length==16) return false;" class="form-control" name="newnik"placeholder="nik " required>
            </div>
            
            <div class="form-group">           
                <label for="exampleInputEmail1">Nama Anak</label>
                <input type="text" class="form-control" name="arananak"placeholder="Nama anak"required>
            </div>
            
            <div class="form-group">           
                <label for="exampleInputEmail1">Tempat, Tanggal Lahir</label>
                <input type="text" class="form-control" name="tmpanak"placeholder="tmp lahir..."required>&nbsp
                <input type="date" class="form-control" name="tglanak"placeholder="Tgl lahir"required>
            </div>
            <div class="form-group">           
                <label for="exampleInputEmail1">Jenis Kelamin</label>
                <!-- <input type="text" class="form-control" name="jkanak"placeholder="Rw Peserta"required> -->
                <select name="jkanak" id="jkanak">
                <option>Laki-Laki</option>
                <option>Perempuan</option>
               </select>                
            </div>
            
            <div class="row">
            <div class="form-group">           
                <label for="exampleInputEmail1">RW</label>
                <!-- <input type="text" class="form-control" name="rwanak"placeholder="Rw.."required> -->
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="rwanak">
              <?php
               $editrw = mysqli_query($con, " SELECT * FROM tbl_rt") or die (mysqli_error($con));
                if (mysqli_num_rows($editrw) > 0)
                {
                  while($qrw = mysqli_fetch_array($editrw))
                  {
                    ?>
                  <option value="" hidden selected>Pilih Rw..</option>
                  <option value="<?=$qrw['no_rw'];?>"> <?=$qrw['no_rw'];?> </option>
                    <?php
                  }
                } 
                else
                {
                  ?>
                    <option value="belum ada Rw"> belum ada Rw </option>
                    <?php
                }
                ?>
                </select>

            </div>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <div class="form-group">           
                <label for="exampleInputEmail1">RT</label>
                <!-- <input type="text" class="form-control" name="rtanak"placeholder="Rt.."required> -->
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="rtanak">
              <?php
               $editrt = mysqli_query($con, " SELECT * FROM tbl_rt") or die (mysqli_error($con));
                if (mysqli_num_rows($editrt) > 0)
                {
                  while($qrt = mysqli_fetch_array($editrt))
                  {
                    ?>
                  <option value="" hidden selected>Pilih Rt..</option>
                  <option value="<?=$qrt['no_rw'];?>"> <?=$qrt['no_rw'];?> </option>
                    <?php
                  }
                } 
                else
                {
                  ?>
                    <option value="belum ada Rt"> belum ada Rt </option>
                    <?php
                }
                ?>
                </select>
            </div></div>
            <div class="form-group">           
                <label for="exampleInputEmail1">Dusun</label>
                <!-- <input type="text" class="form-control" name="dsanak"placeholder="Dusun Peserta"required> -->
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="dsunank">
              <?php
               $sql_editdusun = mysqli_query($con, " SELECT * FROM tbl_dusun") or die (mysqli_error($con));
               // skrip diatas berfungsi untuk memanggil tabel dusun
                if (mysqli_num_rows($sql_editdusun) > 0)
                // skrip diatas berfungsi untuk apakah ditabel dusun ada isinya
                  {
                    while($dusunedit = mysqli_fetch_array($sql_editdusun))
                    // skrip diatas berfungsi untuk pengulangan yang diambil dari tabel dusun
                    {
                    ?>
                    <option value="" hidden selected>Pilih Dusun..</option>
                    <option value="<?=$dusunedit['nama_dusun'];?>"> <?=$dusunedit['nama_dusun'];?> </option>
                    <!-- skrip diatas berfungsi untuk menampilkan beberapa opsi isi data yang ada pada tabel dusun kolom nama_dusun -->
                      <?php
                    }
                  } 
                else
                {
                  ?>
                    <option value="belum ada dusun"> belum ada dusun </option>
                    <!-- skrip diatas berfungsi jika ditabel dusun belum ada isinya -->
                    <?php
                }
                ?>
                </select>
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
          var anak = $(e.relatedTarget).data('nik');
          var anake = $(e.relatedTarget).data('nonik');

          $(e.currentTarget).find('input[name="hapusanak"]').val(anak);
          $(e.currentTarget).find('input[name="busek"]').val(anake);
        });
        </script>

      <script type="text/javascript">
        $('#modal-edit').on('show.bs.modal', function(e){
          //get data id attribute of the clicked element
          var nokkne       = $(e.relatedTarget).data('nonik');
          var nikanakee    = $(e.relatedTarget).data('nik');
          var namaanake    = $(e.relatedTarget).data('nama_anak');
          var tempatlhr    = $(e.relatedTarget).data('tempat_lahir');
          var tanggalhr    = $(e.relatedTarget).data('tanggal_lahir');
          var jenkel       = $(e.relatedTarget).data('jenis_kelamin');
          var rwa          = $(e.relatedTarget).data('rw');
          var rta          = $(e.relatedTarget).data('rt');
          var dusuna       = $(e.relatedTarget).data('dusun');

          $(e.currentTarget).find('input[name="newnik"]').val(nokkne);
          $(e.currentTarget).find('input[name="nibu"]').val(nikanakee);
          $(e.currentTarget).find('input[name="nibu2"]').val(nikanakee);
          $(e.currentTarget).find('input[name="arananak"]').val(namaanake);
          $(e.currentTarget).find('input[name="tmpanak"]').val(tempatlhr);
          $(e.currentTarget).find('input[name="tglanak"]').val(tanggalhr);
          $(e.currentTarget).find('input[name="jkanak"]').val(jenkel);
          $(e.currentTarget).find('input[name="rwanak"]').val(rwa);
          $(e.currentTarget).find('input[name="rtanak"]').val(rta);
          $(e.currentTarget).find('input[name="dsanak"]').val(dusuna);

        }); 
        </script>
</body>
</html>
<?php
  }
  ?>
