<?php
include('../../../partials/header.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Saran & Kritik</title>
    <link rel="stylesheet" href="../assets/bootstrap-4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome-5.10.2/css/all.css">

    <style>
        body {
            background: linear-gradient(135deg,#0f2027,#203a43,#2c5364);
            color:white;
            min-height:100vh;
        }

        .navbar-custom {
            background: rgba(0,0,0,0.6);
            backdrop-filter: blur(10px);
        }

        .glass-card {
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(15px);
            border:1px solid rgba(255,255,255,0.15);
            border-radius:20px;
            padding:40px;
            max-width:900px;
            margin:auto;
        }

        .form-control {
            background:rgba(255,255,255,0.1);
            border:1px solid rgba(255,255,255,0.2);
            color:white;
        }

        .form-control::placeholder {
            color:rgba(255,255,255,0.6);
        }

        .btn-custom {
            background:#ffc107;
            font-weight:700;
            border-radius:30px;
        }
    </style>
</head>

<body>

<div class="container" style="margin-top:100px;margin-bottom:100px;">

    <div class="glass-card">

        <h3 class="text-warning text-center font-weight-bold mb-4">
            <i class="fas fa-exclamation-circle"></i> Saran & Kritik
        </h3>

        <form method="POST" action="simpan_pengaduan.php" enctype="multipart/form-data">

            <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="lokasi" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Saran & Kritik</label>
                <textarea name="isi_laporan" rows="4" class="form-control" required></textarea>
            </div>

            <div>
                <label>
                <input type="checkbox" name="anonim">
                Kirim sebagai anonim
                </label>
            </div>

            <button type="submit" class="btn btn-custom btn-block btn-lg">
                Kirim
            </button>

        </form>

    </div>

</div>

</body>
</html>

<?php
include('../../../partials/footer.php');
?>
