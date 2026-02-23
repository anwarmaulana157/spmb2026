// =====================================
// SIDEBAR (MENU KIRI) UNTUK MOBILE
// =====================================
function toggleSidebar() {
  const sidebar = document.getElementById("sidebar");
  const overlay = document.getElementById("mobileOverlay");

  sidebar.classList.toggle("-translate-x-full");
  overlay.classList.toggle("hidden");
}

// =====================================
// SUBMENU (DROPDOWN MENU)
// =====================================
function toggleSubmenu(id) {
  const submenu = document.getElementById(id);
  const arrow = document.getElementById(id + "Arrow");

  submenu.classList.toggle("open");
  arrow.classList.toggle("rotate-180");
}

// =====================================
// MENENTUKAN MENU YANG AKTIF
// =====================================
function setActivePage(page) {
  document.querySelectorAll(".sidebar-item").forEach((item) => {
    item.classList.remove("active");
  });

  const activeItem = document.querySelector(`[data-page="${page}"]`);
  if (activeItem) activeItem.classList.add("active");

  const titles = {
    dashboard: "Dashboard",
    pendaftar: "Data Pendaftar",
    sekolah: "Data Sekolah Asal",
    kompetensi: "Kompetensi Keahlian",
    tahun: "Tahun Pelajaran",
    petugas: "Data Petugas",
    verifikasi: "Verifikasi Data",
    rekap: "Rekap Pendaftar",
    cetak: "Cetak Kartu Pendaftar",
  };

  document.getElementById("pageTitle").textContent =
    titles[page] || "Dashboard";

  if (window.innerWidth < 1024) {
    toggleSidebar();
  }
}
// =====================================
// Modal Handler
// =====================================
function openModal(id) {
  document.querySelectorAll(".modal").forEach((modal) => {
    modal.classList.add("hidden");
  });

  const target = document.getElementById(id);
  if (target) target.classList.remove("hidden");
}

function closeModal() {
  document.querySelectorAll(".modal").forEach((modal) => {
    modal.classList.add("hidden");
  });
}

// tombol close (data-close)
document.addEventListener("click", function (e) {
  if (e.target.closest("[data-close]")) {
    closeModal();
  }
});
// =====================================
// Ubah Password Pendaftara
// =====================================
document.addEventListener("click", function (e) {
  const btn = e.target.closest(".btn-pass");
  if (!btn) return;

  document.getElementById("edit_pendaftaran_id").value = btn.dataset.id;
  openModal("modalUbahPass");
});

// =====================================
// Edit Petugas Modal
// =====================================
document.addEventListener("click", function (e) {
  const btn = e.target.closest(".btn-edit");
  if (!btn) return;

  e.preventDefault();

  const row = btn.closest("tr");
  if (!row) return;

  // ambil data dari tabel
  document.getElementById("edit_nama").value =
    row.querySelector(".td-nama")?.innerText ?? "";

  document.getElementById("edit_username").value =
    row.querySelector(".td-username")?.innerText ?? "";

  document.getElementById("edit_role").value = row
    .querySelector(".td-role")
    ?.innerText.trim();

  document.getElementById("edit_status").value = row
    .querySelector(".td-status")
    ?.innerText.trim();

  document.getElementById("edit_user_id").value = btn.dataset.id ?? "";

  openModal("modalEditPetugas");
});

// =====================================
// Edit Sekolah Modal
// =====================================
document.addEventListener("click", function (e) {
  const btn = e.target.closest(".btn-edit");
  if (!btn) return;

  e.preventDefault();

  const row = btn.closest("tr");
  if (!row) return;

  // ambil data dari tabel
  document.getElementById("edit_npsn").value =
    row.querySelector(".td-npsn")?.innerText ?? "";

  document.getElementById("edit_namasekolah").value =
    row.querySelector(".td-namasekolah")?.innerText ?? "";

  document.getElementById("edit_alamat").value = row
    .querySelector(".td-alamat")
    ?.innerText.trim();

  document.getElementById("edit_sekolah_id").value = btn.dataset.id ?? "";

  openModal("modalEditSekolah");
});

function toggleSekolahLainnya() {
  const select = document.getElementById("asal_sekolah");
  const inputLainnya = document.getElementById("asal_sekolah_lainnya");

  if (select.value === "lainnya") {
    inputLainnya.classList.remove("hidden");
    inputLainnya.required = true;
  } else {
    inputLainnya.classList.add("hidden");
    inputLainnya.required = false;
    inputLainnya.value = "";
  }
}

// =====================================
// INISIALISASI AWAL
// =====================================
document.addEventListener("DOMContentLoaded", () => {
  updateUI();
});
