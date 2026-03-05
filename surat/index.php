<?php
session_start();
include('../config/koneksi.php');
include('../partials/header.php');
?>

<div class="container py-5">

    <?php if (isset($_GET['pesan']) && $_GET['pesan'] == "sukses"): ?>
        <div class="alert alert-success text-center shadow-sm mb-5">
            <strong>Permohonan Berhasil!</strong><br>
            Silakan cek WhatsApp Anda untuk kode tracking surat.
        </div>
    <?php endif; ?>

    <div class="text-center mb-5">
        <h2 class="font-weight-bold" style="color:#1f6f43;">Pilih Jenis Surat</h2>
        <p class="text-muted">
            Silakan pilih layanan surat yang akan diajukan.
        </p>
        <hr style="width:80px; border:3px solid #f4b400; margin:auto;">
    </div>

    <!-- GRID BOOTSTRAP RESMI -->
    <div class="row">

        <!-- 1 -->
        <div class="custom-col-4">
            <div class="glass-card">
                <div class="image-wrapper">
                    <img src="../assets/img/menu-surat.png">
                </div>
                <h6 class="card-title">Surat Ijin Keramaian</h6>
                <a href="surat_ijin_keramaian/" class="btn btn-ajukan">
                    AJUKAN SURAT
                </a>
            </div>
        </div>

        <!-- 2 -->
        <div class="custom-col-4">
            <div class="glass-card">
                <div class="image-wrapper">
                    <img src="../assets/img/menu-surat.png">
                </div>
                <h6 class="card-title">Surat Keterangan Umum</h6>
                <a href="surat_keterangan/" class="btn btn-ajukan">
                    AJUKAN SURAT
                </a>
            </div>
        </div>

        <!-- 3 -->
          <div class="custom-col-4">
            <div class="glass-card">
                <div class="image-wrapper">
                    <img src="../assets/img/menu-surat.png">
                </div>
                <h6 class="card-title">Surat Domisili</h6>
                <a href="surat_keterangan_domisili_tempat_tinggal/" class="btn btn-ajukan">
                    AJUKAN SURAT
                </a>
            </div>
        </div>

        <!-- 5 -->
          <div class="custom-col-4">
            <div class="glass-card">
                <div class="image-wrapper">
                    <img src="../assets/img/menu-surat.png">
                </div>
                <h6 class="card-title">Surat Ket. Tidak Mampu</h6>
                <a href="surat_keterangan_tidak_mampu/" class="btn btn-ajukan">
                    AJUKAN SURAT
                </a>
            </div>
        </div>

        <!-- 6 -->
        <div class="custom-col-4">
            <div class="glass-card">
                <div class="image-wrapper">
                    <img src="../assets/img/menu-surat.png">
                </div>
                <h6 class="card-title">Surat Keterangan Usaha</h6>
                <a href="surat_keterangan_usaha/" class="btn btn-ajukan">
                    AJUKAN SURAT
                </a>
            </div>
        </div>

        <!-- 7 -->
         <div class="custom-col-4">
            <div class="glass-card">
                <div class="image-wrapper">
                    <img src="../assets/img/menu-surat.png">
                </div>
                <h6 class="card-title">Surat Pengantar SKCK</h6>
                <a href="surat_pengantar_catatan_kepolisian/" class="btn btn-ajukan">
                    AJUKAN SURAT
                </a>
            </div>
        </div>

        <!-- 8 -->
        <div class="custom-col-4">
            <div class="glass-card">
                <div class="image-wrapper">
                    <img src="../assets/img/menu-surat.png">
                </div>
                <h6 class="card-title">Surat Pengantar Umum</h6>
                <a href="surat_pengantar_umum/" class="btn btn-ajukan">
                    AJUKAN SURAT
                </a>
            </div>
        </div>

    </div>

</div>

<?php
include('../partials/footer.php');
?>

<style>
    .custom-row {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        justify-content: center;
    }

    .custom-col-4 {
        flex: 0 0 23%;
        max-width: 23%;
    }

    @media (max-width: 992px) {
        .custom-col-4 {
            flex: 0 0 45%;
            max-width: 45%;
        }
    }

    @media (max-width: 576px) {
        .custom-col-4 {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }

    .glass-card {
        background: #ffffff;
        border-radius: 18px;
        border: 1px solid #e9ecef;
        padding: 30px 25px;
        text-align: center;
        transition: 0.3s ease;
        height: 100%;
    }

    .glass-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.08);
    }

    .image-wrapper {
        width: 100%;
        height: 130px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }

    .image-wrapper img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .card-title {
        font-weight: 700;
        font-size: 16px;
        color: #2c3e50;
        margin-bottom: 20px;
        min-height: 48px;
    }

    .btn-ajukan {
        background: #198754;
        color: #fff !important;
        font-weight: 600;
        border-radius: 8px;
        padding: 10px 20px;
        width: 100%;
        transition: 0.3s;
    }

    .btn-ajukan:hover {
        background: #157347;
        transform: scale(1.03);
    }
</style>