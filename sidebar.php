<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#000000">
    <!-- Brand Logo -->
    <a href="../admin_dasbor" class="brand-link">
      <!-- <img src="../auth/img/psd11.png" alt="Prostreet" class="brand-image img-square elevation-3" style='width:35px; height:30px;'> -->
      <span class="brand-text font-weight-light"><b><font color ="#4682B4"><center>POSYANDU CINANAS</center></font></b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
      <!-- Sidebar Menu -->
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="../admin_dasbor" class="nav-link <?php if($halaman=='admin_dasbor'){echo 'active';}?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>Dashboard</p>
            </a>
          </li> 

          <!-- ============================DATA PESERTA================================================= -->

          
              
            <li class="nav-item">
              <a href="../admin_data_peserta" class="nav-link <?php if($halaman=='admin_datapeserta'){echo 'active';}?>">
                <i class="nav-icon fas fa-restroom"></i>
                <p>DATA PESERTA</p>
              </a>
            </li>        

            
          
          <!-- =================================================END DATA PESERTA====================================================================== -->

          <li class="nav-item menu <?php if ($halaman=='admin_datapengukuran'){echo'open';}  else if ($halaman=='admin_datariwayat'){echo'open';}?>">
              <a href="#" class="nav-link <?php if ($halaman=='admin_datapengukuran'){echo'active';} else if ($halaman=='admin_datariwayat'){echo'active';}?>">
                <i class="nav-icon fas fa-id-card"></i>
                  <p>
                   IMUNISASI
                      <i class="right fas fa-angle-left"></i>
                  </p>
              </a>
            <ul class="nav nav-treeview">               
           

            <li class="nav-item">
              <a href="../admin_data_pengukuranimun" class="nav-link <?php if($halaman=='admin_datapengukuran'){echo 'active';}?>">
                <i class="nav-icon fas fa-clipboard"></i>
                <p>Pengukuran</p>           
              </a>
            </li>

            
            <li class="nav-item">
              <a href="../admin_data_riwayat" class="nav-link <?php if($halaman=='admin_datariwayat'){echo 'active';}?>">
                <i class="nav-icon fas fa-clipboard"></i>
                <p>Riwayat Pengukuran</p>
              </a>
            </li>         

        </ul>
          </li> 

        <!-- ======================================DATA MASTER=================================================== -->
        <li class="nav-item menu <?php if ($halaman=='admin_datalokasiposyandu'){echo'open';} else if ($halaman=='admin_data_dusun'){echo'open';} else if ($halaman=='admin_datart'){echo'open';} else if ($halaman=='admin_datavaksin'){echo'open';} else if ($halaman=='admin_datavitamin'){echo'open';} ?>">
     <a href="#" class="nav-link <?php if ($halaman=='admin_datalokasiposyandu'){echo'active';} else if ($halaman=='admin_data_dusun'){echo'active';} else if ($halaman=='admin_datart'){echo'active';} else if ($halaman=='admin_datavaksin'){echo'active';} else if ($halaman=='admin_datavitamin'){echo'active';}?>">
                <i class="nav-icon fas fa-database"></i>
                  <p>
                      DATA MASTER
                      <i class="right fas fa-angle-left"></i>
                  </p>
              </a>
            <ul class="nav nav-treeview">
            
          <li class="nav-item">
              <a href="../admin_datalokasi_posyandu" class="nav-link <?php if($halaman=='admin_datalokasiposyandu'){echo 'active';}?>">
                <i class="nav-icon fas fa-hospital"></i>
                <p> Data Posyandu</p>        
              </a>
          </li>

        <li class="nav-item">
           <a href="../admin_data_dusun" class="nav-link <?php if($halaman=='admin_data_dusun'){echo 'active';}?>">
             <i class="nav-icon fas fa-archway"></i>
             <p>Data Dusun</p>              
            </a>
        </li>

        <li class="nav-item">
           <a href="../admin_data_rt" class="nav-link <?php if($halaman=='admin_datart'){echo 'active';}?>">
              <i class="nav-icon fas fa-database"></i>
              <p>Data RT/RW</p>         
          </a>
        </li>

        <li class="nav-item">
          <a href="../admin_data_vaksin" class="nav-link <?php if($halaman=='admin_datavaksin'){echo 'active';}?>">
            <i class="nav-icon fas fa-vial"></i>
            <p>Data Vaksin</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="../admin_data_vitamin" class="nav-link <?php if($halaman=='admin_datavitamin'){echo 'active';}?>">
            <i class="nav-icon fas fa-vial"></i>
            <p>Data Vitamin</p>
          </a>
        </li>
          
            </ul>
          </li>

          <!-- ============================================ END ============================================================ -->

        <!-- ============================= DATA PENGGUNA ============================== -->
          <li class="nav-item menu <?php if ($halaman=='admin_data_pengguna'){echo'open';} else if ($halaman=='admin_datapetugas'){echo'open';} ?>">
              <a href="#" class="nav-link <?php if ($halaman=='admin_data_pengguna'){echo'active';} else if ($halaman=='admin_datapetugas'){echo'active';}?>">
                <i class="nav-icon fas fa-users"></i>
                  <p>
                     DATA PENGGUNA 
                      <i class="right fas fa-angle-left"></i>
                  </p>
              </a>
            <ul class="nav nav-treeview">

          <li class="nav-item">
            <a href="../admin_data_pengguna" class="nav-link <?php if($halaman=='admin_data_pengguna'){echo 'active';}?>">
              <i class="nav-icon fas fa-users"></i>
              <p>Data Pengguna Sistem</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../admin_data_petugas" class="nav-link <?php if($halaman=='admin_datapetugas'){echo 'active';}?>">
              <i class="nav-icon fas fa-user-nurse"></i>
              <p>Data Petugas</p>
            </a>
          </li>            

            </ul>
          </li>
          <!-- ====================END=============================== -->

          <!-- =================================================DATA LAPORAN======================================= -->


        <li class="nav-item">
          <a href="../admin_data_laporan" class="nav-link <?php if($halaman=='admin_datalaporan'){echo 'active';}?>">
            <i class="nav-icon fas fa-file"></i>
            <p>Laporan</p>
          </a>
        </li>
 
          <!-- ===========================================END LAPORAN====================================================== -->

          
        <li class="nav-item">
          <a href="../image_slider" class="nav-link <?php if($halaman=='image_slider'){echo 'active';}?>">
            <i class="nav-icon fas fa-image"></i>
            <p>Image Slider</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="../ganti_pass" class="nav-link <?php if($halaman=='ganti_pass'){echo 'active';}?>">
            <i class="nav-icon fas fa-lock"></i>
            <p>Ubah Password</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="../auth/logout.php" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>keluar</p>       
          </a>
        </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>