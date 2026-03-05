<?php
ob_start(); 
include('../part/akses.php');
include('../part/header.php');
?>

<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel" style="padding: 20px 10px;">
            <div class="pull-left image">
                <?php
                $ava = ($_SESSION['lvl'] == 'Administrator') ? 'ava-admin-female.png' : 'ava-kades.png';
                echo '<img src="../../assets/img/' . $ava . '" class="img-circle" style="border: 2px solid #ffc107; box-shadow: 0 0 10px rgba(255,193,7,0.3);">';
                ?>
            </div>
            <div class="pull-left info">
                <p style="letter-spacing: 1px; margin-bottom: 5px;"><?php echo $_SESSION['lvl']; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Aktif</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header" style="color:rgba(255,255,255,0.3); font-size: 8pt; padding: 15px 25px 5px;">MENU UTAMA
            </li>
            <li class="active"><a href="#"><i class="fas fa-tachometer-alt"></i> <span>&nbsp; Dashboard</span></a></li>
            <li>
                <a href="../profil_desa/">
                    <i class="fa fa-university"></i>
                    <span>&nbsp;Profil Desa</span>
                </a>
            </li>
            
            <li><a href="../pejabat/"><i class="fa fa-users"></i> <span>&nbsp;Data Pejabat</span></a></li>
            <li>
            <a href="../struktur/">
            <i class="fa fa-sitemap"></i> <span>&nbsp;Struktur Organisasi</span>
            </a>
            </li>
            <li><a href="../penduduk/"><i class="fa fa-users"></i> <span>&nbsp;Data Penduduk</span></a></li>

            <?php if ($_SESSION['lvl'] == 'Administrator'): ?>
            <li class="treeview">
                <a href="#">
                    <i class="fas fa-envelope-open-text"></i> <span>&nbsp; Layanan Surat</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu" style="background: transparent;">
                    <li><a href="../surat/permintaan_surat/"><i class="far fa-circle"></i> Permintaan Surat</a></li>
                    <li><a href="../surat/surat_selesai/"><i class="far fa-circle"></i> Surat Selesai</a></li>
                </ul>
            </li>
            <?php endif; ?>
            <li>
            <a href="../apbdes/">
            <i class="fa fa-chart-pie"></i>
            <span>&nbsp;Info Grafis APBDes</span>
            </a>
            </li>

            <li><a href="../berita/"><i class="fas fa-newspaper"></i> <span>&nbsp; Berita Desa</span></a></li>

            <li><a href="../pengaduan/"><i class="fas fa-clipboard-list"></i> <span>&nbsp; Kritik & Saran</span></a></li>

            <li><a href="../laporan/"><i class="fas fa-chart-line"></i> <span>&nbsp; Laporan</span></a></li>
        </ul>
    </section>
</aside>

<div class="content-wrapper">
    <section class="content-header" style="padding: 25px 15px;">
        <h1 style="color: black; font-weight: 800;">Dashboard <small style="color: #ccc;">Sistem Informasi Desa</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <?php if ($_SESSION['lvl'] == 'Administrator'): ?>
            <!-- Data Penduduk -->
            <div class="col-lg-4 col-sm-6">
                <div class="small-box box-penduduk">
                    <div class="inner">
                        <h3 style="color: #00d2ff;">
                            <?php
                                include('../../config/koneksi.php');
                                $qTampil = mysqli_query($connect, "SELECT * FROM penduduk");
                                echo mysqli_num_rows($qTampil);
                                ?>
                        </h3>
                        <p>Total Penduduk</p>
                    </div>
                    <div class="icon"><i class="fas fa-users"></i></div>
                    <a href="../penduduk/" class="small-box-footer">Detail Penduduk <i
                            class="fa fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="small-box box-pengaduan">
                    <div class="inner">
                        <h3>
                            <?php
                            $qPengaduan = mysqli_query($connect,"
                                SELECT COUNT(*) as total FROM pengaduan WHERE status='TERKIRIM'
                            ");
                            $rowP = mysqli_fetch_assoc($qPengaduan);
                            echo $rowP['total'];
                            ?>
                        </h3>
                        <p>Pengaduan Masuk</p>
                    </div>
                    <div class="icon"><i class="fas fa-bullhorn"></i></div>
                    <a href="../pengaduan/" class="small-box-footer">
                        Lihat Pengaduan <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Permintaan Surat -->
            <div class="col-lg-4 col-sm-6">
                <div class="small-box box-permintaan">
                    <div class="inner">
                        <h3 style="color: #00ff88;">
                            <?php
                                $qPending = mysqli_query($connect, "SELECT id_sk FROM surat_keterangan WHERE LOWER(status_surat)='pending'
                                UNION ALL SELECT id_spu FROM surat_pengantar_umum WHERE LOWER(status_surat)='pending'
                                UNION ALL SELECT id_sik FROM surat_ijin_keramaian WHERE LOWER(status_surat)='pending'
                                UNION ALL SELECT id_skd FROM surat_keterangan_domisili_tempat_tinggal WHERE LOWER(status_surat)='pending'
                                UNION ALL SELECT id_sktm FROM surat_keterangan_tidak_mampu WHERE LOWER(status_surat)='pending'
                                UNION ALL SELECT id_sku FROM surat_keterangan_usaha WHERE LOWER(status_surat)='pending'
                                UNION ALL SELECT id_spck FROM surat_pengantar_catatan_kepolisian WHERE LOWER(status_surat)='pending'");
                                echo mysqli_num_rows($qPending);
                                ?>
                        </h3>
                        <p>Permintaan Surat</p>
                    </div>
                    <div class="icon"><i class="fas fa-envelope-open-text"></i></div>
                    <a href="../surat/permintaan_surat/" class="small-box-footer">Proses Surat <i
                            class="fa fa-arrow-right"></i></a>
                </div>
            </div>

            <!-- Surat Selesai -->
            <div class="col-lg-4 col-sm-6">
                <div class="small-box box-selesai">
                    <div class="inner">
                        <h3 style="color: #ffc107;">
                            <?php
                                $qSelesai = mysqli_query($connect, "SELECT id_sk FROM surat_keterangan WHERE LOWER(status_surat)='selesai'
                                UNION ALL SELECT id_spu FROM surat_pengantar_umum WHERE LOWER(status_surat)='selesai'
                                UNION ALL SELECT id_sik FROM surat_ijin_keramaian WHERE LOWER(status_surat)='selesai'
                                UNION ALL SELECT id_skd FROM surat_keterangan_domisili_tempat_tinggal WHERE LOWER(status_surat)='selesai'
                                UNION ALL SELECT id_sktm FROM surat_keterangan_tidak_mampu WHERE LOWER(status_surat)='selesai'
                                UNION ALL SELECT id_sku FROM surat_keterangan_usaha WHERE LOWER(status_surat)='selesai'
                                UNION ALL SELECT id_spck FROM surat_pengantar_catatan_kepolisian WHERE LOWER(status_surat)='selesai'");
                                echo mysqli_num_rows($qSelesai);
                                ?>
                        </h3>
                        <p>Surat Selesai</p>
                    </div>
                    <div class="icon"><i class="fas fa-check-circle"></i></div>
                    <a href="../surat/surat_selesai/" class="small-box-footer">Lihat Arsip <i
                            class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            <!-- Surat Ditolak -->
            <div class="col-lg-4 col-sm-6">
                <div class="small-box box-ditolak">
                    <div class="inner">
                        <h3 style="color:#ff4b5c;">
                            <?php
                            $qTolak = mysqli_query($connect, "SELECT id_sk FROM surat_keterangan WHERE LOWER(status_surat)='ditolak'
                            UNION ALL SELECT id_spu FROM surat_pengantar_umum WHERE LOWER(status_surat)='ditolak'
                            UNION ALL SELECT id_sik FROM surat_ijin_keramaian WHERE LOWER(status_surat)='ditolak'
                            UNION ALL SELECT id_skd FROM surat_keterangan_domisili_tempat_tinggal WHERE LOWER(status_surat)='ditolak'
                            UNION ALL SELECT id_sktm FROM surat_keterangan_tidak_mampu WHERE LOWER(status_surat)='ditolak'
                            UNION ALL SELECT id_sku FROM surat_keterangan_usaha WHERE LOWER(status_surat)='ditolak'
                            UNION ALL SELECT id_spck FROM surat_pengantar_catatan_kepolisian WHERE LOWER(status_surat)='ditolak'");
                            echo mysqli_num_rows($qTolak);
                            ?>
                        </h3>
                        <p>Surat Ditolak</p>
                    </div>
                    <div class="icon"><i class="fas fa-times-circle"></i></div>
                    <a href="../surat/permintaan_surat/" class="small-box-footer">
                        Lihat Surat Ditolak <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
</div>

<?php
include('../part/footer.php');
?>

<style>
.small-box {
    border-radius: 16px;
    padding: 10px;
    box-shadow: 0 10px 25px rgba(0,0,0,.15);
    transition:.2s;
}

.small-box:hover{
    transform: translateY(-4px);
}

.box-penduduk{
    background: linear-gradient(135deg,#0f2027,#2c5364);
    color:#fff;
}

.box-permintaan{
    background: linear-gradient(135deg,#11998e,#38ef7d);
    color:#fff;
}

.box-selesai{
    background: linear-gradient(135deg,#f7971e,#ffd200);
    color:#222;
}

.box-ditolak{
    background: linear-gradient(135deg,#ff416c,#ff0000);
    color:#fff;
}

.box-pengaduan{
    background: linear-gradient(135deg,#ff416c,#ff4b2b);
    color:#fff;
}

.small-box .icon{
    opacity:.25;
    top:15px;
}
</style>