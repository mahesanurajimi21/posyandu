<!DOCTYPE html>
<html lang="en">
<head>
  
<?php 
  require_once "../database/config.php"; 
  include '../list_head_link.php';
  $halaman = 'admin_datapetugas';
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
            <h1 class="m-0">Data Petugas</h1>
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
                <h3 class="card-title"><font color ="#fffff"><i class="nav-icon fas fa-users">&nbsp</i> Data Petugas</font></h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
              <!-- <a href="tambahpengguna.php" class="btn btn-default btn-md" style="background-color:#001f3f;"
               role="button"><font color ="#fffff"><i class="nav-icon fas fa-plus"></i>Tambah Data</font></a> -->
               
               <button type="button" class="btn btn-md bg-gradient" style="background-color:#4682B4"
                  data-toggle="modal" data-target="#modal-tambah">
                  <font color ="#fffff"><i class="nav-icon fas fa-plus">&nbsp</i>Tambah Data Petugas</font></button>

                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width:5%">NO</th>
                    <th>NO HP</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>NIP</th>
                    <th><center>Action</center></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no=1;
                    $sql_pengguna = mysqli_query($con, " SELECT * FROM tbl_petugas") or die (mysqli_error($con));
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
                                <?=$data['no_hp'];?>
                                </td>

                                <td>
                                <?=$data['email'];?>
                                </td>

                                <td>
                                <?=$data['nama'];?>
                                </td>

                                <td>
                                <?=$data['tgl_lahir'];?>
                                </td>

                                <td>
                                <?=$data['dusun'];?>
                                </td>

                                <td>
                                <?=$data['jenis_kelamin'];?>
                                </td>

                                <td>
                                <?=$data['wilayah_operasi'];?>
                                </td>
                               
                                <td>
                                  <center>                           

                                 <button type="button" class="btn btn-xs bg-gradient-warning"
                                 data-toggle="modal" data-target="#modal-edit"data-id="<?=$data['id'];?>"
                                 data-no_hp="<?=$data['no_hp'];?>" data-email="<?=$data['email'];?>" data-nama="<?=$data['nama'];?>"
                                 data-tgl_lahir="<?=$data['tgl_lahir'];?>" data-dusun="<?=$data['dusun'];?>"
                                 data-jenis_kelamin="<?=$data['jenis_kelamin'];?>" data-wilayah_operasi="<?=$data['wilayah_operasi'];?>"
                                 ><i class="nav-icon fas fa-edit">&nbsp</i>Edit</button>

                                <button type="button" class="btn btn-xs bg-gradient-danger"
                                 data-toggle="modal" data-target="#modal-default"
                                 data-nip="<?=$data['id'];?>"
                                 data-nama="<?=$data['nama'];?>"
                                 data-wilayah_operasi="<?=$data['wilayah_operasi'];?>">
                                 <i class="nav-icon fas fa-trash">&nbsp</i>Hapus</button>
                                  </center>
                                 </td>
                                  
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
            <form role="form" class="form-layout" action="hapuspetugas.php" method="post">
            <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                  Anda Yakin Ingin Menghapus Data Ini?
                </div>
                <label for="exampleInputEmail1">Nama</label>
              <input type="text" name="no_dusun" id="no_dusun" hidden>
             <br> <input type="text" name="nama" id="nama" disabled></br>

              <label for="exampleInputEmail1">NIP</label>
             <br> <input type="text" name="nonip" id="nonip" disabled></br>

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
          <div class="modal-header" style="background-color:#4682B4;">
              <h5 class="modal-title"><font color="#ffffff">Tambah Data Petugas</font></h5>
            </div>
            <div class="modal-body">
            <form role="form" class="form-layout" action="aksitambahpetugas.php" method="post">
            
            <div class="form-group">           
                <label for="exampleInputEmail1">No HP</label>
                <input type="text" onkeyPress="if(this.value.length==13) return false;"  class="form-control" name="tbhhp"placeholder="Nomer HP..." required>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Email</label>
                <input type="text" class="form-control" name="tbhemail"placeholder="email..." required>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" class="form-control" name="tbhnama"placeholder="nama petugas..."required>
            </div>
            <div class="form-group">           
                <label for="exampleInputEmail1">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tbhtgl" required>
            </div>
            <div class="form-group">           
                <label for="exampleInputEmail1">Alamat</label>
                <input type="text" class="form-control" name="tbhdusun"placeholder="Alamat Lengkap..." required>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Jenis Kelamin</label>
                <!-- <input type="text" class="form-control" name="tbhjenkel" placeholder="kontak kadus..."required> -->
                <select name="tbhjenkel" id="jnskel">
                  <option>Laki-Laki</option>
                  <option>Perempuan</option>
               </select>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">NIP</label>
                <input type="text" class="form-control" name="wlop" placeholder="NIP"required>
                <!-- <select class="custom-select form-control-border" id="exampleSelectBorder" name="wlop">
              <?php
               $sql_wloperasi = mysqli_query($con, " SELECT * FROM tbl_lokasi_posyandu") or die (mysqli_error($con));
               // skrip diatas berfungsi untuk memanggil tabel lokasi posyandu
                if (mysqli_num_rows($sql_wloperasi) > 0)
                // skrip diatas berfungsi untuk apakah ditabel dusun ada isinya
                  {
                    while($dusunptgs = mysqli_fetch_array($sql_wloperasi))
                    // skrip diatas berfungsi untuk pengulangan yang diambil dari tabel dusun
                    {
                    ?>
                    <option value="" hidden selected>Pilih Dusun..</option>
                    <option value="<?=$dusunptgs['dusun'];?>"> <?=$dusunptgs['dusun'];?> </option>
                      <?php
                    }
                  } 
                else
                {
                  ?>
                    <option value="belum ada dusun"> belum ada dusun </option>
                    <?php
                }
                ?>
                </select> -->

                
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
          <div class="modal-header" style="background-color:#4682B4;">
              <h5 class="modal-title"><font color="#ffffff">Edit Data Petugas</font></h5>
            </div>
            <div class="modal-body">
            <form role="form" class="form-layout" action="editpetugas.php" method="post">
            
            <div class="form-group">           
                <label for="exampleInputEmail1">ID</label>
                <input type="text" class="form-control" name="editid" disabled>
                <input type="text" class="form-control" name="editid2" hidden>

            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">NO HP</label>
                <input type="text" class="form-control" name="edithp" required>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Email </label>
                <input type="text" class="form-control" name="editemail"required autofocus>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Nama </label>
                <input type="text" class="form-control" name="editnama"required autofocus>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Tanggal Lahir</label>
                <input type="date" class="form-control" name="editttl"required >
            </div>
            
            <div class="form-group">           
                <label for="exampleInputEmail1">Alamat</label>
                <input type="text" class="form-control" name="editdusun"required>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Jenis Kelamin</label>
                <!-- <input type="text" class="form-control" name="editkelamin"required> -->
                <select name="editkelamin" id="jnskel">
                  <option>Laki-Laki</option>
                  <option>Perempuan</option>
               </select>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">NIP</label>
                <input type="text" class="form-control" name="editwilayah"required>
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-md"  data-dismiss="modal">
                <i class="nav-icon fas fa-times">&nbsp</i>Tutup</button>
              <button type="submit" name ="edit"class="btn btn-primary btn-md"><i class="nav-icon fas fa-edit">&nbsp</i>Edit Data</font></button>
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
          var id = $(e.relatedTarget).data('nip');
          var nam = $(e.relatedTarget).data('nama');
          var wil = $(e.relatedTarget).data('wilayah_operasi');

          $(e.currentTarget).find('input[name="no_dusun"]').val(id);
          $(e.currentTarget).find('input[name="nama"]').val(nam);
          $(e.currentTarget).find('input[name="nonip"]').val(wil);

        });
        </script> 

      <script type="text/javascript">
        $('#modal-edit').on('show.bs.modal', function(e){
          //get data id attribute of the clicked element
          var hp = $(e.relatedTarget).data('no_hp');
          var namaptgs = $(e.relatedTarget).data('nama');
          var tglahir = $(e.relatedTarget).data('tgl_lahir');
          var dusun = $(e.relatedTarget).data('dusun');
          var jeniskl = $(e.relatedTarget).data('jenis_kelamin');
          var eml = $(e.relatedTarget).data('email');
          var wl = $(e.relatedTarget).data('wilayah_operasi');
          var idne = $(e.relatedTarget).data('id');


          
          $(e.currentTarget).find('input[name="edithp"]').val(hp);
          $(e.currentTarget).find('input[name="editnama"]').val(namaptgs);
          $(e.currentTarget).find('input[name="editttl"]').val(tglahir);
          $(e.currentTarget).find('input[name="editdusun"]').val(dusun);
          $(e.currentTarget).find('input[name="editkelamin"]').val(jeniskl);
          $(e.currentTarget).find('input[name="editemail"]').val(eml);
          $(e.currentTarget).find('input[name="editwilayah"]').val(wl);
          $(e.currentTarget).find('input[name="editid"]').val(idne);
          $(e.currentTarget).find('input[name="editid2"]').val(idne);
          
        });
        </script>

</body>
</html>
<?php
  }
  ?>
