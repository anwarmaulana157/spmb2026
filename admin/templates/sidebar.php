<aside id="sidebar" class="fixed lg:static inset-y-0 left-0 z-50 w-72 bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900 text-white transform -translate-x-full lg:translate-x-0 transition-transform duration-300 flex flex-col">

    <!-- Logo Section -->
    <div class="p-6 border-b border-slate-700/50">
      <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-xl from-blue-500 to-cyan-400 flex items-center justify-center shadow-lg">
          <img src="../assets/img/logo.png" alt="logo" srcset="">
        </div>

        <div>
          <h1 class="font-bold text-lg">Portal SPMB</h1>
          <p class="text-xs text-slate-400">SMK Informatika Sumedang</p>
        </div>
      </div>
    </div>
    
    <!-- Navigation -->
    <nav class="flex-1 p-4 overflow-y-auto">
      <ul class="space-y-1">
      <!-- Dashboard -->
        <li><a href="index.php?page=1" class="sidebar-item active w-full flex items-center gap-3 px-4 py-3 rounded-lg text-left" data-page="dashboard">
          <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
          </svg><span class="font-medium">Dashboard</span> </a></li>
          
        <!-- Manajemen Data -->
        <li><button onclick="toggleSubmenu('dataSubmenu')" class="sidebar-item w-full flex items-center justify-between px-4 py-3 rounded-lg text-left hover:bg-slate-700/50">
          <div class="flex items-center gap-3">
            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
            </svg><span class="font-medium">Manajemen Data</span>
          </div>
          <svg id="dataSubmenuArrow" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
          </svg></button>
          
        <!-- Sub Menu Manajemen Data -->
        <ul id="dataSubmenu" class="submenu ml-4 mt-1 space-y-1">
          <li><a href="index.php?page=2" class="sidebar-item w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-left text-sm text-slate-300 hover:bg-slate-700/50" data-page="pendaftar"> <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span> Pendaftaran </a></li>

          <li><a href="index.php?page=3" class="sidebar-item w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-left text-sm text-slate-300 hover:bg-slate-700/50" data-page="sekolah"> <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span> Sekolah Asal </a></li>

          <li><a href="index.php?page=4" class="sidebar-item w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-left text-sm text-slate-300 hover:bg-slate-700/50" data-page="kompetensi"> <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span> Kompetensi Keahlian </a></li>

          <li><a href="index.php?page=5" class="sidebar-item w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-left text-sm text-slate-300 hover:bg-slate-700/50" data-page="tahun"> <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span> Tahun Pelajaran </a></li>
          
       </ul></li>
       
      <!-- Data Petugas -->
      <li><a href="index.php?page=6" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-lg text-left hover:bg-slate-700/50" data-page="petugas">
        <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
        </svg><span class="font-medium">Data Petugas</span> </a></li>
      
      <!-- Verifikasi Data -->
      <li><a href="index.php?page=7" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-lg text-left hover:bg-slate-700/50" data-page="verifikasi">
        <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg><span class="font-medium">Verifikasi Data</span> <span class="ml-auto bg-amber-500 text-xs font-bold px-2 py-0.5 rounded-full"><?php
        include "../config/koneksi.php";

        $query = mysqli_query($conn, "
            SELECT COUNT(*) AS total_submit 
            FROM tb_pendaftaran where status='submit'
        ");

        $data_submit= mysqli_fetch_assoc($query);
        echo $data_submit['total_submit'];
        ?></span> </a></li>
        
      <!-- Laporan & Cetak -->
      <li><a href="index.php?page=8" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-lg text-left hover:bg-slate-700/50" data-page="petugas">
        <svg class="w-5 h-5 text-rose-400" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
          </svg><span class="font-medium">Cetak Kartu Pendaftaran</span> </a></li>
      
   
     </ul>
    </nav>
    
    <!-- User Section -->
    <div class="p-4 border-t border-slate-700/50">
     <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-slate-700/30">
      <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-purple-500 flex items-center justify-center font-bold text-sm">
       AD
      </div>
      <div class="flex-1 min-w-0">
       <p class="font-medium text-sm truncate"><?php echo $nama;?></p>
     
      </div>
     </div><a href="logout.php"  onclick="return confirm('Apakah anda ingin keluar dari aplikasi ini?')" class="w-full mt-3 flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg bg-red-500/10 text-red-400 hover:bg-red-500/20 transition-colors">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
      </svg><span class="font-medium text-sm">Logout</span> </a>
    </div>
   </aside>
   