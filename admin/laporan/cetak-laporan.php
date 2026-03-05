<?php
include "../../config/koneksi.php";
$qTampilDesa = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id = '1'");
$rows = mysqli_fetch_array($qTampilDesa);
?>

  <html>

  <head>
    <link rel="shortcut icon" href="../../assets/img/logo-desa.png">
    <title>CETAK LAPORAN</title>
    <style>
      @page {
        margin: 2cm;
        color: none;
      }

      body {
        font-family: "Times New Roman", Times, serif;
      }

      hr {
        border-bottom: 1px solid #000000;
        height: 0px;
      }
    </style>
  </head>

  <body>
    <div>
      <table width="100%" border="0"
        style="border-bottom: 3px double #000; padding-bottom: 10px; margin-bottom: 20px;">
        <tr>
          <!-- Kolom Logo -->
          <td width="15%" align="center">
            <img src="../../assets/img/logo-desa.png" width="90" alt="Logo">
          </td>

          <!-- Kolom Teks -->
          <td width="85%" align="center">
            <h4 style="margin: 0; line-height:1; font-size: 18px; text-transform: uppercase;">
              PEMERINTAH <?php echo $rows['nama_desa']; ?>
            </h4>
            <h4 style="margin: 0; line-height:1; font-size: 18px; text-transform: uppercase;">
              KECAMATAN <?php echo $rows['kecamatan']; ?> KABUPATEN <?php echo $rows['kabupaten']; ?>
            </h4>
            <h4 style="margin: 5px 0; line-height:1; font-size: 24px;">KEPALA DESA</h4>
            <p style="margin: 0; line-height:1; font-size: 13px; text-transform: capitalize;">
              <?php echo $rows['alamat'] . " Telp. " . $rows['telepon']; ?>
            </p>
            <p style="margin: 0; line-height:1; font-size: 13px;">
              Email: <?php echo $rows['email']; ?> Kode Pos <?php echo $rows['kode_pos']; ?>
            </p>
          </td>
        </tr>
      </table>
    </div>
    <?php
    include "../../config/koneksi.php";
    if (isset($_GET['filter']) && ! empty($_GET['filter'])) {
      $filter = $_GET['filter'];
      if ($filter == '1') {
        echo '
          <div class="header">
            <div align="center" style="font-size: 14pt;"><b>Laporan Surat Administrasi Desa - Surat Keluar Desa Nusajati</b></div>
            <hr>
          </div><br>
        ';

        $query = "SELECT penduduk.nama, penduduk.desa, penduduk.rt, penduduk.rw, surat_keterangan.no_surat, surat_keterangan.tanggal_surat, surat_keterangan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan ON surat_keterangan.nik = penduduk.nik WHERE surat_keterangan.status_surat='selesai'
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rt, penduduk.rw, surat_pengantar_umum.no_surat, surat_pengantar_umum.tanggal_surat, surat_pengantar_umum.jenis_surat FROM penduduk LEFT JOIN surat_pengantar_umum ON surat_pengantar_umum.nik = penduduk.nik WHERE surat_pengantar_umum.status_surat='selesai' 
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rt, penduduk.rw, surat_keterangan_domisili_tempat_tinggal.no_surat, surat_keterangan_domisili_tempat_tinggal.tanggal_surat, surat_keterangan_domisili_tempat_tinggal.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_domisili_tempat_tinggal ON surat_keterangan_domisili_tempat_tinggal.nik = penduduk.nik WHERE surat_keterangan_domisili_tempat_tinggal.status_surat='selesai' 
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rt, penduduk.rw, surat_keterangan_domisili_usaha.no_surat, surat_keterangan_domisili_usaha.tanggal_surat, surat_keterangan_domisili_usaha.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_domisili_usaha ON surat_keterangan_domisili_usaha.nik = penduduk.nik WHERE surat_keterangan_domisili_usaha.status_surat='selesai'
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rt, penduduk.rw, surat_keterangan_tidak_mampu.no_surat, surat_keterangan_tidak_mampu.tanggal_surat, surat_keterangan_tidak_mampu.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_tidak_mampu ON surat_keterangan_tidak_mampu.nik = penduduk.nik WHERE surat_keterangan_tidak_mampu.status_surat='selesai'
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rt, penduduk.rw, surat_keterangan_usaha.no_surat, surat_keterangan_usaha.tanggal_surat, surat_keterangan_usaha.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_usaha ON surat_keterangan_usaha.nik = penduduk.nik WHERE surat_keterangan_usaha.status_surat='selesai' 
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rt, penduduk.rw, surat_ijin_keramaian.no_surat, surat_ijin_keramaian.tanggal_surat, surat_ijin_keramaian.jenis_surat FROM penduduk LEFT JOIN surat_ijin_keramaian ON surat_ijin_keramaian.nik = penduduk.nik WHERE surat_ijin_keramaian.status_surat='selesai'
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rt, penduduk.rw, surat_pengantar_catatan_kepolisian.no_surat, surat_pengantar_catatan_kepolisian.tanggal_surat, surat_pengantar_catatan_kepolisian.jenis_surat FROM penduduk LEFT JOIN surat_pengantar_catatan_kepolisian ON surat_pengantar_catatan_kepolisian.nik = penduduk.nik WHERE surat_pengantar_catatan_kepolisian.status_surat='selesai' ORDER BY tanggal_surat";
      } else if ($filter == '2') {
        $tgl = date('d-m-y', strtotime($_GET['tanggal']));
        echo '
          <div class="header">
            <div align="center" style="font-size: 12pt;"><b>Laporan Surat Administrasi Desa - Surat Keluar Desa Nusajati</b></div>
            <div align="center" style="font-size: 12pt;"><b>Tanggal ' . $tgl . '</b></div>
            <hr>
          </div><br>
        ';

        $query = "SELECT penduduk.nama, penduduk.desa, penduduk.rw, penduduk.rt, surat_keterangan.no_surat, surat_keterangan.tanggal_surat, surat_keterangan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan ON surat_keterangan.nik = penduduk.nik WHERE surat_keterangan.status_surat='selesai' AND DATE(surat_keterangan.tanggal_surat)='{$_GET['tanggal']}'
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rw, penduduk.rt, surat_pengantar_umum.no_surat, surat_pengantar_umum.tanggal_surat, surat_pengantar_umum.jenis_surat FROM penduduk LEFT JOIN surat_pengantar_umum ON surat_pengantar_umum.nik = penduduk.nik WHERE surat_pengantar_umum.status_surat='selesai' AND DATE(surat_pengantar_umum.tanggal_surat)='{$_GET['tanggal']}'
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rw, penduduk.rt, surat_keterangan_domisili_tempat_tinggal.no_surat, surat_keterangan_domisili_tempat_tinggal.tanggal_surat, surat_keterangan_domisili_tempat_tinggal.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_domisili_tempat_tinggal ON surat_keterangan_domisili_tempat_tinggal.nik = penduduk.nik WHERE surat_keterangan_domisili_tempat_tinggal.status_surat='selesai' AND DATE(surat_keterangan_domisili_tempat_tinggal.tanggal_surat)='{$_GET['tanggal']}'
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rw, penduduk.rt, surat_keterangan_domisili_usaha.no_surat, surat_keterangan_domisili_usaha.tanggal_surat, surat_keterangan_domisili_usaha.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_domisili_usaha ON surat_keterangan_domisili_usaha.nik = penduduk.nik WHERE surat_keterangan_domisili_usaha.status_surat='selesai' AND DATE(surat_keterangan_domisili_usaha.tanggal_surat)='{$_GET['tanggal']}'
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rw, penduduk.rt, surat_keterangan_tidak_mampu.no_surat, surat_keterangan_tidak_mampu.tanggal_surat, surat_keterangan_tidak_mampu.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_tidak_mampu ON surat_keterangan_tidak_mampu.nik = penduduk.nik WHERE surat_keterangan_tidak_mampu.status_surat='selesai' AND DATE(surat_keterangan_tidak_mampu.tanggal_surat)='{$_GET['tanggal']}'
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rw, penduduk.rt, surat_keterangan_usaha.no_surat, surat_keterangan_usaha.tanggal_surat, surat_keterangan_usaha.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_usaha ON surat_keterangan_usaha.nik = penduduk.nik WHERE surat_keterangan_usaha.status_surat='selesai' AND DATE(surat_keterangan_usaha.tanggal_surat)='{$_GET['tanggal']}'
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rw, penduduk.rt, surat_ijin_keramaian.no_surat, surat_ijin_keramaian.tanggal_surat, surat_ijin_keramaian.jenis_surat FROM penduduk LEFT JOIN surat_ijin_keramaian ON surat_ijin_keramaian.nik = penduduk.nik WHERE surat_ijin_keramaian.status_surat='selesai' AND DATE(surat_ijin_keramaian.tanggal_surat)='{$_GET['tanggal']}'
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rw, penduduk.rt, surat_pengantar_catatan_kepolisian.no_surat, surat_pengantar_catatan_kepolisian.tanggal_surat, surat_pengantar_catatan_kepolisian.jenis_surat FROM penduduk LEFT JOIN surat_pengantar_catatan_kepolisian ON surat_pengantar_catatan_kepolisian.nik = penduduk.nik WHERE surat_pengantar_catatan_kepolisian.status_surat='selesai' AND DATE(surat_pengantar_catatan_kepolisian.tanggal_surat)='{$_GET['tanggal']}' ORDER BY tanggal_surat";
      } else if ($filter == '3') {
        $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        echo '
          <div class="header">
            <div align="center" style="font-size: 12pt;"><b>Laporan Surat Administrasi Desa - Surat Keluar Desa Nusajati</b></div>
            <div align="center" style="font-size: 12pt;"><b>Bulan ' . $nama_bulan[$_GET['bulan']] . ' ' . $_GET['tahun'] . '</b></div>
            <hr>
          </div><br>
        ';

        $query = "SELECT penduduk.nama, penduduk.desa, penduduk.rw, penduduk.rt, surat_keterangan.no_surat, surat_keterangan.tanggal_surat, surat_keterangan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan ON surat_keterangan.nik = penduduk.nik WHERE surat_keterangan.status_surat='selesai' AND MONTH(surat_keterangan.tanggal_surat)='{$_GET['bulan']}' AND YEAR(surat_keterangan.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rw, penduduk.rt, surat_pengantar_umum.no_surat, surat_pengantar_umum.tanggal_surat, surat_pengantar_umum.jenis_surat FROM penduduk LEFT JOIN surat_pengantar_umum ON surat_pengantar_umum.nik = penduduk.nik WHERE surat_pengantar_umum.status_surat='selesai' AND MONTH(surat_pengantar_umum.tanggal_surat)='{$_GET['bulan']}' AND YEAR(surat_pengantar_umum.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rw, penduduk.rt, surat_keterangan_domisili_tempat_tinggal.no_surat, surat_keterangan_domisili_tempat_tinggal.tanggal_surat, surat_keterangan_domisili_tempat_tinggal.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_domisili_tempat_tinggal ON surat_keterangan_domisili_tempat_tinggal.nik = penduduk.nik WHERE surat_keterangan_domisili_tempat_tinggal.status_surat='selesai' AND MONTH(surat_keterangan_domisili_tempat_tinggal.tanggal_surat)='{$_GET['bulan']}' AND YEAR(surat_keterangan_domisili_tempat_tinggal.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rw, penduduk.rt, surat_keterangan_domisili_usaha.no_surat, surat_keterangan_domisili_usaha.tanggal_surat, surat_keterangan_domisili_usaha.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_domisili_usaha ON surat_keterangan_domisili_usaha.nik = penduduk.nik WHERE surat_keterangan_domisili_usaha.status_surat='selesai' AND MONTH(surat_keterangan_domisili_usaha.tanggal_surat)='{$_GET['bulan']}' AND YEAR(surat_keterangan_domisili_usaha.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rw, penduduk.rt, surat_keterangan_tidak_mampu.no_surat, surat_keterangan_tidak_mampu.tanggal_surat, surat_keterangan_tidak_mampu.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_tidak_mampu ON surat_keterangan_tidak_mampu.nik = penduduk.nik WHERE surat_keterangan_tidak_mampu.status_surat='selesai' AND MONTH(surat_keterangan_tidak_mampu.tanggal_surat)='{$_GET['bulan']}' AND YEAR(surat_keterangan_tidak_mampu.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rw, penduduk.rt, surat_keterangan_usaha.no_surat, surat_keterangan_usaha.tanggal_surat, surat_keterangan_usaha.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_usaha ON surat_keterangan_usaha.nik = penduduk.nik WHERE surat_keterangan_usaha.status_surat='selesai' AND MONTH(surat_keterangan_usaha.tanggal_surat)='{$_GET['bulan']}' AND YEAR(surat_keterangan_usaha.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rw, penduduk.rt, surat_ijin_keramaian.no_surat, surat_ijin_keramaian.tanggal_surat, surat_ijin_keramaian.jenis_surat FROM penduduk LEFT JOIN surat_ijin_keramaian ON surat_ijin_keramaian.nik = penduduk.nik WHERE surat_ijin_keramaian.status_surat='selesai' AND MONTH(surat_ijin_keramaian.tanggal_surat)='{$_GET['bulan']}' AND YEAR(surat_ijin_keramaian.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rw, penduduk.rt, surat_pengantar_catatan_kepolisian.no_surat, surat_pengantar_catatan_kepolisian.tanggal_surat, surat_pengantar_catatan_kepolisian.jenis_surat FROM penduduk LEFT JOIN surat_pengantar_catatan_kepolisian ON surat_pengantar_catatan_kepolisian.nik = penduduk.nik WHERE surat_pengantar_catatan_kepolisian.status_surat='selesai' AND MONTH(surat_pengantar_catatan_kepolisian.tanggal_surat)='{$_GET['bulan']}' AND YEAR(surat_pengantar_catatan_kepolisian.tanggal_surat)='{$_GET['tahun']}' ORDER BY tanggal_surat";
      } else if ($filter == '4') {
        echo '
          <div class="header">
            <div align="center" style="font-size: 12pt;"><b>Laporan Surat Administrasi Desa - Surat Keluar Desa Nusajati</b></div>
            <div align="center" style="font-size: 12pt;"><b>Tahun ' . $_GET['tahun'] . '</b></div>
            <hr>
          </div><br>
        ';

        $query = "SELECT penduduk.nama, penduduk.desa, penduduk.rw, penduduk.rt, surat_keterangan.no_surat, surat_keterangan.tanggal_surat, surat_keterangan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan ON surat_keterangan.nik = penduduk.nik WHERE surat_keterangan.status_surat='selesai' AND YEAR(surat_keterangan.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rw, penduduk.rt, surat_pengantar_umum.no_surat, surat_pengantar_umum.tanggal_surat, surat_pengantar_umum.jenis_surat FROM penduduk LEFT JOIN surat_pengantar_umum ON surat_pengantar_umum.nik = penduduk.nik WHERE surat_pengantar_umum.status_surat='selesai' AND YEAR(surat_pengantar_umum.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rw, penduduk.rt, surat_keterangan_domisili_tempat_tinggal.no_surat, surat_keterangan_domisili_tempat_tinggal.tanggal_surat, surat_keterangan_domisili_tempat_tinggal.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_domisili_tempat_tinggal ON surat_keterangan_domisili_tempat_tinggal.nik = penduduk.nik WHERE surat_keterangan_domisili_tempat_tinggal.status_surat='selesai' AND YEAR(surat_keterangan_domisili_tempat_tinggal.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rw, penduduk.rt, surat_keterangan_domisili_usaha.no_surat, surat_keterangan_domisili_usaha.tanggal_surat, surat_keterangan_domisili_usaha.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_domisili_usaha ON surat_keterangan_domisili_usaha.nik = penduduk.nik WHERE surat_keterangan_domisili_usaha.status_surat='selesai' AND YEAR(surat_keterangan_domisili_usaha.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rw, penduduk.rt, surat_keterangan_tidak_mampu.no_surat, surat_keterangan_tidak_mampu.tanggal_surat, surat_keterangan_tidak_mampu.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_tidak_mampu ON surat_keterangan_tidak_mampu.nik = penduduk.nik WHERE surat_keterangan_tidak_mampu.status_surat='selesai' AND YEAR(surat_keterangan_tidak_mampu.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rw, penduduk.rt, surat_keterangan_usaha.no_surat, surat_keterangan_usaha.tanggal_surat, surat_keterangan_usaha.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_usaha ON surat_keterangan_usaha.nik = penduduk.nik WHERE surat_keterangan_usaha.status_surat='selesai' AND YEAR(surat_keterangan_usaha.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rw, penduduk.rt, surat_ijin_keramaian.no_surat, surat_ijin_keramaian.tanggal_surat, surat_ijin_keramaian.jenis_surat FROM penduduk LEFT JOIN surat_ijin_keramaian ON surat_ijin_keramaian.nik = penduduk.nik WHERE surat_ijin_keramaian.status_surat='selesai' AND YEAR(surat_ijin_keramaian.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.desa, penduduk.rw, penduduk.rt, surat_pengantar_catatan_kepolisian.no_surat, surat_pengantar_catatan_kepolisian.tanggal_surat, surat_pengantar_catatan_kepolisian.jenis_surat FROM penduduk LEFT JOIN surat_pengantar_catatan_kepolisian ON surat_pengantar_catatan_kepolisian.nik = penduduk.nik WHERE surat_pengantar_catatan_kepolisian.status_surat='selesai' AND YEAR(surat_pengantar_catatan_kepolisian.tanggal_surat)='{$_GET['tahun']}' ORDER BY tanggal_surat";
      }
    } else {
      echo '
          <div class="header">
            <div align="center" style="font-size: 12pt;"><b>Laporan Surat Administrasi Desa - Surat Keluar Desa Nusajati</b></div>
            <hr>
          </div><br>
        ';
      $query = "SELECT penduduk.nama, penduduk.desa, penduduk.rt, penduduk.rw, surat_keterangan.no_surat, surat_keterangan.tanggal_surat, surat_keterangan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan ON surat_keterangan.nik = penduduk.nik WHERE surat_keterangan.status_surat='selesai'
        UNION SELECT penduduk.nama, penduduk.desa, penduduk.rt, penduduk.rw, surat_pengantar_umum.no_surat, surat_pengantar_umum.tanggal_surat, surat_pengantar_umum.jenis_surat FROM penduduk LEFT JOIN surat_pengantar_umum ON surat_pengantar_umum.nik = penduduk.nik WHERE surat_pengantar_umum.status_surat='selesai' 
        UNION SELECT penduduk.nama, penduduk.desa, penduduk.rt, penduduk.rw, surat_keterangan_domisili_tempat_tinggal.no_surat, surat_keterangan_domisili_tempat_tinggal.tanggal_surat, surat_keterangan_domisili_tempat_tinggal.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_domisili_tempat_tinggal ON surat_keterangan_domisili_tempat_tinggal.nik = penduduk.nik WHERE surat_keterangan_domisili_tempat_tinggal.status_surat='selesai' 
        UNION SELECT penduduk.nama, penduduk.desa, penduduk.rt, penduduk.rw, surat_keterangan_domisili_usaha.no_surat, surat_keterangan_domisili_usaha.tanggal_surat, surat_keterangan_domisili_usaha.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_domisili_usaha ON surat_keterangan_domisili_usaha.nik = penduduk.nik WHERE surat_keterangan_domisili_usaha.status_surat='selesai'
        UNION SELECT penduduk.nama, penduduk.desa, penduduk.rt, penduduk.rw, surat_keterangan_tidak_mampu.no_surat, surat_keterangan_tidak_mampu.tanggal_surat, surat_keterangan_tidak_mampu.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_tidak_mampu ON surat_keterangan_tidak_mampu.nik = penduduk.nik WHERE surat_keterangan_tidak_mampu.status_surat='selesai'
        UNION SELECT penduduk.nama, penduduk.desa, penduduk.rt, penduduk.rw, surat_keterangan_usaha.no_surat, surat_keterangan_usaha.tanggal_surat, surat_keterangan_usaha.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_usaha ON surat_keterangan_usaha.nik = penduduk.nik WHERE surat_keterangan_usaha.status_surat='selesai' 
        UNION SELECT penduduk.nama, penduduk.desa, penduduk.rt, penduduk.rw, surat_ijin_keramaian.no_surat, surat_ijin_keramaian.tanggal_surat, surat_ijin_keramaian.jenis_surat FROM penduduk LEFT JOIN surat_ijin_keramaian ON surat_ijin_keramaian.nik = penduduk.nik WHERE surat_ijin_keramaian.status_surat='selesai'
        UNION SELECT penduduk.nama, penduduk.desa, penduduk.rt, penduduk.rw, surat_pengantar_catatan_kepolisian.no_surat, surat_pengantar_catatan_kepolisian.tanggal_surat, surat_pengantar_catatan_kepolisian.jenis_surat FROM penduduk LEFT JOIN surat_pengantar_catatan_kepolisian ON surat_pengantar_catatan_kepolisian.nik = penduduk.nik WHERE surat_pengantar_catatan_kepolisian.status_surat='selesai' ORDER BY tanggal_surat";
    }
    ?>
    <table width="100%" border="1" cellpadding="5" style="border-collapse:collapse;">
      <tr>
        <th>No. Surat</th>
        <th>Tanggal</th>
        <th>Nama</th>
        <th>Jenis Surat</th>
        <th>Alamat</th>
      </tr>
      <?php
      $sql = mysqli_query($connect, $query);
      $row = mysqli_num_rows($sql);
      if ($row > 0) {
        while ($data = mysqli_fetch_assoc($sql)) {
          $tgl = date('d-m-Y', strtotime($data['tanggal_surat']));
          echo "<tr>";
          echo "<td>" . $data['no_surat'] . "</td>";
          echo "<td>" . $tgl . "</td>";
          echo "<td>" . $data['nama'] . "</td>";
          echo "<td>" . $data['jenis_surat'] . "</td>";
          echo "<td>Desa " . $data['desa'] . ", RT." . $data['rt'] . "/RW." . $data['rw'] . "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='5'>Data tidak ditemukan.</td></tr>";
      }
      ?>
    </table>
    <script>
      window.print();
    </script>
  </body>

  </html>
<?php
?>