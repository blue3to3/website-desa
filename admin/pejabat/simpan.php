<?php
include('../../config/koneksi.php');

$nama = strtoupper(mysqli_real_escape_string($connect, $_POST['nama_pejabat']));
$jabatan = ucwords(strtolower(mysqli_real_escape_string($connect, $_POST['jabatan'])));
$nip = $_POST['nip'];
$status = $_POST['status'];
$parent_id = $_POST['parent_id'] ?: "NULL";

$folder = "../../assets/ttd/";
$nama_file = time() . "_" . $_FILES['ttd']['name'];
$tmp = $_FILES['ttd']['tmp_name'];

move_uploaded_file($tmp, $folder.$nama_file);

mysqli_query($connect, "INSERT INTO pejabat_desa
    (nama_pejabat,jabatan,nip,ttd,status,parent_id)
    VALUES
    ('$nama','$jabatan','$nip','$nama_file','$status','$parent_id')
");

header("Location: index.php");
