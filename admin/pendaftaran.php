<main class="flex-1 flex flex-col h-full overflow-hidden">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-slate-200 px-4 lg:px-8 py-4">
     <div class="flex items-center justify-between">
      <div class="flex items-center gap-4"><!-- Mobile Menu Button --> <button onclick="toggleSidebar()" class="lg:hidden p-2 rounded-lg hover:bg-slate-100 transition-colors">
        <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg></button>
       <div>
        <h2 id="pageTitle" class="text-xl font-bold text-slate-800">Data Pendaftaran</h2>
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
              <h3 class="text-lg font-bold text-slate-800">Data Pendaftaran</h3>
              <p class="text-sm text-slate-500">Kelola data pendaftaran</p>
            </div>
            <a href="index.php?page=9"
              class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-600 text-white rounded-xl font-medium text-sm hover:bg-blue-700 transition shadow-lg shadow-blue-600/30">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 4v16m8-8H4"></path>
              </svg>
              Tambah Data
            </a>
          </div>
        </div>

        <!-- Table -->
        <div class="p-6">
          <div class="overflow-x-auto rounded-xl border border-slate-200
              scrollbar-thin scrollbar-thumb-slate-300 scrollbar-track-slate-100">

          <table id="pendaftaranTable"
              class="w-full min-w-[1200px] border-collapse text-sm">
              
              <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                  <th class="px-4 py-3 text-left font-semibold text-slate-700 border-r border-slate-200">No</th>
                   <th class="px-4 py-3 text-left font-semibold text-slate-700 border-r border-slate-200">NISN</th>
                  <th class="px-4 py-3 text-left font-semibold text-slate-700 border-r border-slate-200">Nama Lengkap</th>
                  <th class="px-4 py-3 text-left font-semibold text-slate-700 border-r border-slate-200">Gender</th>
                  <th class="px-4 py-3 text-left font-semibold text-slate-700 border-r border-slate-200">Jalur</th>
                  <th class="px-4 py-3 text-left font-semibold text-slate-700 border-r border-slate-200">Kompetensi Keahlian</th>
                  <th class="px-4 py-3 text-left font-semibold text-slate-700 border-r border-slate-200">Asal Sekolah</th>
                  <th class="px-4 py-3 text-center font-semibold text-slate-700 bg-slate-50 sticky right-0 z-20     border-l border-slate-200">
                  Aksi
                  </th>
                </tr>
              </thead>
              
              <tbody class="divide-y divide-slate-200">
              <?php
              include "../config/koneksi.php";
              $no=1;
              $query=mysqli_query($conn,"SELECT p.*,k.nama_kompetensi,s.nama_sekolah FROM tb_pendaftaran p INNER JOIN tb_kompetensi k ON p.kompetensi_id=k.kompetensi_id INNER JOIN tb_sekolah_asal s ON p.sekolah_id=s.sekolah_id");
              while($row=mysqli_fetch_assoc($query)){
              ?>
                <tr class="hover:bg-slate-50 transition-colors">
                  <td class="px-4 py-3 border-r border-slate-100"><?php echo $no++;?></td>
                  <td class="td-nama px-4 py-3 border-r border-slate-100"><?php echo $row['nisn']?></td>
                  <td class="td-username px-4 py-3 border-r border-slate-100"><?php echo $row['nama_lengkap']?></td>
                  <td class="td-role px-4 py-3 border-r border-slate-100"><?php echo $row['jenis_kelamin']?></td>
                  <td class="td-status px-4 py-3 border-r border-slate-100"><?php echo $row['jalur']?></td>
                  <td class="td-status px-4 py-3 border-r border-slate-100"><?php echo $row['nama_kompetensi']?></td>
                  <td class="td-status px-4 py-3 border-r border-slate-100"><?php echo $row['nama_sekolah']?></td>
                  <td class="px-4 py-3 text-center bg-white sticky right-0 z-10 border-l border-slate-200">
                    <!-- Tombol Detail -->
                  <a href="index.php?page=10&id=<?php echo $row['pendaftaran_id']?>"
                    class="inline-flex items-center p-2 rounded-lg
                          border border-indigo-200 text-indigo-600
                          hover:bg-indigo-50 hover:border-indigo-300 transition"
                    title="Detail"
                    aria-label="Detail">

                    <svg xmlns="http://www.w3.org/2000/svg"
                      class="w-5 h-5"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5
                          c4.478 0 8.268 2.943 9.542 7
                          -1.274 4.057-5.064 7-9.542 7
                          -4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                  </a>


                <!-- Tombol Ubah Password -->
                  <button
                    type="button"
                    class="btn-pass inline-flex items-center p-2 rounded-lg
                          border border-slate-200 text-slate-600
                          hover:bg-slate-50 hover:border-slate-300 transition"
                    data-id="<?= $row['pendaftaran_id']; ?>"
                    title="Ubah Password"
                    aria-label="Ubah Password">

                    <svg xmlns="http://www.w3.org/2000/svg"
                      class="w-5 h-5"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 11c.552 0 1 .448 1 1v2a1 1 0 11-2 0v-2c0-.552.448-1 1-1z" />
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6 11V8a6 6 0 1112 0v3" />
                      <rect x="5" y="11" width="14" height="9" rx="2" ry="2" />
                    </svg>
                  </button>


                <!-- Tombol Hapus -->
                <a href="pendaftaran/hapus.php?id=<?php echo $row['pendaftaran_id']; ?>"
                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                    class="inline-flex items-center p-2 rounded-lg
                            border border-red-200 text-red-600
                            hover:bg-red-50 hover:border-red-300 transition"
                    title="Hapus">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862
                              a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6
                              M9 7h6m-1-3H10a1 1 0 00-1 1v2h6V5
                              a1 1 0 00-1-1z" />
                    </svg>
                  </a>
                  </td>
                </tr>
              <?php }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
   </main>