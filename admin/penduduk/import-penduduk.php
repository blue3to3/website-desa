<?php
include('../../config/koneksi.php');
require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if(isset($_POST['upload'])){

$file=$_FILES['datapenduduk']['tmp_name'];
libxml_use_internal_errors(true);
$spreadsheet=IOFactory::load($file);
$sheet=$spreadsheet->getActiveSheet()->toArray();

$berhasil=0;

// skip header
for($i=1;$i<count($sheet);$i++){

$data=$sheet[$i];

if(!isset($data[1])) continue;
$nik=mysqli_real_escape_string($connect,trim($data[1]));
$nama=mysqli_real_escape_string($connect,trim($data[2]));
$no_kk=mysqli_real_escape_string($connect,trim($data[3]));
$tempat_lahir=mysqli_real_escape_string($connect,trim($data[4]));

// tanggal excel auto convert
$tgl=$data[5];
if(is_numeric($tgl)){
$tgl_lahir=date('Y-m-d',($tgl-25569)*86400);
}else{
$tgl_lahir=date('Y-m-d',strtotime(str_replace('/','-',$tgl)));
}

$jenis_kelamin=mysqli_real_escape_string($connect,trim($data[6]));
$agama=mysqli_real_escape_string($connect,trim($data[7]));
$pend=mysqli_real_escape_string($connect,trim($data[8]));
$pekerjaan=mysqli_real_escape_string($connect,trim($data[9]));
$rt=mysqli_real_escape_string($connect,trim($data[10]));
$rw=mysqli_real_escape_string($connect,trim($data[11]));
$desa=mysqli_real_escape_string($connect,trim($data[12]));
$kecamatan=mysqli_real_escape_string($connect,trim($data[13]));
$kota=mysqli_real_escape_string($connect,trim($data[14]));
$status=mysqli_real_escape_string($connect,trim($data[15]));
$wn=mysqli_real_escape_string($connect,trim($data[16]));

if($nik!=''){

mysqli_query($connect,"
INSERT INTO penduduk(
nik,nama,no_kk,tempat_lahir,tgl_lahir,
jenis_kelamin,agama,pend_terakhir,pekerjaan,
rt,rw,desa,kecamatan,kota,
status_perkawinan,kewarganegaraan
)
VALUES(
'$nik','$nama','$no_kk','$tempat_lahir','$tgl_lahir',
'$jenis_kelamin','$agama','$pend','$pekerjaan',
'$rt','$rw','$desa','$kecamatan','$kota',
'$status','$wn'
)
");

$berhasil++;
}

}

header("location:index.php?pesan=berhasil-import&jumlah=$berhasil");
}