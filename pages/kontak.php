<?php
include('config/koneksi.php');
$p=mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM profil_desa WHERE id=1"));

$waLink="https://wa.me/".preg_replace('/^0/','62',$p['telepon']);
$emailLink="mailto:".$p['email'];
?>

<section class="gov-hero text-center mb-3 py-5">
    <div class="container fw-bold" style="color:#1f6f43;">
        <h1>KONTAK DESA</h1>
        <div class="gov-divider"></div>
         <hr style="width:80px; border:3px solid #f4b400; margin:auto;">
    </div>
</section>

<div class="container mt-5 ">

<p>
Alamat:<br>
<?= $p['alamat'] ?>
</p>

<p>
Email:<br>
<a href="<?= $emailLink ?>" class="kontak-link">
<?= $p['email'] ?>
</a>
</p>

<p>
WhatsApp:<br>
<a href="<?= $waLink ?>" target="_blank" class="kontak-link">
<?= $p['telepon'] ?>
</a>
</p>


    <iframe 
        src="https://www.google.com/maps?q=Desa+Nusajati+Sampang+Cilacap&output=embed"
        width="100%" 
        height="300"
        style="border:0;"
        allowfullscreen=""
        loading="lazy">
    </iframe>
</div>

<style>
.kontak-link{
color:#1f6f43;
font-weight:bold;
text-decoration:none;
}
.kontak-link:hover{
text-decoration:underline;
}
</style>
