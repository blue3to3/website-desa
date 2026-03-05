<?php

if(isset($_POST['submit'])){

$folder = "../../assets/struktur/";

$namaFile = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];

$ext = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

if(!in_array($ext,['jpg','jpeg','png'])){
    die("Format harus JPG / PNG");
}

$newName = "struktur_organisasi.".$ext;

move_uploaded_file($tmp, $folder.$newName);

mysqli_query($connect,"
UPDATE struktur_organisasi 
SET gambar='$newName' 
WHERE id=1
");

echo "Upload berhasil";

}
?>