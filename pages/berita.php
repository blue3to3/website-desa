<?php
include ('../config/koneksi.php');
include ('../partials/header.php');

$limit = 6;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page-1)*$limit;

$berita = mysqli_query($connect,"
SELECT * FROM berita
ORDER BY id DESC
LIMIT $start,$limit
");

$total = mysqli_fetch_assoc(mysqli_query($connect,"SELECT COUNT(*) as t FROM berita"))['t'];
$pages = ceil($total/$limit);
?>

<section class="gov-hero text-center mb-3 py-5">
    <div class="container fw-bold" style="color:#1f6f43;">
        <h1>BERITA & KEGIATAN DESA</h1>
        <div class="gov-divider"></div>
         <hr style="width:80px; border:3px solid #f4b400; margin:auto;">
    </div>
</section>

<div class="container py-3">
<?php while($b=mysqli_fetch_assoc($berita)): ?>
<div class="card mb-4 border-0 shadow-sm"
style="border-radius:18px; overflow:hidden;">

<div class="row no-gutters">

<!-- gambar -->
<div class="col-md-4">
<?php if($b['gambar']): ?>
<img src="../uploads/<?= $b['gambar'] ?>"
class="img-fluid h-100"
style="object-fit:cover;">
<?php endif; ?>
</div>

<!-- isi -->
<div class="col-md-8">
<div class="card-body p-4">

<span class="badge badge-success mb-2">
Kegiatan Desa
</span>

<h4 class="font-weight-bold">
<?= $b['judul'] ?>
</h4>

<p class="text-muted mb-2">
<?= date('d F Y',strtotime($b['tanggal'])) ?>
</p>

<p style="line-height:1.7;">
<?= substr(strip_tags($b['isi']),0,160) ?>...
</p>

<a href="berita-detail.php?id=<?= $b['id'] ?>"
class="btn btn-success btn-sm">
Baca Selengkapnya
</a>

</div>
</div>

</div>
</div>
<?php endwhile; ?>

<div class="d-flex justify-content-center mt-5">
<ul class="pagination">

<?php for($i=1;$i<=$pages;$i++): ?>
<li class="page-item <?= $i==$page?'active':'' ?>">
<a class="page-link" href="?page=<?= $i ?>">
<?= $i ?>
</a>
</li>
<?php endfor; ?>

</ul>
</div>

</div>
<?php include ('../partials/footer.php'); ?>