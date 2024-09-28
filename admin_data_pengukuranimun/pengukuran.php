<!DOCTYPE html>
<html lang="en">
<head>
  
      <?php 
        require_once "../database/config.php"; 
        include '../list_head_link.php';
        $halaman = 'admin_datapengukuran';
        session_start();
        // skrip diatas require_once "../database/config.php"; (agar memunculkan data pengguna)
       
        $peran = "admin";
        $nik = $_GET['no_nik'];
        $nama = @$_GET['namanak'];

        if ($_SESSION['peran']!=$peran)
        // if (!isset($_SESSION['nip']))
        {
          echo "<script>window.location='../auth';</script>";
        } else

        {
 
      ?>

</head>

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
            <h1 class="m-0">Data Pengukuran</h1>
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
              <h3 class="card-title"><font color ="#fffff"><i class="nav-icon fas fa-chart-line">&nbsp</i> <b> Grafik Berat Badan Anak : <?=$nama;?></b> </font></h3>
            </div>
            <div class="card-body">
          <div id="curve_chart" style="width: 1200px; height: 450px"></div>          
        </div>
      </div>
    </div>
  </div>
        <div class="row">
          <div class="col-lg-12">

          <div class="card">
              <div class="card-header" style="background-color:#4682B4">
              <h3 class="card-title"><font color ="#fffff"><i class="nav-icon fas fa-child">&nbsp</i> <b> Data Anak Atas Nama : <?=$nama;?></b> </font></h3>
            </div>

              <!-- /.card-header -->
              <div class="card-body">
                <a class="btn btn-md bg-gradient-warning" href="../admin_data_pengukuranimun"><i class="nav-icon fas fa-chevron-left">&nbsp</i> Kembali</a>
                <button type="button" class="btn btn-md bg-gradient" style="background-color:#4682B4"data-toggle="modal" data-target="#modal-tambah">
               <font color ="#fffff"><i class="nav-icon fas fa-plus">&nbsp</i>Tambah Data</font></button>
                
               <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="width:5%">NO</th>
                      <th style="width:8%">Tanggal Imunisasi</th>
                      <th>Imunisasi Ke</th>
                      <th>Usia (bulan)</th>
                      <th>Suhu Tubuh</th>
                      <th>BB (Kg)</th>
                      <th>TB (Cm)</th>
                      <th>Vitamin</th>
                      <th>Vaksin</th>
                      <th>Keterangan</th>
                      <th>Posyandu</th>
                      <th style="width:10%"><center>Aksi</center></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no=1;
                    $sql_pengguna = mysqli_query($con, " SELECT * FROM tbl_pengukuran_imunisasi WHERE nik='$nik'") or die (mysqli_error($con));
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
                                <?=$data['tanggal'];?>
                                </td>

                                <td>
                                <?=$data['pengukuran_ke'];?>
                                </td>

                                <td>
                                <?=$data['usia'];?> Bulan
                                </td>

                                <td>
                                <?=$data['suhu_tubuh'];?>°C
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
                                <?=$data['vaksin'];?>
                                </td>

                                <td>
                                <?=$data['keterangan'];?>
                                </td>

                                <td>
                                <?=$data['posyandu'];?>
                                </td>
                               
                                <td>
                                  <center>                           

                                 <button type="button" class="btn btn-xs bg-gradient-warning"
                                 data-toggle="modal" data-target="#modal-edit"
                                 data-id="<?=$data['id'];?>"
                                 data-tanggal="<?=$data['tanggal'];?>"
                                 data-pengukuran_ke="<?=$data['pengukuran_ke'];?>"
                                 data-usia="<?=$data['usia'];?>"
                                 data-suhu_tubuh="<?=$data['suhu_tubuh'];?>"
                                 data-berat_badan="<?=$data['berat_badan'];?>" 
                                 data-tinggi_badan="<?=$data['tinggi_badan'];?>"
                                 data-vitamin="<?=$data['vitamin'];?>" 
                                 data-keterangan="<?=$data['keterangan'];?>"
                                 data-vaksin="<?=$data['vaksin'];?>"
                                 data-posyandu="<?=$data['posyandu'];?>">
                                 <i class="nav-icon fas fa-edit">&nbsp</i>Edit</button>                                

                                <button type="button" class="btn btn-xs bg-gradient-danger"
                                 data-toggle="modal" data-target="#modal-default"
                                 data-id="<?=$data['id'];?>"
                                 data-pengukuran_ke="<?=$data['pengukuran_ke'];?>">
                                 <i class="nav-icon fas fa-trash">&nbsp</i>Hapus</button>
                                  </center>
                                 </td>
                                  
                        </tr>
                        <?php
                        }
                    } 
                    else 
                    {
                        echo "<tr><td colspan=\"11\" align=\"center\"><h6><b>Data Tidak Ditemukan</b></h6></td></tr>";
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

<?php
      $pgnota = mysqli_query($con,"SELECT tanggal FROM tbl_pengukuran_imunisasi") or die(mysqli_error($con));
      if (mysqli_num_rows($pgnota)>0)
      {
        $now =date('Y-m-d');
        
      }
      
      ?>

<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            
            <div class="modal-body">
            <form role="form" class="form-layout" action="hapuspengukuran.php" method="post">
            <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                  Anda Yakin Ingin Menghapus Data Ini?
                </div>

                <label for="exampleInputEmail1">Imunusasi Ke</label></br>
              <input type="text" name="namane" id="namane" disabled></br>
              <input type="text" name="hapuspengukuran" id="hapuspengukuran" hidden>
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
              <h5 class="modal-title"><font color="#ffffff">Tambah Data Pengukuran Anak</font></h5>
            </div>
            <div class="modal-body">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-6">
            <form role="form" class="form-layout" action="tambahpengukuran.php?no_nik=<?=$nik;?>&namanak=<?=$nama;?>" method="post">
                        
            <div class="form-group">           
                <label for="exampleInputEmail1">Tanggal</label>
                <input type="date" class="form-control" name="tbhtanggal" value ="<?=$now;?>" disabled>
                <input type="date" class="form-control" name="tang" value ="<?=$now;?>" hidden>

            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Imunisasi Ke</label>
                <input type="number" class="form-control" name="tbhpengukuran"placeholder="pengukuran ke..."required>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Usia(bulan)</label>
                <input type="number" class="form-control" name="tbhusia"placeholder="Usia(Bulan)..."required>
            </div>
            
            <div class="form-group">           
                <label for="exampleInputEmail1">Suhu Tubuh</label>
                <input type="text" class="form-control" name="tbhsuhu" placeholder="suhu tubuh..."required>
            </div>
            
            <div class="form-group">           
                <label for="exampleInputEmail1">BB(Kg)</label>
                <input type="text"  class="form-control" name="tbhbb"placeholder="Kg..."required> 
            </div> 
          </div>

            <div class="col-lg-6">
            <div class="form-group">           
                <label for="exampleInputEmail1">TB(Cm)</label>
                <input type="text" class="form-control" name="tbhtb"placeholder="Cm..."required>
            </div>
                    
            <div class="form-group">           
                <label for="exampleInputEmail1">Vitamin</label>
                <!-- <input type="text" class="form-control" name="tbhvitamin"placeholder="Jenis Vitamin..."required> -->
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="tbhvitamin">
                      <?php
                      $sqlvit = mysqli_query($con, " SELECT * FROM tbl_vitamin") or die (mysqli_error($con));
                      // skrip diatas berfungsi untuk memanggil tabel dusun
                        if (mysqli_num_rows($sqlvit) > 0)
                        // skrip diatas berfungsi untuk apakah ditabel dusun ada isinya
                          {
                            while($vita = mysqli_fetch_array($sqlvit))
                            // skrip diatas berfungsi untuk pengulangan yang diambil dari tabel dusun
                            {
                            ?>
                            <option value="" hidden selected>Pilih Vitamin..</option>
                            <option value="<?=$vita['nama_vitamin'];?>"> <?=$vita['nama_vitamin'];?> </option>
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
                <label for="exampleInputEmail1">Vaksin</label>
                <!-- <input type="text" class="form-control" name="tbhvaksin"placeholder="vaksin..."> -->
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="tbhvaksin">
                    <?php
                    $sqlvaksin = mysqli_query($con, " SELECT * FROM tbl_vaksin") or die (mysqli_error($con));
                    // skrip diatas berfungsi untuk memanggil tabel dusun
                      if (mysqli_num_rows($sqlvaksin) > 0)
                      // skrip diatas berfungsi untuk apakah ditabel dusun ada isinya
                        {
                          while($vaksine = mysqli_fetch_array($sqlvaksin))
                          // skrip diatas berfungsi untuk pengulangan yang diambil dari tabel dusun
                          {
                          ?>
                          <option value="" hidden selected>Pilih Vaksin..</option>
                          <option value="<?=$vaksine['nama_vaksin'];?>"> <?=$vaksine['nama_vaksin'];?> </option>
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
                <label for="exampleInputEmail1">Keterangan</label>
                <input type="text" class="form-control" name="tbhketerangan"placeholder="Pertumbuhan Anak..."required>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Posyandu</label>
                <!-- <input type="text" class="form-control" name="tbhposyandu"placeholder="posyandu..."required> -->
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="tbhposyandu">
                      <?php
                      $sql_lokasi = mysqli_query($con, " SELECT * FROM tbl_lokasi_posyandu") or die (mysqli_error($con));
                      // skrip diatas berfungsi untuk memanggil tabel dusun
                        if (mysqli_num_rows($sql_lokasi) > 0)
                        // skrip diatas berfungsi untuk apakah ditabel dusun ada isinya
                          {
                            while($lokasipos = mysqli_fetch_array($sql_lokasi))
                            // skrip diatas berfungsi untuk pengulangan yang diambil dari tabel dusun
                            {
                            ?>
                            <option value="" hidden selected>Pilih Lokasi Posyandu..</option>
                            <option value="<?=$lokasipos['nama_posyandu'];?>"> <?=$lokasipos['nama_posyandu'];?> </option>
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
          </div>
         </div>
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-md"   data-dismiss="modal">
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

      <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header" style="background-color:#4682B4;">
              <h5 class="modal-title"><font color="#ffffff">Edit Data Pengukuran Anak</font></h5>
            </div>
            <div class="modal-body">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-6">
            <form role="form" class="form-layout" action="editpengukuran.php" method="post">
            <div class="form-group">           
                <label for="exampleInputEmail1">ID</label>
                <input type="text" class="form-control" name="idpgk" disabled>
                <input type="text" class="form-control" name="idpgk2" hidden>

            </div>
            <div class="form-group">           
                <label for="exampleInputEmail1">Tanggal</label>
                <input type="date" class="form-control" name="edttanggal"required autofocus>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Imunisasi Ke</label>
                <input type="number" class="form-control" name="edtpengukuran"required >
            </div>
            
            <div class="form-group">           
                <label for="exampleInputEmail1">Usia(bulan)</label>
                <input type="number" class="form-control" name="edtusia"required>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Suhu Tubuh</label>
                <input type="text" class="form-control" name="edtsuhu"required>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">BB(Kg)</label>
                <input type="text" class="form-control" name="edtbb"required>
              </div>
            </div>

            <div class="col-lg-6">
            <div class="form-group">           
                <label for="exampleInputEmail1">TB(Cm)</label>
                <input type="text" class="form-control" name="edttb"placeholder="Tinggi Badan"required>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Vitamin</label>
                <!-- <input type="text" class="form-control" name="edtvit"placeholder="Nomer Kontak Kadus"> -->
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="edtvit" required>
              <?php
               $sqlvita = mysqli_query($con, " SELECT * FROM tbl_vitamin") or die (mysqli_error($con));
               // skrip diatas berfungsi untuk memanggil tabel dusun
                if (mysqli_num_rows($sqlvita) > 0)
                // skrip diatas berfungsi untuk apakah ditabel dusun ada isinya
                  {
                    while($vit = mysqli_fetch_array($sqlvita))
                    // skrip diatas berfungsi untuk pengulangan yang diambil dari tabel dusun
                    {
                    ?>
                    <option value="" hidden selected>Pilih Vitamin..</option>
                    <option value="<?=$vit['nama_vitamin'];?>"> <?=$vit['nama_vitamin'];?> </option>
                    <!-- skrip diatas berfungsi untuk menampilkan beberapa opsi isi data yang ada pada tabel dusun kolom nama_dusun -->
                      <?php
                    }
                  } 
                else
                {
                  ?>
                    <option value="belum ada data vitamin"> belum ada vitamin </option>
                    <!-- skrip diatas berfungsi jika ditabel dusun belum ada isinya -->
                    <?php
                }
                ?>
                </select>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Vaksin</label>
                <!-- <input type="text" class="form-control" name="edtvaksin"placeholder="Nomer Kontak Kadus"> -->
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="edtvaksin" require>
              <?php
               $sqlvaksine = mysqli_query($con, " SELECT * FROM tbl_vaksin") or die (mysqli_error($con));
               // skrip diatas berfungsi untuk memanggil tabel dusun
                if (mysqli_num_rows($sqlvaksine) > 0)
                // skrip diatas berfungsi untuk apakah ditabel dusun ada isinya
                  {
                    while($vaksinn = mysqli_fetch_array($sqlvaksine))
                    // skrip diatas berfungsi untuk pengulangan yang diambil dari tabel dusun
                    {
                    ?>
                    <option value="" hidden selected>Pilih Vaksin..</option>
                    <option value="<?=$vaksinn['nama_vaksin'];?>"> <?=$vaksinn['nama_vaksin'];?> </option>
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
                <label for="exampleInputEmail1">Keterangan</label>
                <input type="text" class="form-control" name="edtketerangan"placeholder="Nomer Kontak Kadus"required>
            </div>

            <div class="form-group">           
                <label for="exampleInputEmail1">Posyandu</label>
                <!-- <input type="text" class="form-control" name="edtposyandu"placeholder="Nomer Kontak Kadus"required> -->
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="edtposyandu" require>
              <?php
               $sql_lok = mysqli_query($con, " SELECT * FROM tbl_lokasi_posyandu") or die (mysqli_error($con));
               // skrip diatas berfungsi untuk memanggil tabel dusun
                if (mysqli_num_rows($sql_lok) > 0)
                // skrip diatas berfungsi untuk apakah ditabel dusun ada isinya
                  {
                    while($lokpos = mysqli_fetch_array($sql_lok))
                    // skrip diatas berfungsi untuk pengulangan yang diambil dari tabel dusun
                    {
                    ?>
                    <option value="" hidden selected>Pilih Lokasi Posyandu..</option>
                    <option value="<?=$lokpos['nama_posyandu'];?>"> <?=$lokpos['nama_posyandu'];?> </option>
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
            </div>            
          </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-md"  data-dismiss="modal">
                <i class="nav-icon fas fa-times">&nbsp</i>Tutup</button>
              <button type="submit" name ="edit"class="btn btn-info btn-md"><i class="nav-icon fas fa-edit">&nbsp</i>Edit Data</font></button>
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
          var id = $(e.relatedTarget).data('id');
          var nama = $(e.relatedTarget).data('pengukuran_ke');

          $(e.currentTarget).find('input[name="hapuspengukuran"]').val(id);
          $(e.currentTarget).find('input[name="namane"]').val(nama);
        });
        </script> 

      <script type="text/javascript">
        $('#modal-edit').on('show.bs.modal', function(e){
          //get data id attribute of the clicked element
          var tanggal = $(e.relatedTarget).data('tanggal');
          var pengukuran = $(e.relatedTarget).data('pengukuran_ke');
          var usia = $(e.relatedTarget).data('usia');
          var suhu = $(e.relatedTarget).data('suhu_tubuh');
          var berat = $(e.relatedTarget).data('berat_badan');
          var tinggi = $(e.relatedTarget).data('tinggi_badan');
          var vitamin = $(e.relatedTarget).data('vitamin');
          var keterangan = $(e.relatedTarget).data('keterangan');
          var vaksin = $(e.relatedTarget).data('vaksin');
          var posyandu = $(e.relatedTarget).data('posyandu');
          var id = $(e.relatedTarget).data('id');

          
          $(e.currentTarget).find('input[name="edttanggal"]').val(tanggal);
          $(e.currentTarget).find('input[name="edtpengukuran"]').val(pengukuran);
          $(e.currentTarget).find('input[name="edtusia"]').val(usia);
          $(e.currentTarget).find('input[name="edtsuhu"]').val(suhu);
          $(e.currentTarget).find('input[name="edtbb"]').val(berat);
          $(e.currentTarget).find('input[name="edttb"]').val(tinggi);
          $(e.currentTarget).find('input[name="edtvit"]').val(vitamin);
          $(e.currentTarget).find('input[name="edtketerangan"]').val(keterangan);
          $(e.currentTarget).find('input[name="edtvaksin"]').val(vaksin);
          $(e.currentTarget).find('input[name="edtposyandu"]').val(posyandu);
          $(e.currentTarget).find('input[name="idpgk"]').val(id);
          $(e.currentTarget).find('input[name="idpgk2"]').val(id);
          
        });
        </script>

      <!-- ====================GRAFIK PERTUMBUHAN BERAT BADAN============================= -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

              
            <?php
            //panggil pengukutan ke 1
            $nikbocah = $_GET['no_nik'];

            $panggilberat1 = mysqli_query($con,"SELECT tanggal,berat_badan FROM tbl_pengukuran_imunisasi WHERE nik='$nikbocah' AND pengukuran_ke=1") or die (mysqli_error($con));
            if (mysqli_num_rows($panggilberat1)>0)
            {
              $erre1  = mysqli_fetch_assoc($panggilberat1);            
              $berat1 = $erre1['berat_badan'];          
              $tanggal1 = $erre1['tanggal'];
              
            }
            else
            {
              $berat1="0";
            }
 
            //panggil pengukutan ke 2 =================================================================================================
            
            $panggilberat2 = mysqli_query($con,"SELECT tanggal,berat_badan FROM tbl_pengukuran_imunisasi WHERE nik='$nikbocah' AND pengukuran_ke=2") or die (mysqli_error($con));
            if (mysqli_num_rows($panggilberat2)>0)
            {
              $erre2  = mysqli_fetch_assoc($panggilberat2);            
              $berat2 = $erre2['berat_badan'];          
              $tanggal2 = $erre2['tanggal'];
              
            }
            else
            {
              $berat2="0";
            }
           
            //panggil pengukutan ke 3============================================================================================================
            
            $panggilberat3 = mysqli_query($con,"SELECT tanggal,berat_badan FROM tbl_pengukuran_imunisasi WHERE nik='$nikbocah'AND pengukuran_ke=3") or die (mysqli_error($con));
            if (mysqli_num_rows($panggilberat3)>0)
            {
              $erre3  = mysqli_fetch_assoc($panggilberat3);            
              $berat3 = $erre3['berat_badan'];          
              $tanggal3 = $erre3['tanggal'];
              
            }
            else
            {
              $berat3="0";
            }
              
            
            //PANGGIL PENGUKURAN 4========================================================================================
            $panggilberat4 = mysqli_query($con,"SELECT tanggal,berat_badan FROM tbl_pengukuran_imunisasi WHERE nik='$nikbocah'AND pengukuran_ke=4") or die (mysqli_error($con));
            if (mysqli_num_rows($panggilberat4)>0)
            {
              $erre4  = mysqli_fetch_assoc($panggilberat4);            
              $berat4 = $erre4['berat_badan'];          
              $tanggal4 = $erre4['tanggal'];
              
            }
            else
            {
              $berat4="0";
            }

            //PANGGIL PENGUKURAN 5
            $panggilberat5 = mysqli_query($con,"SELECT tanggal,berat_badan FROM tbl_pengukuran_imunisasi WHERE nik='$nikbocah'AND pengukuran_ke=5") or die (mysqli_error($con));
            if (mysqli_num_rows($panggilberat5)>0)
            {
              $erre5  = mysqli_fetch_assoc($panggilberat5);            
              $berat5 = $erre5['berat_badan'];          
              $tanggal5 = $erre5['tanggal'];
              
            }
            else
            {
              $berat5="0";
            }

            //PANGGIL PENGUKURAN 6
            $panggilberat6 = mysqli_query($con,"SELECT tanggal,berat_badan FROM tbl_pengukuran_imunisasi WHERE nik='$nikbocah'AND pengukuran_ke=6") or die (mysqli_error($con));
            if (mysqli_num_rows($panggilberat6)>0)
            {
              $erre6  = mysqli_fetch_assoc($panggilberat6);            
              $berat6 = $erre4['berat_badan'];          
              $tanggal6 = $erre4['tanggal'];
              
            }
            else
            {
              $berat6="0";
            }

            //PANGGIL PENGUKURAN 7
            $panggilberat7 = mysqli_query($con,"SELECT tanggal,berat_badan FROM tbl_pengukuran_imunisasi WHERE nik='$nikbocah'AND pengukuran_ke=7") or die (mysqli_error($con));
            if (mysqli_num_rows($panggilberat7)>0)
            {
              $erre7  = mysqli_fetch_assoc($panggilberat7);            
              $berat7 = $erre7['berat_badan'];          
              $tanggal7 = $erre7['tanggal'];
              
            }
            else
            {
              $berat7="0";
            }

            //PANGGIL PENGUKURAN 8
            $panggilberat8 = mysqli_query($con,"SELECT tanggal,berat_badan FROM tbl_pengukuran_imunisasi WHERE nik='$nikbocah'AND pengukuran_ke=8") or die (mysqli_error($con));
            if (mysqli_num_rows($panggilberat8)>0)
            {
              $erre8  = mysqli_fetch_assoc($panggilberat8);            
              $berat8 = $erre8['berat_badan'];          
              $tanggal8 = $erre8['tanggal'];
              
            }
            else
            {
              $berat8="0";
            }

            //PANGGIL PENGUKURAN 9
            $panggilberat9 = mysqli_query($con,"SELECT tanggal,berat_badan FROM tbl_pengukuran_imunisasi WHERE nik='$nikbocah'AND pengukuran_ke=9") or die (mysqli_error($con));
            if (mysqli_num_rows($panggilberat9)>0)
            {
              $erre9  = mysqli_fetch_assoc($panggilberat9);            
              $berat9= $erre9['berat_badan'];          
              $tanggal9 = $erre9['tanggal'];
              
            }
            else
            {
              $berat9="0";
            }

            //PANGGIL PENGUKURAN 10
            $panggilberat10 = mysqli_query($con,"SELECT tanggal,berat_badan FROM tbl_pengukuran_imunisasi WHERE nik='$nikbocah'AND pengukuran_ke=10") or die (mysqli_error($con));
            if (mysqli_num_rows($panggilberat10)>0)
            {
              $erre10  = mysqli_fetch_assoc($panggilberat10);            
              $berat10 = $erre10['berat_badan'];          
              $tanggal10 = $erre10['tanggal'];
              
            }
            else
            {
              $berat10="0";
            }

            //PANGGIL PENGUKURAN 11
            $panggilberat11 = mysqli_query($con,"SELECT tanggal,berat_badan FROM tbl_pengukuran_imunisasi WHERE nik='$nikbocah'AND pengukuran_ke=11") or die (mysqli_error($con));
            if (mysqli_num_rows($panggilberat11)>0)
            {
              $erre11  = mysqli_fetch_assoc($panggilberat11);            
              $berat11 = $erre11['berat_badan'];          
              $tanggal11 = $erre11['tanggal'];
              
            }
            else
            {
              $berat11="0";
            }

            //PANGGIL PENGUKURAN 12
            $panggilberat12 = mysqli_query($con,"SELECT tanggal,berat_badan FROM tbl_pengukuran_imunisasi WHERE nik='$nikbocah'AND pengukuran_ke=12") or die (mysqli_error($con));
            if (mysqli_num_rows($panggilberat12)>0)
            {
              $erre12  = mysqli_fetch_assoc($panggilberat12);            
              $berat12 = $erre12['berat_badan'];          
              $tanggal12 = $erre12['tanggal'];
              
            }
            else
            {
              $berat12="0";
            }

            //PANGGIL PENGUKURAN 13
            $panggilberat13 = mysqli_query($con,"SELECT tanggal,berat_badan FROM tbl_pengukuran_imunisasi WHERE nik='$nikbocah'AND pengukuran_ke=13") or die (mysqli_error($con));
            if (mysqli_num_rows($panggilberat13)>0)
            {
              $erre13  = mysqli_fetch_assoc($panggilberat13);            
              $berat13 = $erre13['berat_badan'];          
              $tanggal13 = $erre13['tanggal'];
              
            }
            else
            {
              $berat13="0";
            }

            //PANGGIL PENGUKURAN 14
            $panggilberat14 = mysqli_query($con,"SELECT tanggal,berat_badan FROM tbl_pengukuran_imunisasi WHERE nik='$nikbocah'AND pengukuran_ke=14") or die (mysqli_error($con));
            if (mysqli_num_rows($panggilberat14)>0)
            {
              $erre14  = mysqli_fetch_assoc($panggilberat14);            
              $berat14 = $erre14['berat_badan'];          
              $tanggal14 = $erre14['tanggal'];
              
            }
            else
            {
              $berat14="0";
            }

            //PANGGIL PENGUKURAN 15
            $panggilberat15 = mysqli_query($con,"SELECT tanggal,berat_badan FROM tbl_pengukuran_imunisasi WHERE nik='$nikbocah'AND pengukuran_ke=15") or die (mysqli_error($con));
            if (mysqli_num_rows($panggilberat15)>0)
            {
              $erre15  = mysqli_fetch_assoc($panggilberat15);            
              $berat15 = $erre15['berat_badan'];          
              $tanggal15 = $erre15['tanggal'];
              
            }
            else
            {
              $berat15="0";
            }

            //PANGGIL PENGUKURAN 16
            $panggilberat16 = mysqli_query($con,"SELECT tanggal,berat_badan FROM tbl_pengukuran_imunisasi WHERE nik='$nikbocah'AND pengukuran_ke=16") or die (mysqli_error($con));
            if (mysqli_num_rows($panggilberat15)>0)
            {
              $erre16  = mysqli_fetch_assoc($panggilberat16);            
              $berat16 = $erre16['berat_badan'];          
              $tanggal16 = $erre16['tanggal'];
              
            }
            else
            {
              $berat16="0";
            }

            //PANGGIL PENGUKURAN 17
            $panggilberat17 = mysqli_query($con,"SELECT tanggal,berat_badan FROM tbl_pengukuran_imunisasi WHERE nik='$nikbocah'AND pengukuran_ke=17") or die (mysqli_error($con));
            if (mysqli_num_rows($panggilberat17)>0)
            {
              $erre17  = mysqli_fetch_assoc($panggilberat17);            
              $berat17 = $erre17['berat_badan'];          
              $tanggal17 = $erre17['tanggal'];
              
            }
            else
            {
              $berat17="0";
            }

            //PANGGIL PENGUKURAN 18
            $panggilberat18 = mysqli_query($con,"SELECT tanggal,berat_badan FROM tbl_pengukuran_imunisasi WHERE nik='$nikbocah'AND pengukuran_ke=18") or die (mysqli_error($con));
            if (mysqli_num_rows($panggilberat18)>0)
            {
              $erre18  = mysqli_fetch_assoc($panggilberat18);            
              $berat18 = $erre18['berat_badan'];          
              $tanggal18 = $erre18['tanggal'];
              
            }
            else
            {
              $berat18="0";
            }

            //PANGGIL PENGUKURAN 19
            $panggilberat19 = mysqli_query($con,"SELECT tanggal,berat_badan FROM tbl_pengukuran_imunisasi WHERE nik='$nikbocah'AND pengukuran_ke=19") or die (mysqli_error($con));
            if (mysqli_num_rows($panggilberat19)>0)
            {
              $erre19 = mysqli_fetch_assoc($panggilberat19);            
              $berat19 = $erre19['berat_badan'];          
              $tanggal19 = $erre19['tanggal'];
              
            }
            else
            {
              $berat19="0";
            }

            //PANGGIL PENGUKURAN 20
            $panggilberat20 = mysqli_query($con,"SELECT tanggal,berat_badan FROM tbl_pengukuran_imunisasi WHERE nik='$nikbocah'AND pengukuran_ke=20") or die (mysqli_error($con));
            if (mysqli_num_rows($panggilberat20)>0)
            {
              $erre20  = mysqli_fetch_assoc($panggilberat20);            
              $berat20 = $erre20['berat_badan'];          
              $tanggal20 = $erre20['tanggal'];
              
            }
            else
            {
              $berat20="0";
            }

            //PANGGIL PENGUKURAN 21
            $panggilberat21 = mysqli_query($con,"SELECT tanggal,berat_badan FROM tbl_pengukuran_imunisasi WHERE nik='$nikbocah'AND pengukuran_ke=21") or die (mysqli_error($con));
            if (mysqli_num_rows($panggilberat21)>0)
            {
              $erre21  = mysqli_fetch_assoc($panggilberat21);            
              $berat21 = $erre21['berat_badan'];          
              $tanggal21 = $erre21['tanggal'];
              
            }
            else
            {
              $berat21="0";
            }

            //PANGGIL PENGUKURAN 22
            $panggilberat22 = mysqli_query($con,"SELECT tanggal,berat_badan FROM tbl_pengukuran_imunisasi WHERE nik='$nikbocah'AND pengukuran_ke=22") or die (mysqli_error($con));
            if (mysqli_num_rows($panggilberat22)>0)
            {
              $erre22  = mysqli_fetch_assoc($panggilberat22);            
              $berat22 = $erre22['berat_badan'];          
              $tanggal22 = $erre22['tanggal'];
              
            }
            else
            {
              $berat22="0";
            }

            //PANGGIL PENGUKURAN 23
            $panggilberat23 = mysqli_query($con,"SELECT tanggal,berat_badan FROM tbl_pengukuran_imunisasi WHERE nik='$nikbocah'AND pengukuran_ke=23") or die (mysqli_error($con));
            if (mysqli_num_rows($panggilberat23)>0)
            {
              $erre23  = mysqli_fetch_assoc($panggilberat23);            
              $berat23 = $erre23['berat_badan'];          
              $tanggal23 = $erre23['tanggal'];
              
            }
            else
            {
              $berat23="0";
            }

            //PANGGIL PENGUKURAN 24
            $panggilberat24 = mysqli_query($con,"SELECT tanggal,berat_badan FROM tbl_pengukuran_imunisasi WHERE nik='$nikbocah'AND pengukuran_ke=24") or die (mysqli_error($con));
            if (mysqli_num_rows($panggilberat24)>0)
            {
              $erre24  = mysqli_fetch_assoc($panggilberat24);            
              $berat24 = $erre24['berat_badan'];          
              $tanggal24 = $erre24['tanggal'];
              
            }
            else
            {
              $berat24="0";
            }

            ?>
  
            function drawChart() {
              var data = google.visualization.arrayToDataTable([
                ['Pengukuran', 'BB'],
                ['1',  <?=floatval($berat1);?>],
                ['2',  <?=floatval($berat2);?>],
                ['3',  <?=floatval($berat3);?>],
                ['4',  <?=floatval($berat4);?>],
                ['5',  <?=floatval($berat5);?>],
                ['6',  <?=floatval($berat6);?>],
                ['7',  <?=floatval($berat7);?>],
                ['8',  <?=floatval($berat8);?>],
                ['9',  <?=floatval($berat9);?>],
                ['10', <?=floatval($berat10);?>],
                ['11', <?=floatval($berat11);?>],
                ['12',  <?=floatval($berat12);?>],
                ['13',  <?=floatval($berat13);?>],
                ['14',  <?=floatval($berat14);?>],
                ['15',  <?=floatval($berat15);?>],
                ['16',  <?=floatval($berat16);?>],
                ['17',  <?=floatval($berat17);?>],
                ['18',  <?=floatval($berat18);?>],
                ['19',  <?=floatval($berat19);?>],
                ['20',  <?=floatval($berat20);?>],
                ['21',  <?=floatval($berat21);?>],
                ['22',  <?=floatval($berat22);?>],
                ['23',  <?=floatval($berat23);?>],
                ['24',  <?=floatval($berat24);?>],
                
              ]);

              data.setColumnProperty(0, 'type', 'string'); 

              var options = {
                title: 'Pertumbuhan Anak',
                curveType: 'function',
                legend: { position: 'bottom' }
              };

              var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

              chart.draw(data, options);
            }
  </script>

</body>
</html>
<?php
  }
  ?>
