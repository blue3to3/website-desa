<?php
include ('../config/koneksi.php');
include ('../partials/header.php');
$q=mysqli_query($connect,"
SELECT * FROM apbdes_infografis
ORDER BY tahun DESC
LIMIT 3
");
?>

<section style="text-align:center;padding:60px 20px">
    <h1 style="color:#1f6f43;font-weight:700">Info Grafis APBDes</h1>
    <div style="width:80px;height:4px;background:#f4b400;margin:12px auto;border-radius:4px"></div>
</section>

<section class="py-5">
<div class="container">

<?php if(mysqli_num_rows($q)>0){ ?>

<div id="carouselAPBDes" class="carousel slide" data-bs-ride="carousel">

<div class="carousel-inner">

<?php 
$no=0;
while($r=mysqli_fetch_assoc($q)):
$active=($no==0)?'active':'';
?>

<div class="carousel-item <?= $active ?>">

<div class="text-center">

<h4 class="fw-bold mb-3"><?= $r['judul'] ?></h4>

<img src="../uploads/apbdes/<?= $r['gambar'] ?>" 
class="img-fluid apb-img">

</div>

</div>

<?php 
$no++;
endwhile; 
?>

</div>

<button class="carousel-control-prev" type="button" data-bs-target="#carouselAPBDes" data-bs-slide="prev">
<span class="carousel-control-prev-icon"></span>
</button>

<button class="carousel-control-next" type="button" data-bs-target="#carouselAPBDes" data-bs-slide="next">
<span class="carousel-control-next-icon"></span>
</button>

</div>

<?php }else{ ?>

<p class="text-center text-muted">Belum ada data APBDes</p>

<?php } ?>

</div>
</section>

<style>
.apb-img{
width:100%;
max-width:900px;
height:auto;
object-fit:contain;
display:block;
margin:auto;
border-radius:20px;
box-shadow:0 10px 30px rgba(0,0,0,.08);
}
.carousel-control-prev-icon,
.carousel-control-next-icon{
background-color:#1f6f43;
border-radius:50%;
padding:20px;
background-size:60%;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php include ('../partials/footer.php'); ?>