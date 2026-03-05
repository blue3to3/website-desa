<?php
include('../../config/koneksi.php');

$id         = mysqli_real_escape_string($connect, $_POST['id']);
$nama_desa  = mysqli_real_escape_string($connect, $_POST['nama_desa']);
$kecamatan  = mysqli_real_escape_string($connect, $_POST['kecamatan']);
$kabupaten  = mysqli_real_escape_string($connect, $_POST['kabupaten']);
$provinsi   = mysqli_real_escape_string($connect, $_POST['provinsi']);
$luas_wilayah = mysqli_real_escape_string($connect, $_POST['luas_wilayah']);
$jumlah_dusun = mysqli_real_escape_string($connect, $_POST['jumlah_dusun']);
$jumlah_rt    = mysqli_real_escape_string($connect, $_POST['jumlah_rt']);
$jumlah_rw    = mysqli_real_escape_string($connect, $_POST['jumlah_rw']);
$email         = mysqli_real_escape_string($connect, $_POST['email']);
$telepon       = mysqli_real_escape_string($connect, $_POST['telepon']);
$sambutan = mysqli_real_escape_string($connect, $_POST['sambutan']);
$visi     = mysqli_real_escape_string($connect, $_POST['visi']);
$misi     = mysqli_real_escape_string($connect, $_POST['misi']);
$letak_geografis = mysqli_real_escape_string($connect,$_POST['letak_geografis']);
$batas_utara = mysqli_real_escape_string($connect,$_POST['batas_utara']);
$batas_selatan = mysqli_real_escape_string($connect,$_POST['batas_selatan']);
$batas_timur = mysqli_real_escape_string($connect,$_POST['batas_timur']);
$batas_barat = mysqli_real_escape_string($connect,$_POST['batas_barat']);
$fotoSQL = "";
$petaSQL="";

if(!empty($_FILES['foto_kades']['name'])){
    $namaFile = time().'_'.$_FILES['foto_kades']['name'];
    $tmp      = $_FILES['foto_kades']['tmp_name'];
    move_uploaded_file($tmp, "../../uploads/".$namaFile);
    $fotoSQL = ", foto_kades='$namaFile'";
}

if(!empty($_FILES['foto_peta']['name'])){
    $namaPeta=time().'_'.$_FILES['foto_peta']['name'];
    move_uploaded_file($_FILES['foto_peta']['tmp_name'],"../../uploads/".$namaPeta);
    $petaSQL=", foto_peta='$namaPeta'";
}

$video = $data['video_profil'] ?? '';

if(isset($_FILES['video_profil']) && $_FILES['video_profil']['name']!=''){
    
    $namaVideo = time().'_'.$_FILES['video_profil']['name'];
    $tmp = $_FILES['video_profil']['tmp_name'];

    move_uploaded_file($tmp,"../../uploads/video/".$namaVideo);

    $video = $namaVideo;
}

$query = "
    UPDATE profil_desa SET
        nama_desa='$nama_desa',
        kecamatan='$kecamatan',
        kabupaten='$kabupaten',
        provinsi='$provinsi',
        email='$email',
        telepon='$telepon',
        luas_wilayah='$luas_wilayah',
        jumlah_dusun='$jumlah_dusun',
        jumlah_rt='$jumlah_rt',
        jumlah_rw='$jumlah_rw',
        sambutan='$sambutan',
        visi='$visi',
        misi='$misi',
        letak_geografis='$letak_geografis',
        batas_utara='$batas_utara',
        batas_selatan='$batas_selatan',
        batas_timur='$batas_timur',
        batas_barat='$batas_barat',
        video_profil='$video'
        $fotoSQL
        $petaSQL
    WHERE id='$id'
";

$result = mysqli_query($connect, $query);

if($result){
    header("Location: index.php?update=sukses");
} else {
    echo "Gagal update: " . mysqli_error($connect);
}
