<?php
include('../../../../../config/koneksi.php');
include('../../../../../assets/wa/send_wa.php');

$id              = mysqli_real_escape_string($connect, $_POST['id']);
$aksi            = $_POST['aksi'] ?? 'approve';
$no_surat        = mysqli_real_escape_string($connect, $_POST['fno_surat']);
$id_pejabat_desa = mysqli_real_escape_string($connect, $_POST['ft_tangan']);
$alasan          = mysqli_real_escape_string($connect, $_POST['alasan_tolak'] ?? '');
$tanggal_dibuat  = date('Y-m-d');

if ($aksi == "approve") {
    if(empty($no_surat) || empty($id_pejabat_desa)){
        echo "<script>
        alert('Nomor surat dan pejabat harus diisi');
        window.history.back();
        </script>";
        exit();
    }

    $status_surat = "SELESAI";

    $updateSurat = mysqli_query($connect, 
        "UPDATE surat_ijin_keramaian 
         SET no_surat='$no_surat',
             id_pejabat_desa='$id_pejabat_desa',
             status_surat='$status_surat',
             tanggal_dibuat='$tanggal_dibuat'
         WHERE id_sik='$id'"
    );

}

elseif ($aksi == "reject") {

    if (empty($alasan)) {
        echo "<script>
            alert('Alasan penolakan harus diisi!');
            window.history.back();
        </script>";
        exit();
    }

    $status_surat = "DITOLAK";

    $updateSurat = mysqli_query($connect, 
        "UPDATE surat_ijin_keramaian 
         SET status_surat='$status_surat',
             alasan_tolak='$alasan'
         WHERE id_sik='$id'"
    );
}

if (!$updateSurat) {
    die("Gagal update surat: " . mysqli_error($connect));
}

$updateTracking = mysqli_query($connect,
    "UPDATE tracking_surat
     SET status_surat='$status_surat'
     WHERE id_surat='$id'"
);

if (!$updateTracking) {
    die("Gagal update tracking: " . mysqli_error($connect));
}

/* ambil nomor & tracking */
$get=mysqli_query($connect,"
SELECT s.no_hp, s.kode_tracking
FROM surat_ijin_keramaian s
WHERE s.id_sik='$id'
");

$data=mysqli_fetch_assoc($get);

if($data && !empty($data['no_hp'])){
$nomor=preg_replace('/^0/','62',$data['no_hp']);

$link="http://localhost/DESA_NUSAJATI/desa_nusajati/cek-surat/?kode=".$data['kode_tracking'];

if($aksi=="approve"){

$pesan="Halo 👋
Surat Ijin Keramaian Anda telah DISETUJUI ✅
Silakan cek atau download di:
$link
Terima kasih.";

}
else{

$pesan="Halo 👋
Mohon maaf, pengajuan Surat Ijin Keramaian Anda DITOLAK ❌
Alasan:
*$alasan*
Silakan perbaiki dan ajukan kembali.
Terima kasih.";

}

kirimWA($nomor,$pesan);

}

header('location:../../');
exit();
