
<!-- HERO SECTION -->
<section style="
    background: url('assets/img/bg-desa.png') center/cover no-repeat;
    min-height: 100vh;
    position: relative;
">

    <div style="
        background: rgba(0,0,0,0.6);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    ">

        <div class="text-center text-white p-5"
             style="
             background: rgba(255,255,255,0.08);
             backdrop-filter: blur(10px);
             border-radius: 20px;
             max-width: 800px;
             ">

            <img src="assets/img/logo-desa.png" width="120" class="mb-4">

            <h1 class="display-4 font-weight-bold text-warning">
                Website Informasi
                <br>
                Desa Nusajati
            </h1>

            <hr style="width:100px; border:2px solid #ffc107;">

            <p class="lead">
                Website resmi Desa Nusajati untuk informasi,
                pelayanan masyarakat dan transparansi publik.
            </p>

            <a href="surat/" class="btn btn-warning btn-lg mt-3">
                Layanan Administrasi
            </a>

            <div style="margin-top:30px;">

            <?php
            $highlight = mysqli_fetch_assoc(
                mysqli_query($connect,"SELECT * FROM berita ORDER BY id DESC LIMIT 1")
            );
            ?>
            <?php if($highlight): ?>
                <div style="
                margin-top:40px;
                text-align:left;
                background:rgba(255,255,255,0.12);
                padding:15px 20px;
                border-radius:15px;
                backdrop-filter:blur(6px);
                ">

                <span class="badge badge-warning mb-2">Kegiatan Terbaru</span>

                <h5 class="mb-1 text-white">
                <?= $highlight['judul'] ?>
                </h5>

                <p class="mb-2" style="opacity:.9">
                <?= substr(strip_tags($highlight['isi']),0,120) ?>...
                </p>

                <a href="<?= $base ?>pages/berita-detail.php?id=<?= $highlight['id'] ?>"
                class="btn btn-sm btn-light">
                Baca Berita
                </a>

                </div>
                <?php endif; ?>
            <div style="margin-top:30px;">
            <a href="<?= $base ?>pages/berita.php" class="btn btn-outline-success">
                Lihat Semua Berita
            </a>
            </div>
            </div>
            
        </div>

    </div>

</section>
