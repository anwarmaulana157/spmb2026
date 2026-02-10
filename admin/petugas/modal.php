<!-- Modal Data Petugas -->
<div id="petugasModal" class="modal fixed inset-0 z-50 hidden">
  <!-- Overlay -->
  <div class="absolute inset-0 bg-black/50" data-close></div>

  <!-- Modal Content -->
  <div
    class="absolute inset-4 sm:inset-auto sm:top-1/2 sm:left-1/2
           sm:-translate-x-1/2 sm:-translate-y-1/2
           sm:w-full sm:max-w-xl
           bg-white rounded-2xl shadow-2xl overflow-hidden flex flex-col">

    <!-- Header -->
    <div class="p-6 border-b border-slate-100 flex items-center justify-between">
      <div>
        <h3 id="modalTitle" class="text-xl font-bold text-slate-800">
          Tambah Data Petugas
        </h3>
        <p class="text-sm text-slate-500">
          Isi data petugas dengan lengkap
        </p>
      </div>
      <button class="p-2 rounded-lg hover:bg-slate-100"  data-close>
        <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

    <!-- Body -->
    <div class="p-6">
      <form id="petugasForm" method="POST" action="petugas/simpan.php">
        
        <div class="grid grid-cols-1 gap-4">
          <!-- Nama -->
          <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">
              Nama Petugas
            </label>
            <input type="text" name="nama" required
              class="w-full px-4 py-2.5 rounded-xl border border-slate-200
                     focus:ring-2 focus:ring-blue-500 focus:outline-none"
              placeholder="Nama lengkap petugas">
          </div>

          <!-- Username -->
          <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">
              Username
            </label>
            <input type="text" name="username" required
              class="w-full px-4 py-2.5 rounded-xl border border-slate-200
                     focus:ring-2 focus:ring-blue-500 focus:outline-none"
              placeholder="Username login">
          </div>

          <!-- Password -->
          <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">
              Password
            </label>
            <input type="password" name="password"
              class="w-full px-4 py-2.5 rounded-xl border border-slate-200
                     focus:ring-2 focus:ring-blue-500 focus:outline-none"
              placeholder="Kosongkan jika tidak diubah">
          </div>

          <!-- Role -->
          <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">
              Role
            </label>
            <select name="role" required
              class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-white
                     focus:ring-2 focus:ring-blue-500 focus:outline-none">
              <option value="">Pilih Role</option>
              <option value="petugas">Petugas</option>
              <option value="admin">Admin</option>
            </select>
          </div>

          <!-- Status -->
          <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">
              Status
            </label>
            <select name="status" required
              class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-white
                     focus:ring-2 focus:ring-blue-500 focus:outline-none">
              <option value="aktif">Aktif</option>
              <option value="nonaktif">Nonaktif</option>
            </select>
          </div>
        </div>
      </form>
    </div>

    <!-- Footer -->
    <div class="p-6 border-t border-slate-100 flex justify-end gap-3">
      <button data-close
        class="px-6 py-2.5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50">
        Batal
      </button>
      <button type="submit" form="petugasForm"
        class="px-6 py-2.5 rounded-xl bg-blue-600 text-white
               hover:bg-blue-700 shadow-lg shadow-blue-600/30">
        Simpan
      </button>
    </div>
  </div>
</div>


<!-- Modal Edit Petugas -->
<div id="modalEditPetugas" class="modal fixed inset-0 z-50 hidden">
  <!-- Overlay -->
  <div class="absolute inset-0 bg-black/50" data-close></div>

  <!-- Modal Content -->
  <div
    class="absolute inset-4 sm:inset-auto sm:top-1/2 sm:left-1/2
           sm:-translate-x-1/2 sm:-translate-y-1/2
           sm:w-full sm:max-w-xl
           bg-white rounded-2xl shadow-2xl overflow-hidden flex flex-col">

    <!-- Header -->
    <div class="p-6 border-b border-slate-100 flex items-center justify-between">
      <div>
        <h3 id="modalTitle" class="text-xl font-bold text-slate-800">
          Edit Data Petugas
        </h3>
        <p class="text-sm text-slate-500">
          Perbaharui Informasi Petugas
        </p>
      </div>
      <button class="p-2 rounded-lg hover:bg-slate-100"  data-close>
        <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

    <!-- Body -->
    <div class="p-6">
      <form id="editpetugasForm" method="POST" action="petugas/ubah.php">
        <input type="hidden" id="edit_user_id" name="user_id">

        <div class="grid grid-cols-1 gap-4">
          <!-- Nama -->
          <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">
              Nama Petugas
            </label>
            <input type="text" id="edit_nama" name="nama" required
              class="w-full px-4 py-2.5 rounded-xl border border-slate-200
                     focus:ring-2 focus:ring-blue-500 focus:outline-none"
              placeholder="Nama lengkap petugas">
          </div>

          <!-- Username -->
          <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">
              Username
            </label>
            <input type="text" id="edit_username" name="username" required
              class="w-full px-4 py-2.5 rounded-xl border border-slate-200
                     focus:ring-2 focus:ring-blue-500 focus:outline-none"
              placeholder="Username login">
          </div>

          <!-- Password -->
          <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">
              Password
            </label>
            <input type="password" name="password" id="edit_password"
              class="w-full px-4 py-2.5 rounded-xl border border-slate-200
                     focus:ring-2 focus:ring-blue-500 focus:outline-none"
              placeholder="Kosongkan jika tidak diubah">
          </div>

          <!-- Role -->
          <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">
              Role
            </label>
            <select id="edit_role" name="role" required
              class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-white
                     focus:ring-2 focus:ring-blue-500 focus:outline-none">
              <option value="">Pilih Role</option>
              <option value="Petugas">Petugas</option>
              <option value="Admin">Admin</option>
            </select>
          </div>

          <!-- Status -->
          <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">
              Status
            </label>
            <select id="edit_status" name="status" required
              class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-white
                     focus:ring-2 focus:ring-blue-500 focus:outline-none">
              <option value="Aktif">Aktif</option>
              <option value="Nonaktif">Nonaktif</option>
            </select>
          </div>
        </div>
      </form>
    </div>

    <!-- Footer -->
    <div class="p-6 border-t border-slate-100 flex justify-end gap-3">
      <button data-close
        class="px-6 py-2.5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50">
        Batal
      </button>
      <button type="submit" form="editpetugasForm"
        class="px-6 py-2.5 rounded-xl bg-blue-600 text-white
               hover:bg-blue-700 shadow-lg shadow-blue-600/30">
        Simpan
      </button>
    </div>
  </div>
</div>
