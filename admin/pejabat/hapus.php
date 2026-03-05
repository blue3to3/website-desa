<?php
include('../../config/koneksi.php');

$id = mysqli_real_escape_string($connect, $_GET['id']);

$hapus = mysqli_query($connect, "
    DELETE FROM pejabat_desa 
    WHERE id_pejabat_desa='$id'
");

if($hapus){
    echo "<script>alert('Data berhasil dihapus'); window.location='index.php';</script>";
}else{
    echo "Gagal hapus: ".mysqli_error($connect);
}
?>
