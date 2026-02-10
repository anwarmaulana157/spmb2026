
<main class="flex-1 flex flex-col h-full overflow-hidden">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-slate-200 px-4 lg:px-8 py-4">
     <div class="flex items-center justify-between">
      <div class="flex items-center gap-4"><!-- Mobile Menu Button --> <button onclick="toggleSidebar()" class="lg:hidden p-2 rounded-lg hover:bg-slate-100 transition-colors">
        <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg></button>
       <div>
        <h2 id="pageTitle" class="text-xl font-bold text-slate-800">Cetak Kartu Pendaftaran</h2>
       </div>
      </div>
     </div>
    </header>
    
    <!-- Content Area -->
      <div id="contentArea" class="flex-1 overflow-y-auto p-4 lg:p-8">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

      <!-- Header -->
      <div class="p-6 border-b border-slate-200">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
          <div>
            <h3 class="text-lg font-bold text-slate-800">Cetak Kartu Pendaftaran</h3>
            <p class="text-sm text-slate-500">Silahkan pilih data pendaftar yang ingin dicetak kartunya</p>
          </div>
        </div>
      </div>

      <!-- Table -->
      <div class="p-6">
        <div class="overflow-x-auto rounded-xl border border-slate-200
              scrollbar-thin scrollbar-thumb-slate-300 scrollbar-track-slate-100">

          <table id="verifikasiTable"
              class="w-full min-w-[1200px] border-collapse text-sm">

            
            <thead class="bg-slate-50 border-b border-slate-200">
              <tr>
              
                <th class="px-4 py-3 text-left font-semibold text-slate-700 border-r border-slate-200">No</th>
                <th class="px-4 py-3 text-left font-semibold text-slate-700 border-r border-slate-200">NISN</th>
                <th class="px-4 py-3 text-left font-semibold text-slate-700 border-r border-slate-200">Nama</th>
                <th class="px-4 py-3 text-left font-semibold text-slate-700 border-r border-slate-200">Jalur</th>
                <th class="px-4 py-3 text-left font-semibold text-slate-700 border-r border-slate-200">Kompetensi Keahlian</th>
                <th class="px-4 py-3 text-left font-semibold text-slate-700 border-r border-slate-200">Asal Sekolah</th>
                <th class="px-4 py-3 text-left font-semibold text-slate-700 border-r border-slate-200">Telp/Hp</th>
                <th class="px-4 py-3 text-center font-semibold text-slate-700 bg-slate-50 sticky right-0 z-20     border-l border-slate-200">
                Aksi
                </th>

              </tr>
            </thead>
            
            <tbody class="divide-y divide-slate-200">
            <?php
            include "../config/koneksi.php";
            $no=1;
            $query = mysqli_query($conn, "SELECT 
                        p.*,
                        k.nama_kompetensi,
                        s.nama_sekolah
                    FROM tb_pendaftaran p
                    INNER JOIN tb_kompetensi k 
                        ON p.kompetensi_id = k.kompetensi_id
                    INNER JOIN tb_sekolah_asal s
                        ON p.sekolah_id = s.sekolah_id WHERE p.status='verifikasi'
            ");

            while($row=mysqli_fetch_assoc($query)){
            ?>
              <tr class="hover:bg-slate-50 transition-colors">
                <td class="px-4 py-3 border-r border-slate-100"><?php echo $no++;?></td>
                <td class="td-nisn px-4 py-3 border-r border-slate-100"><?php echo $row['nisn']?></td>
                <td class="td-nama px-4 py-3 border-r border-slate-100"><?php echo $row['nama_lengkap']?></td>
                <td class="td-jalur px-4 py-3 border-r border-slate-100"><?php echo $row['jalur']?></td>
                <td class="td-kompetensi px-4 py-3 border-r border-slate-100"><?php echo $row['nama_kompetensi']?></td>
                <td class="td-sekolah px-4 py-3 border-r border-slate-100"><?php echo $row['nama_sekolah']?></td>
                <td class="td-telp px-4 py-3 border-r border-slate-100"><?php echo $row['telp_hp']?></td>
                
                <td class="px-4 py-3 text-center bg-white sticky right-0 z-10 border-l border-slate-200">
                <!-- Tombol Verifikasi -->
                <a href="cetak/print.php?no=<?php echo $row['no_pendaftaran']; ?>"
                  target="_blank"
                  class="inline-flex items-center p-2 rounded-lg
                          border border-slate-300 text-slate-600
                          hover:bg-slate-100 transition"
                  title="Cetak Kartu">
                  🖨️
                </a>
                </td>
                    
            <?php }?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
   </main>