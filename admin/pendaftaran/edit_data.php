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
        <div class="lg:col-span-4 p-4">
      <!-- Form Section -->
         <?php 
         
         $pendaftaran_id = $_GET['id'];
          $q = mysqli_query($conn,"
          SELECT p.*, t.tahun, k.nama_kompetensi, s.nama_sekolah,o.*, b.*, u.nama 
          FROM tb_pendaftaran p
          INNER JOIN tb_tahun_ajaran t ON p.tahun_id=t.tahun_id
          INNER JOIN tb_kompetensi k ON p.kompetensi_id=k.kompetensi_id
          INNER JOIN tb_sekolah_asal s ON p.sekolah_id=s.sekolah_id
          LEFT JOIN tb_berkas b ON b.pendaftaran_id=p.pendaftaran_id
          LEFT JOIN tb_orang_tua o ON o.pendaftaran_id=p.pendaftaran_id
          INNER JOIN tb_user u ON p.user_id=u.user_id
          WHERE p.pendaftaran_id='$pendaftaran_id'
          ");
          $row = mysqli_fetch_assoc($q);
         ?>
       
            <form id="form-lengkapi" class="space-y-6" action="pendaftaran/simpan.php"
                method="POST"
                enctype="multipart/form-data">
                
                <!-- Section 1: Data Pendaftaran -->
                <div class="card-form bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
                  <input type="hidden" name="pendaftaran_id" value="<?= $row['pendaftaran_id']; ?>">
                    <h3 class="text-base font-bold text-slate-800 mb-6 pb-4 border-b border-slate-200">Data Pendaftaran</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">No. Pendaftaran</label>
                            <input type="text"
                                name="no_pendaftaran"
                                value="<?php echo $row['no_pendaftaran'];?>"
                                readonly
                                class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-slate-50">
                        </div>


                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Jalur *</label>
                            <select name="jalur"         
                                class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                                <option value="PRESTASI" <?php $row['jalur']=='PRESTASI'?'selected':''; ?>>Prestasi</option>
                                <option value="UMUM" <?php $row['jalur']=='UMUM'?'selected':''; ?>>Umum</option>
                            </select>
                        </div>

                        <!-- Memanggil Data Kompetensi -->
                        <?php
                        $qJur = mysqli_query($conn,"SELECT * FROM tb_kompetensi");
                        ?>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Jurusan *</label>
                            <select name="kompetensi_id" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" required>
                              <?php while($j=mysqli_fetch_assoc($qJur)){ ?>
                              <option value="<?php echo $j['kompetensi_id']; ?>"
                              <?php echo $row['kompetensi_id']==$j['kompetensi_id']?'selected':''; ?>>
                              <?php echo $j['nama_kompetensi']; ?>
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
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">NISN *</label> <input type="text" name="nisn" value="<?php echo $row['nisn']?>" placeholder="9 digit" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">NIK </label> <input type="text" name="nik" value="<?php echo $row['nik']?>" placeholder="16 digit" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">Nama Lengkap *</label> <input type="text" placeholder="Masukkan nama lengkap" name="nama" value="<?php echo $row['nama_lengkap']?>" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">Tempat Lahir </label> <input type="text" name="tempat_lahir" value="<?php echo $row['tempat_lahir']?>" placeholder="Kota kelahiran" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">Tanggal Lahir </label> <input type="date" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']?>" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                        </div>
                       <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Jenis Kelamin</label>
                            <select class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" name="jenis_kelamin">
                                <option value="L" <?php echo $row['jenis_kelamin']=='L' ? 'selected' : ''; ?>>
                                    Laki-laki
                                </option>
                                <option value="P" <?php echo $row['jenis_kelamin']=='P' ? 'selected' : ''; ?>>
                                    Perempuan
                                </option>
                            </select>
                        </div>


                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">Agama </label> <select class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" name="agama">
                                <option value="Islam" <?php echo $row['agama']=='Islam' ? 'selected' : ''; ?>>
                                    Islam
                                </option>
                                <option value="Kristen" <?php echo $row['agama']=='Kristen' ? 'selected' : ''; ?>>
                                    Kristen
                                </option>
                                <option value="Hindu" <?php echo $row['agama']=='Hindu' ? 'selected' : ''; ?>>
                                    Hindu
                                </option>
                                <option value="Budha" <?php echo $row['agama']=='Budha' ? 'selected' : ''; ?>>
                                    Budha
                                </option>
                            </select>
                        </div>
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">Telp </label> <input type="tel" name="telp_hp" value="<?php echo $row['telp_hp']?>" placeholder="08xxxxxxxxxx" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">Alamat </label> <input type="text" name="alamat" value="<?php echo $row['alamat']?>" placeholder="Jalan, No. Rumah" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">Desa/Kel </label> <input type="text" name="desa" value="<?php echo $row['desa']?>" placeholder="Desa/Kelurahan" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">Kecamatan </label> <input type="text" name="kecamatan" value="<?php echo $row['kecamatan']?>" placeholder="Kecamatan" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">Kabupaten </label> <input type="text" name="kabupaten" value="<?php echo $row['kabupaten']?>" placeholder="Kabupaten/Kota" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                        </div>
                        <?php
                        $qtahun = mysqli_query($conn, "SELECT tahun_id,tahun FROM tb_tahun_ajaran where status='Aktif' ORDER BY tahun ASC");
                        ?>
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">Tahun Lulus *</label> <select name="tahun_id" class="w-full px-4 py-2.5  border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" required>
                              <?php while($t=mysqli_fetch_assoc($qtahun)){ ?>
                              <option value="<?php echo $t['tahun_id']; ?>"
                              <?php echo $row['tahun_id']==$t['tahun_id']?'selected':''; ?>>
                              <?php echo $t['tahun']; ?>
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
                            onchange="toggleSekolahLainnya()" required>

                             <?php while($s=mysqli_fetch_assoc($qsekolah)){ ?>
                              <option value="<?php echo $s['sekolah_id']; ?>"
                              <?php echo $row['sekolah_id']==$s['sekolah_id']?'selected':''; ?>>
                              <?php echo $s['nama_sekolah']; ?>
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
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">NIK Ayah/Wali *</label> <input type="text" name="nik_ayah" value="<?php echo $row['nik_ayah']?>" placeholder="16 digit" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">Nama Ayah/Wali *</label> <input type="text" name="nama_ayah" value="<?php echo $row['nama_ayah']?>" placeholder="Nama lengkap" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    </div>
                    <div><label class="block text-sm font-medium text-slate-700 mb-2">Pekerjaan Ayah/Wali *</label> <input type="text" name="pekerjaan_ayah" value="<?php echo $row['pekerjaan_ayah']?>" placeholder="Profesi/Pekerjaan" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" required>
                    </div>
                </div>
                
                <!-- Section 5: Data Ibu/Wali -->
                <div class="card-form bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
                    <h3 class="text-base font-bold text-slate-800 mb-6 pb-4 border-b border-slate-200">Data Ibu/Wali</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">NIK Ibu/Wali *</label> <input type="text" name="nik_ibu" value="<?php echo $row['nik_ibu']?>" placeholder="16 digit" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">Nama Ibu/Wali *</label> <input type="text" name="nama_ibu" value="<?php echo $row['nama_ibu']?>" placeholder="Nama lengkap" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">Pekerjaan Ibu/Wali *</label> <input type="text" name="pekerjaan_ibu" value="<?php echo $row['pekerjaan_ibu']?>" placeholder="Profesi/Pekerjaan" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div><label class="block text-sm font-medium text-slate-700 mb-2">No. Telp Orang Tua/Wali *</label> <input type="tel" name="telp_orangtua" value="<?php echo $row['telp_orangtua']?>" placeholder="08xxxxxxxxxx" class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500" required>
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
                </div>
                <?php if ($row['status'] != 'verifikasi') { ?>
                <!-- Action Buttons -->
                <div class="flex items-center gap-3">
                    <button type="submit" name="status" value="draft"
                        class="flex-1 px-4 py-2.5 border border-slate-200 text-slate-600 rounded-lg font-medium hover:bg-slate-50 transition-colors">
                        Simpan Data Sementara
                    </button>

                    <button type="submit" name="status" value="submit"
                        class="flex-1 px-4 py-2.5 bg-gradient-to-r from-blue-500 to-cyan-500 text-white rounded-lg font-medium hover:shadow-lg transition-all">
                        Simpan & Submit
                    </button>
                </div>
            <?php } else { ?>
                <div class="p-4 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm">
                    Data sudah diverifikasi dan tidak dapat diubah.
                </div>
            <?php } ?>

            </form>
        </div>


    </div>
       
      </div>
    </div>
   </main>