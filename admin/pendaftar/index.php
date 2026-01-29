<header class="bg-white shadow-sm border-b border-slate-200 px-6 py-4">
    <div class="flex items-center justify-between">
        <div>
            <h2 id="page-title" class="text-xl font-bold text-slate-800">Pendaftar</h2>
            <p class="text-sm text-slate-500">Selamat datang di Panel Admin SPMB</p>
        </div>
        <div class="flex items-center gap-4"><!-- Notifications --> <button class="relative p-2 text-slate-500 hover:text-slate-700 hover:bg-slate-100 rounded-xl transition-colors">
                <div class="flex items-center gap-3 pl-4 border-l border-slate-200">
                    <div class="w-10 h-10 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-xl flex items-center justify-center text-white font-bold shadow-md">
                        A
                    </div>
                    <div>
                        <p id="admin-name" class="text-sm font-semibold text-slate-700">Administrator</p>
                        <p class="text-xs text-slate-400">Super Admin</p>
                    </div>
                </div>
        </div>
    </div>
</header>

<main class="flex-1 p-6 overflow-y-auto">
    <div id="page-pendaftar" class="page-content">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                <h3 class="font-bold text-slate-800">Data Pendaftar</h3>
                <div class="flex items-center gap-3">
                    <div class="relative"><input type="text" placeholder="Cari pendaftar..." class="pl-10 pr-4 py-2 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 w-64">
                        <svg class="w-5 h-5 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div><button class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-xl text-sm font-medium flex items-center gap-2 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg> Tambah </button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="text-left py-4 px-6 text-xs font-semibold text-slate-500 uppercase">No. Pendaftaran</th>
                            <th class="text-left py-4 px-6 text-xs font-semibold text-slate-500 uppercase">Nama Lengkap</th>
                            <th class="text-left py-4 px-6 text-xs font-semibold text-slate-500 uppercase">Sekolah Asal</th>
                            <th class="text-left py-4 px-6 text-xs font-semibold text-slate-500 uppercase">Kompetensi</th>
                            <th class="text-left py-4 px-6 text-xs font-semibold text-slate-500 uppercase">Status</th>
                            <th class="text-left py-4 px-6 text-xs font-semibold text-slate-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <?php
                    include "../config/koneksi.php";

                    // ================= QUERY DATA =================
                    $q = mysqli_query($conn, "
                    SELECT 
                        p.pendaftaran_id,
                        p.no_pendaftaran,
                        p.nama_lengkap,
                        s.nama_sekolah,
                        k.nama_kompetensi,
                        IFNULL(v.status, 'menunggu') AS status_verifikasi

                    FROM tb_pendaftaran p
                    LEFT JOIN tb_sekolah_asal s ON p.sekolah_id = s.sekolah_id
                    LEFT JOIN tb_kompetensi k ON p.kompetensi_id = k.kompetensi_id

                    LEFT JOIN (
                        SELECT v1.*
                        FROM tb_verifikasi v1
                        INNER JOIN (
                            SELECT pendaftaran_id, MAX(tanggal) AS max_tanggal
                            FROM tb_verifikasi
                            GROUP BY pendaftaran_id
                        ) v2
                        ON v1.pendaftaran_id = v2.pendaftaran_id
                        AND v1.tanggal = v2.max_tanggal
                    ) v ON p.pendaftaran_id = v.pendaftaran_id

                    ORDER BY p.pendaftaran_id DESC
                    ");

                    while ($row = mysqli_fetch_assoc($q)) {

                    ?>
                        <tbody class="divide-y divide-slate-100">
                            <tr class="hover:bg-slate-50">
                                <td class="py-4 px-6 text-sm text-slate-600"><?php echo $row['no_pendaftaran']; ?></td>
                                <td class="py-4 px-6 text-sm text-slate-600"><?php echo $row['nama_lengkap']; ?></td>
                                <td class="py-4 px-6 text-sm text-slate-600"><?php echo $row['nama_sekolah']; ?></td>
                                <td class="py-4 px-6 text-sm text-slate-600"><?php echo $row['nama_kompetensi']; ?></td>
                                <td class="py-4 px-6"><span class="bg-emerald-100 text-emerald-700 text-xs font-medium px-3 py-1 rounded-full"><?php echo $row['status']; ?></span></td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-2"><button class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg></button> <button class="p-2 text-slate-400 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg></button> <button class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg></button>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-slate-100 flex items-center justify-between">
                <p class="text-sm text-slate-500">Menampilkan 1-3 dari 1,248 data</p>
                <div class="flex items-center gap-2"><button class="px-3 py-1.5 border border-slate-200 rounded-lg text-sm text-slate-600 hover:bg-slate-50">Sebelumnya</button> <button class="px-3 py-1.5 bg-emerald-500 text-white rounded-lg text-sm">1</button> <button class="px-3 py-1.5 border border-slate-200 rounded-lg text-sm text-slate-600 hover:bg-slate-50">2</button> <button class="px-3 py-1.5 border border-slate-200 rounded-lg text-sm text-slate-600 hover:bg-slate-50">3</button> <button class="px-3 py-1.5 border border-slate-200 rounded-lg text-sm text-slate-600 hover:bg-slate-50">Selanjutnya</button>
                </div>
            </div>
        </div>
    </div>
</main>