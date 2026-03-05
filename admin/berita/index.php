<?php
include('../../config/koneksi.php');
include('../part/akses.php');
include('../part/header.php');

$data = mysqli_query($connect,"SELECT * FROM berita ORDER BY id DESC");
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

            <li class="active"><a href="../berita/"><i class="fas fa-newspaper"></i> <span>&nbsp; Berita Desa</span></a></li>

            <li><a href="../pengaduan/"><i class="fas fa-clipboard-list"></i> <span>&nbsp; Kritik & Saran</span></a></li>

            <li><a href="../laporan/"><i class="fas fa-chart-line"></i> <span>&nbsp; Laporan</span></a></li>
        </ul>
    </section>
</aside>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Berita Desa</h1>
        <ol class="breadcrumb">
            <li><a href="../berita/"><i class="fas fa-newspaper"></i> Berita Desa</a></li>
            <li class="active">Berita Desa</li>
        </ol>
    </section>
    
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <a href="tambah.php" class="btn btn-success">
                    <i class="fa fa-plus"></i> Tambah Berita
                </a>
            </div>
            
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>Judul</th>
                            <th width="120">Gambar</th>
                            <th width="150">Tanggal</th>
                            <th width="160">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    <?php $no=1; while($d=mysqli_fetch_assoc($data)): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $d['judul'] ?></td>
                            <td>
                                <?php if($d['gambar']): ?>
                                    <img src="../../uploads/<?= $d['gambar'] ?>" width="90">
                                <?php endif; ?>
                            </td>
                            <td><?= date('d M Y', strtotime($d['tanggal'])) ?></td>
                            <td>
                                <a href="edit.php?id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                
                                <a href="hapus.php?id=<?= $d['id'] ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus berita ini?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<?php include('../part/footer.php'); ?>