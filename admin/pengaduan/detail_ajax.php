<?php
include('../../config/koneksi.php');

$id = $_GET['id'] ?? '';

$q = mysqli_query($connect,"SELECT * FROM pengaduan WHERE id='$id'");
$row = mysqli_fetch_assoc($q);

if(!$row){
echo "Data tidak ditemukan";
exit;
}
?>

<div class="detail-card">
    
<div class="detail-header">
    <h3>Detail Saran & Kritik</h3>
    <span class="status-badge 
    <?= $row['status']=='TERKIRIM'?'red':($row['status']=='DIPROSES'?'orange':'green'); ?>">
    <?= $row['status']; ?>
    </span>
</div>

<div class="detail-grid">

<div>
    <label>Nama</label>
    <p><?= $row['anonim'] ? 'Anonim' : $row['nama']; ?></p>
</div>

<div style="grid-column:span 2">
    <label>Alamat</label>
    <p>📍 <?= $row['lokasi']; ?></p>
</div>

<div style="grid-column:span 2">
    <label>Saran & Kritik</label>
    <div class="laporan-box">
    <?= nl2br($row['isi_laporan']); ?>
    </div>
</div>

</div>

<hr>

<label>Update Status</label>

<select id="statusSelect" class="form-control modern-select">
<option <?= $row['status']=='TERKIRIM'?'selected':'' ?>>TERKIRIM</option>
<option <?= $row['status']=='DIPROSES'?'selected':'' ?>>DIPROSES</option>
<option <?= $row['status']=='SELESAI'?'selected':'' ?>>SELESAI</option>
</select>

<button class="btn-modern" id="btnUpdateStatus" data-id="<?= $row['id']; ?>">
Update Status
</button>

</div>