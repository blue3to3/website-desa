<?php
include('../../config/koneksi.php');
include('../part/akses.php');
include('../part/header.php');

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM berita WHERE id=$id"));

if(isset($_POST['update'])){
$judul = $_POST['judul'];
$isi   = $_POST['isi'];

/* cek upload gambar baru */
if(!empty($_FILES['gambar']['name'])){
    $gambar = $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tmp,"../../uploads/".$gambar);

    mysqli_query($connect,"UPDATE berita 
        SET judul='$judul', isi='$isi', gambar='$gambar'
        WHERE id=$id");
}else{
    mysqli_query($connect,"UPDATE berita 
        SET judul='$judul', isi='$isi'
        WHERE id=$id");
}

echo "<script>location='index.php'</script>";
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
        <h1>Edit Berita</h1>
        <ol class="breadcrumb">
            <li><a href="../berita/"><i class="fas fa-newspaper"></i> Berita Desa</a></li>
            <li><a href="index.php">Berita Desa</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>
    
    <section class="content">
        <div class="box box-primary">
            <div class="box-body">
                
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Judul</label>
                    <input name="judul" class="form-control" value="<?= $data['judul'] ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Isi</label>
                    <textarea id="editor" name="isi" class="form-control" rows="8"><?= $data['isi'] ?></textarea>
                </div>
                
                <div class="form-group">
                    <label>Gambar Saat Ini</label><br>
                    <?php if($data['gambar']): ?>
                        <img src="../../uploads/<?= $data['gambar'] ?>" width="150">
                    <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <label>Ganti Gambar</label>
                    <input type="file" name="gambar" class="form-control">
                </div>
                
                <button name="update" class="btn btn-success">
                    <i class="fa fa-save"></i> Update
                </button>
                
                <a href="index.php" class="btn btn-default">Kembali</a>
            </form>
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
ClassicEditor
.create(document.querySelector('#editor'))
.catch(error=>{console.error(error)});
</script>

<?php include('../part/footer.php'); ?>