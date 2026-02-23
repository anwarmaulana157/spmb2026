<!-- Modal Cetak Kartu -->
<div id="cetakModal" class="fixed inset-0 z-50 hidden">
  <!-- Overlay -->
  <div class="absolute inset-0 bg-black/50" data-close></div>

  <!-- Modal Content -->
  <div
    class="absolute inset-4 sm:inset-auto sm:top-1/2 sm:left-1/2
           sm:-translate-x-1/2 sm:-translate-y-1/2
           sm:w-full sm:max-w-md
           bg-white rounded-2xl shadow-2xl overflow-hidden">

    <!-- Header -->
    <div class="p-6 border-b border-slate-100 flex items-center justify-between">
      <div>
        <h3 class="text-lg font-bold text-slate-800">
          Konfirmasi Cetak
        </h3>
        <p class="text-sm text-slate-500 mt-1">
          Apakah Anda yakin ingin mencetak kartu pendaftaran?
        </p>
      </div>
      <button class="p-2 rounded-lg hover:bg-slate-100" data-close>
        ✕
      </button>
    </div>

    <!-- Footer -->
    <div class="p-6 border-t border-slate-100 flex justify-end gap-3">
      <button data-close
        class="px-5 py-2 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50">
        Batal
      </button>
      <button id="btnPrint"
        class="px-5 py-2 rounded-xl bg-blue-600 text-white
               hover:bg-blue-700 shadow-lg shadow-blue-600/30">
        Cetak Sekarang
      </button>
    </div>
  </div>
</div>
