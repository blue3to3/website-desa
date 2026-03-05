<?php
include('../../config/koneksi.php');
include('../part/akses.php');

$id = $_GET['id'];

/* ambil data dulu buat hapus gambar */
$data = mysqli_fetch_assoc(mysqli_query($connect,"SELECT gambar FROM berita WHERE id=$id"));

if($data && $data['gambar']){
    $file = "../../uploads/".$data['gambar'];
    if(file_exists($file)){
        unlink($file);
    }
}

/* hapus database */
mysqli_query($connect,"DELETE FROM berita WHERE id=$id");

/* redirect */
echo "<script>location='index.php'</script>";
?>