<?php
include 'config/koneksi.php';

$q = mysqli_query($connect,"SELECT visi,misi FROM profil_desa WHERE id=1");
$data = mysqli_fetch_assoc($q);
?>

<section class="gov-hero text-center mb-3 py-5">
    <div class="container fw-bold" style="color:#1f6f43;">
        <h1>VISI & MISI DESA</h1>
        <div class="gov-divider"></div>
         <hr style="width:80px; border:3px solid #f4b400; margin:auto;">
    </div>
</section>

<section class="gov-section">
    <div class="container">

        <div class="card gov-card p-4 mb-4">
            <h4 class="gov-title">Visi</h4>
            <div style="text-align:justify;">
                <?= $data['visi'] ?>
            </div>
        </div>

        <div class="card gov-card p-4">
            <h4 class="gov-title">Misi</h4>
            <div style="text-align:justify;">
                <?= $data['misi'] ?>
            </div>
        </div>
    </div>
</section>
