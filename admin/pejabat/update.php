<?php
include('../../config/koneksi.php');

$id   = mysqli_real_escape_string($connect, $_POST['id']);
$nama = strtoupper(mysqli_real_escape_string($connect, $_POST['nama_pejabat']));
$jabatan = mysqli_real_escape_string($connect, $_POST['jabatan']);
$nip  = mysqli_real_escape_string($connect, $_POST['nip']);
$status = mysqli_real_escape_string($connect, $_POST['status']);

if($_FILES['ttd']['name'] != ''){
    $ttd = $_FILES['ttd']['name'];
    $tmp = $_FILES['ttd']['tmp_name'];

    move_uploaded_file($tmp, "../../assets/ttd/".$ttd);

    $update = mysqli_query($connect, "
        UPDATE pejabat_desa SET
        nama_pejabat='$nama',
        jabatan='$jabatan',
        nip='$nip',
        status='$status',
        ttd='$ttd'
        WHERE id_pejabat_desa='$id'
    ");
}else{
    $update = mysqli_query($connect, "
        UPDATE pejabat_desa SET
        nama_pejabat='$nama',
        jabatan='$jabatan',
        nip='$nip',
        status='$status'
        WHERE id_pejabat_desa='$id'
    ");
}

if($update){
    echo "<script>alert('Data berhasil diupdate'); window.location='index.php';</script>";
}else{
    echo "Gagal update: ".mysqli_error($connect);
}
?>
