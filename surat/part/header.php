<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../../assets/img/logo-banyumas-90x90.png">
    <title>Verifikasi NIK - e-Surat Desa Klapasawit</title>
    <link rel="stylesheet" href="../../assets/fontawesome-5.10.2/css/all.css">
    <link rel="stylesheet" href="../../assets/bootstrap-4.3.1/dist/css/bootstrap.min.css">
    <link href="fonts.googleapis.com" rel="stylesheet">

    <style type="text/css">
    /* BASE STYLE */
    html,
    body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        font-family: 'Montserrat', sans-serif;
        color: white;
        overflow-x: hidden;
    }

    body {
        background: linear-gradient(rgba(0, 0, 0, .7), rgba(0, 0, 0, .7)), url('../../assets/img/background.jpg') fixed center/cover;
        display: flex;
        flex-direction: column;
    }

    /* NAVBAR (KEMBALI KE ASLI) */
    .header-wrapper {
        width: 100%;
        padding: 20px 0;
        background: rgba(0, 0, 0, 0.3);
    }

    .nav-flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 50px;
    }

    .logo-kiri img {
        height: 45px;
    }

    .kanan-wrapper {
        display: flex;
        align-items: center;
    }

    .menu-list {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
        align-items: center;
    }

    .menu-list a {
        color: white !important;
        font-weight: 700;
        text-decoration: none;
        margin: 0 8px;
        font-size: 8.5pt;
        text-transform: uppercase;
        padding: 8px 18px;
        border-radius: 5px;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: 0.3s;
    }

    .menu-list a:hover,
    .menu-list a.active {
        background: rgba(255, 255, 255, 0.3);
        color: #ffc107 !important;
    }

    .btn-login {
        background-color: #ffc107 !important;
        color: #000 !important;
        font-weight: 800 !important;
        padding: 10px 25px !important;
        border-radius: 5px;
        text-transform: uppercase;
        font-size: 9pt;
        margin-left: 15px;
        transition: 0.3s;
        text-decoration: none;
    }

    /* CARD & INPUTS */
    .main-content {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 50px 0;
    }

    .glass-card,
    .glass-card-info {
        background: rgba(255, 255, 255, .1);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, .2);
        border-radius: 25px;
        padding: 40px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, .3);
        text-align: center;
    }

    .glass-card {
        width: 100%;
        max-width: 450px;
    }

    .glass-card-info {
        max-width: 900px;
        text-align: left;
    }

    .input-nik,
    .input-keperluan {
        background: rgba(255, 255, 255, .05) !important;
        border: 2px solid rgba(255, 255, 255, .2) !important;
        border-radius: 12px !important;
        color: white !important;
        transition: .3s;
        width: 100%;
    }

    .input-nik {
        padding: 25px 15px !important;
        font: 700 14pt 'Montserrat';
        letter-spacing: 2px;
        text-align: center;
    }

    .input-keperluan {
        padding: 15px !important;
        border-color: #ffc107 !important;
        text-align: center;
    }

    .input-nik:focus,
    .input-keperluan:focus {
        border-color: #ffc107 !important;
        box-shadow: 0 0 15px rgba(255, 193, 7, .3);
        outline: none;
    }

    /* INFO DATA DISPLAY */
    .label-title {
        font: 700 8pt 'Montserrat';
        color: #ffc107;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 5px;
        display: block;
    }

    .data-value {
        font-size: 11pt;
        color: #fff;
        font-weight: 500;
        background: rgba(255, 255, 255, .05);
        padding: 10px 15px;
        border-radius: 10px;
        border: 1px solid rgba(255, 255, 255, .1);
        display: block;
    }

    /* BUTTONS */
    .btn-cek,
    .btn-submit {
        width: 100%;
        background: #ffc107;
        color: #000;
        border: none;
        padding: 12px;
        border-radius: 12px;
        font-weight: 800;
        text-transform: uppercase;
        transition: .3s;
        cursor: pointer;
    }

    .btn-cek {
        margin-top: 20px;
    }

    .btn-submit:hover,
    .btn-cek:hover {
        background: #e0a800;
        transform: translateY(-3px);
    }

    .btn-batal {
        background: rgba(255, 255, 255, .1);
        color: #fff;
        border: 1px solid rgba(255, 255, 255, .3);
        padding: 12px 30px;
        border-radius: 30px;
        font-weight: 800;
        transition: .3s;
    }

    .btn-batal:hover {
        background: #dc3545;
        border-color: #dc3545;
    }

    /* ELEMENTS */
    .section-divider {
        display: flex;
        align-items: center;
        text-align: center;
        margin: 40px 0 20px;
        font: 700 9pt 'Montserrat';
        color: rgba(255, 255, 255, .5);
        text-transform: uppercase;
    }

    .section-divider::before,
    .section-divider::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid rgba(255, 255, 255, .1);
    }

    .section-divider:not(:empty)::before {
        margin-right: 1em;
    }

    .section-divider:not(:empty)::after {
        margin-left: 1em;
    }

    footer {
        padding: 30px 0;
        background: rgba(0, 0, 0, .5);
        text-align: center;
        font-size: 8.5pt;
        opacity: 0.6;
    }
    </style>
</head>

<body>
    <!-- NAVBAR (IDENTIK) -->
    <header class="header-wrapper">
        <div class="nav-flex">
            <div class="logo-kiri">
                <a href="../../"><img src="../../assets/img/e-SuratDesa.png"></a>
            </div>
            <div class="kanan-wrapper">
                <ul class="menu-list">
                    <li><a href="../../">Home</a></li>
                    <li><a class="active" href="../../surat/">Buat Surat</a></li>
                    <li><a href="../../tentang/">Tentang</a></li>
                </ul>
                <?php
                if (empty($_SESSION['username'])) {
                    echo '<a class="btn-login" href="../../login/"><i class="fas fa-sign-in-alt"></i> LOGIN</a>';
                } else {
                    echo '<a class="btn-login" href="../../admin/"><i class="fa fa-user-cog"></i> ADMIN</a>';
                }
                ?>
            </div>
        </div>
    </header>