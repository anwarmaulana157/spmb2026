
<main class="flex-1 flex flex-col h-full overflow-hidden">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-slate-200 px-4 lg:px-8 py-4">
     <div class="flex items-center justify-between">
      <div class="flex items-center gap-4"><!-- Mobile Menu Button --> <button onclick="toggleSidebar()" class="lg:hidden p-2 rounded-lg hover:bg-slate-100 transition-colors">
        <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg></button>
       <div>
        <h2 id="pageTitle" class="text-xl font-bold text-slate-800">Dashboard</h2>
       </div>
      </div>
     </div>
    </header>
    
    <!-- Content Area -->
    <div id="contentArea" class="flex-1 overflow-y-auto p-4 lg:p-8">
     <div id="dashboardContent"><!-- Stats Cards - Row 1 -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6 mb-8">
        
       <div class="card-hover bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
        <div class="flex items-center justify-between mb-4">
         <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center">
          <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
          </svg>
         </div>
        </div>
        <h3 class="text-3xl font-bold text-slate-800">
        <?php
        include "../config/koneksi.php";

        $query = mysqli_query($conn, "
            SELECT COUNT(*) AS total_pendaftar 
            FROM tb_pendaftaran
        ");

        $data_pendaftar= mysqli_fetch_assoc($query);
        echo $data_pendaftar['total_pendaftar'];
        ?>
        </h3>
        <p class="text-sm text-slate-500 mt-1">Total Pendaftar</p>
       </div>

       <div class="card-hover bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
        <div class="flex items-center justify-between mb-4">
         <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center">
          <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
         </div>
        </div>
        <h3 class="text-3xl font-bold text-slate-800">
        <?php
        include "../config/koneksi.php";

        $query = mysqli_query($conn, "
            SELECT COUNT(*) AS total_verif 
            FROM tb_pendaftaran where status='verifikasi'
        ");

        $data_verif= mysqli_fetch_assoc($query);
        echo $data_verif['total_verif'];
        ?>
        </h3>
        <p class="text-sm text-slate-500 mt-1">Terverifikasi</p>
       </div>
       <div class="card-hover bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
        <div class="flex items-center justify-between mb-4">
         <div class="w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center">
          <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
         </div><span class="text-xs font-medium text-amber-600 bg-amber-100 px-2 py-1 rounded-full">Pending</span>
        </div>
        <h3 class="text-3xl font-bold text-slate-800">
        <?php
        include "../config/koneksi.php";

        $query = mysqli_query($conn, "
            SELECT COUNT(*) AS total_submit 
            FROM tb_pendaftaran where status='submit'
        ");

        $data_submit= mysqli_fetch_assoc($query);
        echo $data_submit['total_submit'];
        ?>
        </h3>
        <p class="text-sm text-slate-500 mt-1">Menunggu Verifikasi</p>
       </div>
      </div>
      
        <?php
        include "../config/koneksi.php";

        function getStat($conn, $kompetensi_id) {
            // jumlah pendaftar
            $q1 = mysqli_query($conn,"
                SELECT COUNT(*) AS total 
                FROM tb_pendaftaran 
                WHERE kompetensi_id='$kompetensi_id'
            ");
            $pendaftar = mysqli_fetch_assoc($q1)['total'];

            // kuota
            $q2 = mysqli_query($conn,"
                SELECT kuota 
                FROM tb_kompetensi 
                WHERE kompetensi_id='$kompetensi_id'
            ");
            $kuota = mysqli_fetch_assoc($q2)['kuota'];

            // hitung
            $persen = ($kuota > 0) ? ($pendaftar / $kuota) * 100 : 0;
            if ($persen > 100) $persen = 100;

            $sisa = $kuota - $pendaftar;
            if ($sisa < 0) $sisa = 0;

            return [
                'pendaftar' => $pendaftar,
                'kuota'     => $kuota,
                'persen'    => round($persen),
                'sisa'      => $sisa
            ];
        }

        // ambil data
        $rpl    = getStat($conn, 1);
        $dkv    = getStat($conn, 2);
        $axioo  = getStat($conn, 3);
        $telkom = getStat($conn, 4);
        ?>

      <!-- Program Cards - Row 2 -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6 mb-8"><!-- RPL -->
       <div class="card-hover bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
        <div class="flex items-center justify-between mb-4">
         <div>
          <h4 class="font-semibold text-slate-800">RPL</h4>
          <p class="text-xs text-slate-500">Rekayasa Perangkat Lunak</p>
         </div>
         <div class="w-12 h-12 rounded-xl bg-cyan-100 flex items-center justify-center">
          <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
          </svg>
         </div>
        </div>
        <div class="space-y-3">
         <div class="flex justify-between items-center"><span class="text-sm text-slate-600">Pendaftar</span> <span class="text-lg font-bold text-slate-800">
         <?php echo $rpl['pendaftar'] ?>    
         </span>
         </div>
         <div class="w-full bg-slate-200 rounded-full h-2">
          <div class="bg-cyan-500 h-2 rounded-full" style="width: <?php echo $rpl['persen'] ?>%"></div>
         </div>
         <div class="flex justify-between items-center pt-1"><span class="text-xs text-slate-500">Kuota: 
          <?php echo $rpl['kuota'] ?>  
         </span> <span class="text-xs font-medium text-emerald-600 bg-emerald-100 px-2 py-0.5 rounded-full"> <?php echo $rpl['sisa']?> Sisa</span>
         </div>
        </div>
       </div>
       
       <!-- DKV -->
       <div class="card-hover bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
        <div class="flex items-center justify-between mb-4">
         <div>
          <h4 class="font-semibold text-slate-800">DKV</h4>
          <p class="text-xs text-slate-500">Desain Komunikasi Visual</p>
         </div>
         <div class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center">
          <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.5a2 2 0 00-1 .267M7 21H5m12 0h2m0-4v-6a2 2 0 00-2-2h-.5"></path>
          </svg>
         </div>
        </div>
        <div class="space-y-3">
         <div class="flex justify-between items-center"><span class="text-sm text-slate-600">Pendaftar</span> <span class="text-lg font-bold text-slate-800"><?php echo $dkv['pendaftar']?></span>
         </div>
         <div class="w-full bg-slate-200 rounded-full h-2">
          <div class="bg-purple-500 h-2 rounded-full" style="width:<?php echo $dkv['persen'] ?>%"></div>
         </div>
         <div class="flex justify-between items-center pt-1"><span class="text-xs text-slate-500">Kuota:  <?php echo $dkv['kuota'] ?></span> <span class="text-xs font-medium text-emerald-600 bg-emerald-100 px-2 py-0.5 rounded-full"> <?php echo $dkv['sisa'] ?> Sisa</span>
         </div>
        </div>
       </div>
       
       <!-- Kelas Telkom -->
       <div class="card-hover bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
        <div class="flex items-center justify-between mb-4">
         <div>
          <h4 class="font-semibold text-slate-800">Kelas KiDi IoT</h4>
          <p class="text-xs text-slate-500">Kelas Industri Telkom</p>
         </div>
         <div class="w-12 h-12 rounded-xl bg-orange-100 flex items-center justify-center">
          <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
          </svg>
         </div>
        </div>
        <div class="space-y-3">
         <div class="flex justify-between items-center"><span class="text-sm text-slate-600">Pendaftar</span> <span class="text-lg font-bold text-slate-800"><?php echo $telkom['pendaftar']?></span>
         </div>
         <div class="w-full bg-slate-200 rounded-full h-2">
          <div class="bg-orange-500 h-2 rounded-full" style="width: <?php echo $telkom['persen']?>%"></div>
         </div>
         <div class="flex justify-between items-center pt-1"><span class="text-xs text-slate-500">Kuota: <?php echo $telkom['kuota']?></span> <span class="text-xs font-medium text-amber-600 bg-amber-100 px-2 py-0.5 rounded-full"><?php echo $telkom['sisa']?> Sisa</span>
         </div>
        </div>
       </div>
      </div>
      
      <!-- Program Cards - Row 3 -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6 mb-8"><!-- Axioo -->
       <div class="card-hover bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
        <div class="flex items-center justify-between mb-4">
         <div>
          <h4 class="font-semibold text-slate-800">Axioo Class Program</h4>
          <p class="text-xs text-slate-500">Kelas Industri Axioo</p>
         </div>
         <div class="w-12 h-12 rounded-xl bg-indigo-100 flex items-center justify-center">
          <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
         </div>
        </div>
        <div class="space-y-3">
         <div class="flex justify-between items-center"><span class="text-sm text-slate-600">Pendaftar</span> <span class="text-lg font-bold text-slate-800"><?php echo $axioo['pendaftar']?></span>
         </div>
         <div class="w-full bg-slate-200 rounded-full h-2">
          <div class="bg-indigo-500 h-2 rounded-full" style="width: <?php echo $axioo['persen']?>%"></div>
         </div>
         <div class="flex justify-between items-center pt-1"><span class="text-xs text-slate-500">Kuota: <?php echo $axioo['kuota']?></span> <span class="text-xs font-medium text-amber-600 bg-amber-100 px-2 py-0.5 rounded-full"><?php echo $axioo['sisa']?> Sisa</span>
         </div>
        </div>
       </div>    
      </div>
    </div>
    </div>
    <?php include "templates/footer.php"?>
   </main>