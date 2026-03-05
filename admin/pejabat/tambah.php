<?php
include('../../config/koneksi.php');
include('../part/akses.php');
include('../part/header.php');
?>

<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel"  style="padding: 20px 10px;">
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
            <li class="header" style="color:rgba(255,255,255,0.3); font-size: 8pt; padding: 15px 25px 5px;">MENU UTAMA</li>
            <li>
                <a href="../dashboard/">
                    <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../profil_desa/">
                    <i class="fa fa-university"></i><span>&nbsp; Profil Desa</span>
                </a>
            </li>
           
            <li>
                <a href="../pejabat/">
                    <i class="fa fa-users"></i><span>&nbsp; Data Pejabat</span>
                </a>
            </li>
            <li>
            <a href="../struktur/">
            <i class="fa fa-sitemap"></i> <span>&nbsp;Struktur Organisasi</span>
            </a>
            </li>
            <li>
                <a href="../penduduk/">
                    <i class="fa fa-users"></i><span>&nbsp; Data Penduduk</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fas fa-envelope-open-text"></i> <span>&nbsp;&nbsp;Layanan Surat</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="../surat/permintaan_surat/">
                            <i class="fa fa-circle-notch"></i> Permintaan Surat
                        </a>
                    </li>
                    <li>
                        <a href="../surat/surat_selesai/"><i class="fa fa-circle-notch"></i> Surat Selesai
                        </a>
                    </li>
                </ul>
            </li>
            <li>
            <a href="../apbdes/">
            <i class="fa fa-chart-pie"></i>
            <span>&nbsp;Info Grafis APBDes</span>
            </a>
            </li>
            <li><a href="../berita/"><i class="fas fa-newspaper"></i> <span>&nbsp; Berita Desa</span></a></li>
            <li><a href="../pengaduan/"><i class="fas fa-clipboard-list"></i> <span>&nbsp; Kritik & Saran</span></a></li>
            <li>
                <a href="../laporan/">
                    <i class="fas fa-chart-line"></i> <span>&nbsp;&nbsp;Laporan</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Tambah Pejabat Desa
        </h1>
    </section>

    <section class="content">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <i class="fa fa-user-plus"></i> Form Tambah Pejabat
                </h3>
            </div>

            <form action="simpan.php" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Pejabat</label>
                                <input type="text" name="nama_pejabat" 
                                       class="form-control text-uppercase"
                                       placeholder="Masukkan Nama Pejabat"
                                       required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text"
                                    name="jabatan"
                                    class="form-control"
                                    oninput="this.value = this.value.toLowerCase().replace(/\b\w/g, l => l.toUpperCase())"
                                    required>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NIP</label>
                                <input type="text" 
                                    name="nip" 
                                    class="form-control"
                                    id="nip"
                                    maxlength="18"
                                    required>
                                <small id="nipHelp" class="form-text text-muted">
                                    NIP harus 18 digit angka
                                </small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="aktif">Aktif</option>
                                    <option value="nonaktif">Nonaktif</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Atasan Langsung</label>
                        <select name="parent_id" class="form-control">
                            <option value="">-- Level Utama --</option>
                            <?php
                            $q = mysqli_query($connect,"SELECT id_pejabat_desa,nama_pejabat,jabatan FROM pejabat_desa WHERE status='aktif'");
                            while($r=mysqli_fetch_assoc($q)){
                                echo "<option value='{$r['id_pejabat_desa']}'>
                                    {$r['jabatan']} - {$r['nama_pejabat']}
                                    </option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Upload Tanda Tangan</label>
                        <input type="file" name="ttd" class="form-control">
                        <small class="text-muted">Format PNG dengan background transparan lebih disarankan</small>
                    </div>

                </div>

                <div class="box-footer text-right">
                    <a href="index.php" class="btn btn-default">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Simpan Data
                    </button>
                </div>

            </form>

        </div>

    </section>
</div>

<script>

const nipInput = document.getElementById("nip");
const nipHelp = document.getElementById("nipHelp");

nipInput.addEventListener("input", function() {
    // Hanya angka
    this.value = this.value.replace(/[^0-9]/g, '');

    if (this.value.length !== 18) {
        nipHelp.style.color = "red";
        nipHelp.innerText = "NIP harus 18 digit angka!";
    } else {
        nipHelp.style.color = "green";
        nipHelp.innerText = "✓ NIP valid";
    }
});
</script>

<?php include('../part/footer.php'); ?>
