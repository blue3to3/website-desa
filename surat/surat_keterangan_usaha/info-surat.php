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
            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                <h4 class="font-weight-bold text-success mb-0">
                    <i class="fas fa-store"></i> Surat Keterangan Usaha
                </h4>
                <span class="text-muted">Nomor Surat: -</span>
            </div>

            <form method="post" action="simpan-surat.php" enctype="multipart/form-data">

                <h6 class="text-success font-weight-bold text-uppercase mb-4">
                    Informasi Pribadi Pemohon
                </h6>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="font-weight-bold">Nama Lengkap</label>
                        <input type="text" class="form-control"
                               value="<?= ucwords(strtolower($data['nama'])) ?>" readonly>
                        <input type="hidden" name="fnama" value="<?= $data['nama'] ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="font-weight-bold">NIK</label>
                        <input type="text" class="form-control"
                               value="<?= $data['nik'] ?>" readonly>
                        <input type="hidden" name="fnik" value="<?= $data['nik'] ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="font-weight-bold">Tempat, Tanggal Lahir</label>
                        <?php $tgl_full = date('d-m-Y', strtotime($data['tgl_lahir'])); ?>
                        <input type="text" class="form-control"
                               value="<?= ucwords(strtolower($data['tempat_lahir'])) . ', ' . $tgl_full ?>" readonly>
                        <input type="hidden" name="ftempat_tgl_lahir"
                               value="<?= $data['tempat_lahir'] . ', ' . $tgl_full ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="font-weight-bold">Jenis Kelamin</label>
                        <input type="text" class="form-control"
                               value="<?= $data['jenis_kelamin'] ?>" readonly>
                        <input type="hidden" name="fjenis_kelamin"
                               value="<?= $data['jenis_kelamin'] ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="font-weight-bold">Agama</label>
                        <input type="text" class="form-control"
                               value="<?= $data['agama'] ?>" readonly>
                        <input type="hidden" name="fagama"
                               value="<?= $data['agama'] ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="font-weight-bold">Status Perkawinan</label>
                        <input type="text" class="form-control"
                               value="<?= $data['status_perkawinan'] ?>" readonly>
                        <input type="hidden" name="fstatus_perkawinan"
                               value="<?= $data['status_perkawinan'] ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="font-weight-bold">Alamat Domisili</label>
                        <input type="text" class="form-control"
                               value="RT.<?= $data['rt'] ?>/RW.<?= $data['rw'] ?>, Desa <?= $data['desa'] ?>" readonly>
                        <input type="hidden" name="falamat"
                               value="RT.<?= $data['rt'] ?>/RW.<?= $data['rw'] ?>, Desa <?= $data['desa'] ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="font-weight-bold">Pekerjaan</label>
                        <input type="text" class="form-control"
                               value="<?= $data['pekerjaan'] ?>" readonly>
                        <input type="hidden" name="fpekerjaan"
                               value="<?= $data['pekerjaan'] ?>">
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

                <div class="form-group"><label class="font-weight-bold">No WhatsApp</label>
                    <input type="text" name="fno_hp" 
                        class="form-control"
                        placeholder="08xxxxxxxxxx" required>
                </div>

                <h6 class="text-success font-weight-bold text-uppercase mb-4">
                    Detail Informasi Usaha
                </h6>

                <div class="form-group">
                    <label class="font-weight-bold">Bidang Usaha / Nama Usaha</label>
                    <input type="text"
                           name="fusaha"
                           class="form-control"
                           placeholder="Contoh: Toko Sembako / Bengkel Motor"
                           required>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Alamat Lengkap Usaha</label>
                    <input type="text"
                           name="falamat_usaha"
                           class="form-control"
                           placeholder="Masukkan alamat lengkap lokasi usaha"
                           required>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Keperluan Surat</label>
                    <input type="text"
                           name="fkeperluan"
                           class="form-control"
                           placeholder="Contoh: Persyaratan Pengajuan KUR Bank"
                           required>
                </div>

                <div class="text-right mt-4">
                    <button type="button"
                            onclick="window.history.back()"
                            class="btn btn-outline-secondary mr-2">
                        Batal
                    </button>

                    <button type="submit"
                            name="submit"
                            class="btn btn-success px-4">
                        Kirim Data
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
