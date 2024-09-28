<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laporan Data Per Anak </title>

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
         <center> <img src="../auth/img/psd11.png" style='width:110px; height:105px;'> LAPORAN DATA IMUNISASI SETIAP ANAK</h2></center>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <?php
    	require_once '../database/config.php';
      $nama = @$_GET['namanak'];
    	$namaanak         = $_GET['anak'];
    	$namaibu          = $_GET['namaibu'];
      $namaayah         = $_GET['namaayah'];
      $nkk              = $_GET['nkk'];
      $nikanak          = $_GET['nik'];
      $kelamin          = $_GET['kelamin'];
      $tanggallahir     = $_GET['tgllahir'];

      $panggildusun     = mysqli_query($con, "SELECT dusun from tbl_anak WHERE nik='$nikanak'") or die (mysqli_error($con));
      $arraydusun       = mysqli_fetch_assoc ($panggildusun); 
      $namadusun        = $arraydusun['dusun'];

      $panggilkontak    = mysqli_query($con, "SELECT kontak_kadus from tbl_dusun WHERE nama_dusun='$namadusun' ") or die (mysqli_error($con));
      $arraydusunn      = mysqli_fetch_assoc ($panggilkontak); 
      // $kontakkadus      = $arraydusunn['kontak_kadus'];
      if (mysqli_num_rows($panggilkontak)>0)
                  {
                    $kontakkadus = $arraydusunn['kontak_kadus'];
                    
                  }
                  else
                  {
                    $kontakkadus="";
                  }
      
  
    	
    ?>
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">       
        <address>
          <strong>Posyandu Desa Cinanas</strong><br>
          Cinanas, Bantarkawung <br>
          Kabupaten Brebes, Jawa Tengah 52274<br>
          Kontak Kadus : <?=$kontakkadus;?> <br>
          Email: cinanasdesa2023@gmail.com
        </address>
      </div>
      <!-- /.col -->
      
      <div class="col-sm-4 invoice-col">
        <b>NKK           : </b><?=$nkk;?><br>
        <b>Nama Anak     :</b> <?=$namaanak;?><br>
        <b>Tanggal Lahir :</b> <?=$tanggallahir;?><br>
        <b>Jenis Kelamin :</b><?=$kelamin;?><br>
        <b>Dusun         :</b><?=$namadusun;?><br>
      </div>

      <div class="col-sm-4 invoice-col">        
        <b>Nama Ibu :</b> <?=$namaibu;?><br>
        <b>Nama Ayah :</b><?=$namaayah;?> <br>        
      </div>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header" style="background-color:#4682B4">
                <h3 class="card-title"><font color ="#fffff"><i class="nav-icon fas fa-chart-line">&nbsp</i> <b> Grafik Berat Badan Anak : <?=$namaanak;?></b> </font></h3>
                </div>            
                <div class="card-body">
              <div id="curve_chart" style="width: 1200px; height: 450px"></div>
            </div>
           </div>
          </div>
         </div>
    <!-- /.row -->

    <!-- Table row -->
    <!-- <div class="row"> -->
      <div class="col-12 table-responsive">
          <table id="example9" class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th style="width:5%">No</th>
                    <th>Tgl Ukur</th>
                    <th>Ukur Ke </th>
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
                     $no=1;
                     $sql_panggilnota = mysqli_query($con,"SELECT * FROM tbl_pengukuran_imunisasi WHERE nik='$nikanak' ") or die(mysqli_error($con));
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
                  <?php
                    $kdtotal =  mysqli_query($con, "SELECT nama_anak FROM tbl_pengukuran_imunisasi WHERE nama_anak='$namaanak'") or die(mysqli_error($con));
                    $adutotal = mysqli_fetch_assoc($kdtotal);
                  ?>
                </tr>
                </table>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
</div>

<script>
  window.addEventListener("load", window.print());
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

              
            <?php
            //panggil pengukutan ke 1
            $nikbocah = $_GET['nik'];

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
