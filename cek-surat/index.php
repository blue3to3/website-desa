<?php
include('../config/koneksi.php');
include('../partials/header.php');

$kode = "";
$data = null;

// Ambil dari URL
if (isset($_GET['kode']) && !empty($_GET['kode'])) {
    $kode = mysqli_real_escape_string($connect, $_GET['kode']);
}

// Ambil dari form
if (isset($_POST['cari']) && !empty($_POST['kode_tracking'])) {
    $kode = mysqli_real_escape_string($connect, $_POST['kode_tracking']);
}

// Jika ada kode, baru query
if (!empty($kode)) {

    $query  = "SELECT * FROM tracking_surat WHERE kode_tracking='$kode' LIMIT 1";
    $result = mysqli_query($connect, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    }
}

?>

<?php
$downloadFile = '';

if ($data) {

    switch ($data['jenis_surat']) {

        case 'Surat Ijin Keramaian':
            $downloadFile = 'download_sik.php';
            break;

        case 'Surat Keterangan':
            $downloadFile = 'download_sk.php';
            break;

        case 'Surat Keterangan Domisili Tempat Tinggal':
            $downloadFile = 'download_skd.php';
            break;
        
        case 'Surat Keterangan Tidak Mampu':
            $downloadFile = 'download_sktm.php';
            break;

        case 'Surat Keterangan Usaha':
            $downloadFile = 'download_sku.php';
            break;

        case 'Surat Pengantar Catatan Kepolisian':
            $downloadFile = 'download_spck.php';
            break;

        case 'Surat Pengantar':
            $downloadFile = 'download_spu.php';
            break;

        default:
            $downloadFile = '';
            break;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/bootstrap-4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome-5.10.2/css/all.css">

    <style>
        body {
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            min-height: 100vh;
            color: white;
        }

        .navbar-custom {
            background: rgba(0,0,0,0.6);
            backdrop-filter: blur(10px);
        }

        .glass-card {
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 20px;
            padding: 40px;
            max-width: 800px;
            margin: auto;
        }

        .form-control {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            color: white;
        }

        .form-control::placeholder {
            color: rgba(255,255,255,0.6);
        }

        .badge-pending {
            background: #dc3545;
        }

        .badge-success {
            background: #28a745;
        }

        .footer-custom {
            background: rgba(0,0,0,0.6);
            backdrop-filter: blur(10px);
        }
    </style>
</head>

<body>

<div class="container" style="margin-top:100px; margin-bottom:100px;">

    <div class="glass-card">

        <h3 class="mb-4 text-warning font-weight-bold">
            <i class="fas fa-search"></i> Cek Status Pengajuan Surat
        </h3>

        <!-- FORM -->
        <form method="POST" class="mb-4">

            <div class="form-group">
                <input type="text"
                    name="kode_tracking"
                    class="form-control form-control-lg text-center"
                    placeholder="Masukkan Kode Tracking"
                    value="<?= htmlspecialchars($kode); ?>"
                    required>
            </div>

            <button type="submit" name="cari" class="btn btn-success btn-block btn-lg">
                Cek Tracking
            </button>

        </form>

        <?php if (!empty($kode)) : ?>

            <?php if ($data) : ?>

                <div class="mt-4 p-4 rounded"
                     style="background: rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.15);">

                    <h5><strong>Kode Tracking:</strong> <?= htmlspecialchars($data['kode_tracking']); ?></h5>
                    <p><strong>Jenis Surat:</strong> <?= htmlspecialchars($data['jenis_surat']); ?></p>

                    <p><strong>Status:</strong>
                        <?php
                        if (strtolower($data['status_surat']) == 'pending') {
                            echo '<span class="badge badge-pending">PENDING</span>';
                        } elseif (strtolower($data['status_surat']) == 'selesai') {
                            echo '<span class="badge badge-success">SELESAI</span>';
                        } else {
                            echo '<span class="badge badge-secondary">' . htmlspecialchars($data['status_surat']) . '</span>';
                        }
                        ?>
                    </p>

                    <?php if (strtolower($data['status_surat']) == 'selesai' && $downloadFile != '') : ?>

                        <a href="download/<?= $downloadFile; ?>?kode=<?= $data['kode_tracking']; ?>" 
                        class="btn btn-success mt-3">
                        <i class="fas fa-download"></i> Download Surat
                        </a>

                        <?php endif; ?>

                    <p><strong>Tanggal Pengajuan:</strong> <?= htmlspecialchars($data['created_at']); ?></p>

                </div>

            <?php else : ?>

            <div class="alert alert-danger mt-3">
                Kode tracking tidak ditemukan.
            </div>

        <?php endif; ?>

    <?php endif; ?>

    </div>

</div>

</body>
</html>

<?php
    include('../partials/footer.php');
?>
