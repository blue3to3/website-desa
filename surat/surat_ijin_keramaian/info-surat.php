<?php
session_start();
include('../../config/koneksi.php');

if (!isset($_POST['fnik'])) {
    header("Location: index.php");
    exit;
}

$nik = mysqli_real_escape_string($connect, $_POST['fnik']);
$qCekNik = mysqli_query($connect, "SELECT * FROM penduduk WHERE nik = '$nik'");

if (mysqli_num_rows($qCekNik) == 0) {
    header("Location: index.php?pesan=gagal");
    exit;
}

$data = mysqli_fetch_assoc($qCekNik);
$_SESSION['nik'] = $nik;

include('../../partials/header.php');
?>

<div class="container py-5">
    <div class="card shadow-lg border-0" style="border-radius:20px;">
        <div class="card-body p-5">

<!-- HEADER -->
        <div style="display:flex;justify-content:space-between;align-items:center;border-bottom:2px solid rgba(25,135,84,0.3);padding-bottom:15px;margin-bottom:30px;">
            <h4 style="font-weight:700;color:#198754;margin:0;text-transform:uppercase;">
                <i class="fas fa-file-alt"></i> Surat Ijin Keramaian
            </h4>
            <h5 style="font-weight:600;color:#6c757d;margin:0;">
                Nomor Surat : -
            </h5>
        </div>

        <form method="post" action="simpan-surat.php" enctype="multipart/form-data">
            <h6 class="mb-4 text-success font-weight-bold text-uppercase">Informasi Pribadi</h6>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" value="<?= $data['nama']; ?>" readonly>
                    <input type="hidden" name="fnama" value="<?= $data['nama']; ?>">
                </div>
                
                <div class="col-md-6 mb-3">
                    <label>NIK</label>
                    <input type="text" class="form-control" value="<?= $data['nik']; ?>" readonly>
                    <input type="hidden" name="fnik" value="<?= $data['nik']; ?>">
                </div>
                
                <div class="col-md-6 mb-3">
                    <label>Tempat, Tanggal Lahir</label>
                    <?php
                    $timestamp = strtotime($data['tgl_lahir']);
                    $blnIndo = [
                        'January'=>'Januari',
                        'February'=>'Februari',
                        'March'=>'Maret',
                        'April'=>'April',
                        'May'=>'Mei',
                        'June'=>'Juni',
                        'July'=>'Juli',
                        'August'=>'Agustus',
                        'September'=>'September',
                        'October'=>'Oktober',
                        'November'=>'November',
                        'December'=>'Desember'
                    ];
                    $tglFull = date('d ', $timestamp).$blnIndo[date('F',$timestamp)].date(' Y',$timestamp);?>
                    
                    <input type="text" class="form-control" 
                    value="<?= $data['tempat_lahir'].', '.$tglFull; ?>" readonly>
                    <input type="hidden" name="ftempat_tgl_lahir" 
                    value="<?= $data['tempat_lahir'].', '.$tglFull; ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Jenis Kelamin</label>
                    <input type="text" class="form-control" value="<?= $data['jenis_kelamin']; ?>" readonly>
                    <input type="hidden" name="fjenis_kelamin" value="<?= $data['jenis_kelamin']; ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Agama</label>
                    <input type="text" class="form-control" value="<?= $data['agama']; ?>" readonly>
                    <input type="hidden" name="fagama" value="<?= $data['agama']; ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Pekerjaan</label>
                    <input type="text" class="form-control" value="<?= $data['pekerjaan']; ?>" readonly>
                    <input type="hidden" name="fpekerjaan" value="<?= $data['pekerjaan']; ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Alamat Domisili</label>
                    <input type="text" class="form-control"
                    value="RT.<?= $data['rt']; ?>/RW.<?= $data['rw']; ?>, Desa <?= $data['desa']; ?>" readonly>
                    <input type="hidden" name="falamat"
                    value="RT.<?= $data['rt']; ?>/RW.<?= $data['rw']; ?>, Desa <?= $data['desa']; ?>">
                </div>
                
                <div class="col-md-6 mb-3">
                    <label>Kewarganegaraan</label>
                    <input type="text" class="form-control" value="<?= strtoupper($data['kewarganegaraan']); ?>" readonly>
                    <input type="hidden" name="fkewarganegaraan" value="<?= $data['kewarganegaraan']; ?>">
                </div>
            
            </div>
            
            <hr class="my-4">
            <h6 class="mb-4 text-success font-weight-bold text-uppercase">
                Verifikasi Dokumen
            </h6>

            <div class="row">

                <div class="col-md-6 mb-4">
                    <div class="upload-card">
                    <label class="upload-title">
                        <i class="fas fa-id-card"></i> Foto KTP
                    </label>
                    <input type="file" name="fbukti_ktp" class="form-control" accept=".jpg,.jpeg,.png" required>
                    <small class="text-muted">
                        Format: JPG / PNG
                    </small>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="upload-card">
                    <label class="upload-title">
                        <i class="fas fa-users"></i> Foto KK
                    </label>
                    <input type="file" name="fbukti_kk" class="form-control" accept=".jpg,.jpeg,.png" required>
                    <small class="text-muted">
                        Format: JPG / PNG
                    </small>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="upload-card">
                    <label class="upload-title">
                        <i class="fas fa-file-alt"></i> Surat Pengantar RT
                    </label>
                    <input type="file" name="fsurat_rt" class="form-control" accept=".pdf,.doc,.docx" required>
                    <small class="text-muted">
                        Format: PDF / DOC / DOCX
                    </small>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="upload-card">
                    <label class="upload-title">
                        <i class="fas fa-file-alt"></i> Surat Pengantar RW
                    </label>
                    <input type="file" name="fsurat_rw" class="form-control" accept=".pdf,.doc,.docx" required>
                    <small class="text-muted">
                        Format: PDF / DOC / DOCX
                    </small>
                    </div>
                </div>
            </div>
            
            <hr class="my-4">
            <h6 class="mb-4 text-success font-weight-bold text-uppercase">Formulir Ijin Keramaian</h6>

            <div class="form-group"><label>No WhatsApp</label>
            <input type="text" name="fno_hp" 
                class="form-control"
                placeholder="08xxxxxxxxxx" required>
            </div>
            
            <div class="form-group"> <label>Nama Acara</label>
                <select name="fnama_acara" class="form-control" required>
                <option value="">-- Pilih Nama Acara --</option>
                <option value="Hajatan">Hajatan</option>
                <option value="Tasyakuran">Tasyakuran</option>
                <option value="Perlombaan">Perlombaan</option>
                <option value="Kegiatan Sosial">Kegiatan Sosial</option>
                <option value="Keagamaan">Keagamaan</option>
                <option value="Keramaian Lainnya">Keramaian Lainnya</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Tanggal Acara</label>
                <input type="date" name="ftanggal_acara" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label>Hiburan Acara</label>
                <input type="text" name="fhiburan_acara" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label>Jumlah Undangan / Peserta</label>
                <input type="text" name="fjumlah_undangan" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Tempat / Lokasi Acara</label>
                <input type="text" name="ftempat_acara" class="form-control" required>
            </div>

            <div class="text-right mt-4">
                <button type="button" onclick="history.back()" 
                class="btn btn-outline-secondary px-4">Batal</button>

                <button type="submit" name="submit"
                class="btn btn-success px-5 ml-2">
                    Kirim Permohonan
                </button>
            </div>

        </form>
        </div>
    </div>
</div>

<style>
    .upload-card{
        background:#ffffff;
        border:1px solid #e0e0e0;
        border-radius:12px;
        padding:20px;
        box-shadow:0 5px 15px rgba(0,0,0,0.05);
        transition:0.3s;
    }

    .upload-card:hover{
        box-shadow:0 10px 25px rgba(0,0,0,0.08);
        transform:translateY(-2px);
    }

    .upload-title{
        font-weight:600;
        display:block;
        margin-bottom:10px;
        font-weight:bold;
    }

    .upload-title i{
        margin-right:6px;
    }
</style>

<?php
include('../../partials/footer.php');
?>
