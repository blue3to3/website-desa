<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Informasi Desa Nusajati</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="../assets/bootstrap-4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="../assets/css/admin-custom-style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>

<!-- TOP BAR -->
<div style="background:#198754; color:white; padding:10px;">
    <div class="container text-center">
        <strong>Sistem Informasi Desa Nusajati</strong>
    </div>
</div>

<?php
$base = "/DESA_NUSAJATI/";
?>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">

        <a class="navbar-brand font-weight-bold d-flex align-items-center" href="<?= $base ?>index.php">
            <i class="fas fa-home mr-2"></i>
            Desa Nusajati
        </a>

        <button class="navbar-toggler" type="button"
            data-toggle="collapse"
            data-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="<?= $base ?>index.php">Home</a>
                </li>

                <!-- PROFIL DESA -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"
                       href="#"
                       id="profilDropdown"
                       role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true"
                       aria-expanded="false">
                        Profil Desa
                    </a>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= $base ?>index.php?page=tentang">Tentang Kami</a>
                        <a class="dropdown-item" href="<?= $base ?>index.php?page=visi">Visi & Misi</a>
                        <a class="dropdown-item" href="<?= $base ?>index.php?page=geografis">Letak Geografis</a>
                        <a class="dropdown-item" href="<?= $base ?>index.php?page=peta">Peta Wilayah Desa</a>
                        <a class="dropdown-item" href="<?= $base ?>index.php?page=profil-desa">Profil Desa</a>
                    </div>
                </li>

                <!-- STRUKTUR ORGANISASI -->
                 <li class="nav-item">
                    <a class="nav-link" href="<?= $base ?>index.php?page=struktur">Struktur Organisasi</a>
                </li>

                <!-- STATISTIK -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"
                       href="#"
                       id="statistikDropdown"
                       role="button"
                       data-toggle="dropdown">
                        Statistik Desa
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= $base ?>index.php?page=statistik">Statistik Penduduk</a>
                        <a class="dropdown-item" href="<?= $base ?>pages/apbdes.php">APBDes</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= $base ?>pages/berita.php">Berita</a>
                </li>

                <!-- PELAYANAN -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"
                       href="#"
                       id="pelayananDropdown"
                       role="button"
                       data-toggle="dropdown">
                        Pelayanan Desa
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= $base ?>index.php?page=alur_pengajuan">Alur Pengajuan Surat</a>
                        <a class="dropdown-item" href="<?= $base ?>surat/">Pengajuan Surat</a>
                        <a class="dropdown-item" href="<?= $base ?>cek-surat/index.php">Cek Surat</a>
                        <a class="dropdown-item" href="<?= $base ?>pages/pelayanan/pengaduan/index.php">Kritik & Saran</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= $base ?>index.php?page=kontak">Kontak</a>
                </li>

                <li class="nav-item ml-3 d-flex align-items-center">
                    <a class="btn btn-success btn-sm"
                       href="<?= $base ?>login/">
                       <i class="fas fa-user-shield"></i> Login Admin
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
