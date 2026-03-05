<?php
include('../../config/koneksi.php');
include('../part/akses.php');
include('../part/header.php');

$query = mysqli_query($connect, "SELECT * FROM pejabat_desa ORDER BY id_pejabat_desa DESC");
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
            <li><a href="../dashboard/"><i class="fas fa-tachometer-alt"></i> <span>&nbsp; Dashboard</span></a></li>
            <li>
                <a href="../profil_desa/">
                    <i class="fa fa-university"></i>
                    <span>&nbsp;Profil Desa</span>
                </a>
            </li>
            
            <li class="active"><a href="../pejabat/"><i class="fa fa-users"></i> <span>&nbsp;Data Pejabat</span></a></li>
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
    <section class="content-header">
        <h1>
            Data Pejabat Desa
        </h1>
        <ol class="breadcrumb">
            <li><a href="../dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Data Pejabat Desa</li>
        </ol>
    </section>

    <section class="content">

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <i class="fa fa-user-shield"></i> Daftar Pejabat
                </h3>

                <div class="box-tools pull-right">
                    <a href="tambah.php" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i> Tambah Pejabat
                    </a>
                </div>
            </div>

            <div class="box-body table-responsive">

                <table class="table table-striped table-bordered table-responsive" id="data-table" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th><strong>NO</strong></th>
                            <th><strong>NAMA</strong></th>
                            <th><strong>JABATAN</strong></th>
                            <th><strong>NIP</strong></th>
                            <th><strong>STATUS</strong></th>
                            <th><strong>AKSI</strong></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($query)) { 
                        ?>
                            <tr>
                                <td align="center"><?= $no++; ?></td>
                                <td><?= ucwords($row['nama_pejabat']); ?></td>
                                <td><?= ucwords($row['jabatan']); ?></td>
                                <td><?= $row['nip']; ?></td>
                                <td align="center">
                                    <?php if($row['status'] == 'aktif'){ ?>
                                        <span class="badge-modern badge-active label-success">
                                            <i class="fa fa-check-circle"></i> Aktif
                                        </span>
                                    <?php } else { ?>
                                        <span class="badge-modern badge-nonaktif label-deafult">
                                            <i class="fa fa-times-circle"></i> Nonaktif
                                        </span>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <a href="edit.php?id=<?= $row['id_pejabat_desa']; ?>" 
                                    class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="hapus.php?id=<?= $row['id_pejabat_desa']; ?>" 
                                    onclick="return confirm('Yakin ingin menghapus?')"
                                    class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>

            </div>
        </div>

    </section>
</div>

<script>
$(function () {
    var table = $('#example1').DataTable();

    // Filter Status
    $('#filterStatus').on('change', function () {
        table.column(4).search(this.value).draw();
    });
});
</script>

<?php include('../part/footer.php'); ?>

