<?php
include "../config/koneksi.php";
$pendaftaran_id = $_SESSION['pendaftaran_id'];
$query = mysqli_query($conn,"SELECT * FROM tb_pendaftaran WHERE pendaftaran_id='$pendaftaran_id'");
$row = mysqli_fetch_assoc($query);
// INI YANG KURANG
$isVerified = strtolower($row['status']) == 'verifikasi';
?>
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
                  <h2 id="page-title" class="text-xl font-bold text-slate-800">
                      Lengkapi Data Pendaftaran
                  </h2>
                  <p class="text-sm text-slate-500">
                      Selesaikan formulir pendaftaran Anda
                  </p>
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
      <div id="page-lengkapi" class="page-content fade-in">
        
          <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            
          <!-- Form Section -->
              <div class="lg:col-span-3">
                <?php if ($isVerified): ?>
                <!-- Pesan jika sudah diverifikasi -->
                <div class="p-4 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm mb-4">
                    Data sudah diverifikasi dan tidak dapat diubah.
                </div>
            <?php endif; ?>
                  <form id="form-lengkapi" class="space-y-6" action="dashboard/simpan.php"
                      method="POST"
                      enctype="multipart/form-data">
                      <!-- Section 1: Data Pendaftaran -->
                      <div class="card-form bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
                          <h3 class="text-base font-bold text-slate-800 mb-6 pb-4 border-b border-slate-200">Data Pendaftaran</h3>
                          <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                              <div>
                                  <label class="block text-sm font-medium text-slate-700 mb-2">No. Pendaftaran *</label>
                                  <input type="text"
                                      value="<?php echo $data['no_pendaftaran']; ?>"
                                      readonly
                                      class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-slate-50" data-required="1">
                              </div>


                              <div>
                                  <label class="block text-sm font-medium text-slate-700 mb-2">Jalur *</label>
                                  <input type="text"
                                      id="jalur"
                                      value="<?= htmlspecialchars($data['jalur']); ?>"
                                      readonly
                                      class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-slate-50" data-required="1">
                              </div>
                              <!-- Memanggil Data Kompetensi -->
                              <?php
                                $qJurusan = mysqli_query($conn, "SELECT kompetensi_id, nama_kompetensi FROM tb_kompetensi ORDER BY nama_kompetensi ASC");
                                ?>

                              <div>
                                  <label class="block text-sm font-medium text-slate-700 mb-2">Jurusan *</label>
                                  <select name="kompetensi_id" data-required="1" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" <?= $isLocked ? 'disabled' : '' ?> required>
                                      <option value="">-- Pilih Jurusan --</option>
                                      <?php while ($j = mysqli_fetch_assoc($qJurusan)) { ?>
                                          <option value="<?= $j['kompetensi_id']; ?>" <?= ($data['kompetensi_id'] == $j['kompetensi_id']) ? 'selected' : '' ?>>
                                              <?= $j['nama_kompetensi']; ?>
                                          </option>
                                      <?php } ?>
                                  </select>
                              </div>

                          </div>
                      </div>
                      <!-- Section 2: Data Pribadi -->
                      <div class="card-form bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
                          <h3 class="text-base font-bold text-slate-800 mb-6 pb-4 border-b border-slate-200">Data Pribadi</h3>
                          <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                              <div><label class="block text-sm font-medium text-slate-700 mb-2">NISN *</label> <input type="text" value="<?php echo $data['nisn']; ?>" placeholder="9 digit" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>
                              </div>
                              <div><label class="block text-sm font-medium text-slate-700 mb-2">NIK *</label> <input type="text" value="<?php echo $data['nik']; ?>" placeholder="16 digit" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>
                              </div>
                              <div><label class="block text-sm font-medium text-slate-700 mb-2">Nama Lengkap *</label> <input type="text" value="<?php echo $data['nama_lengkap']; ?>" placeholder="Masukkan nama lengkap" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>
                              </div>
                          </div>
                          <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                              <div><label class="block text-sm font-medium text-slate-700 mb-2">Tempat Lahir *</label> <input type="text" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" placeholder="Kota kelahiran" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>
                              </div>
                              <div><label class="block text-sm font-medium text-slate-700 mb-2">Tanggal Lahir *</label> <input type="date" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>
                              </div>
                              <div>
                                  <label class="block text-sm font-medium text-slate-700 mb-2">Jenis Kelamin *</label>
                                  <select class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" name="jenis_kelamin" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>
                                      <option value="">-- Pilih --</option>
                                      <option value="L" <?= ($data['jenis_kelamin'] === "L") ? 'selected' : '' ?>>Laki-laki</option>
                                      <option value="P" <?= ($data['jenis_kelamin'] === "P") ? 'selected' : '' ?>>Perempuan</option>
                                  </select>
                              </div>

                          </div>
                          <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                              <div><label class="block text-sm font-medium text-slate-700 mb-2">Agama *</label> <select class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" name="agama" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>
                                      <option value="">-- Pilih --</option>
                                      <option value="Islam" <?= ($data['agama'] === "Islam") ? 'selected' : '' ?>>Islam</option>
                                      <option value="Kristen" <?= ($data['agama'] === "Kristen") ? 'selected' : '' ?>>Kristen</option>
                                      <option value="Hindu" <?= ($data['agama'] === "Hindu") ? 'selected' : '' ?>>Hindu</option>
                                      <option value="Budha" <?= ($data['agama'] === "Budha") ? 'selected' : '' ?>>Budha</option>
                                  </select>
                              </div>
                              <div><label class="block text-sm font-medium text-slate-700 mb-2">Telp *</label> <input type="tel" name="telp_hp" value="<?php echo $data['telp_hp']; ?>" placeholder="08xxxxxxxxxx" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>
                              </div>
                              <div><label class="block text-sm font-medium text-slate-700 mb-2">Alamat *</label> <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" placeholder="Jalan, No. Rumah" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>
                              </div>
                          </div>
                          <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                              <div><label class="block text-sm font-medium text-slate-700 mb-2">Desa/Kel *</label> <input type="text" name="desa" value="<?php echo $data['desa']; ?>" placeholder="Desa/Kelurahan" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>
                              </div>
                              <div><label class="block text-sm font-medium text-slate-700 mb-2">Kecamatan *</label> <input type="text" name="kecamatan" value="<?php echo $data['kecamatan']; ?>" placeholder="Kecamatan" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" data-required="1">
                              </div>
                              <div><label class="block text-sm font-medium text-slate-700 mb-2">Kabupaten *</label> <input type="text" name="kabupaten" value="<?php echo $data['kabupaten']; ?>" placeholder="Kabupaten/Kota" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>
                              </div>
                              <?php
                                $qtahun = mysqli_query($conn, "SELECT tahun_id,tahun FROM tb_tahun_ajaran ORDER BY tahun ASC");
                                ?>
                              <div><label class="block text-sm font-medium text-slate-700 mb-2">Tahun Lulus *</label> <select name="tahun_id" class="w-full px-4 py-2.5  border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>
                                      <option value="">-- Pilih --</option>
                                      <?php while ($t = mysqli_fetch_assoc($qtahun)) { ?>
                                          <option value="<?= $t['tahun_id']; ?>" <?= ($data['tahun_id'] == $t['tahun_id']) ? 'selected' : '' ?>>
                                              <?= $t['tahun']; ?>
                                          </option>
                                      <?php } ?>
                                  </select>
                              </div>
                          </div>
                      </div>
                      <!-- Section 3: Asal Sekolah -->
                      <div class="card-form bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
                          <h3 class="text-base font-bold text-slate-800 mb-6 pb-4 border-b border-slate-200">Asal Sekolah</h3>
                          <?php
                            $qsekolah = mysqli_query($conn, "SELECT sekolah_id,nama_sekolah FROM tb_sekolah_asal ORDER BY nama_sekolah ASC");
                            ?>
                          <div><label class="block text-sm font-medium text-slate-700 mb-2">Asal Sekolah *</label>
                              <select name="asal_sekolah" id="asal_sekolah"
                                  class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 mb-4"
                                  required
                                  onchange="toggleSekolahLainnya()" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>

                                  <option value="">-- Pilih Asal Sekolah --</option>

                                  <?php
                                    $qsekolah = mysqli_query($conn, "SELECT * FROM tb_sekolah_asal ORDER BY nama_sekolah ASC");
                                    while ($s = mysqli_fetch_assoc($qsekolah)) {
                                        $selected = ($data['sekolah_id'] == $s['sekolah_id']) ? 'selected' : '';
                                    ?>
                                      <option value="<?= $s['sekolah_id']; ?>" <?= $selected; ?>>
                                          <?= htmlspecialchars($s['nama_sekolah']); ?>
                                      </option>
                                  <?php } ?>

                                  <option value="lainnya" <?= ($data['sekolah_id'] === 'lainnya') ? 'selected' : ''; ?>>Lainnya</option>
                              </select>


                              <input type="text" name="asal_sekolah_lainnya" id="asal_sekolah_lainnya"
                                  class="input-field w-full px-4 py-3 rounded-xl text-gray-700 mt-3 hidden"
                                  placeholder="Masukkan nama sekolah asal" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>
                          </div>
                      </div>
                      <!-- Section 4: Data Ayah/Wali -->
                      <div class="card-form bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
                          <h3 class="text-base font-bold text-slate-800 mb-6 pb-4 border-b border-slate-200">Data Ayah/Wali</h3>
                          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                              <div><label class="block text-sm font-medium text-slate-700 mb-2">NIK Ayah/Wali *</label> <input type="text" name="nik_ayah" value="<?php echo $data['nik_ayah']; ?>" placeholder="16 digit" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>
                              </div>
                              <div><label class="block text-sm font-medium text-slate-700 mb-2">Nama Ayah/Wali *</label> <input type="text" name="nama_ayah" value="<?php echo $data['nama_ayah']; ?>" placeholder="Nama lengkap" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>
                              </div>
                          </div>
                          <div><label class="block text-sm font-medium text-slate-700 mb-2">Pekerjaan Ayah/Wali *</label> <input type="text" name="pekerjaan_ayah" value="<?php echo $data['pekerjaan_ayah']; ?>" placeholder="Profesi/Pekerjaan" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>
                          </div>
                      </div><!-- Section 5: Data Ibu/Wali -->
                      <div class="card-form bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
                          <h3 class="text-base font-bold text-slate-800 mb-6 pb-4 border-b border-slate-200">Data Ibu/Wali</h3>
                          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                              <div><label class="block text-sm font-medium text-slate-700 mb-2">NIK Ibu/Wali *</label> <input type="text" name="nik_ibu" value="<?php echo $data['nik_ibu']; ?>" placeholder="16 digit" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>
                              </div>
                              <div><label class="block text-sm font-medium text-slate-700 mb-2">Nama Ibu/Wali *</label> <input type="text" name="nama_ibu" value="<?php echo $data['nama_ibu']; ?>" placeholder="Nama lengkap" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>
                              </div>
                          </div>
                          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                              <div><label class="block text-sm font-medium text-slate-700 mb-2">Pekerjaan Ibu/Wali *</label> <input type="text" name="pekerjaan_ibu" value="<?php echo $data['pekerjaan_ibu']; ?>" placeholder="Profesi/Pekerjaan" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>
                              </div>
                              <div><label class="block text-sm font-medium text-slate-700 mb-2">No. Telp Orang Tua/Wali *</label> <input type="tel" name="telp_orangtua" value="<?php echo $data['telp_orangtua']; ?>" placeholder="08xxxxxxxxxx" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>
                              </div>
                          </div>
                      </div>
                      <!-- Section 6: Upload Dokumen -->
                      <?php $qBerkas = mysqli_query($conn, "SELECT * FROM tb_berkas WHERE pendaftaran_id='$pendaftaran_id'");
                        $berkas = mysqli_fetch_assoc($qBerkas);
                        ?>
                      <div class="card-form bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
                          <h3 class="text-base font-bold text-slate-800 mb-6 pb-4 border-b border-slate-200">Upload Dokumen</h3><!-- File Dokumen - Always Show -->
                          <div class="space-y-4" id="docs-umum-prestasi">
                              <div>
                                  <label class="block text-sm font-medium text-slate-700 mb-2">
                                      Upload Ijazah
                                      <span class="text-xs text-slate-500">(PDF/JPG 2MB)</span>
                                  </label>

                                  <input type="file" accept=".pdf,.jpg,.jpeg" name="ijazah"
                                      class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>

                                  <?php if (!empty($berkas['ijazah'])) { ?>
                                      <p class="text-xs text-green-600 mt-1 saved-file">
                                          File tersimpan: <a href="dashboard/uploads/ijazah/<?= urlencode($berkas['ijazah']); ?>"
                                              target="_blank"
                                              class="text-blue-600 underline hover:text-blue-800">
                                              <?= htmlspecialchars($berkas['ijazah']); ?>
                                          </a>
                                      </p>
                                  <?php } ?>
                              </div>

                              <div>
                                  <label class="block text-sm font-medium text-slate-700 mb-2">
                                      Upload Surat Keterangan Lulus
                                      <span class="text-xs text-slate-500">(PDF/JPG 2MB)</span>
                                  </label>

                                  <input type="file" accept=".pdf,.jpg,.jpeg" name="skl"
                                      class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>

                                  <?php if (!empty($berkas['sk_lulus'])) { ?>
                                      <p class="text-xs text-green-600 mt-1 saved-file">
                                          File tersimpan: <a href="dashboard/uploads/skl/<?= urlencode($berkas['sk_lulus']); ?>"
                                              target="_blank"
                                              class="text-blue-600 underline hover:text-blue-800">
                                              <?= htmlspecialchars($berkas['sk_lulus']); ?>
                                          </a>
                                      </p>
                                  <?php } ?>
                              </div>
                              <div id="raport-doc" class="hidden">
                                  <label class="block text-sm font-medium text-slate-700 mb-2">
                                      Upload Raport Semester 3-5
                                      <span class="text-xs text-slate-500">(PDF/JPG 2MB)</span>
                                  </label>

                                  <input type="file" accept=".pdf,.jpg,.jpeg" name="raport"
                                      class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>

                                  <?php if (!empty($berkas['raport'])) { ?>
                                      <p class="text-xs text-green-600 mt-1 saved-file">
                                          File tersimpan: <a href="dashboard/uploads/raport/<?= urlencode($berkas['raport']); ?>"
                                              target="_blank"
                                              class="text-blue-600 underline hover:text-blue-800">
                                              <?= htmlspecialchars($berkas['raport']); ?>
                                          </a>
                                      </p>
                                  <?php } ?>
                              </div>
                              <div>
                                  <label class="block text-sm font-medium text-slate-700 mb-2">
                                      Upload Foto <span class="text-xs text-slate-500">(Formal Seragam Sekolah)</span>
                                      <span class="text-xs text-slate-500">(PDF/JPG 2MB)</span>
                                  </label>

                                  <input type="file" accept=".pdf,.jpg,.jpeg" name="foto"
                                      class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>

                                  <?php if (!empty($berkas['foto'])) { ?>
                                      <p class="text-xs text-green-600 mt-1 saved-file">
                                          File tersimpan: <a href="dashboard/uploads/foto/<?= urlencode($berkas['foto']); ?>"
                                              target="_blank"
                                              class="text-blue-600 underline hover:text-blue-800">
                                              <?= htmlspecialchars($berkas['foto']); ?>
                                          </a>
                                      </p>
                                  <?php } ?>
                              </div>
                              <div>
                                  <label class="block text-sm font-medium text-slate-700 mb-2">
                                      Upload Kartu NISN <span class="text-xs text-slate-500">(PDF/JPG 2MB)</span>

                                  </label>

                                  <input type="file" accept=".pdf,.jpg,.jpeg" name="kartu_nisn"
                                      class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>

                                  <?php if (!empty($berkas['file_nisn'])) { ?>
                                      <p class="text-xs text-green-600 mt-1 saved-file">
                                          File tersimpan: <a href="dashboard/uploads/nisn/<?= urlencode($berkas['file_nisn']); ?>"
                                              target="_blank"
                                              class="text-blue-600 underline hover:text-blue-800">
                                              <?= htmlspecialchars($berkas['file_nisn']); ?>
                                          </a>
                                      </p>
                                  <?php } ?>
                              </div>

                              <div>
                                  <label class="block text-sm font-medium text-slate-700 mb-2">
                                      Upload Akte Kelahiran <span class="text-xs text-slate-500">(PDF/JPG 2MB)</span>
                                  </label>

                                  <input type="file" accept=".pdf,.jpg,.jpeg" name="akte"
                                      class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>

                                  <?php if (!empty($berkas['akte'])) { ?>
                                      <p class="text-xs text-green-600 mt-1 saved-file">
                                          File tersimpan: <a href="dashboard/uploads/akte/<?= urlencode($berkas['akte']); ?>"
                                              target="_blank"
                                              class="text-blue-600 underline hover:text-blue-800">
                                              <?= htmlspecialchars($berkas['akte']); ?>
                                          </a>
                                      </p>
                                  <?php } ?>
                              </div>

                              <div>
                                  <label class="block text-sm font-medium text-slate-700 mb-2">
                                      Upload Kartu Keluarga
                                      <span class="text-xs text-slate-500">(PDF/JPG 2MB)</span>
                                  </label>

                                  <input type="file" accept=".pdf,.jpg,.jpeg" name="kk"
                                      class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>

                                  <?php if (!empty($berkas['kartu_keluarga'])) { ?>
                                      <p class="text-xs text-green-600 mt-1 saved-file">
                                          File tersimpan: <a href="dashboard/uploads/kk/<?= urlencode($berkas['kartu_keluarga']); ?>"
                                              target="_blank"
                                              class="text-blue-600 underline hover:text-blue-800">
                                              <?= htmlspecialchars($berkas['kartu_keluarga']); ?>
                                          </a>
                                      </p>
                                  <?php } ?>
                              </div>


                              <div id="sertifikat-doc" class="hidden">
                                  <label class=" block text-sm font-medium text-slate-700 mb-2">
                                      Upload Sertifikat Prestasi
                                      <span class="text-xs text-slate-500">(PDF/JPG 2MB)</span>
                                  </label>

                                  <input type="file" accept=".pdf,.jpg,.jpeg" name="sertifikat"
                                      class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm" data-required="1" <?= $isLocked ? 'disabled' : '' ?>>

                                  <?php if (!empty($berkas['sertifikat'])) { ?>
                                      <p class="text-xs text-green-600 mt-1 saved-file">
                                          File tersimpan: <a href="dashboard/uploads/sertifikat/<?= urlencode($berkas['sertifikat']); ?>"
                                              target="_blank"
                                              class="text-blue-600 underline hover:text-blue-800">
                                              <?= htmlspecialchars($berkas['sertifikat']); ?>
                                          </a>
                                      </p>
                                  <?php } ?>
                              </div>
                          </div>
                      </div>

                    

                      <!-- Action Buttons -->
                      <?php if ($isVerified): ?>
                            <!-- Pesan jika sudah diverifikasi -->
                            <div class="p-4 rounded-xl bg-green-50 border border-green-200 text-green-700 text-sm font-medium">
                                Untuk kartu pendaftaran dapat diambil di Sekretariat SPMB SMK Informatika Sumedang.
                            </div>
                        <?php else: ?>
                                                    
                            <!-- Action Buttons -->
                            <div class="flex items-center gap-3">
                                <button type="submit" name="status" value="draft"
                                    class="flex-1 px-4 py-2.5 border border-slate-200 text-slate-600 rounded-lg font-medium hover:bg-slate-50 transition-colors">
                                    Simpan Sementara
                                </button>

                                <button type="submit" name="status" value="submit"
                                    class="flex-1 px-4 py-2.5 bg-gradient-to-r from-blue-500 to-cyan-500 text-white rounded-lg font-medium hover:shadow-lg transition-all">
                                    Simpan &amp; Submit
                                </button>
                            </div>
                        <?php endif; ?>

                  </form>
              </div><!-- Info Sidebar -->
              <div class="lg:col-span-1"><!-- Progress -->
                  <div class="card-form bg-white rounded-2xl shadow-sm border border-slate-100 p-6 mb-6 sticky top-6">
                      <!-- <h4 class="text-sm font-bold text-slate-800 mb-4">Progres Pengisian</h4> -->
                      <!-- <div class="flex items-center justify-between mb-3"><span class="text-2xl font-bold text-blue-600" id="progress-percent">0%</span> <span class="text-xs text-slate-500">form</span>
                      </div> -->
                      <!-- <div class="w-full bg-slate-200 rounded-full h-2 mb-4">
                          <div id="progress-bar" class="progress-bar bg-gradient-to-r from-blue-500 to-cyan-500 h-2 rounded-full" style="width: 0%"></div>
                      </div> -->
                      <!-- <p class="text-xs text-slate-600">Selesaikan semua field yang bertanda *</p> -->
                      <h5 class="text-sm font-semibold text-slate-800 mt-2 mb-2">Catatan Penting</h5>
                      <ul class="text-xs text-slate-600 space-y-2">
                          <li>✓ Isi data dengan benar dan jelas</li>
                          <li>✓ Pilih jalur pendaftaran terlebih dahulu</li>
                          <li>✓ Dokumen sesuai format yang diminta</li>
                          <li>✓ Ukuran file maksimal 2MB</li>
                          <li>✓ Simpan secara berkala</li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </main>