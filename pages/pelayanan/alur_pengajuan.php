<div class="container py-5">
    <h2 class="text-center font-weight-bold mb-3" style="color:#1f6f43;">
        Alur Pengajuan Surat
    </h2>
    <hr style="width:80px; border:3px solid #f4b400; margin:auto;">

    <div class="timeline">

        <div class="timeline-item left">
            <div class="timeline-icon"><i class="fas fa-globe"></i></div>
            <div class="timeline-content">
                <h5 class="text-center font-weight-bold" style="color:#1f6f43;">Akses Pengajuan</h5>
                <p>
                    Warga mengakses menu 
                    <a href="surat/" class="font-weight-bold text-primary">
                        Pengajuan Surat
                    </a>
                    melalui website desa.
                </p>
            </div>
        </div>

        <div class="timeline-item right">
            <div class="timeline-icon"><i class="fas fa-list"></i></div>
            <div class="timeline-content">
                <h5 class="text-center font-weight-bold" style="color:#1f6f43;">Pilih Jenis Surat</h5>
                <p>Warga memilih jenis surat sesuai kebutuhan.</p>
            </div>
        </div>

        <div class="timeline-item left">
            <div class="timeline-icon"><i class="fas fa-edit"></i></div>
            <div class="timeline-content">
                <h5 class="text-center font-weight-bold" style="color:#1f6f43;">Isi Formulir</h5>
                <p>Warga mengisi formulir sesuai jenis surat yang dipilih.</p>
            </div>
        </div>

        <div class="timeline-item right">
            <div class="timeline-icon"><i class="fab fa-whatsapp"></i></div>
            <div class="timeline-content">
                <h5 class="text-center font-weight-bold" style="color:#1f6f43;">Kode Tracking</h5>
                <p>Sistem mengirimkan kode tracking melalui WhatsApp.</p>
            </div>
        </div>

        <div class="timeline-item left">
            <div class="timeline-icon"><i class="fas fa-user-check"></i></div>
            <div class="timeline-content">
                <h5 class="text-center font-weight-bold" style="color:#1f6f43;">Verifikasi Admin</h5>
                <p>Admin memverifikasi dan memproses pengajuan surat.</p>
            </div>
        </div>

        <div class="timeline-item right">
            <div class="timeline-icon"><i class="fas fa-signature"></i></div>
            <div class="timeline-content">
                <h5 class="text-center font-weight-bold" style="color:#1f6f43;">Tanda Tangan Digital</h5>
                <p>Surat ditandatangani secara digital oleh pejabat berwenang.</p>
            </div>
        </div>

        <div class="timeline-item left">
            <div class="timeline-icon"><i class="fas fa-download"></i></div>
            <div class="timeline-content">
                <h5 class="text-center font-weight-bold" style="color:#1f6f43;">Unduh Surat</h5>
                <p>Warga menerima notifikasi untuk mengunduh surat.</p>
            </div>
        </div>

    </div>

</div>

<style>
.timeline {
    position: relative;
    max-width: 1100px;
    margin: 60px auto;
}

.timeline::after {
    content: '';
    position: absolute;
    width: 4px;
    background: #198754;
    top: 0;
    bottom: 0;
    left: 50%;
    margin-left: -2px;
}

.timeline-item {
    padding: 10px 40px;
    position: relative;
    width: 50%;
}

.timeline-item.left {
    left: 0;
}

.timeline-item.right {
    left: 50%;
}

.timeline-content {
    background: #ffffff;
    padding: 25px 30px;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
}

.timeline-icon {
    position: absolute;
    top: 20px;
    width: 60px;
    height: 60px;
    background: #198754;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 22px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.2);
    z-index: 10;
}

.timeline-item.left .timeline-icon {
    right: -30px;
}

.timeline-item.right .timeline-icon {
    left: -30px;
}

@media screen and (max-width: 768px) {

    .timeline::after {
        left: 20px;
    }

    .timeline-item {
        width: 100%;
        padding-left: 70px;
        padding-right: 25px;
        margin-bottom: 40px;
    }

    .timeline-item.right {
        left: 0%;
    }

    .timeline-icon {
        left: 0 !important;
    }
}
</style>
