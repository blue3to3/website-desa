<?php
include('../part/akses.php');
include('../../config/koneksi.php');
include('../part/header.php');

$q = mysqli_query($connect,"SELECT * FROM struktur_organisasi LIMIT 1");
$data = mysqli_fetch_assoc($q);
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
            <li class="active">
            <a href="#">
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
<h1>Upload Struktur Organisasi</h1>
</section>

<section class="content">

<div class="row">
<div class="col-md-12">

<div class="box box-success">

<div class="box-header with-border">
<h3 class="box-title">
<i class="fa fa-upload"></i> Upload Diagram Struktur
</h3>
</div>

<div class="box-body">

<form class="form-horizontal" method="POST" enctype="multipart/form-data">

<div class="form-group">

<label class="col-sm-2 control-label">Struktur Saat Ini</label>

<div class="col-sm-10">

<?php
if($data && $data['gambar']){
?>

<img src="../../assets/struktur/<?php echo $data['gambar']; ?>"
style="max-width:600px;border:1px solid #ddd;padding:10px">

<?php
}else{
echo "<p>Belum ada gambar struktur organisasi</p>";
}
?>

</div>

</div>


<div class="form-group">

<label class="col-sm-2 control-label">Upload Gambar</label>

<div class="col-sm-6">

<input type="file" name="gambar" class="form-control" accept="image/*" required>

<p class="help-block">
Format: JPG / PNG <br>
Disarankan resolusi tinggi (export dari Word ke PNG)
</p>

</div>

</div>

<div class="form-group">

<div class="col-sm-offset-2 col-sm-10">

<button type="submit" name="upload" class="btn btn-success">
<i class="fa fa-save"></i> Simpan Struktur
</button>

</div>

</div>

</form>

</div>

</div>

</div>
</div>

</section>
</div>


<?php

if(isset($_POST['upload'])){

$folder = "../../assets/struktur/";

$namaFile = $_FILES['gambar']['name'];
$tmp      = $_FILES['gambar']['tmp_name'];

$ext = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

if(!in_array($ext,['jpg','jpeg','png'])){
echo "<script>alert('Format harus JPG atau PNG');</script>";
exit;
}

$namaBaru = "struktur_organisasi.".$ext;

move_uploaded_file($tmp,$folder.$namaBaru);

$cek = mysqli_query($connect,"SELECT * FROM struktur_organisasi");

if(mysqli_num_rows($cek)>0){

mysqli_query($connect,"
UPDATE struktur_organisasi
SET gambar='$namaBaru'
");

}else{

mysqli_query($connect,"
INSERT INTO struktur_organisasi(gambar)
VALUES('$namaBaru')
");

}

echo "
<script>
alert('Struktur organisasi berhasil diupload');
window.location='upload_struktur.php';
</script>
";

}

include('../part/footer.php');
?>