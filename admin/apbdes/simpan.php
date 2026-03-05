<?php
include('../../config/koneksi.php');

$judul=$_POST['judul'];
$tahun=$_POST['tahun'];

$namaFile=time().$_FILES['gambar']['name'];
$tmp=$_FILES['gambar']['tmp_name'];

move_uploaded_file($tmp,"../../uploads/apbdes/".$namaFile);

mysqli_query($connect,"
INSERT INTO apbdes_infografis(judul,tahun,gambar)
VALUES('$judul','$tahun','$namaFile')
");

header("location:index.php");