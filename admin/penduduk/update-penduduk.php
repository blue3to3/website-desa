<?php
include('../../config/koneksi.php');

$id = $_POST['id'];
$nik = $_POST['fnik'];
$nama = $_POST['fnama'];
$tempat_lahir = $_POST['ftempat_lahir'];
$tgl_lahir = $_POST['ftgl_lahir'];
$jenis_kelamin = $_POST['fjenis_kelamin'];
$agama = $_POST['fagama'];
$rt = $_POST['frt'];
$rw = $_POST['frw'];
$desa = $_POST['fdesa'];
$kecamatan = $_POST['fkecamatan'];
$kota = $_POST['fkota'];
$no_kk = $_POST['fno_kk'];
$pend_terakhir = $_POST['fpend_terakhir'];
$pekerjaan = $_POST['fpekerjaan'];
$status_perkawinan = $_POST['fstatus_perkawinan'];
$status_dlm_keluarga = $_POST['fstatus_dlm_keluarga'];
$kewarganegaraan = $_POST['fkewarganegaraan'];

$qUpdate = "UPDATE penduduk SET nik = '$nik', nama = '$nama', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', agama = '$agama', rt = '$rt', rw = '$rw', desa = '$desa', kecamatan = '$kecamatan', kota = '$kota', no_kk = '$no_kk', pend_terakhir = '$pend_terakhir', pekerjaan = '$pekerjaan', status_perkawinan = '$status_perkawinan', kewarganegaraan = '$kewarganegaraan' WHERE id_penduduk='$id'";
$update = mysqli_query($connect, $qUpdate);

if ($update) {
	header('location:../penduduk/');
} else {
	echo ("<script LANGUAGE='JavaScript'>window.alert('Gagal mengubah data penduduk'); window.location.href='../penduduk/'</script>");
}
