<!DOCTYPE html>
<html lang="en">
<head>
  
<?php 
  require_once "../database/config.php"; 
  include '../list_head_link.php';
  $halaman = 'admin_data_pengguna';
  session_start();
  $peran = "admin";
  


  if ($_SESSION['peran']!=$peran)
  
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
            <h1 class="m-0">Data Pengguna</h1>
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
                <h3 class="card-title"><font color ="#fffff"><i class="nav-icon fas fa-users">&nbsp</i> Data Pengguna</font></h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
              <!-- <a href="tambahpengguna.php" class="btn btn-default btn-md" style="background-color:#001f3f;"
               role="button"><font color ="#fffff"><i class="nav-icon fas fa-plus"></i>Tambah Data</font></a> -->
               
               <button type="button" class="btn btn-md bg-gradient"style="background-color:#4682B4" data-toggle="modal" data-target="#modal-tambah">
                  <font color ="#fffff"><i class="nav-icon fas fa-plus">&nbsp</i>Tambah Data</font></button>

                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width:5%">NO</th>
                    <th style="width:20%">No HP/WhatsApp</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Peran</th>
                    <th>NIP</th>
                    <th style="width:20%"><center>Action</center></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no=1;
                    $sql_pengguna = mysqli_query($con, " SELECT * FROM tbl_penggunaa ") or die (mysqli_error($con));
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
                                <?=$data['NIP'];?>
                                </td>

                                <td>
                                <?=$data['username'];?>
                                </td>

                                <td>
                                <?=$data['nama'];?>
                                </td>

                                <td>
                                <?=$data['peran'];?>
                                </td>

                                <td>
                                <?=$data['wilayah_operasi'];?>
                                </td>
                                
                                <td>
                                  <center>
                                <button type="button" class="btn btn-xs bg-gradient" style="background-color:#4682B4"
                                 data-toggle="modal" data-target="#modal-reset"data-nip="<?=$data['NIP'];?>">
                                 <font color ="#fffff"><i class="nav-icon fas fa-sync">&nbsp</i>Reset Password</font></button>

                                 <button type="button" class="btn btn-xs bg-gradient-warning"
                                 data-toggle="modal" data-target="#modal-edit"data-nip="<?=$data['NIP'];?>"
                                 data-nama="<?=$data['nama'];?>" data-username="<?=$data['username'];?>"
                                 data-peran="<?=$data['peran'];?>" data-wilayah_operasi="<?=$data['wilayah_operasi'];?>"
                                 ><i class="nav-icon fas fa-edit">&nbsp</i>Edit</button>

                                <button type="button" class="btn btn-xs bg-gradient-danger"
                                 data-toggle="modal" data-target="#modal-default"
                                 data-nip="<?=$data['NIP'];?>"
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
                        echo "<tr><td colspan=\"4\" align=\"center\"><h6><b>Data Tidak Ditemukan</b></h6></td></tr>";
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
            <form role="form" class="form-layout" action="hapuspengguna.php" method="post">
            <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                  Anda Yakin Ingin Menghapus Data Ini?
                </div>
                <label for="exampleInputEmail1">Nama</label>
                 <input type="text" name="nip_pengguna" id="nip_pengguna" hidden>
             <br> <input type="text" name="nama" id="nama" disabled></br>

              <label for="exampleInputEmail1">NIP</label>
             <br> <input type="text" name="nonip" id="nonip" disabled > </br>

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
              <h5 class="modal-title"><font color="#ffffff">Tambah Data Pengguna</font></h5>
            </div>
            <div class="modal-body">
            <form role="form" class="form-layout" action="aksitambah.php" method="post">

            <div class="form-group">           
                <label for="exampleInputEmail1">No Hp/WhatsApp</label>
                <input type="text" class="form-control" name="nip" placeholder="No WA" required autofocus>
            </div>
            <div class="form-group">           
                <label for="exampleInputEmail1">Nama User</label>
                <input type="text" class="form-control" name="nama"placeholder="Nama Pengguna" required>
            </div>
            <div class="form-group">           
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" name="user"placeholder="Username yang diinginkan"required>
            </div>
            <div class="form-group">           
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" name="pass"placeholder="Password akun"required>
            </div>
            <div class="form-group">           
                <label for="exampleInputEmail1">Peran</label>
                <input type="text" class="form-control" name="peranptgs"placeholder="Peran User"required>
            </div>
            <div class="form-group">           
                <label for="exampleInputEmail1">NIP</label>
                <input type="text" class="form-control" name="wilayahoperasi"placeholder="Wilayah Operasi Petugas"required>
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

      <div class="modal fade" id="modal-reset">
        <div class="modal-dialog">
          <div class="modal-content">
            
            <div class="modal-body">
            <form role="form" class="form-layout" action="resetpassword.php" method="post">
            <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                  Anda Yakin Mereset Password?
                <br> Password akan direset menjadi <b> admin12345 </b>
                </div>
              <input type="text" name="nip_pengguna" id="nip_pengguna" hidden> 
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-md" data-dismiss="modal">
                <i class="nav-icon fas fa-times">&nbsp</i>Batalkan</button>
              <button type="submit" name="reset" class="btn btn-primary btn-md">
                <i class="nav-icon fas fa-sync">&nbsp</i>Ya,Reset Password</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      </div>

      <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header" style="background-color:#4682B4;">
              <h5 class="modal-title"><font color="#ffffff">Edit Data Pengguna</font></h5>
            </div>
            <div class="modal-body">
            <form role="form" class="form-layout" action="editpengguna.php" method="post">

            <div class="form-group">           
                <label for="exampleInputEmail1">No Hp/WhatsApp</label>
                <input type="text" class="form-control" name="nip" placeholder="NIP" disabled>
                <input type="text" class="form-control" name="nip2" placeholder="NIP" hidden>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Nama User</label>
                <input type="text" class="form-control" name="nama"placeholder="Nama Pengguna" required autofocus>
            </div>
            
            <div class="form-group">           
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" name="user"placeholder="Username yang diinginkan"required>
            </div>
            <div class="form-group">           
                <label for="exampleInputEmail1">Peran</label>
                <input type="text" class="form-control" name="peranusr"placeholder="Peran User"required>
            </div>
            <div class="form-group">           
                <label for="exampleInputEmail1">NIP</label>
                <input type="text" class="form-control" name="wilop"placeholder="Wilayah Operasi Petugas"required>
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
          var nip = $(e.relatedTarget).data('nip');
          var nam = $(e.relatedTarget).data('nama');
          var wil = $(e.relatedTarget).data('wilayah_operasi');


          $(e.currentTarget).find('input[name="nip_pengguna"]').val(nip);
          $(e.currentTarget).find('input[name="nonip"]').val(wil);
          $(e.currentTarget).find('input[name="nama"]').val(nam);
        });
        </script> 

      <script type="text/javascript">
        $('#modal-reset').on('show.bs.modal', function(e){
          //get data id attribute of the clicked element
          var nip = $(e.relatedTarget).data('nip');
          $(e.currentTarget).find('input[name="nip_pengguna"]').val(nip);
        });
        </script>

      <script type="text/javascript">
        $('#modal-edit').on('show.bs.modal', function(e){
          //get data id attribute of the clicked element
          var nip = $(e.relatedTarget).data('nip');
          var nama = $(e.relatedTarget).data('nama');
          var user = $(e.relatedTarget).data('username');
          var prnusr = $(e.relatedTarget).data('peran');
          var wlyhoprasi = $(e.relatedTarget).data('wilayah_operasi');

          $(e.currentTarget).find('input[name="nip"]').val(nip);
          $(e.currentTarget).find('input[name="nama"]').val(nama);
          $(e.currentTarget).find('input[name="user"]').val(user);
          $(e.currentTarget).find('input[name="nip2"]').val(nip);
          $(e.currentTarget).find('input[name="peranusr"]').val(prnusr);
          $(e.currentTarget).find('input[name="wilop"]').val( wlyhoprasi);


        });
        </script>

</body>
</html>
<?php
  }
  ?>
