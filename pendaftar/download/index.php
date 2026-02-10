  <!-- Top Header -->
  <header class="bg-white shadow-sm border-b border-slate-200 px-6 py-4">
      <div class="flex items-center justify-between">

          <!-- Overlay Mobile -->
          <div id="sidebar-overlay"
              class="fixed inset-0 bg-black/50 z-40 hidden overlay-transition lg:hidden"
              onclick="toggleSidebar()"></div>

          <!-- Left: Toggle + Title -->
            <div class="flex items-center gap-4">

              <!-- Toggle Sidebar Button (Mobile) -->
              <button id="toggle-btn"
                  onclick="toggleSidebar()"
                  class="toggle-btn w-10 h-10
                           
                           rounded-lg flex items-center justify-center
                           text-black lg:hidden">

                  <!-- Menu Icon -->
                <svg id="menu-icon"
                      class="w-6 h-6"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"></path>
                  </svg>

                  <!-- Close Icon -->
                  <svg id="close-icon"
                      class="w-6 h-6 hidden"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
              </button>

              <!-- Title -->
              <div>
                  <h2 id="page-title" class="text-xl font-bold text-slate-800">Download Kartu Pendaftaran</h2>
                  <p class="text-sm text-slate-500">Selesaikan formulir pendaftaran Anda</p>
              </div>

          </div>

          <!-- Right: Action Buttons -->
          <div class="flex items-center gap-4">

              <!-- Help -->
              <button class="p-2 text-slate-500 hover:text-slate-700 hover:bg-slate-100 rounded-xl transition-colors">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M13 16h-1v-4h-1m1-4h.01
                             M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
              </button>

              <!-- Notification -->
              <button class="relative p-2 text-slate-500 hover:text-slate-700 hover:bg-slate-100 rounded-xl transition-colors">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 17h5l-1.405-1.405
                             A2.032 2.032 0 0118 14.158V11
                             a6.002 6.002 0 00-4-5.659V5
                             a2 2 0 10-4 0v.341
                             C7.67 6.165 6 8.388 6 11v3.159
                             c0 .538-.214 1.055-.595 1.436L4 17h5
                             m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                  </svg>
              </button>

          </div>
      </div>
  </header>
  <!-- Page Content -->
  <main class="flex-1 p-6 overflow-y-auto">
      <div id="page-download" class="page-content">
          <div class="max-w-2xl mx-auto">
              <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8 mb-6">
                  <h3 class="text-lg font-bold text-slate-800 mb-2">Download Kartu Pendaftar</h3>
                  <p class="text-slate-500 mb-6">Kartu pendaftar dapat diunduh setelah data Anda terverifikasi</p><!-- Status Alert -->
                  <?php if ($status == 'draft') { ?>
                      <div class="bg-amber-50 border border-amber-200 rounded-xl p-4 mb-2 flex items-start gap-3">
                          <svg class="w-5 h-5 text-amber-600 flex-shrink-0 mt-0.5" fill="currentColor" viewbox="0 0 20 20">
                              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                          </svg>
                          <p class="text-sm font-medium text-red-800">
                              Silakan submit / selesaikan pendaftaran terlebih dahulu.
                          </p>
                      </div>

                  <?php } elseif ($status == 'submit') { ?>
                      <div class="bg-amber-50 border border-amber-200 rounded-xl p-4 mb-2 flex items-start gap-3">
                          <svg class="w-5 h-5 text-amber-600 flex-shrink-0 mt-0.5" fill="currentColor" viewbox="0 0 20 20">
                              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                          </svg>
                          <p class="text-sm font-medium text-amber-800">
                              Data Anda sudah dikirim.
                              Silakan tunggu proses verifikasi oleh admin.
                          </p>
                      </div>

                  <?php } elseif ($status == 'verifikasi') { ?>
                      <div class="bg-green-50 border border-green-200 rounded-xl p-4 mb-2 flex items-start gap-3">
                          <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5"
                              fill="currentColor"
                              viewBox="0 0 20 20">
                              <path fill-rule="evenodd"
                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.707a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                  clip-rule="evenodd"></path>
                          </svg>
                          <p class="text-sm font-medium text-green-800">
                              Data Anda telah diverifikasi.
                              Silakan unduh kartu pendaftaran.
                          </p>
                      </div>
                  <?php } ?>

              </div><!-- Preview Card -->
              <div class="mb-6"><label class="block text-sm font-medium text-slate-700 mb-3">Preview Kartu Pendaftar</label>
                  <div class="bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl p-6 text-white shadow-lg">
                      <div class="flex items-center justify-between mb-6">
                          <div class="flex items-center gap-3">
                              <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                  </svg>
                              </div>
                              <div>
                                  <p class="font-bold text-sm">SMK Informatika Sumedang</p>
                                  <p class="text-xs opacity-80">SPMB 2026/2027</p>
                              </div>
                          </div>
                          <p class="text-xs opacity-70"><?= htmlspecialchars($data['no_pendaftaran']) ?></p>
                      </div>
                      <?php $qBerkas = mysqli_query($conn, "SELECT * FROM tb_berkas WHERE pendaftaran_id='$pendaftaran_id'");
                        $berkas = mysqli_fetch_assoc($qBerkas);
                        ?>
                      <div class="flex gap-4">
                          <div class="w-20 h-24 bg-white/10 rounded-lg flex items-center justify-center">
                              <img src="dashboard/uploads/foto/<?= htmlspecialchars($berkas['foto']); ?>">
                          </div>
                          <div class="flex-1">
                              <p class="font-bold text-lg"><?= htmlspecialchars($data['nama_lengkap']) ?></p>

                              <p class="text-sm opacity-80 mt-1"><?= htmlspecialchars($data['nama_sekolah']) ?></p>

                              <div class="mt-3 pt-3 border-t border-white/20">
                                  <p class="text-xs opacity-70">Kompetensi Pilihan</p>
                                  <p class="font-semibold text-sm"><?= htmlspecialchars($data['nama_kompetensi']) ?></p>

                              </div>
                          </div>
                      </div>
                  </div>
              </div><!-- Download Button --> <?php if ($status == 'verifikasi') { ?>
                  <a href="cetak_kartu.php"
                      class="w-full px-4 py-3 bg-blue-600 text-white rounded-lg font-medium flex items-center justify-center gap-2">
                      Download Kartu
                  </a>
              <?php } else { ?>
                  <button disabled
                      class="w-full px-4 py-3 bg-slate-300 text-slate-500 rounded-lg font-medium cursor-not-allowed">
                      Download Kartu (Belum Tersedia)
                  </button>
              <?php } ?>


              <p class="text-xs text-slate-500 text-center mt-3">* Tombol akan aktif setelah data Anda terverifikasi</p>
          </div><!-- Info Section -->
          <div class="max-w-3xl mx-auto">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                      <div class="flex items-center gap-3 mb-4">
                          <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                              <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                              </svg>
                          </div>
                          <h4 class="font-semibold text-slate-800">Informasi</h4>
                      </div>
                      <p class="text-sm text-slate-600">Kartu pendaftar adalah bukti resmi pendaftaran Anda. Simpan dengan baik dan bawa saat kegiatan daftar ulang.</p>
                  </div>
                  <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                      <div class="flex items-center gap-3 mb-4">
                          <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center">
                              <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                              </svg>
                          </div>
                          <h4 class="font-semibold text-slate-800">Perlu Bantuan?</h4>
                      </div>
                      <p class="text-sm text-slate-600">Hubungi admin sekolah jika mengalami kendala dalam mengunduh kartu pendaftar.</p>
                  </div>
              </div>
          </div>
      </div>
      </div>
  </main>