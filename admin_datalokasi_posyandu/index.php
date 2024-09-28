<!DOCTYPE html>
<html lang="en">
<head>
  
<?php 
  require_once "../database/config.php"; 
  include '../list_head_link.php';
  $halaman = 'admin_datalokasiposyandu';
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
            <h1 class="m-0">Data Posyandu</h1>
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
                <h3 class="card-title"><font color ="#fffff"><i class="nav-icon fas fa-users">&nbsp</i> Data Posyandu</font></h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
              
               <button type="button" class="btn btn-md bg-gradient" style="background-color:#4682B4"data-toggle="modal" data-target="#modal-tambah">
               <font color ="#fffff"><i class="nav-icon fas fa-plus">&nbsp</i>Tambah Data</font></button>

                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width:5%">NO</th>
                    <th >Nama Posyandu</th>
                    <th >Lokasi</th>
                    <th >Rumah</th>
                    <th >RW</th>
                    <th >RT</th>
                    <th><center>Action</center></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no=1;
                    $sql_pengguna = mysqli_query($con, " SELECT * FROM tbl_lokasi_posyandu") or die (mysqli_error($con));
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
                                <?=$data['nama_posyandu'];?>
                                </td>

                                <td>
                                <?=$data['dusun'];?>
                                </td>

                                <td>
                                <?=$data['rumah'];?>
                                </td>

                                <td>
                                <?=$data['rw'];?>
                                </td>

                                <td>
                                <?=$data['rt'];?>
                                </td>
                                

                                <td>
                                <center>
                                  
                                 <button type="button" class="btn btn-xs bg-gradient-warning"
                                 data-toggle="modal" data-target="#modal-edit"data-id="<?=$data['id'];?>"
                                 data-nama_posyandu="<?=$data['nama_posyandu'];?>"data-dusun="<?=$data['dusun'];?>"
                                 data-rumah="<?=$data['rumah'];?>"data-rw="<?=$data['rw'];?>" data-rt="<?=$data['rt'];?>"
                                 ><i class="nav-icon fas fa-edit">&nbsp</i>Edit</button>

                                <button type="button" class="btn btn-xs bg-gradient-danger"
                                 data-toggle="modal" data-target="#modal-default"data-id="<?=$data['id'];?>" data-nama_posyandu="<?=$data['nama_posyandu'];?>">
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
            <form role="form" class="form-layout" action="hapuslokasipos.php" method="post">
            <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                  Anda Yakin Ingin Menghapus Data Ini?
                </div>
             <label for="exampleInputEmail1">Nama Posyandu</label>
              <br><input type="text" name="hps_posyandu" id="hps_posyandu" disabled ></br>
              <input type="text" name="nama_pos" id="nama_pos" hidden >
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
              <h5 class="modal-title"><font color="#ffffff">Tambah Data Posyandu</font></h5>
            </div>
            <div class="modal-body">
            <form role="form" class="form-layout" action="tambahlokasipos.php" method="post">

            <div class="form-group">           
                <label for="exampleInputEmail1">Nama Posyandu</label>
                <input type="text" class="form-control" name="nmposyandu" placeholder="Nama Posyandu.." required autofocus>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Lokasi</label>
                <!-- <input type="text" class="form-control" name="dusunpsd" placeholder="Dusun.." required autofocus> -->
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="dusunpsd">
              <?php
               $sql_dusun = mysqli_query($con, " SELECT * FROM tbl_dusun") or die (mysqli_error($con));
               // skrip diatas berfungsi untuk memanggil tabel dusun
                if (mysqli_num_rows($sql_dusun) > 0)
                // skrip diatas berfungsi untuk apakah ditabel dusun ada isinya
                  {
                    while($dusun = mysqli_fetch_array($sql_dusun))
                    // skrip diatas berfungsi untuk pengulangan yang diambil dari tabel dusun
                    {
                    ?>
                    <option value="" hidden selected>Pilih Dusun..</option>
                    <option value="<?=$dusun['nama_dusun'];?>"> <?=$dusun['nama_dusun'];?> </option>
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
            <div class="form-group">           
                <label for="exampleInputEmail1">Rumah</label>
                <input type="text" class="form-control" name="tbhrmh" placeholder="Pemilik Rumah.." required autofocus>
            </div>

            <div class="row">
            <div class="form-group">           
                <label for="exampleInputEmail1">Rw</label>
                <!-- <input type="text" class="form-control" name="tbhrw" placeholder="RW.." required autofocus> -->
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="tbhrw">
              <?php
               $sql_rww = mysqli_query($con, " SELECT * FROM tbl_rt") or die (mysqli_error($con));
                if (mysqli_num_rows($sql_rww) > 0)
                {
                  while($pkrw = mysqli_fetch_array($sql_rww))
                  {
                    ?>
                  <option value="" hidden selected>Pilih Rw..</option>

                   <option value="<?=$pkrw['no_rw'];?>"> <?=$pkrw['no_rw'];?> </option>
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
                <label for="exampleInputEmail1">Rt</label>
                <!-- <input type="text" class="form-control" name="tbhrt" placeholder="RT.." required autofocus> -->
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="tbhrt">
              <?php
               $sql_rww = mysqli_query($con, " SELECT * FROM tbl_rt") or die (mysqli_error($con));
                if (mysqli_num_rows($sql_rww) > 0)
                {
                  while($pkrw = mysqli_fetch_array($sql_rww))
                  {
                    ?>
                  <option value="" hidden selected>Pilih Rw..</option>

                   <option value="<?=$pkrw['no_rw'];?>"> <?=$pkrw['no_rw'];?> </option>
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
              <h5 class="modal-title"><font color="#ffffff">Edit Data Posyandu</font></h5>
            </div>
            <div class="modal-body">
            <form role="form" class="form-layout" action="editlokasipos.php" method="post">
            <div class="form-group">           
                <label for="exampleInputEmail1">ID</label>
                <input type="text" class="form-control" name="idpsd"  disabled>
                <input type="text" class="form-control" name="idpsd2" hidden>

            </div>
            <div class="form-group">           
                <label for="exampleInputEmail1">Nama Posyandu</label>
                <input type="text" class="form-control" name="edtnmapos" placeholder="rt...">
            </div>
            <div class="form-group">           
                <label for="exampleInputEmail1">Lokasi</label>
                <!-- <input type="text" class="form-control" name="edtdusun" placeholder="rw..."> -->
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="edtdusun">
              <?php
               $sql_edusun = mysqli_query($con, " SELECT * FROM tbl_dusun") or die (mysqli_error($con));
               // skrip diatas berfungsi untuk memanggil tabel dusun
                if (mysqli_num_rows($sql_edusun) > 0)
                // skrip diatas berfungsi untuk apakah ditabel dusun ada isinya
                  {
                    while($edusun = mysqli_fetch_array($sql_edusun))
                    // skrip diatas berfungsi untuk pengulangan yang diambil dari tabel dusun
                    {
                    ?>
                    <option value="" hidden selected>Pilih Dusun..</option>
                    <option value="<?=$edusun['nama_dusun'];?>"> <?=$edusun['nama_dusun'];?> </option>
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
            <div class="form-group">           
                <label for="exampleInputEmail1">Rumah </label>
                <input type="text" class="form-control" name="edtrmh" placeholder="rw...">
            </div>
            
            <div class="row">
            <div class="form-group">  &nbsp         
                <label for="exampleInputEmail1">Rw</label>
                <!-- <input type="text" class="form-control" name="edtrw"> -->
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="edtrw">
              <?php
               $sql_rw = mysqli_query($con, " SELECT * FROM tbl_rt") or die (mysqli_error($con));
                if (mysqli_num_rows($sql_rw) > 0)
                {
                  while($dusun = mysqli_fetch_array($sql_rw))
                  {
                    ?>
                   <option value="" hidden selected>Pilih Rw..</option>
                   <option value="<?=$dusun['no_rw'];?>"> <?=$dusun['no_rw'];?> </option>
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

            </div><div class="form-group">           
            &nbsp&nbsp  <label for="exampleInputEmail1">Rt</label>
                <!-- <input type="text" class="form-control" name="edtrt"> -->
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="edtrt">
              <?php
               $sql_rw = mysqli_query($con, " SELECT * FROM tbl_rt") or die (mysqli_error($con));
                if (mysqli_num_rows($sql_rw) > 0)
                {
                  while($dusun = mysqli_fetch_array($sql_rw))
                  {
                    ?>
                   <option value="" hidden selected>Pilih Rt..</option>
                   <option value="<?=$dusun['no_rt'];?>"> <?=$dusun['no_rt'];?> </option>
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
          var id = $(e.relatedTarget).data('id');
          var nama = $(e.relatedTarget).data('nama_posyandu');

          $(e.currentTarget).find('input[name="nama_pos"]').val(id);
          $(e.currentTarget).find('input[name="hps_posyandu"]').val(nama);

         });
        </script> 

      <script type="text/javascript">
        $('#modal-edit').on('show.bs.modal', function(e){
          //get data id attribute of the clicked element
          var editnamapos = $(e.relatedTarget).data('nama_posyandu');
          var editdusun = $(e.relatedTarget).data('dusun'); 
          var editrumah = $(e.relatedTarget).data('rumah'); 
          var editrw = $(e.relatedTarget).data('rw'); 
          var editrt = $(e.relatedTarget).data('rt'); 
          var id = $(e.relatedTarget).data('id');

          $(e.currentTarget).find('input[name="edtnmapos"]').val(editnamapos);
          $(e.currentTarget).find('input[name="edtdusun"]').val(editdusun);
          $(e.currentTarget).find('input[name="edtrmh"]').val(editrumah);
          $(e.currentTarget).find('input[name="edtrw"]').val(editrw);
          $(e.currentTarget).find('input[name="edtrt"]').val(editrt);
          $(e.currentTarget).find('input[name="idpsd"]').val(id);
          $(e.currentTarget).find('input[name="idpsd2"]').val(id);
        });
        </script>

</body>
</html>
<?php
  }
  ?>
