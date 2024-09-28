<!DOCTYPE html>
<html lang="en">
<head>
<?php
   include "../list_head_link.php";
   $halaman = 'haha';
   session_start();

   $peran = "admin";

  if ($_SESSION['peran']!=$peran)
  //  if(!isset($_SESSION['nip']))
   {
    echo "<script>window.location='../auth';</script>";
   }
   else
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
   include "../navigasi_atas.php";
  ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <?php
   include "../sidebar.php";
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Dasbor</h1>
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
              <div class="card-header" style="background-color:#106a05">
                <h3 class="card-title"><font color="#ffffff"><i class="nav-icon fas fa-clipboard"></i> Pertumbuhan Berat Badan Anak</font></h3>
              </div>
              <div class="card-body">
                
                <div id="curve_chart" style="width: 1200px; height: 450px"></div>
                
            </div>
      
           </div>
          </div>          
        </div>

         <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header" style="background-color:#106a05">
                <h3 class="card-title"><font color="#ffffff"><i class="nav-icon fas fa-clipboard"></i> Grafik Penjualan</font></h3>
              </div>
              <div class="card-body">
                <center>

                  <div class="kotak">
        <form method="GET" action="">
            <input type="text" name="isi_konten" placeholder="isi konten qrcode ..">
            <input type="submit" value="Buat QR Code">
        </form>
    </div>

    <div class="hasil">
        <?php 
        if(isset($_GET['isi_konten'])){

            // isi qrcode yang ingin dibuat. akan muncul saat di scan
            $isi = $_GET['isi_konten'];

            // memanggil library php qrcode
            include "phpqrcode/qrlib.php"; 

            // nama folder tempat penyimpanan file qrcode
            $penyimpanan = "temp/";

            // membuat folder dengan nama "temp"
            if (!file_exists($penyimpanan))
             mkdir($penyimpanan);

            // perintah untuk membuat qrcode dan menyimpannya dalam folder temp
            // atur level pemulihan datanya dengan QR_ECLEVEL_L | QR_ECLEVEL_M | QR_ECLEVEL_Q | QR_ECLEVEL_H
            // atur pixel qrcode pada parameter ke 4
            // atur jarak frame pada parameter ke 5
            QRcode::png($isi, $penyimpanan.'hasil_qrcode.png', QR_ECLEVEL_L, 10, 5); 
         
            // menampilkan qrcode 
            echo '<img src="'.$penyimpanan.'hasil_qrcode.png">';
        
        }
        ?>
    </div>
    </center>

                
              <!--    <video id="previewKamera" style="width: 300px;height: 300px;"></video>
                 <br>
                 <select id="pilihKamera" style="max-width:400px">
                 </select>
                 <br>
                 <input type="text" id="hasilscan">
                 -->
            </div>
      
           </div>
          </div> 
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header" style="background-color:#106a05">
                <h3 class="card-title"><font color="#ffffff"><i class="nav-icon fas fa-qrcode"></i> Hasil QR</font></h3>
              </div>
              <div class="card-body">
              </div>
               </div>
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
   include "../footer.php";
  ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="../assets_adminlte/plugins/jquery/jquery.min.js"></script>
<script src="../assets_adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets_adminlte/dist/js/adminlte.js"></script>
<script src="../assets_adminlte/plugins/chart.js/Chart.min.js"></script>
<script src="../assets_adminlte/dist/js/pages/dashboard3.js"></script>
<script src="../assets_adminlte/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
              var data = google.visualization.arrayToDataTable([
                ['Bulan', 'Tiket terjual'],
                ['Jan',  1000],
                ['Feb',  1170],
                ['Mar',  660],
                ['Apr',  1030],
                ['Mei',  2030],
                ['Jun',  3030],
                ['Jul',  4030],
                ['Agu',  5030],
                ['Sep',  2030],
                ['Okt',  3030],
                ['Nov',  2030],
                ['Des',  1030]
              ]);

              var options = {
                title: 'Pertumbuhan Anak',
                curveType: 'function',
                legend: { position: 'bottom' }
              };

              var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

              chart.draw(data, options);
            }
  </script>
   <script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>
     <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 <!-- <script>
        let selectedDeviceId = null;
        const codeReader = new ZXing.BrowserMultiFormatReader();
        const sourceSelect = $("#pilihKamera");
 
        $(document).on('change','#pilihKamera',function(){
            selectedDeviceId = $(this).val();
            if(codeReader){
                codeReader.reset()
                initScanner()
            }
        })
 
        function initScanner() {
            codeReader
            .listVideoInputDevices()
            .then(videoInputDevices => {
                videoInputDevices.forEach(device =>
                    console.log(`${device.label}, ${device.deviceId}`)
                );
 
                if(videoInputDevices.length > 0){
                     
                    if(selectedDeviceId == null){
                        if(videoInputDevices.length > 1){
                            selectedDeviceId = videoInputDevices[1].deviceId
                        } else {
                            selectedDeviceId = videoInputDevices[0].deviceId
                        }
                    }
                     
                     
                    if (videoInputDevices.length >= 1) {
                        sourceSelect.html('');
                        videoInputDevices.forEach((element) => {
                            const sourceOption = document.createElement('option')
                            sourceOption.text = element.label
                            sourceOption.value = element.deviceId
                            if(element.deviceId == selectedDeviceId){
                                sourceOption.selected = 'selected';
                            }
                            sourceSelect.append(sourceOption)
                        })
                 
                    }
 
                    codeReader
                        .decodeOnceFromVideoDevice(selectedDeviceId, 'previewKamera')
                        .then(result => {
 
                                //hasil scan
                                console.log(result.text)
                                $("#hasilscan").val(result.text);
                             
                                if(codeReader){
                                    codeReader.reset()
                                }
                        })
                        .catch(err => console.error(err));
                     
                } else {
                    alert("Camera not found!")
                }
            })
            .catch(err => console.error(err));
        }
 
 
        if (navigator.mediaDevices) {
             
 
            initScanner()
             
 
        } else {
            alert('Cannot access camera.');
        }
       
     </script> -->
</body>
</html>
<?php
 }
 ?>
