<?php
include('../../../config/koneksi.php');
include('../../../partials/header.php');


$nama = $_POST['nama'];
$lokasi = $_POST['lokasi'];
$isi = $_POST['isi_laporan'];
$anonim = isset($_POST['anonim']) ? 1 : 0;

$query = "INSERT INTO pengaduan 
(nama, isi_laporan, lokasi, status, anonim)
VALUES 
('$nama','$isi','$lokasi','TERKIRIM', '$anonim')";

mysqli_query($connect, $query);

echo "<script>
alert('Pengaduan berhasil dikirim!');
window.location='index.php';
</script>";
?>
