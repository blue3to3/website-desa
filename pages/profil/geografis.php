 <?php
 include 'config/koneksi.php';
        $p=mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM profil_desa WHERE id=1"));
        ?>
<section class="gov-hero text-center mb-3 py-5">
    <div class="container fw-bold" style="color:#1f6f43;">
        <h1>LETAK GEOGRAFIS</h1>
        <div class="gov-divider"></div>
        <p class="mt-3 text-muted">
            Desa Nusajati • Kecamatan Sampang • Kabupaten Cilacap
        </p>
        <hr style="width:80px; border:3px solid #f4b400; margin:auto;">
    </div>
</section>

<section class="gov-section">
    <div class="container">

        <h3>Letak Geografis</h3>
        <div><?= $p['letak_geografis'] ?></div>

        <ul>
        <li><strong>Batas Utara:</strong> <?= $p['batas_utara'] ?></li>
        <li><strong>Batas Selatan:</strong> <?= $p['batas_selatan'] ?></li>
        <li><strong>Batas Timur:</strong> <?= $p['batas_timur'] ?></li>
        <li><strong>Batas Barat:</strong> <?= $p['batas_barat'] ?></li>
        </ul>

        <?php if($p['foto_peta']): ?>
        <img src="uploads/<?= $p['foto_peta'] ?>" class="img-fluid mt-3">
        <?php endif; ?>
    </div>
</section>
