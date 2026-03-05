<?php
include('../../config/koneksi.php');
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
                    <li class="active"><a href="../penduduk/"><i class="fa fa-users"></i> <span>&nbsp;Data Penduduk</span></a></li>

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
                <h1> Data Penduduk</h1>
                <ol class="breadcrumb">
                    <li><a href="../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="active">Data Penduduk</li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <?php
                            if (isset($_GET['pesan'])) {
                                if ($_GET['pesan'] == "gagal-menambah") {
                                    echo "<div class='alert alert-danger'><center>Anda tidak bisa menambah data. NIK tersebut sudah digunakan.</center></div>";
                                }
                                if ($_GET['pesan'] == "gagal-menghapus") {
                                    echo "<div class='alert alert-danger'><center>Anda tidak bisa menghapus data tersebut.</center></div>";
                                }
                            }
                            ?>
                        </div>
                        <?php if (isset($_SESSION['lvl']) && $_SESSION['lvl'] == 'Administrator'): ?>
                        <div style="margin-bottom: 15px;">
                            <a class="btn btn-success btn-md" href="tambah-penduduk.php">
                                <i class="fa fa-user-plus"></i> Tambah Data Penduduk
                            </a>
                            <a target="_blank" class="btn btn-info btn-md" href="export-penduduk.php">
                                <i class="fas fa-file-export"></i> Export .XLS
                            </a>
                        </div>
                        <?php endif; ?>
                        <br><br>
                        
                            <table class="table table-striped table-bordered" id="data-table"
                                width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th><strong>No</strong></th>
                                        <th><strong>NIK</strong></th>
                                        <th><strong>Nama</strong></th>
                                        <th><strong>No KK</strong></th>
                                        <th><strong>Tempat/Tgl Lahir</strong></th>
                                        <th><strong>Jenis Kelamin</strong></th>
                                        <th><strong>Agama</strong></th>
                                        <th><strong>Pend.Terakhir</strong></th>
                                        <th><strong>Pekerjaan</strong></th>
                                        <th><strong>Alamat</strong></th>
                                        <th><strong>Status</strong></th>
                                        <th><strong>Kewarganegaraan</strong></th>
                                        <?php
                                        if (isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')) {
                                        ?>
                                        <th><strong>Aksi</strong></th>
                                        <?php
                                        } else {
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include('../../config/koneksi.php');

                                    $no = 1;
                                    $qTampil = mysqli_query($connect, "SELECT * FROM penduduk");
                                    foreach ($qTampil as $row) {
                                        $tanggal = $row['tgl_lahir'];
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['nik']; ?></td>
                                        <td style="text-transform: capitalize;"><?php echo $row['nama']; ?></td>
                                        <td><?php echo $row['no_kk']; ?></td>
                                        <?php
                                            $tanggal = date('d', strtotime($row['tgl_lahir']));
                                            $bulan = date('F', strtotime($row['tgl_lahir']));
                                            $tahun = date('Y', strtotime($row['tgl_lahir']));
                                            $bulanIndo = array(
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
                                        <td style="text-transform: capitalize;">
                                            <?php echo $row['tempat_lahir'] . ", " . $tanggal . " " . $bulanIndo[$bulan] . " " . $tahun; ?>
                                        </td>
                                        <td style="text-transform: capitalize;"><?php echo $row['jenis_kelamin']; ?>
                                        </td>
                                        <td style="text-transform: capitalize;"><?php echo $row['agama']; ?></td>
                                        <td style="text-transform: capitalize;"><?php echo $row['pend_terakhir']; ?>
                                        </td>
                                        <td style="text-transform: capitalize;"><?php echo $row['pekerjaan']; ?></td>
                                        <td style="text-transform: capitalize;">
                                            <?php echo 'RT.', $row['rt'], '/RW.', $row['rw'], ' Desa ', $row['desa'], ' Kec. ', $row['kecamatan'], ' Kab. ', $row['kota']; ?>
                                        </td>
                                        <td style="text-transform: capitalize;"><?php echo $row['status_perkawinan']; ?>
                                        </td>
                                        <td style="text-transform: capitalize;"><?php echo $row['kewarganegaraan']; ?>
                                        </td>
                                        <?php
                                            if (isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')) {
                                            ?>
                                        <td>
                                            <a class="btn btn-success btn-sm"
                                                href='edit-penduduk.php?id=<?php echo $row['id_penduduk']; ?>'><i
                                                    class="fa fa-edit"></i></a>
                                            <a class="btn btn-danger btn-sm"
                                                href='hapus-penduduk.php?id=<?php echo $row['id_penduduk']; ?>'
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                        <?php
                                            } else {
                                            }
                                            ?>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                    </div>
                </div>
            </section>
        </div>
</body>

</html>

<style>

    .table-scroll{
    overflow-x:auto;
    width:100%;
    }

    #data-table{
    white-space:nowrap;
    }

    .dataTables_wrapper{
    width:100%;
    }

    .dataTables_scroll{
    overflow:auto !important;
    }

    .dataTables_scrollHead{
    overflow:hidden !important;
    }

    .dataTables_scrollBody{
    overflow:auto !important;
    }

</style>

<?php include('../part/footer.php'); ?>
