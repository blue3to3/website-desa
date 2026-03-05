<?php
session_start();
include('../../partials/header.php');
?>

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-6">

            <div class="card shadow border-0 rounded-lg">

                <div class="card-body p-3">

                    <div class="text-center mb-3">
                        <div class="mb-3">
                            <i class="fas fa-id-card fa-3x text-success"></i>
                        </div>
                        <h3 class="font-weight-bold"  style="color:#1f6f43;">
                            Verifikasi NIK
                        </h3>
                        <hr style="width:80px; border:3px solid #f4b400; margin:auto;">
                        <p class="text-muted">
                            Masukkan 16 digit Nomor Induk Kependudukan untuk melanjutkan proses pengajuan surat.
                        </p>
                    </div>

                    <?php if (isset($_GET['pesan']) && $_GET['pesan'] == "gagal"): ?>
                        <div class="alert alert-danger text-center">
                            NIK tidak terdaftar dalam sistem.
                        </div>
                    <?php endif; ?>

                    <form action="info-surat.php" method="post">

                        <div class="form-group">
                            <label class="font-weight-bold">
                                Nomor Induk Kependudukan
                            </label>
                            <input type="text"
                                   class="form-control form-control-lg text-center"
                                   maxlength="16"
                                   onkeypress="return hanyaAngka(event)"
                                   name="fnik"
                                   placeholder="Contoh: 3302xxxxxxxxxxxx"
                                   required>
                        </div>

                        <button type="submit"
                                class="btn btn-success btn-lg btn-block mt-4">
                            <i class="fas fa-search"></i> Cek Data
                        </button>

                    </form>

                </div>

            </div>

        </div>
    </div>
    
<style>
.card {
    animation: fadeInUp 0.6s ease;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

</div>

<?php
include('../../partials/footer.php');
?>
