<?php
include('../../config/koneksi.php');
include('../part/akses.php');
include('../part/header.php');

$q = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id=1");

if (!$q) {
    die("Query error: " . mysqli_error($connect));
}

$data = mysqli_fetch_assoc($q);

// kalau belum ada data
if (!$data) {
    $data = [
        'nama_desa' => '-',
        'kecamatan' => '-',
        'kabupaten' => '-',
        'provinsi' => '-',
        'kode_pos' => '-',
        'luas_wilayah' => '0',
        'jumlah_dusun' => '0',
        'jumlah_rt' => '0',
        'jumlah_rw' => '0'
    ];
}
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
            <li class="active">
                <a href="../profil/">
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
    <section class="content-header">
        <h1>Profil Desa</h1>
    </section>

    <section class="content">

        <?php if(isset($_GET['update'])): ?>
            <div class="alert alert-success">
                Profil desa berhasil diperbarui.
            </div>
        <?php endif; ?>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fas fa-edit"></i>Edit Profil Desa</h3>
            </div>

            <form method="POST" action="update.php" enctype="multipart/form-data">
                <div class="box-body">

                    <input type="hidden" name="id" value="<?= $data['id'] ?? '' ?>">

                    <div class="form-group">
                        <label>Nama Desa</label>
                        <input type="text" name="nama_desa"
                               class="form-control"
                               value="<?= $data['nama_desa'] ?? '' ?>"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Kecamatan</label>
                        <input type="text" name="kecamatan"
                               class="form-control"
                               value="<?= $data['kecamatan'] ?? '' ?>"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Kabupaten</label>
                        <input type="text" name="kabupaten"
                               class="form-control"
                               value="<?= $data['kabupaten'] ?? '' ?>"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Provinsi</label>
                        <input type="text" name="provinsi"
                               class="form-control"
                               value="<?= $data['provinsi'] ?? '' ?>">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat"
                               class="form-control"
                               value="<?= $data['alamat'] ?? '' ?>">
                    </div>

                    <div class="form-group">
                    <label>Email Desa</label>
                    <input type="email" name="email" class="form-control"
                    value="<?= $data['email'] ?? '' ?>">
                    </div>

                    <div class="form-group">
                    <label>No WhatsApp</label>
                    <input type="text" name="telepon" class="form-control"
                    placeholder="08xxxx"
                    value="<?= $data['telepon'] ?? '' ?>">
                    </div>

                    <div class="form-group">
                        <label>Luas Wilayah</label>
                        <div class="input-group">
                            <input type="number" 
                                name="luas_wilayah"
                                class="form-control"
                                value="<?= $data['luas_wilayah'] ?? '' ?>"
                                step="0.01"
                                required>
                            <div class="input-group-append">
                                <span class="input-group-text">km²</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Jumlah Dusun</label>
                                <input type="number" name="jumlah_dusun"
                                    class="form-control"
                                    value="<?= $data['jumlah_dusun'] ?? 0 ?>">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Jumlah RT</label>
                                <input type="number" name="jumlah_rt"
                                    class="form-control"
                                    value="<?= $data['jumlah_rt'] ?? 0 ?>">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Jumlah RW</label>
                                <input type="number" name="jumlah_rw"
                                    class="form-control"
                                    value="<?= $data['jumlah_rw'] ?? 0 ?>">
                            </div>
                        </div>
                    </div>

                    <hr>

                    <h4><i class="fa fa-user"></i> Sambutan Kepala Desa</h4>
                    
                    <div class="form-group">
                        <label>Foto Kepala Desa</label>
                        <input type="file" name="foto_kades" class="form-control">
                        <?php if(!empty($data['foto_kades'])): ?>
                            <img src="../../uploads/<?= $data['foto_kades'] ?>" width="120" class="mt-2">
                            <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label>Isi Sambutan</label>
                        <textarea id="sambutan" name="sambutan" class="form-control" rows="6">
                            <?= $data['sambutan'] ?? '' ?>
                        </textarea>
                    </div>

                    <hr>

                    <h4><i class="fa fa-bullseye"></i> Visi & Misi</h4>

                    <div class="form-group">
                        <label>Visi</label>
                        <textarea id="visi" name="visi" class="form-control" rows="4">
                            <?= $data['visi'] ?? '' ?>
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label>Misi</label>
                        <textarea id="misi" name="misi" class="form-control" rows="6">
                            <?= $data['misi'] ?? '' ?>
                        </textarea>
                    </div>

                    <hr>
                    <h4><i class="fa fa-map"></i> Letak Geografis</h4>

                    <div class="form-group">
                        <label>Deskripsi Letak Geografis</label>
                        <textarea name="letak_geografis" class="form-control" rows="5">
                            <?= $data['letak_geografis'] ?? '' ?>
                        </textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Batas Utara</label>
                                <input type="text" name="batas_utara" class="form-control" value="<?= $data['batas_utara'] ?? '' ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Batas Selatan</label>
                                <input type="text" name="batas_selatan" class="form-control" value="<?= $data['batas_selatan'] ?? '' ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Batas Timur</label>
                                <input type="text" name="batas_timur" class="form-control" value="<?= $data['batas_timur'] ?? '' ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Batas Barat</label>
                                <input type="text" name="batas_barat" class="form-control" value="<?= $data['batas_barat'] ?? '' ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Foto Peta Desa</label>
                        <input type="file" name="foto_peta" class="form-control">
                        
                        <?php if(!empty($data['foto_peta'])): ?>
                            <img src="../../uploads/<?= $data['foto_peta'] ?>" width="200" class="mt-2">
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                    <label>Upload Video Profil Desa</label>
                    <input type="file" name="video_profil" class="form-control" accept="video/mp4">
                    <small class="text-muted">Format MP4 disarankan (max ±20MB)</small>
                    </div>

                </div>

                <div class="box-footer text-right">
                    <a href="../dashboard/" 
                    class="btn btn-danger btn-md mr-3">
                        <i class="fa fa-times"></i> Batal
                    </a>

                    <button type="submit" 
                            class="btn btn-success btn-md">
                        <i class="fa fa-save"></i> Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>
    </section>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
ClassicEditor
.create(document.querySelector('#sambutan'))
.catch(error=>{console.error(error)});
</script>

<script>
ClassicEditor
.create(document.querySelector('#visi'))
.catch(error=>{console.error(error)});
</script>

<script>
ClassicEditor
.create(document.querySelector('#misi'))
.catch(error=>{console.error(error)});
</script>

<?php include('../part/footer.php'); ?>

