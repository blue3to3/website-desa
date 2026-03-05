<?php
include('../../config/koneksi.php');

$id = $_POST['id'];
$status = $_POST['status'];

mysqli_query($connect,"
UPDATE pengaduan 
SET status='$status'
WHERE id='$id'
");

echo "ok";
