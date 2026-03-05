<section class="gov-hero text-center mb-3 py-5">
    <div class="container fw-bold" style="color:#1f6f43;">
        <h1>PROFIL DESA <?= strtoupper($profil['nama_desa']) ?></h1>
        <div class="gov-divider"></div>
        <hr style="width:80px; border:3px solid #f4b400; margin:auto;">
    </div>
</section>

<section class="gov-section">
    <div class="container">

        <div class="card gov-card p-4">

        <?php if($profil['video_profil']){ ?>
            <div class="text-center mb-4">
            <video controls style="width:100%;max-width:800px;border-radius:12px;">
            <source src="uploads/video/<?= $profil['video_profil'] ?>" type="video/mp4">
            </video>
            </div>
            <?php } ?>

            <table class="table table-borderless">
                <tr>
                    <td width="30%"><strong>Nama Desa</strong></td>
                    <td><?= $profil['nama_desa'] ?></td>
                </tr>
                <tr>
                    <td><strong>Kecamatan</strong></td>
                    <td><?= $profil['kecamatan'] ?></td>
                </tr>
                <tr>
                    <td><strong>Kabupaten</strong></td>
                    <td><?= $profil['kabupaten'] ?></td>
                </tr>
                <tr>
                    <td><strong>Provinsi</strong></td>
                    <td><?= $profil['provinsi'] ?></td>
                </tr>
                <tr>
                    <td><strong>Kode Pos</strong></td>
                    <td><?= $profil['kode_pos'] ?></td>
                </tr>
                <tr>
                    <td><strong>Luas Wilayah</strong></td>
                    <td><?= $profil['luas_wilayah'] ?> km²</td>
                </tr>
                <tr>
                    <td><strong>Jumlah Dusun</strong></td>
                    <td><?= $profil['jumlah_dusun'] ?></td>
                </tr>
                <tr>
                    <td><strong>Jumlah RT</strong></td>
                    <td><?= $profil['jumlah_rt'] ?></td>
                </tr>
                <tr>
                    <td><strong>Jumlah RW</strong></td>
                    <td><?= $profil['jumlah_rw'] ?></td>
                </tr>
            </table>

        </div>

    </div>
</section>
