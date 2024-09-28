<aside class="main-sidebar sidebar-dark elevation-4" style="background-color:#000000">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="../auth/img/logo.png" alt="Prostreet" class="brand-image img-square elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light"><font color ="#4682B4"><center><b>POSYANDU CINANAS</b></center></font></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
      <!-- Sidebar Menu -->
          
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="../petugas_dasbor" class="nav-link <?php if($halaman=='petugas_dasbor'){echo 'active';}?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li> 

          <li class="nav-item">
          <a href="../petugas_data_peserta" class="nav-link <?php if($halaman=='petugas_datapeserta'){echo 'active';}?>">
            <i class="nav-icon fas fa-restroom"></i>
              <p>
            Data Peserta
              </p>
          </a>
        </li>
        
          <li class="nav-item">
          <a href="../petugas_pengukuran_anak" class="nav-link <?php if($halaman=='petugas_datapengukuran'){echo 'active';}?>">
            <i class="nav-icon fas fa-clipboard"></i>
              <p>
              Pengukuran
              </p>
          </a>
        </li>        

        <li class="nav-item">
          <a href="../petugas_data_riwayat" class="nav-link <?php if($halaman=='petugas_datariwayat'){echo 'active';}?>">
            <i class="nav-icon fas fa-clipboard"></i>
              <p>
            Riwayat Imunisasi
              </p>
          </a>
        </li>

        <!-- <li class="nav-item">
            <a href="../petugas_data_dusun" class="nav-link <?php if($halaman=='petugas_datadusun'){echo 'active';}?>">
              <i class="nav-icon fas fa-archway"></i>
            <p>
            Data Dusun
            </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="../petugas_data_vaksin" class="nav-link <?php if($halaman=='petugas_datavaksin'){echo 'active';}?>">
              <i class="nav-icon fas fa-archway"></i>
            <p>
            Data Vaksin
            </p>
            </a>
        </li> -->

                        
        <li class="nav-item">
          <a href="../petugas_ganti_pass" class="nav-link <?php if($halaman=='petugasganti_pass'){echo 'active';}?>">
            <i class="nav-icon fas fa-lock"></i>
              <p>
            Ubah Password
            </p>
          </a>
        </li>

    <li class="nav-item">
        <a href="../auth/logout.php" class="nav-link">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>
            keluar
        </p>
</a>
</li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>