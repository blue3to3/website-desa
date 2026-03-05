<?php
include('../../config/koneksi.php');
include('../part/akses.php');
include('../part/header.php');

$status = $_GET['status'] ?? 'all';

if($status == 'all'){
    $sql = "SELECT * FROM pengaduan ORDER BY id DESC";
}else{
    $statusSafe = strtolower(mysqli_real_escape_string($connect,$status));

    $sql = "SELECT * FROM pengaduan 
            WHERE LOWER(status)='$statusSafe'
            ORDER BY id DESC";
}

$q = mysqli_query($connect,$sql);

$qMasuk = mysqli_query($connect,"
    SELECT COUNT(*) as total 
    FROM pengaduan 
    WHERE LOWER(status)='terkirim'
");
$masuk = mysqli_fetch_assoc($qMasuk)['total'] ?? 0;

$qDiproses = mysqli_query($connect,"
    SELECT COUNT(*) as total 
    FROM pengaduan 
    WHERE LOWER(status)='diproses'
");
$diproses = mysqli_fetch_assoc($qDiproses)['total'] ?? 0;

$qSelesai = mysqli_query($connect,"
    SELECT COUNT(*) as total 
    FROM pengaduan 
    WHERE LOWER(status)='selesai'
");
$selesai = mysqli_fetch_assoc($qSelesai)['total'] ?? 0;
?>

<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel"  style="padding: 20px 10px;">
            <div class="pull-left image">
                <?php
                $ava = ($_SESSION['lvl'] == 'Administrator') ? 'ava-admin-female.png' : 'ava-kades.png';
                echo '<img src="../../assets/img/' . $ava . '" class="img-circle" style="border: 2px solid #ffc107; box-shadow: 0 0 10px rgba(255,193,7,0.3);">';
                ?>
            </div>
            <div class="pull-left info">
                <p style="letter-spacing: 1px; margin-bottom: 5px;"><?php echo $_SESSION['lvl']; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Aktif</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header" style="color:rgba(255,255,255,0.3); font-size: 8pt; padding: 15px 25px 5px;">MENU UTAMA</li>
            <li><a href=../dashboard><i class="fas fa-tachometer-alt"></i> <span>&nbsp; Dashboard</span></a></li>
            <li>
                <a href="../profil_desa/">
                    <i class="fa fa-university"></i>
                    <span>&nbsp;Profil Desa</span>
                </a>
            </li>
            <li><a href="../pejabat/"><i class="fa fa-users"></i> <span>&nbsp;Data Pejabat</span></a></li>
            <li>
            <a href="../struktur/">
            <i class="fa fa-sitemap"></i> <span>&nbsp;Struktur Organisasi</span>
            </a>
            </li>
            <li><a href="../penduduk/"><i class="fa fa-users"></i> <span>&nbsp;Data Penduduk</span></a></li>

            <?php if ($_SESSION['lvl'] == 'Administrator'): ?>
            <li class="treeview">
                <a href="#">
                    <i class="fas fa-envelope-open-text"></i> <span>&nbsp; Layanan Surat</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu" style="background: transparent;">
                    <li><a href="../surat/permintaan_surat/"><i class="far fa-circle"></i> Permintaan Surat</a></li>
                    <li><a href="../surat/surat_selesai/"><i class="far fa-circle"></i> Surat Selesai</a></li>
                </ul>
            </li>
            <?php endif; ?>
            <li>
            <a href="../apbdes/">
            <i class="fa fa-chart-pie"></i>
            <span>&nbsp;Info Grafis APBDes</span>
            </a>
            </li>
            <li><a href="../berita/"><i class="fas fa-newspaper"></i> <span>&nbsp; Berita Desa</span></a></li>

            <li class="active"><a href="../pengaduan/"><i class="fas fa-clipboard-list"></i> <span>&nbsp; Kritik & Saran</span></a></li>

            <li><a href="../laporan/"><i class="fas fa-chart-line"></i> <span>&nbsp; Laporan</span></a></li>
        </ul>
    </section>
</aside>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Saran & Kritik </h1>
        <ol class="breadcrumb">
            <li><a href="../dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Saran & Kritik</li>
        </ol>
    </section>

        <div class="kpi-grid">

        <div class="kpi-card masuk">
            <div class="kpi-icon"><i class="fas fa-bullhorn"></i></div>
            <div class="kpi-text">
                <span>Masuk</span>
                <h2><?= $masuk ?></h2>
            </div>
        </div>

        <div class="kpi-card proses">
            <div class="kpi-icon"><i class="fas fa-spinner"></i></div>
            <div class="kpi-text">
                <span>Diproses</span>
                <h2><?= $diproses ?></h2>
            </div>
        </div>

        <div class="kpi-card selesai">
            <div class="kpi-icon"><i class="fas fa-check-circle"></i></div>
            <div class="kpi-text">
                <span>Selesai</span>
                <h2><?= $selesai ?></h2>
            </div>
        </div>

        </div>
        
        <div class="filter-pill" style="margin-bottom:20px">
            <a href="?status=all" class="btn btn-default">Semua</a>
            <a href="?status=TERKIRIM" class="btn btn-danger">Masuk</a>
            <a href="?status=DIPROSES" class="btn btn-warning">Diproses</a>
            <a href="?status=SELESAI" class="btn btn-success">Selesai</a>
        </div>

        <div class="pengaduan-wrapper">
        
        <?php while($row=mysqli_fetch_assoc($q)){ ?>
        
        <div class="pengaduan-card">
            <div class="pengaduan-head">
                <div>
                    <b><?= $row['anonim'] ? 'Anonim' : $row['nama']; ?></b><br>
                </div>
                
                <?php
                $cls='badge-terkirim';
                if($row['status']=='DIPROSES')$cls='badge-diproses';
                if($row['status']=='SELESAI')$cls='badge-selesai';
                ?>
                
                <div class="badge-status <?= $cls ?>">
                    <?= $row['status'] ?>
                </div>
            </div>
            
            <p><?= nl2br(substr($row['isi_laporan'],0,180)); ?>...</p>
            
            <div style="margin-top:10px;display:flex;justify-content:space-between;align-items:center">
                <span style="color:#888">📍 <?= $row['lokasi']; ?></span>
                
                <button class="btn btn-success btn-sm btn-detail" data-id="<?= $row['id']; ?>">
                    Detail
                </button>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php include('../part/footer.php'); ?>

<div class="modal fade" id="modalDetail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detail Pengaduan</h4>
            </div>
            <div class="modal-body" id="detailContent">Loading...</div>
        </div>
    </div>
</div>

<style>
.modal-content{
    border-radius:18px;
}

.detail-card{
padding:10px;
}

.detail-header{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:20px;
}

.detail-grid{
display:grid;
grid-template-columns:1fr 1fr;
gap:16px;
}

.detail-grid label{
font-size:12px;
color:#888;
margin-bottom:3px;
display:block;
}

.laporan-box{
background:#f5f7fa;
padding:14px;
border-radius:12px;
}

.foto-preview{
max-width:100%;
border-radius:12px;
box-shadow:0 10px 20px rgba(0,0,0,.1);
}

.status-badge{
padding:6px 12px;
border-radius:999px;
font-size:12px;
color:#fff;
font-weight:600;
}

.status-badge.red{background:#ff5252}
.status-badge.orange{background:#ff9800}
.status-badge.green{background:#00c853}

.modern-select{
border-radius:10px;
margin-top:10px;
}

.btn-modern{
margin-top:14px;
background:linear-gradient(135deg,#1f6f43,#2e9d62);
border:none;
color:#fff;
padding:12px 20px;
border-radius:12px;
font-weight:600;
transition:.25s;
}

.btn-modern:hover{
transform:translateY(-2px);
box-shadow:0 12px 25px rgba(0,0,0,.15);
}

.pengaduan-wrapper{
    padding:20px;
}

.pengaduan-card{
    background:#fff;
    border-radius:18px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
    padding:18px;
    margin-bottom:18px;
    transition:.25s;
    border-left:6px solid #1f6f43;
}

.pengaduan-card:hover{
    transform:translateY(-4px);
}

.pengaduan-head{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:10px;
}

.badge-status{
    padding:6px 12px;
    border-radius:50px;
    font-size:12px;
    font-weight:600;
}

.badge-terkirim{background:#fdecea;color:#d93025;}
.badge-diproses{background:#fff4e5;color:#ff9800;}
.badge-selesai{background:#e6f4ea;color:#1e8e3e;}

.pengaduan-img{
    max-width:140px;
    border-radius:12px;
    margin-top:10px;
}

.filter-pill a{
    border-radius:50px;
    margin-right:6px;
}

.gov-title{
    color:#1f6f43;
    font-weight:800;
}

.kpi-grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
gap:20px;
margin:20px 0;
}

.kpi-card{
display:flex;
align-items:center;
gap:18px;
padding:22px;
border-radius:18px;
color:#fff;
box-shadow:0 15px 35px rgba(0,0,0,.08);
transition:.25s;
}

.kpi-card:hover{
transform:translateY(-4px);
box-shadow:0 25px 45px rgba(0,0,0,.15);
}

.kpi-icon{
font-size:28px;
background:rgba(255,255,255,.2);
padding:16px;
border-radius:12px;
}

.kpi-text span{
font-size:14px;
opacity:.9;
}

.kpi-text h2{
margin:0;
font-size:34px;
font-weight:700;
}

/* warna gov */
.masuk{
background:linear-gradient(135deg,#ff6b6b,#ff3d3d);
}

.proses{
background:linear-gradient(135deg,#ffb300,#ff9800);
}

.selesai{
background:linear-gradient(135deg,#00c853,#00a152);
}
</style>
