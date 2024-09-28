<!DOCTYPE html>
<html lang="en">
<head>
  
<?php 
  require_once "../database/config.php"; 
  include '../list_head_link.php';
  $halaman = 'petugas_datapeserta';
  session_start();
  $peran = "Petugas";  

  if ($_SESSION['peran']!=$peran)
  // if (!isset($_SESSION['nip']))
  {
    echo "<script>window.location='../auth';</script>";
  } else

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
include '../petugas_sidebar.php';
?>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Data Peserta</h1>
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
                <h3 class="card-title"><font color ="#fffff"><i class="nav-icon fas fa-restroom">&nbsp</i> Data Orang Tua</font></h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
            
               <button type="button" class="btn btn-md bg-gradient"style="background-color:#4682B4"data-toggle="modal" data-target="#modal-tambah">
               <font color ="#fffff"><i class="nav-icon fas fa-plus">&nbsp</i>Tambah Data</font></button>

                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width:5%">NO</th>
                    <!-- <th>kode</th> -->
                    <th>KK</th>
                    <th>NIK Ibu</th>
                    <th>Nama Ibu</th>
                    <th>NIK Ayah</th>
                    <th>Nama Ayah</th>
                    <th>RW</th>
                    <th>RT</th>
                    <th>Dusun</th>
                    <th>No Hp/WhatshApp</th>
                    <th style="width:15%"><center>Aksi</center></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no=1;
                    $sql_pengguna = mysqli_query($con, " SELECT * FROM tbl_peserta") or die (mysqli_error($con));
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
                                <?=$data['kode'];?>
                                </td> -->
                                <td>
                                <?=$data['nkk'];?>
                                </td>
                                <td>
                                <?=$data['nik_ibu'];?>
                                </td>
                                <td>
                                <?=$data['nama_ibu'];?>
                                </td>
                                <td>
                                <?=$data['nik_ayah'];?>
                                </td>
                                <td>
                                <?=$data['nama_ayah'];?>
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
                                <?=$data['nohp'];?>
                                </td>
                                <td>
                                  <center>
                                  <a class="btn btn-xs bg-gradient" style="background-color:#4682B4" href="dataanak.php?no_kk=<?=$data['nkk'];?> & kode_peserta=<?=$data['kode'];?>">
                                  <font color ="#fffff"><i class="nav-icon fas fa-child">&nbsp</i>Anak</a></font>
                                 <!-- kode diatas untuk menambahkan data anak sesuai nomer kk orang tuanya dan juga ketika edit kk orang tua,
                                  nomer kk yang ada di tabel anak juga otomatis ikut ganti-->

                                 <button type="button" class="btn btn-xs bg-gradient-warning" 
                                 data-toggle="modal" data-target="#modal-edit"data-kode="<?=$data['kode'];?>"
                                 data-nkk="<?=$data['nkk'];?>" data-nik_ibu="<?=$data['nik_ibu'];?>" data-nik_ayah="<?=$data['nik_ayah'];?>"
                                 data-nama_ibu="<?=$data['nama_ibu'];?>" data-nama_ayah="<?=$data['nama_ayah'];?>" data-rw="<?=$data['rw'];?>"
                                 data-rt="<?=$data['rt'];?>"data-dusun="<?=$data['dusun'];?>" data-nohp="<?=$data['nohp'];?>">
                                 <i class="nav-icon fas fa-edit">&nbsp</i>Edit</button>

                                <button type="button" class="btn btn-xs bg-gradient-danger"
                                 data-toggle="modal" data-target="#modal-default"data-nik="<?=$data['kode'];?>" data-nkk="<?=$data['nkk'];?>">
                                 <i class="nav-icon fas fa-trash">&nbsp</i>Hapus</button>
                                  </center>
                                 </td>
                                  
                        </tr>
                        <?php
                        }
                    } 
                    else 
                    {
                        echo "<tr><td colspan=\"9\" align=\"center\"><h6><b>Data Tidak Ditemukan</b></h6></td></tr>";
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

                <div class="form-group">           
                <label for="exampleInputEmail1">Nomer KK</label>
                  <br><input type="text" name="haha" id="haha" disabled></br>
                  <input type="text" name="nik_anak" id="nik_anak" hidden >
                </div>

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
              <h5 class="modal-title"><font color="#ffffff">Tambah Data Orang Tua</font></h5></div>
            <div class="modal-body">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-6">
            <form role="form" class="form-layout" action="aksitambah.php" method="post">

            <div class="form-group">           
                <label for="exampleInputEmail1">Nomor KK</label>
                <input type="number" onkeyPress="if(this.value.length==16) return false;" class="form-control" name="nmerkk"placeholder="Nomor KK" required>
            </div>
            <div class="form-group">           
                <label for="exampleInputEmail1">Nomor NIK Ibu</label>
                <input type="number" onkeyPress="if(this.value.length==16) return false;" class="form-control" name="nikibuu"placeholder="NIK ibu"required>
            </div>
            <div class="form-group">           
                <label for="exampleInputEmail1">Nama Ibu</label>
                <input type="text" class="form-control" name="nmaibuu"placeholder="Nama ibu"required>
            </div>
            <div class="form-group">           
                <label for="exampleInputEmail1">Nomor NIK Ayah</label>
                <input type="number" onkeyPress="if(this.value.length==16) return false;" class="form-control" name="nikayhh"placeholder="Nik ayah"required>
            </div>
            <div class="form-group">           
                <label for="exampleInputEmail1">Nama Ayah</label>
                <input type="text" class="form-control" name="nmaayhh"placeholder="Nama ayah"required>
            </div></div>
            
            <!-- <div class="row" id="peserta"> -->
            <div class="col-lg-6">          
            <div class="form-group"> 
                <label for="exampleInputEmail1">RW</label>
                <!-- <input type="text" class="form-control" name="rwpsrt"placeholder="Rw Peserta"required> -->
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="rwpsrt" require>
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
              <!-- &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp -->
            <div class="form-group">           
                <label for="exampleInputEmail1">RT</label>
                <!-- <input type="text" class="form-control" name="rtpsrt"placeholder="Rt Peserta"required> -->
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="rtpsrt">
              <?php
               $sql_rtt = mysqli_query($con, " SELECT * FROM tbl_rt") or die (mysqli_error($con));
                if (mysqli_num_rows($sql_rww) > 0)
                {
                  while($pkrt = mysqli_fetch_array($sql_rtt))
                  {
                    ?>
                    <option value="" hidden selected>Pilih Rt..</option>
                   <option value="<?=$pkrt['no_rt'];?>"> <?=$pkrt['no_rt'];?> </option>
                    <?php
                  }

                } 
                else
                {
                  ?>
                    <option value="belum ada Rw"> belum ada rt </option>
                    <?php
                }
                ?>
                </select>
              </div>
             <!-- </div> -->
            <div class="form-group">           
            <label for="exampleInputEmail1">Dusun</label>
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="dsunpsrtaa">
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
                <label for="exampleInputEmail1">Nomor Hp/WhatshApp</label>
                <input type="number" onkeyPress="if(this.value.length==13) return false;" class="form-control" name="tbhnohp"placeholder="nomer hp"required>
            </div>
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
           </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </div>
      <!-- /.modal -->

      <!-- MODAL EDIT DATA ORANG TUA       -->
      <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header" style="background-color:#4682B4;">
              <h5 class="modal-title"><font color="#ffffff">Edit Data Orang Tua</font></h5>
            </div>
            <div class="modal-body">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-6">
            <form role="form" class="form-layout" action="editpengguna.php" method="post">

            <div class="form-group">           
                <label for="exampleInputEmail1">ID</label>
                <input type="text" class="form-control" name="kdpst"  disabled>
                <input type="text" class="form-control" name="kdpst2" hidden>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Nomor KK</label>
                <input type="number" onkeyPress="if(this.value.length==16) return false;" class="form-control" name="nmrkk"placeholder="Nkk peserta" required>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Nomor NIK Ibu</label>
                <input type="number" onkeyPress="if(this.value.length==16) return false;" class="form-control" name="nmrnikibu"placeholder="Nik ibu"required>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Nama Ibu</label>
                <input type="text" class="form-control" name="aranibu"placeholder="Nama ibu"required>
            </div>
            
            <div class="form-group">           
                <label for="exampleInputEmail1">Nomor NIK Ayah</label>
                <input type="number" onkeyPress="if(this.value.length==16) return false;" class="form-control" name="nmrnikayh"placeholder="Nik ayah"required>
            </div>
            </div>

            <div class="col-lg-6">
            <div class="form-group">           
                <label for="exampleInputEmail1">Nama Ayah</label>
                <input type="text" class="form-control" name="aranayah"placeholder="Nama ayah"required>
            </div>
            
            <div class="form-group">           
                <label for="exampleInputEmail1">RW</label>
                <!-- <input type="text" class="form-control" name="rwpeserta"placeholder="Rw Peserta"required> -->
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="rwpeserta">
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
            </div>       
            <div class="form-group">           
                <label for="exampleInputEmail1">RT</label>
                <!-- <input type="text" class="form-control" name="rtpeserta"placeholder="Rt Peserta"required> -->
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="rtpeserta">
              <?php
               $sql_rt = mysqli_query($con, " SELECT * FROM tbl_rt") or die (mysqli_error($con));
                if (mysqli_num_rows($sql_dusun) > 0)
                {
                  while($dusun = mysqli_fetch_array($sql_rt))
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
                    <option value="belum ada Rt"> belum ada dusun </option>
                    <?php
                }
                ?>
                </select>
              </div>
                       

            <div class="form-group">           
            <label for="exampleInputEmail1">Dusun</label>
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="dsunpsrtaa">
              <?php
               $sql_dusun = mysqli_query($con, " SELECT * FROM tbl_dusun") or die (mysqli_error($con));
                if (mysqli_num_rows($sql_dusun) > 0)
                {
                  while($dusun = mysqli_fetch_array($sql_dusun))
                  {
                    ?>
                    <option value="" hidden selected>Pilih Dusun..</option>
                   <option value="<?=$dusun['nama_dusun'];?>"> <?=$dusun['nama_dusun'];?> </option>
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
                </select>
            </div>
            

            <div class="form-group">           
                <label for="exampleInputEmail1">Nomor Hp/WhatsApp</label>
                <input type="number" onkeyPress="if(this.value.length==13) return false;" class="form-control" name="edtnohp"placeholder="nomer hp"required>
            </div></div>            
          </div>
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-md"  data-dismiss="modal">
                <i class="nav-icon fas fa-times">&nbsp</i>Tutup</button>
              <button type="submit" name ="edit"class="btn btn-info btn-md"style="background-color:#1E90FF;"><i class="nav-icon fas fa-edit">&nbsp</i>Edit Data</font></button>
              </form>
            </div>            
          </div>
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
          var nik = $(e.relatedTarget).data('nik');
          var wkwk = $(e.relatedTarget).data('nkk');

          $(e.currentTarget).find('input[name="nik_anak"]').val(nik);
          $(e.currentTarget).find('input[name="haha"]').val(wkwk);

        });
      </script>

      <script type="text/javascript">
        $('#modal-edit').on('show.bs.modal', function(e){
          //get data id attribute of the clicked element
          var nokk        = $(e.relatedTarget).data('nkk');
          var nonikibu    = $(e.relatedTarget).data('nik_ibu');
          var namaibune   = $(e.relatedTarget).data('nama_ibu');
          var nokkbpane   = $(e.relatedTarget).data('nik_ayah');
          var namabapane  = $(e.relatedTarget).data('nama_ayah');
          var rwne        = $(e.relatedTarget).data('rw');
          var rtne        = $(e.relatedTarget).data('rt');
          var dusune      = $(e.relatedTarget).data('dusun');
          var kde         = $(e.relatedTarget).data('kode');
          var nmrhp       = $(e.relatedTarget).data('nohp');
          
          $(e.currentTarget).find('input[name="nmrkk"]').val(nokk);
          $(e.currentTarget).find('input[name="nmrnikibu"]').val(nonikibu);
          $(e.currentTarget).find('input[name="aranibu"]').val(namaibune);
          $(e.currentTarget).find('input[name="nmrnikayh"]').val(nokkbpane);
          $(e.currentTarget).find('input[name="aranayah"]').val(namabapane);
          $(e.currentTarget).find('input[name="rwpeserta"]').val(rwne);
          $(e.currentTarget).find('input[name="rtpeserta"]').val(rtne);
          $(e.currentTarget).find('input[name="arandusun"]').val(dusune);
          $(e.currentTarget).find('input[name="kdpst"]').val(kde);
          $(e.currentTarget).find('input[name="kdpst2"]').val(kde);
          $(e.currentTarget).find('input[name="edtnohp"]').val(nmrhp);
    
        });
        </script>
</body>
</html>
<?php
  }
  ?>
