<!DOCTYPE html>
<html lang="en">
<head>
  
<?php 
  require_once "../database/config.php"; 
  include '../list_head_link.php';
  $halaman = 'admin_data_dusun';
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
            <h1 class="m-0">Data Dusun</h1>
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
                <h3 class="card-title"><font color ="#fffff"><i class="nav-icon fas fa-users">&nbsp</i> Data Dusun</font></h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
              <!-- <a href="tambahpengguna.php" class="btn btn-default btn-md" style="background-color:#001f3f;"
               role="button"><font color ="#fffff"><i class="nav-icon fas fa-plus"></i>Tambah Data</font></a> -->
               
               <button type="button" class="btn btn-md bg-gradient" style="background-color:#4682B4"data-toggle="modal" data-target="#modal-tambah">
               <font color ="#fffff"><i class="nav-icon fas fa-plus">&nbsp</i>Tambah Data</font></button>

                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width:5%">NO</th>
                    <!-- <th style="width:20%">ID</th> -->
                    <th>Nama Dusun</th>
                    <th>Nama Kadus</th>
                    <th>Kontak Kadus</th>
                    <th style="width:20%"><center>Action</center></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no=1;
                    $sql_pengguna = mysqli_query($con, " SELECT * FROM tbl_dusun") or die (mysqli_error($con));
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
                                <?=$data['id'];?>
                                </td> -->
                                <td>
                                <?=$data['nama_dusun'];?>
                                </td>

                                <td>
                                <?=$data['kadus'];?>
                                </td>

                                <td>
                                <?=$data['kontak_kadus'];?>
                                </td>
                               
                                <td>
                                  <center>                           

                                 <button type="button" class="btn btn-xs bg-gradient-warning"
                                 data-toggle="modal" data-target="#modal-edit"data-id="<?=$data['id'];?>"
                                 data-nama_dusun="<?=$data['nama_dusun'];?>" data-kadus="<?=$data['kadus'];?>"
                                 data-kontak_kadus="<?=$data['kontak_kadus'];?>"
                                 ><i class="nav-icon fas fa-edit">&nbsp</i>Edit</button>

                                <button type="button" class="btn btn-xs bg-gradient-danger"
                                 data-toggle="modal" data-target="#modal-default"
                                 data-nip="<?=$data['id'];?>" data-nama="<?=$data['nama_dusun'];?>">
                                 <i class="nav-icon fas fa-trash">&nbsp</i>Hapus</button>
                                  </center>
                                 </td>
                                  
                        </tr>
                        <?php
                        }
                    } 
                    else 
                    {
                        echo "<tr><td colspan=\"5\" align=\"center\"><h6><b>Data Tidak Ditemukan</b></h6></td></tr>";
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
            <form role="form" class="form-layout" action="hapusdusun.php" method="post">
            <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                  Anda Yakin Ingin Menghapus Data Ini?
                </div>
                <label for="exampleInputEmail1">Nama Dusun</label>
             <br> <input type="text" name="no_dusun" id="no_dusun" disabled></br>
              <input type="text" name="namadus" id="namadus" hidden>

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

      <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header" style="background-color:#4682B4;">
              <h5 class="modal-title"><font color="#ffffff">Tambah Data Dusun</font></h5>
            </div>
            <div class="modal-body">
            <form role="form" class="form-layout" action="aksitambahdusun.php" method="post">
            
            <!-- <div class="form-group">           
                <input type="text" class="form-control" name="ids"placeholder="nama dusun..."hidden>
            </div> -->

            <div class="form-group">           
                <label for="exampleInputEmail1">Nama Dusun</label>
                <input type="text" class="form-control" name="nmadusun"placeholder="nama dusun..." required>
            </div>
            <div class="form-group">           
                <label for="exampleInputEmail1">kadus</label>
                <input type="text" class="form-control" name="nmkadus"placeholder="nama kadus..."required>
            </div>
            <div class="form-group">           
                <label for="exampleInputEmail1">Kontak Kadus</label>
                <input type="text" onkeyPress="if(this.value.length==13) return false;" class="form-control" name="kntkadus"placeholder="kontak kadus..."required>
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
              <h5 class="modal-title"><font color="#ffffff">Edit Data Dusun</font></h5>
            </div>
            <div class="modal-body">
            <form role="form" class="form-layout" action="editdusun.php" method="post">
            <div class="form-group">           
                <label for="exampleInputEmail1">ID</label>
                <input type="text" class="form-control" name="idds" disabled>
                <input type="text" class="form-control" name="idds2" hidden>

            </div>
            <div class="form-group">           
                <label for="exampleInputEmail1">Nama Dusun</label>
                <input type="text" class="form-control" name="nmdsn" placeholder="nama dusun..."required autofocus>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Nama Kadus</label>
                <input type="text" class="form-control" name="nmkds"placeholder="Nama Kadus" required >
            </div>
            
            <div class="form-group">           
                <label for="exampleInputEmail1">Kontak Kadus</label>
                <input type="text" onkeyPress="if(this.value.length==13) return false;" class="form-control" name="ktkds"placeholder="Nomer Kontak Kadus"required>
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
          var id = $(e.relatedTarget).data('nip');
          var nama = $(e.relatedTarget).data('nama');

          $(e.currentTarget).find('input[name="namadus"]').val(id);
          $(e.currentTarget).find('input[name="no_dusun"]').val(nama);
        });
        </script> 

      <script type="text/javascript">
        $('#modal-edit').on('show.bs.modal', function(e){
          //get data id attribute of the clicked element
          var dussun = $(e.relatedTarget).data('nama_dusun');
          var arankadus = $(e.relatedTarget).data('kadus');
          var kontakkadus = $(e.relatedTarget).data('kontak_kadus');
          var iddussun = $(e.relatedTarget).data('id');

          
          $(e.currentTarget).find('input[name="nmdsn"]').val(dussun);
          $(e.currentTarget).find('input[name="nmkds"]').val(arankadus);
          $(e.currentTarget).find('input[name="ktkds"]').val(kontakkadus);
          $(e.currentTarget).find('input[name="idds"]').val(iddussun);
          $(e.currentTarget).find('input[name="idds2"]').val(iddussun);
          
        });
        </script>

</body>
</html>
<?php
  }
  ?>
