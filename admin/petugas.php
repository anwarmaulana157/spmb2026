
<main class="flex-1 flex flex-col h-full overflow-hidden">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-slate-200 px-4 lg:px-8 py-4">
     <div class="flex items-center justify-between">
      <div class="flex items-center gap-4"><!-- Mobile Menu Button --> <button onclick="toggleSidebar()" class="lg:hidden p-2 rounded-lg hover:bg-slate-100 transition-colors">
        <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg></button>
       <div>
        <h2 id="pageTitle" class="text-xl font-bold text-slate-800">Data Petugas</h2>
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
            <h3 class="text-lg font-bold text-slate-800">Data Petugas</h3>
            <p class="text-sm text-slate-500">Kelola data petugas pendaftaran</p>
          </div>
          <button onclick="openModal('petugasModal')"
            class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-600 text-white rounded-xl font-medium text-sm hover:bg-blue-700 transition shadow-lg shadow-blue-600/30">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Petugas
          </button>
        </div>
      </div>

      <!-- Table -->
      <div class="p-6">
        <div class="overflow-x-auto rounded-xl border border-slate-200">
          <table id="petugasTable"
              class="w-full min-w-[800px] border-collapse text-sm">
            
            <thead class="bg-slate-50 border-b border-slate-200">
              <tr>
                <th class="px-4 py-3 text-left font-semibold text-slate-700 border-r border-slate-200">No</th>
                <th class="px-4 py-3 text-left font-semibold text-slate-700 border-r border-slate-200">Nama Petugas</th>
                <th class="px-4 py-3 text-left font-semibold text-slate-700 border-r border-slate-200">Username</th>
                <th class="px-4 py-3 text-left font-semibold text-slate-700 border-r border-slate-200">Peran</th>
                <th class="px-4 py-3 text-left font-semibold text-slate-700 border-r border-slate-200">Status</th>
                <th class="px-4 py-3 text-center font-semibold text-slate-700 bg-slate-50 sticky right-0 z-20     border-l border-slate-200">
                Aksi
                </th>
              </tr>
            </thead>
            
            <tbody class="divide-y divide-slate-200">
            <?php
            include "../config/koneksi.php";
            $no=1;
            $query=mysqli_query($conn,"SELECT * FROM tb_user");
            while($row=mysqli_fetch_assoc($query)){
            ?>
              <tr class="hover:bg-slate-50 transition-colors">
                <td class="px-4 py-3 border-r border-slate-100"><?php echo $no++;?></td>
                <td class="td-nama px-4 py-3 border-r border-slate-100"><?php echo $row['nama']?></td>
                <td class="td-username px-4 py-3 border-r border-slate-100"><?php echo $row['username']?></td>
                <td class="td-role px-4 py-3 border-r border-slate-100"><?php echo $row['role']?></td>
                <td class="td-status px-4 py-3 border-r border-slate-100"><?php echo $row['status']?></td>
                <td class="px-4 py-3 text-center bg-white sticky right-0 z-10 border-l border-slate-200">
                  <!-- Tombol Edit -->
                <button type="button"
                class="btn-edit inline-flex items-center p-2 rounded-lg
                      border border-blue-200 text-blue-600
                      hover:bg-blue-50 hover:border-blue-300 transition"
                data-id="<?php echo $row['user_id']; ?>"
                title="Edit Petugas"
                aria-label="Edit Petugas">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 3.487a2.1 2.1 0 113.651 1.526L8.82 16.707
                          5 17l.293-3.82L16.862 3.487z" />
                </svg>
              </button>


              <!-- Tombol Hapus -->
              <a href="petugas/hapus.php?id=<?php echo $row['user_id']; ?>"
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
<?php include "templates/footer.php"?>
   </main>