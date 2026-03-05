<?php
session_start();
if (isset($_SESSION['admin']) || isset($_SESSION['kades'])) {
    header('location:../admin/dashboard/');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - Desa Nusajati</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../assets/bootstrap-4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome-5.10.2/css/all.css">

    <style>
        body {
            background: #f4f6f9;
        }

        .topbar {
            background: #198754;
            color: white;
            padding: 12px;
            text-align: center;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .login-container {
            min-height: 85vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            background: white;
            border-radius: 10px;
            padding: 40px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .login-card h4 {
            font-weight: 700;
            margin-bottom: 5px;
        }

        .login-card p {
            font-size: 13px;
            color: #6c757d;
            margin-bottom: 25px;
        }

        .form-control {
            height: 45px;
        }

        .btn-login {
            background: #198754;
            color: white;
            font-weight: 600;
            height: 45px;
        }

        .btn-login:hover {
            background: #157347;
        }

        .footer-text {
            font-size: 12px;
            color: #6c757d;
            margin-top: 25px;
        }

        .alert-custom {
            font-size: 14px;
        }
    </style>
</head>
<body>

<!-- TOP BAR -->
<div class="topbar">
    Sistem Informasi Desa Nusajati
</div>

<div class="container login-container">
    <div class="login-card text-center">

        <img src="../assets/img/logo-desa.png" height="60" class="mb-3">

        <h4>Login Administrator</h4>
        <p>Masuk ke Sistem Administrasi Desa</p>

        <?php if (isset($_GET['pesan']) && $_GET['pesan'] == "login-gagal"): ?>
            <div class="alert alert-danger alert-custom">
                <i class="fas fa-exclamation-circle"></i>
                Username atau Password salah!
            </div>
        <?php endif; ?>

        <form method="post" action="aksi-login.php">

            <div class="form-group text-left">
                <label>Username</label>
                <input type="text"
                       name="username"
                       class="form-control"
                       placeholder="Masukkan Username"
                       required
                       autocomplete="off">
            </div>

            <div class="form-group text-left">
                <label>Password</label>
                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="Masukkan Password"
                       required>
            </div>

            <button type="submit" class="btn btn-login btn-block">
                <i class="fas fa-sign-in-alt"></i> Masuk
            </button>

        </form>

        <div class="mt-3">
            <a href="../" class="text-success">
                <i class="fas fa-arrow-left"></i> Kembali ke Beranda
            </a>
        </div>

        <div class="footer-text">
            &copy; 2026 Desa Nusajati. All rights reserved.
        </div>

    </div>
</div>

</body>
</html>
