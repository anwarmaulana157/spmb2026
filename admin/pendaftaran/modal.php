<!-- Modal Ubah Password -->
<div id="modalUbahPass" class="modal fixed inset-0 z-50 hidden">
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
          Ubah/Reset Password
        </h3>
        <p class="text-sm text-slate-500">
          Ubah Password hanya dilakukan jika pendaftar melakukan pengajuan
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
      <form id="ubahPassForm" method="POST" action="pendaftaran/ubah_pass.php">
        <input type="hidden" id="edit_pendaftaran_id" name="pendaftaran_id">

        <div class="grid grid-cols-1 gap-4">
          <!-- Password Baru -->
          <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">
              Password Baru
            </label>
            <input type="password" name="password" required
              class="w-full px-4 py-2.5 rounded-xl border border-slate-200
                     focus:ring-2 focus:ring-blue-500 focus:outline-none"
              placeholder="Masukan password baru">
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
      <button type="submit" form="ubahPassForm"
        class="px-6 py-2.5 rounded-xl bg-blue-600 text-white
               hover:bg-blue-700 shadow-lg shadow-blue-600/30">
        Simpan
      </button>
    </div>
  </div>
</div>
