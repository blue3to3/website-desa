<?php

$q = mysqli_query($connect,"SELECT * FROM struktur_organisasi WHERE id=1");
$data = mysqli_fetch_assoc($q);

?>

<section style="text-align:center;padding:60px 20px">
    <h1 style="color:#1f6f43;font-weight:700">Struktur Organisasi</h1>
    <div style="width:80px;height:4px;background:#f4b400;margin:12px auto;border-radius:4px"></div>
</section>

<img 
src="assets/struktur/<?= $data['gambar'] ?>" 
style="width:100%; max-width:1200px;"
>