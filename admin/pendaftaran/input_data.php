<main class="flex-1 flex flex-col h-full overflow-hidden">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-slate-200 px-4 lg:px-8 py-4">
     <div class="flex items-center justify-between">
      <div class="flex items-center gap-4"><!-- Mobile Menu Button --> <button onclick="toggleSidebar()" class="lg:hidden p-2 rounded-lg hover:bg-slate-100 transition-colors">
        <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg></button>
       <div>
        <h2 id="pageTitle" class="text-xl font-bold text-slate-800">Input Data Pendaftaran</h2>
       </div>
      </div>
     </div>
    </header>
    
    <!-- Content Area -->
    <div id="contentArea" class="flex-1 overflow-y-auto p-4 lg:p-8">
      <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
      <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <!-- Form Section -->
        <div class="lg:col-span-4 p-4">
            <form id="form-lengkapi" class="space-y-6" action="pendaftaran/simpan.php"
                method="POST"
                enctype="multipart/form-data">

                <!-- Section 1: Data Pendaftaran -->
                <div class="card-form bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
                    <h3 class="text-base font-bold text-slate-800 mb-6 pb-4 border-b border-slate-200">Data Pendaftaran</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">No. Pendaftaran</label>
                            <input type="text"
                                name="no_pendaftaran"
                                id="no_pendaftaran"
                                readonly
                                class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-slate-50">
                        </div>


                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Jalur *</label>
                            <select name="jalur" id="jalur"
                                onchange="generateNo()"
                                class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500"
                                required>
                                <option value="">-- Pilih Jalur --</option>
                                <option value="Prestasi">Prestasi</option>
                                <option value="Umum">Umum</option>
                            </select>
                        </div>

                        <!-- Memanggil Data Kompetensi -->
                        <?php
                        include "../config/koneksi.php";
                        $qJurusan = mysqli_query($conn, "SELECT kompetensi_id, nama_kompetensi FROM tb_kompetensi ORDER BY nama_kompetensi ASC");
                        ?>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Jurusan *</label>
                            <select name="kompetensi_id" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" required>
                                <option value="">-- Pilih Jurusan --</option>
                                <?php while ($j = mysqli_fetch_assoc($qJurusan)) { ?>
                                    <option value="<?= $j['kompetensi_id']; ?>">
                                        <?= $j['nama_kompetensi']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                </div><!-- Section 2: Data Pribadi -->
                <div class="card-form bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
                    <h3 class="text-base font-bold text-slate-800 mb-6 pb-4 border-b border-slate-200">Data Pribadi</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">NISN *</label> <input type="text" name="nisn" placeholder="9 digit" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">NIK </label> <input type="text" name="nik" placeholder="16 digit" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">Nama Lengkap *</label> <input type="text" placeholder="Masukkan nama lengkap" name="nama" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">Tempat Lahir </label> <input type="text" name="tempat_lahir" placeholder="Kota kelahiran" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">Tanggal Lahir </label> <input type="date" name="tanggal_lahir" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Jenis Kelamin </label>
                            <select class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" name="jenis_kelamin">
                                <option value="">-- Pilih --</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>

                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">Agama </label> <select class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" name="agama">
                                <option value="">-- Pilih --</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                            </select>
                        </div>
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">Telp </label> <input type="tel" name="telp_hp" placeholder="08xxxxxxxxxx" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">Alamat </label> <input type="text" name="alamat" placeholder="Jalan, No. Rumah" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">Desa/Kel </label> <input type="text" name="desa" placeholder="Desa/Kelurahan" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">Kecamatan </label> <input type="text" name="kecamatan" placeholder="Kecamatan" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">Kabupaten </label> <input type="text" name="kabupaten" placeholder="Kabupaten/Kota" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                        </div>
                        <?php
                        include "../config/koneksi.php";
                        $qtahun = mysqli_query($conn, "SELECT tahun_id,tahun FROM tb_tahun_ajaran where status='Aktif' ORDER BY tahun ASC");
                        ?>
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">Tahun Lulus *</label> <select name="tahun_id" class="w-full px-4 py-2.5  border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" required>
                                <option value="">-- Pilih --</option>
                                <?php while ($t = mysqli_fetch_assoc($qtahun)) { ?>
                                    <option value="<?= $t['tahun_id']; ?>">
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
                    include "../config/koneksi.php";
                    $qsekolah = mysqli_query($conn, "SELECT sekolah_id,nama_sekolah FROM tb_sekolah_asal ORDER BY nama_sekolah ASC");
                    ?>
                    <div><label class="block text-sm font-medium text-slate-700 mb-2">Asal Sekolah *</label>
                        <select name="asal_sekolah" id="asal_sekolah"
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 mb-4"
                            onchange="toggleSekolahLainnya()" required>

                            <option value="">-- Pilih Asal Sekolah --</option>

                            <?php
                            $qsekolah = mysqli_query($conn, "SELECT * FROM tb_sekolah_asal ORDER BY nama_sekolah ASC");
                            while ($s = mysqli_fetch_assoc($qsekolah)) {

                            ?>
                                <option value="<?= $s['sekolah_id']; ?>">
                                    <?= htmlspecialchars($s['nama_sekolah']); ?>
                                </option>
                            <?php } ?>

                            <option value="lainnya">Lainnya</option>
                        </select>


                        <input type="text" name="asal_sekolah_lainnya" id="asal_sekolah_lainnya"
                            class="input-field w-full border border-slate-200 px-4 py-3 rounded-xl text-gray-700 mt-3 hidden"
                            placeholder="Masukkan nama sekolah asal">
                    </div>
                </div>
                
                <!-- Section 4: Data Ayah/Wali -->
                <div class="card-form bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
                    <h3 class="text-base font-bold text-slate-800 mb-6 pb-4 border-b border-slate-200">Data Ayah/Wali</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">NIK Ayah/Wali *</label> <input type="text" name="nik_ayah" placeholder="16 digit" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">Nama Ayah/Wali *</label> <input type="text" name="nama_ayah" placeholder="Nama lengkap" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    </div>
                    <div><label class="block text-sm font-medium text-slate-700 mb-2">Pekerjaan Ayah/Wali *</label> <input type="text" name="pekerjaan_ayah" placeholder="Profesi/Pekerjaan" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" required>
                    </div>
                </div>
                
                <!-- Section 5: Data Ibu/Wali -->
                <div class="card-form bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
                    <h3 class="text-base font-bold text-slate-800 mb-6 pb-4 border-b border-slate-200">Data Ibu/Wali</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">NIK Ibu/Wali *</label> <input type="text" name="nik_ibu" placeholder="16 digit" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">Nama Ibu/Wali *</label> <input type="text" name="nama_ibu" placeholder="Nama lengkap" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">Pekerjaan Ibu/Wali *</label> <input type="text" name="pekerjaan_ibu" placeholder="Profesi/Pekerjaan" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">No. Telp Orang Tua/Wali *</label> <input type="tel" name="telp_orangtua" placeholder="08xxxxxxxxxx" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    </div>
                </div>

                <!-- Section 6: Upload Dokumen -->
                <div class="card-form bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
                    <h3 class="text-base font-bold text-slate-800 mb-6 pb-4 border-b border-slate-200">Upload Dokumen</h3>
                    
                    <!-- File Dokumen - Always Show -->
                    <div class="space-y-4" id="docs-umum-prestasi">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Upload Ijazah
                                <span class="text-xs text-slate-500">(PDF/JPG 2MB)</span>
                            </label>

                            <input type="file" accept=".pdf,.jpg,.jpeg" name="ijazah"
                                class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Upload Surat Keterangan Lulus
                                <span class="text-xs text-slate-500">(PDF/JPG 2MB)</span>
                            </label>

                            <input type="file" accept=".pdf,.jpg,.jpeg" name="skl"
                                class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm">
                        </div>
                        <div id="raport-doc" class="hidden">
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Upload Raport Semester 3-5
                                <span class="text-xs text-slate-500">(PDF/JPG 2MB)</span>
                            </label>

                            <input type="file" accept=".pdf,.jpg,.jpeg" name="raport"
                                class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Upload Foto <span class="text-xs text-slate-500">(Formal Seragam Sekolah)</span>
                                <span class="text-xs text-slate-500">(PDF/JPG 2MB)</span>
                            </label>

                            <input type="file" accept=".pdf,.jpg,.jpeg" name="foto"
                                class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Upload Kartu NISN <span class="text-xs text-slate-500">(PDF/JPG 2MB)</span>

                            </label>

                            <input type="file" accept=".pdf,.jpg,.jpeg" name="kartu_nisn"
                                class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Upload Akte Kelahiran <span class="text-xs text-slate-500">(PDF/JPG 2MB)</span>
                            </label>

                            <input type="file" accept=".pdf,.jpg,.jpeg" name="akte"
                                class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Upload Kartu Keluarga
                                <span class="text-xs text-slate-500">(PDF/JPG 2MB)</span>
                            </label>

                            <input type="file" accept=".pdf,.jpg,.jpeg" name="kk"
                                class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm">
                        </div>


                        <div id="sertifikat-doc">
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Upload Sertifikat Prestasi
                                <span class="text-xs text-slate-500">(PDF/JPG maks. 2MB)</span>
                            </label>
                            <input type="file" accept=".pdf,.jpg,.jpeg" name="sertifikat"
                                class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm">
                                <!-- Catatan merah -->
                            <p class="text-xs text-red-600 mb-2">
                                *Bagi pendaftar jalur Prestasi, wajib mengunggah bukti prestasi baik akademik maupun non-akademik.
                            </p>
                        </div>

                    </div>
                </div><!-- Action Buttons -->
                <div class="flex items-center gap-3"><button type="submit" name="status" value="draft" class="flex-1 px-4 py-2.5 border border-slate-200 text-slate-600 rounded-lg font-medium hover:bg-slate-50 transition-colors">Simpan Data Sementara</button> <button type="submit" name="status" value="submit" class="flex-1 px-4 py-2.5 bg-gradient-to-r from-blue-500 to-cyan-500 text-white rounded-lg font-medium hover:shadow-lg transition-all">Simpan &amp; Submit</button>
                </div>
            </form>
        </div><!-- Info Sidebar -->

    </div>
       
      </div>
    </div>
   </main>