<?php
include 'config/koneksi.php';

$profil = mysqli_fetch_assoc(
    mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1")
);

$page = $_GET['page'] ?? 'home';

include 'partials/header.php';

switch ($page) {

    case 'tentang':
        include 'pages/profil/tentang.php';
        break;

    case 'visi':
        include 'pages/profil/visi.php';
        break;

    case 'geografis':
        include 'pages/profil/geografis.php';
        break;

    case 'peta':
        include 'pages/profil/peta.php';
        break;

    case 'profil-desa':
        include 'pages/profil/profil_desa.php';
        break;
    
    case 'statistik':
        include 'pages/statistik.php';
        break;

    case 'struktur':
        include 'pages/struktur.php';
        break;
    
    case 'apbdes':
        include 'pages/apbdes.php';
        break;

    case 'alur_pengajuan':
        include 'pages/pelayanan/alur_pengajuan.php';
        break;

    case 'pengajuan_surat':
        include 'pages/pelayanan/pengajuan_surat.php';
        break;

    case 'pengaduan':
        include 'pages/pelayanan/pengaduan.php';
        break;

    case 'kontak':
        include 'pages/kontak.php';
        break;

    default:
        include 'pages/home.php';
        break;
}

include 'partials/footer.php';
?>
