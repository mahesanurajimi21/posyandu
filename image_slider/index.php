<!DOCTYPE html>
<html lang="en">
<head>
  
<?php 
  require_once "../database/config.php";
  include "../list_head_link.php";
  $halaman = 'image_slider';
  session_start();
  $peran = "admin";

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
include '../sidebar.php';
?>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Image Slider (Carousel)</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

      <?php
      
        $querygambar1= mysqli_query($con, "SELECT * FROM tbl_image_sliderr WHERE id =
         '1'") or die(mysqli_error($con));
        $querygambar2= mysqli_query($con, "SELECT * FROM tbl_image_sliderr WHERE id =
         '2'") or die(mysqli_error($con));
        $querygambar3= mysqli_query($con, "SELECT * FROM tbl_image_sliderr WHERE id =
         '3'") or die(mysqli_error($con));
        $querygambar4= mysqli_query($con, "SELECT * FROM tbl_image_sliderr WHERE id =
         '4'") or die(mysqli_error($con));

         $data1= mysqli_fetch_assoc($querygambar1);
         $data2= mysqli_fetch_assoc($querygambar2);
         $data3= mysqli_fetch_assoc($querygambar3);
         $data4= mysqli_fetch_assoc($querygambar4);

         
      ?>
        
      <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header" style="background-color:#4682B4">
                <h3 class="card-title"><font color="#ffffff"><i class="nav-icon fas fa-image"></i>
                Gambar Slider 1 </font></h3>

                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  

                  <button type="button" class="btn btn-sm bg-gradient-warning"
                    data-toggle="modal" data-target="#modal-slider1">
                     <i class="nav-icon fas fa-upload">&nbsp</i>Ganti</button>

                  </div>
                    <!-- /.card header -->
                 <div class="card-body">
                  
                 <center>
                <img src="../auth/<?=$data1['path_image'];?>" width="50%" height="50%">
                </center>

              </div>
          <!-- ?/.card body -->
            </div>
           <!-- /.card -->
          </div>

          <div class="col-lg-6">
            <div class="card">
              <div class="card-header" style="background-color:#4682B4">
                <h3 class="card-title"><font color="#ffffff"><i class="nav-icon fas fa-image"></i>
                  Gambar Slider 2 </font></h3>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

                  <button type="button" class="btn btn-sm bg-gradient-warning"
                    data-toggle="modal" data-target="#modal-slider2">
                      <i class="nav-icon fas fa-upload">&nbsp</i>Ganti</button>

                    </div>
                <!-- /.card header -->
                    <div class="card-body">
                    <center>
                    <img src="../auth/<?=$data2['path_image'];?>" width="50%" height="50%">
                   </center>

                  </div>
          <!-- ?/.card body -->
              </div>
          <!-- /.card -->
            </div>
          </div>

          <div class="row">
          
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header" style="background-color:#4682B4">
                <h3 class="card-title"><font color="#ffffff"><i class="nav-icon fas fa-image"></i>
                  Gambar Slider 3 </font></h3>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

                  <button type="button" class="btn btn-sm bg-gradient-warning"
                    data-toggle="modal" data-target="#modal-slider3">
                      <i class="nav-icon fas fa-upload">&nbsp</i>Ganti</button>
                  </div>
                <!-- /.card header -->
                  <div class="card-body">
                <center>
                  <img src="../auth/<?=$data3['path_image'];?>" width="50%" height="50%">
                </center>
                  </div>
          <!-- ?/.card body -->
              </div>
          <!-- /.card -->
          </div>

          <div class="col-lg-6">
            <div class="card">
              <div class="card-header" style="background-color:#4682B4">
                <h3 class="card-title"><font color="#ffffff"><i class="nav-icon fas fa-image"></i>
                Gambar Slider 4 </font></h3>

                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  <button type="button" class="btn btn-sm bg-gradient-warning"
                    data-toggle="modal" data-target="#modal-slider4">
                      <i class="nav-icon fas fa-upload">&nbsp</i>Ganti</button>
                      
                </div>
                <!-- /.card header -->
                <div class="card-body">
                <center>
                  <img src="../auth/<?=$data4['path_image'];?>" width="50%" height="50%">
                </center>
                  </div>
          <!-- ?/.card body -->
              </div>
          <!-- /.card -->
           </div>
          </div>  

        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  
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

<div class="modal fade" id="modal-slider1">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header" style="background-color:#8B0000;">
              <h5 class="modal-title"><font color="#ffffff">Ganti Gambar Slider Carousel 1</font></h5>
            </div>
            
            <div class="modal-body">
            <form role="form" class="form-layout" action="uploadgambar.php" method="post" enctype="multipart/form-data">

            <div class="form-group">           
                <label for="exampleInputEmail1">Ambil file</label>
                <input type="file" class="form-control" name="filegambar1" accept =".png, .jpg, .jpeg," required>
            </div>
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-md" data-dismiss="modal">
                <i class="nav-icon fas fa-times">&nbsp</i>Batalkan</button>
              <button type="submit" class="btn btn-danger btn-md" name="image1">
                <i class="nav-icon fas fa-upload">&nbsp</i>Ganti Gambar</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      </div> 

      <div class="modal fade" id="modal-slider2">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header" style="background-color:#8B0000;">
              <h5 class="modal-title"><font color="#ffffff">Ganti Gambar Slider Carousel 2</font></h5>
            </div>
            
            <div class="modal-body">
            <form role="form" class="form-layout" action="uploadgambar.php" method="post" enctype="multipart/form-data">

            <div class="form-group">           
                <label for="exampleInputEmail1">Ambil file</label>
                <input type="file" class="form-control" name="filegambar2" accept =".png, .jpg, .jpeg,"required>
            </div>
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-md" data-dismiss="modal">
                <i class="nav-icon fas fa-times">&nbsp</i>Batalkan</button>
              <button type="submit" class="btn btn-danger btn-md" name="image2">
                <i class="nav-icon fas fa-upload">&nbsp</i>Ganti Gambar</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      </div>

      <div class="modal fade" id="modal-slider3">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header" style="background-color:#8B0000;">
              <h5 class="modal-title"><font color="#ffffff">Ganti Gambar Slider Carousel 3</font></h5>
            </div>
            
            <div class="modal-body">
            <form role="form" class="form-layout" action="uploadgambar.php" method="post" enctype="multipart/form-data">

            <div class="form-group">           
                <label for="exampleInputEmail1">Ambil file</label>
                <input type="file" class="form-control" name="filegambar3"accept =".png, .jpg, .jpeg,"required>
            </div>
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-md" data-dismiss="modal">
                <i class="nav-icon fas fa-times">&nbsp</i>Batalkan</button>
              <button type="submit" class="btn btn-danger btn-md" name="image3">
                <i class="nav-icon fas fa-upload">&nbsp</i>Ganti Gambar</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      </div>
      

      <div class="modal fade" id="modal-slider4">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header" style="background-color:#8B0000;">
              <h5 class="modal-title"><font color="#ffffff">Ganti Gambar Slider Carousel 4</font></h5>
            </div>
            
            <div class="modal-body">
            <form role="form" class="form-layout" action="uploadgambar.php" method="post" enctype="multipart/form-data">

            <div class="form-group">           
                <label for="exampleInputEmail1">Ambil file</label>
                <input type="file" class="form-control" name="filegambar4"accept =".png, .jpg, .jpeg,"required>
            </div>
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-md" data-dismiss="modal">
                <i class="nav-icon fas fa-times">&nbsp</i>Batalkan</button>
              <button type="submit" class="btn btn-danger btn-md" name="image4">
                <i class="nav-icon fas fa-upload">&nbsp</i>Ganti Gambar</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      </div> 
       
</body>
</html>
<?php
  }
  ?>