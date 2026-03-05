<?php
include('../../config/koneksi.php');

if (isset($_POST['submit'])) {

    $jenis_surat = "Surat Keterangan";
    $nik = $_POST['fnik'];
    $keperluan = addslashes($_POST['fkeperluan']);
    $no_hp = $_POST['fno_hp'];
    $status_surat = "PENDING";
    $id_profil_desa = "1";

    $kode_tracking = "TRK-" . date("YmdHis");

    $uploadDir = "../../uploads/surat_keterangan/";

    $ktpName = $_FILES['fbukti_ktp']['name'];
    $ktpTmp  = $_FILES['fbukti_ktp']['tmp_name'];
    $ktpExt  = strtolower(pathinfo($ktpName, PATHINFO_EXTENSION));
    $allowedImg = ['jpg','jpeg','png'];

    if (!in_array($ktpExt, $allowedImg)) {
        die("Format KTP tidak valid!");
    }

    $newKtpName = "KTP_" . $kode_tracking . "." . $ktpExt;
    move_uploaded_file($ktpTmp, $uploadDir . $newKtpName);

    $kkName = $_FILES['fbukti_kk']['name'];
    $kkTmp  = $_FILES['fbukti_kk']['tmp_name'];
    $kkExt  = strtolower(pathinfo($kkName, PATHINFO_EXTENSION));

    if (!in_array($kkExt, $allowedImg)) {
        die("Format KK tidak valid!");
    }

    $newKkName = "KK_" . $kode_tracking . "." . $kkExt;
    move_uploaded_file($kkTmp, $uploadDir . $newKkName);

    $rtName = $_FILES['fsurat_rt']['name'];
    $rtTmp  = $_FILES['fsurat_rt']['tmp_name'];
    $rtExt  = strtolower(pathinfo($rtName, PATHINFO_EXTENSION));
    $allowedDoc = ['pdf','doc','docx'];

    if (!in_array($rtExt, $allowedDoc)) {
        die("Format Surat RT tidak valid!");
    }

    $newRtName = "SURAT_RT_" . $kode_tracking . "." . $rtExt;
    move_uploaded_file($rtTmp, $uploadDir . $newRtName);

    $rwName = $_FILES['fsurat_rw']['name'];
    $rwTmp  = $_FILES['fsurat_rw']['tmp_name'];
    $rwExt  = strtolower(pathinfo($rwName, PATHINFO_EXTENSION));

    if (!in_array($rwExt, $allowedDoc)) {
        die("Format Surat RW tidak valid!");
    }

    $newRwName = "SURAT_RW_" . $kode_tracking . "." . $rwExt;
    move_uploaded_file($rwTmp, $uploadDir . $newRwName);

    $qTambahSurat = "INSERT INTO surat_keterangan 
    (jenis_surat, nik, bukti_ktp, bukti_kk, surat_rt, surat_rw, keperluan, no_hp, status_surat, id_profil_desa, kode_tracking) 
    VALUES
    ('$jenis_surat', '$nik', '$newKtpName', '$newKkName', '$newRtName', '$newRwName', '$keperluan', '$no_hp', '$status_surat', '$id_profil_desa', '$kode_tracking')";

    $TambahSurat = mysqli_query($connect, $qTambahSurat);

    if ($TambahSurat) {

        //  Ambil ID terakhir
        $id_surat = mysqli_insert_id($connect);

        //  Insert ke tabel tracking_surat
        mysqli_query($connect, "
            INSERT INTO tracking_surat 
            (kode_tracking, jenis_surat, id_surat, status_surat, no_hp)
            VALUES
            ('$kode_tracking', '$jenis_surat', '$id_surat', '$status_surat', '$no_hp')
        ");
        
        include('../../partials/header.php');

    include('../../assets/wa/send_wa.php');

    $nomor = $no_hp;

    // format nomor (hapus 0 depan jadi 62)
    $nomor = preg_replace('/^0/', '62', $nomor);

    $link = "http://localhost/DESA_NUSAJATI/desa_nusajati/cek-surat/?kode=$kode_tracking";

    $pesan = "Halo 👋\n\n"
            ."Pengajuan surat Anda berhasil.\n"
            ."Kode Tracking: $kode_tracking\n\n"
            ."Cek status surat di:\n$link\n\n"
            ."Terima kasih.";

    kirimWA($nomor, $pesan);

?>

<style>
.success-wrapper {
    padding:100px 0;
    min-height:70vh;
}

.success-card {
    max-width:600px;
    margin:auto;
    padding:50px;
    border-radius:20px;
    background:#ffffff;
    box-shadow:0 15px 40px rgba(0,0,0,0.08);
    text-align:center;
}

.success-icon {
    font-size:70px;
    color:#198754;
}

.tracking-box {
    background:#f8f9fa;
    padding:15px;
    border-radius:12px;
    font-size:20px;
    font-weight:bold;
    letter-spacing:2px;
    border:1px dashed #198754;
    user-select:all;
}

.copy-btn {
    margin-top:15px;
}

</style>

<div class="container success-wrapper">
    <div class="success-card">

        <div class="success-icon">
            <i class="fas fa-check-circle"></i>
        </div>

        <h3 class="mt-4 font-weight-bold text-success">
           PENGAJUAN BERHASIL
        </h3>

        <p class="text-muted">
            Simpan kode tracking berikut untuk memantau status surat Anda.
        </p>

         <div id="trackingCode" class="tracking-box">
            <?= $kode_tracking ?>
        </div>

         <button onclick="copyCode()" 
            class="btn btn-outline-success copy-btn">
            <i class="fas fa-copy"></i> Salin Kode
        </button>

        <br>

         <p class="mt-4 text-muted">
            Anda akan diarahkan ke beranda dalam 
            <strong><span id="countdown">60</span></strong> detik...
        </p>

        <a href="../index.php" class="btn btn-success mt-3 px-4">
            Kembali Sekarang
        </a>

    </div>
</div>

<script>
// Copy to clipboard
function copyCode() {
    var text = document.getElementById("trackingCode").innerText;

    if (navigator.clipboard) {
        navigator.clipboard.writeText(text).then(function() {
            alert("Kode tracking berhasil disalin!");
        });
    } else {
        var tempInput = document.createElement("input");
        tempInput.value = text;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);
        alert("Kode tracking berhasil disalin!");
    }
}

let timeLeft = 60;
let countdownElement = document.getElementById("countdown");

let timer = setInterval(function() {
    timeLeft--;
    countdownElement.innerText = timeLeft;

    if (timeLeft <= 0) {
        clearInterval(timer);
        window.location.href = "../index.php";
    }
}, 1000);
</script>

<?php
        include('../../partials/footer.php');
    } else {
        echo "Gagal menyimpan data.";
    }
}
?>