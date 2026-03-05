<?php
include ('../config/koneksi.php');
include ('../partials/header.php');

$id=$_GET['id'];
$data=mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM berita WHERE id=$id"));
?>

<div class="container mt-5" style="max-width:900px">

<!-- Judul -->
<h1 class="mb-3 font-weight-bold">
<?= $data['judul'] ?>
</h1>

<!-- Meta -->
<div class="text-muted mb-4">
<i class="fa fa-calendar"></i>
<?= date('d F Y',strtotime($data['tanggal'])) ?>
&nbsp; • &nbsp;
Desa Nusajati
</div>

<!-- Gambar hero -->
<?php if($data['gambar']): ?>
<div class="mb-4">
<img src="../uploads/<?= $data['gambar'] ?>" 
class="img-fluid rounded shadow">
</div>
<?php endif; ?>

<!-- Isi -->
<div style="font-size:18px; line-height:1.9;">
<?= $data['isi'] ?>
</div>

<hr class="my-5">

<!-- Tombol kembali -->
<a href="<?= $base ?>pages/berita.php" class="btn btn-success">
← Kembali ke Berita
</a>

</div>
<?php include ('../partials/footer.php'); ?>