<?php
$host     = "localhost";
$username = "root";
$password = "";
$db_name  = "desa_nusajati";

// Matikan laporan error otomatis jika ingin menggunakan pengecekan manual (if)
mysqli_report(MYSQLI_REPORT_OFF);

$connect = mysqli_connect($host, $username, $password, $db_name);

if (!$connect) { // Lebih ringkas mengecek variabel koneksinya langsung
	die("Koneksi Gagal: " . mysqli_connect_error());
}