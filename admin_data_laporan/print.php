<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laporan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets_adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets_adminlte/dist/css/adminlte.min.css">
   <link rel="shortcut icon" href="../auth/img/psd11.png">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <img src="../auth/img/psd11.png?>" style='width:109px; height:105px;'/>  LAPORAN IMUNISASI POSYANDU DESA CINANAS
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <?php
    	require_once     '../database/config.php';
      $tawal          = $_GET['awal'];
      $tahir          = $_GET['akhir'];
    

      $panggildusun   = mysqli_query($con, "SELECT * from tbl_anak ") or die (mysqli_error($con));
      $arraydusun     = mysqli_fetch_assoc ($panggildusun); 
    

      $panggildusun   = mysqli_query($con, "SELECT * from tbl_pengukuran_imunisasi ") or die (mysqli_error($con));
      $arraydusun     = mysqli_fetch_assoc ($panggildusun); 

      $panggilkontak  = mysqli_query($con, "SELECT kontak_kadus from tbl_dusun") or die (mysqli_error($con));
      $arraydusun     = mysqli_fetch_assoc ($panggilkontak); 
  
    	
    ?>
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
       
        <address>
          <strong>Posyandu Desa Cinanas</strong><br>
          Kel.Cinanas, Kec.Bantarkawung <br>
          Kabupaten Brebes, Jawa Tengah 52274<br>
          Email: cinanasdesa2023@gmail.com<br>
          Periode <?=$tawal;?> - <?=$tahir;?>
        </address>
      </div>
      <!-- /.col -->
      
      <!-- <div class="col-sm-4 invoice-col">
        <b>NKK : </b><br>
        <b>Nama Anak :</b> <br>
        <b>Tanggal Lahir :</b> <br>
        <b>Jenis Kelamin :</b><br>
        <b>Dusun :</b><br>
      </div>

      <div class="col-sm-4 invoice-col">
        
        <b>Nama Ibu :</b> <br>
        <b>Nama Ayah :</b> <br>
        
      </div> -->
      
    <!-- /.row -->

    <!-- Table row -->
    <!-- <div class="row"> -->
      <div class="col-12 table-responsive">
          <table id="example9" class="table table-striped table-sm">
                  <thead>
                    
                  <tr>
                    <th style="width:5%">No</th>
                    <th>Tgl</th>
                    <th>Nama</th>
                    <th>Usia</th>
                    <th>Ukur(Ke) </th>
                    <th>Suhu</th>
                    <th>BB(Kg)</th>
                    <th>TB(Cm)</th>
                    <th>Vitamin</th>
                    <th>Keterangan</th>
                    <th>Vaksin</th>
                    <th>Posyandu</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    <?php

               $no=1;
                     $sql_panggilnota = mysqli_query($con,"SELECT * FROM tbl_pengukuran_imunisasi WHERE tanggal BETWEEN '$tawal' AND '$tahir'") or die(mysqli_error($con));
                     if(mysqli_num_rows($sql_panggilnota) > 0)
                     {
                       while($data=mysqli_fetch_array($sql_panggilnota))
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
                                <?php
                                  $nkk = $data['nik'];
                                  $panggilpeseta = mysqli_query($con,"SELECT nama_anak FROM tbl_anak WHERE nik='$nkk'") or die (mysqli_error($con));
                                  $array = mysqli_fetch_assoc($panggilpeseta);
                                  $namaanak = $array['nama_anak'];
                                  ?>
                                  <?=$namaanak;?>
                          </td>

                          <td>
                          <?=$data['usia'];?> Bulan                      
                          </td>

                          <td>
                          <?=$data['pengukuran_ke'];?>                           
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
                           
                           
                        </tr>
                        <?php
                       }

                     }
                     else
                     {
                    

                     }
                    
                    ?>

                  
                  </tbody>

                 <tr>
                 
                  </tr>
                </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    
      <!-- <p align ="right">
          Cinanas,&nbsp<?php echo date("d-m-Y"); ?> <br>
          <br>
          <br>
          <br>
          Wiwin Winarni Amd.Sk
        </p> -->

    
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->

<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
