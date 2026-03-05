<?php
include 'config/koneksi.php';

$q = mysqli_query($connect,"SELECT foto_kades, sambutan FROM profil_desa WHERE id=1");
$data = mysqli_fetch_assoc($q);
?>


<section class="py-5" style="background:#f4f6f9;">
    <div class="container">
        
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color:#1f6f43;">
                Sambutan Kepala Desa
            </h2>
            <hr style="width:80px;border:3px solid #f4b400;margin:auto;">
        </div>

        <div class="card shadow-sm border-0">
        <div class="card-body p-5 text-center">

        <?php if($data && $data['foto_kades']): ?>
        <img src="uploads/<?= $data['foto_kades'] ?>"
        width="200"
        class="rounded-circle mb-4"
        style="object-fit:cover;">
        <?php endif; ?>

        <div style="text-align:justify;">
        <?= $data['sambutan'] ?? 'Sambutan belum tersedia'; ?>
        </div>

        </div>
    </div>
</div>
</section>