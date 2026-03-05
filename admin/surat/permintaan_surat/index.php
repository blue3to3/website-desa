<?php
include('../../../config/koneksi.php');
include('../part/akses.php');
include('../part/header.php');
?>

<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel" style="padding: 20px 10px;">
            <div class="pull-left image">
                <?php
                if (isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')) {
                    echo '<img src="../../../assets/img/ava-admin-female.png" class="img-circle" alt="User Image" style="border: 2px solid #ffc107; box-shadow: 0 0 10px rgba(255,193,7,0.3);">';
                } else if (isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Kepala Desa')) {
                    echo '<img src="../../../assets/img/ava-kades.png" class="img-circle" alt="User Image" style="border: 2px solid #ffc107; box-shadow: 0 0 10px rgba(255,193,7,0.3);">';
                }
                ?>
            </div>
            <div class="pull-left info">
                <p style="letter-spacing: 1px; margin-bottom: 5px;"><?php echo $_SESSION['lvl']; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Aktif</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header" style="color:rgba(255,255,255,0.3); font-size: 8pt; padding: 15px 25px 5px;">MENU UTAMA</li>
            <li><a href=../../dashboard><i class="fas fa-tachometer-alt"></i> <span>&nbsp; Dashboard</span></a></li>
            <li>
                <a href="../../profil_desa/">
                    <i class="fa fa-university"></i>
                    <span>&nbsp;Profil Desa</span>
                </a>
            </li>
            
            <li><a href="../../pejabat/"><i class="fa fa-users"></i> <span>&nbsp;Data Pejabat</span></a></li>
            <li>
            <a href="../../struktur/">
            <i class="fa fa-sitemap"></i> <span>&nbsp;Struktur Organisasi</span>
            </a>
            </li>
            <li><a href="../../penduduk/"><i class="fa fa-users"></i> <span>&nbsp;Data Penduduk</span></a></li>

            <?php if ($_SESSION['lvl'] == 'Administrator'): ?>
            <li class="active treeview">
                <a href="#">
                    <i class="fas fa-envelope-open-text"></i> <span>&nbsp; Layanan Surat</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="active treeview-menu" style="background: transparent;">
                    <li><a href="../permintaan_surat/"><i class="far fa-circle"></i> Permintaan Surat</a></li>
                    <li><a href="../surat_selesai/"><i class="far fa-circle"></i> Surat Selesai</a></li>
                </ul>
            </li>
            <?php endif; ?>
            <li>
            <a href="../../apbdes/">
            <i class="fa fa-chart-pie"></i>
            <span>&nbsp;Info Grafis APBDes</span>
            </a>
            </li>
            <li><a href="../../berita/"><i class="fas fa-newspaper"></i> <span>&nbsp; Berita Desa</span></a></li>

            <li><a href="../../pengaduan/"><i class="fas fa-clipboard-list"></i> <span>&nbsp; Kritik & Saran</span></a></li>

            <li><a href="../../laporan/"><i class="fas fa-chart-line"></i> <span>&nbsp; Laporan</span></a></li>
        </ul>
    </section>
</aside>
<div class="content-wrapper">
    <section class="content-header">
        <h1> Permintaan Surat</h1>
        <ol class="breadcrumb">
            <li><a href="../../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="active"> Permintaan Surat</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <br><br>
                <table class="table table-striped table-bordered table-responsive" id="data-table" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th><strong>Tanggal</strong></th>
                            <th><strong>NIK</strong></th>
                            <th><strong>Nama</strong></th>
                            <th><strong>Jenis Surat</strong></th>
                            <th><strong>Status</strong></th>
                            <th><strong>Aksi</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $qTampil = mysqli_query($connect, "SELECT penduduk.nama, surat_keterangan.id_sk AS id_surat, surat_keterangan.jenis_surat, surat_keterangan.no_surat, surat_keterangan.nik, surat_keterangan.status_surat, surat_keterangan.tanggal_surat FROM penduduk LEFT JOIN surat_keterangan ON surat_keterangan.nik = penduduk.nik WHERE surat_keterangan.status_surat IN ('PENDING','DITOLAK')
                        UNION SELECT penduduk.nama, surat_pengantar_umum.id_spu AS id_surat, surat_pengantar_umum.jenis_surat, surat_pengantar_umum.no_surat, surat_pengantar_umum.nik, surat_pengantar_umum.status_surat, surat_pengantar_umum.tanggal_surat FROM penduduk LEFT JOIN surat_pengantar_umum ON surat_pengantar_umum.nik = penduduk.nik WHERE surat_pengantar_umum.status_surat IN ('PENDING','DITOLAK')
                        UNION SELECT penduduk.nama, surat_keterangan_domisili_tempat_tinggal.id_skd AS id_surat, surat_keterangan_domisili_tempat_tinggal.jenis_surat, surat_keterangan_domisili_tempat_tinggal.no_surat, surat_keterangan_domisili_tempat_tinggal.nik, surat_keterangan_domisili_tempat_tinggal.status_surat, surat_keterangan_domisili_tempat_tinggal.tanggal_surat FROM penduduk LEFT JOIN surat_keterangan_domisili_tempat_tinggal ON surat_keterangan_domisili_tempat_tinggal.nik = penduduk.nik WHERE surat_keterangan_domisili_tempat_tinggal.status_surat IN ('PENDING','DITOLAK')
                        UNION SELECT penduduk.nama, surat_keterangan_tidak_mampu.id_sktm AS id_surat, surat_keterangan_tidak_mampu.jenis_surat, surat_keterangan_tidak_mampu.no_surat, surat_keterangan_tidak_mampu.nik, surat_keterangan_tidak_mampu.status_surat, surat_keterangan_tidak_mampu.tanggal_surat FROM penduduk LEFT JOIN surat_keterangan_tidak_mampu ON surat_keterangan_tidak_mampu.nik = penduduk.nik WHERE surat_keterangan_tidak_mampu.status_surat IN ('PENDING','DITOLAK')
                        UNION SELECT penduduk.nama, surat_keterangan_usaha.id_sku AS id_surat, surat_keterangan_usaha.jenis_surat, surat_keterangan_usaha.no_surat, surat_keterangan_usaha.nik, surat_keterangan_usaha.status_surat, surat_keterangan_usaha.tanggal_surat FROM penduduk LEFT JOIN surat_keterangan_usaha ON surat_keterangan_usaha.nik = penduduk.nik WHERE surat_keterangan_usaha.status_surat IN ('PENDING','DITOLAK')
                        UNION SELECT penduduk.nama, surat_ijin_keramaian.id_sik AS id_surat, surat_ijin_keramaian.jenis_surat, surat_ijin_keramaian.no_surat, surat_ijin_keramaian.nik, surat_ijin_keramaian.status_surat, surat_ijin_keramaian.tanggal_surat FROM penduduk LEFT JOIN surat_ijin_keramaian ON surat_ijin_keramaian.nik = penduduk.nik WHERE surat_ijin_keramaian.status_surat IN ('PENDING','DITOLAK')
                        UNION SELECT penduduk.nama, surat_pengantar_catatan_kepolisian.id_spck AS id_surat, surat_pengantar_catatan_kepolisian.jenis_surat, surat_pengantar_catatan_kepolisian.no_surat, surat_pengantar_catatan_kepolisian.nik, surat_pengantar_catatan_kepolisian.status_surat, surat_pengantar_catatan_kepolisian.tanggal_surat FROM penduduk LEFT JOIN surat_pengantar_catatan_kepolisian ON surat_pengantar_catatan_kepolisian.nik = penduduk.nik WHERE surat_pengantar_catatan_kepolisian.status_surat IN ('PENDING','DITOLAK')");
                        if ($qTampil->num_rows > 0) {
                            foreach ($qTampil as $row) {
                        ?>
                        <tr>
                            <?php
                            $timestamp = strtotime($row['tanggal_surat']);
                            $tgl = date('d', $timestamp);
                            $bln = date('F', $timestamp);
                            $thn = date('Y', $timestamp);
                            $blnIndo = array(
                                'January' => 'Januari',
                                'February' => 'Februari',
                                'March' => 'Maret',
                                'April' => 'April',
                                'May' => 'Mei',
                                'June' => 'Juni',
                                'July' => 'Juli',
                                'August' => 'Agustus',
                                'September' => 'September',
                                'October' => 'Oktober',
                                'November' => 'November',
                                'December' => 'Desember'
                            );
                            ?>
                            <td><?php echo $tgl . " " . $blnIndo[$bln] . " " . $thn; ?></td>
                            <td><?php echo $row['nik']; ?></td>
                            <td style="text-transform: capitalize;"><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['jenis_surat']; ?></td>
                            <td>
                            <?php
                            $status = strtoupper($row['status_surat']);

                            if($status == "PENDING"){
                                echo '<span class="label label-warning"><i class="fa fa-clock-o"></i> Pending</span>';
                            }
                            elseif($status == "DITOLAK"){
                                echo '<span class="label label-danger"><i class="fa fa-times"></i> Ditolak</span>';
                            }
                            ?>
                            </td>
                            <td>
                                <?php
                                        if ($row['jenis_surat'] == "Surat Keterangan") {
                                            $folder = "surat_keterangan";
                                        } else if ($row['jenis_surat'] == "Surat Pengantar") {
                                            $folder = "surat_pengantar_umum";
                                        } else if ($row['jenis_surat'] == "Surat Keterangan Domisili Tempat Tinggal") {
                                            $folder = "surat_keterangan_domisili_tempat_tinggal";
                                        } else if ($row['jenis_surat'] == "Surat Keterangan Domisili Usaha") {
                                            $folder = "surat_keterangan_domisili_usaha";
                                        } else if ($row['jenis_surat'] == "Surat Keterangan Tidak Mampu") {
                                            $folder = "surat_keterangan_tidak_mampu";
                                        } else if ($row['jenis_surat'] == "Surat Keterangan Usaha") {
                                            $folder = "surat_keterangan_usaha";
                                        } else if ($row['jenis_surat'] == "Surat Ijin Keramaian") {
                                            $folder = "surat_ijin_keramaian";
                                        } else if ($row['jenis_surat'] == "Surat Pengantar Catatan Kepolisian") {
                                            $folder = "surat_pengantar_catatan_kepolisian";
                                        }
                                        ?>
                                <?php if($row['status_surat'] == "PENDING"){ ?>

                                <a class="btn btn-success btn-sm"
                                href="konfirmasi/<?php echo $folder; ?>/index.php?id=<?php echo $row['id_surat']; ?>">
                                <i class="fa fa-check"></i> KONFIRMASI
                                </a>

                                <?php } else { ?>

                                <span class="label label-danger">
                                <i class="fa fa-times"></i> DITOLAK
                                </span>

                                <?php } ?>
                            </td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>

<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap.min.js"></script>

<script>
$(document).ready(function() {

    $('#data-table').DataTable({
        "pageLength": 10,
        "ordering": true,
        "responsive": true,
        "language": {
            "search": "Cari:",
            "lengthMenu": "Tampilkan _MENU_ data",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "paginate": {
                "next": "Lanjut",
                "previous": "Kembali"
            }
        }
    });

});
</script>

<?php
include('../part/footer.php');
?>