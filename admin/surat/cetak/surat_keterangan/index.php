<?php
include('../../permintaan_surat/konfirmasi/part/akses.php');
include('../../../../config/koneksi.php');

$id = mysqli_real_escape_string($connect, $_GET['id']);
$qCek = mysqli_query($connect, "
    SELECT penduduk.*, surat_keterangan.* 
    FROM penduduk 
    LEFT JOIN surat_keterangan ON surat_keterangan.nik = penduduk.nik 
    WHERE surat_keterangan.id_sk='$id'
");

if (!$qCek) {
    die("Query Error: " . mysqli_error($connect));
}

if (mysqli_num_rows($qCek) == 0) {
    die("Data surat tidak ditemukan.");
}

$row = mysqli_fetch_array($qCek);

/* ================= DESA ================= */
$qTampilDesa = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id='1'");
$rows = mysqli_fetch_array($qTampilDesa);

/* ================= PEJABAT ================= */
$id_pejabat_desa = $row['id_pejabat_desa'];
$qCekPejabatDesa = mysqli_query($connect, "SELECT * FROM pejabat_desa WHERE id_pejabat_desa='$id_pejabat_desa'");

if (!$qCekPejabatDesa) {
    die("Query Pejabat Error: " . mysqli_error($connect));
}

$pejabatDesa = mysqli_fetch_assoc($qCekPejabatDesa);
$rowss = $pejabatDesa; 
?>

<html>

<head>
    <link rel="shortcut icon" href="../../../../assets/img/logo-desa.png">
    <title>CETAK SURAT</title>
    <link href="../../../../assets/formsuratCSS/formsurat.css" rel="stylesheet" type="text/css" />
    <style type="text/css" media="print">
        .surat{
        width:210mm;
        padding:20mm 20mm;
        margin:auto;
        background:white;
        font-family:"Times New Roman", serif;
        line-height:1.5;
        }

        p{ text-align:justify; margin:0 0 10px; }

        .signature-section{
            margin-top:40px;
            page-break-inside: avoid;
            break-inside: avoid;
        }

        .signature-section table{
            width:100%;
        }

        .signature-section tr,
        .signature-section td{
            page-break-inside: avoid;
            break-inside: avoid;
        }

        .ol-surat {
            padding-left: 40px;      /* jarak angka dari kiri */
            margin: 0;
        }

        .ol-surat li {
            text-align: justify;
            margin-bottom: 8px;
        }

        @page{
        size:A4;
        margin:0;
        }

        @media print{
        body{margin:0;}
        .surat{box-shadow:none;}
        .signature-section{
            page-break-inside: avoid;
            break-inside: avoid;
        }
        }

    </style>
</head>

<body>
    <div class="surat">
        <div style="
        position:relative;
        text-align:center;
        border-bottom:3px double #000;
        padding-bottom:10px;
        margin-bottom:20px;
        ">

        <!-- logo kiri -->
        <img src="../../../../assets/img/logo-desa.png"
        style="
        position:absolute;
        left:20;
        top:5;
        width:110px;
        ">

        <div style="font-weight:bold;font-size:18px;text-transform:uppercase;">
        PEMERINTAH KABUPATEN <?= $rows['kabupaten']; ?> 
        </div>

        <div style="font-weight:bold;font-size:18px;text-transform:uppercase;">
        KECAMATAN <?= $rows['kecamatan']; ?> 
        </div>

        <div style="font-weight:bold;font-size:24px;margin:3px 0;text-transform:uppercase;">
        DESA <?= $rows['nama_desa']; ?>
        </div>

        <div style="font-size:13px;">
            JL PROTOKOL RT 002 RW 05 NO 41
        </div>

        </div>
        <div align="center"><u>
            <h4 class="kop">SURAT KETERANGAN</h4>
            </u></div>
        <div align="center">
            <h4 class="kop3">Nomor :&nbsp;&nbsp;&nbsp;<?php echo $row['no_surat']; ?></h4>
        </div>
        <br>
        <div class="clear"></div>
        <div id="isi3">
            <table width="100%">
                <tr>
                    <td class="indentasi">Yang bertanda tangan di bawah ini kami <a
                            style="text-transform: capitalize;"><?php echo $rowss['jabatan'] . " " . $rows['nama_desa']; ?>,
                            <?php echo "Kecamatan " . $rows['kecamatan']; ?>,
                            <?php echo "Kabupaten " . $rows['kabupaten']; ?>
                            <?php echo "Provinsi " . $rows['provinsi']; ?></a>, menerangkan bahwa :
                    </td>
                </tr>
            </table>
            <br><br>
            <table width="100%" style="text-transform: capitalize;">
                <tr>
                    <td width="30%" class="indentasi">Nama</td>
                    <td width="2%">:</td>
                    <td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nama']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="indentasi">Jenis kelamin</td>
                    <td>:</td>
                    <td><?php echo $row['jenis_kelamin']; ?></td>
                </tr>
                <?php
                $timestamp = strtotime($row['tgl_lahir']);
                $blnIndo = array(
                    'January' => 'Januari',
                    'February' => 'Februari',
                    'March' => 'Maret',
                    'April' => 'April',
                    'May' => 'Mei',
                    'June' => 'Juni',
                    'July' => 'Juli',
                    'August' => 'Agustus',
                    'September' => 'September',
                    'October' => 'Oktober',
                    'November' => 'November',
                    'December' => 'Desember'
                );
                ?>
                <tr>
                    <td class="indentasi">Tempat dan tanggal lahir</td>
                    <td>:</td>
                    <td><?php echo $row['tempat_lahir'] . ", " . date('d', $timestamp) . " " . $blnIndo[date('F', $timestamp)] . " " . date('Y', $timestamp); ?>
                    </td>
                </tr>
                <tr>
                    <td class="indentasi">Kewarganegaraan</td>
                    <td>:</td>
                    <td style="text-transform: uppercase;"><?php echo $row['kewarganegaraan']; ?></td>
                </tr>
                <tr>
                    <td class="indentasi">Agama</td>
                    <td>:</td>
                    <td><?php echo $row['agama']; ?></td>
                </tr>
                <tr>
                    <td class="indentasi">Pekerjaan</td>
                    <td>:</td>
                    <td><?php echo $row['pekerjaan']; ?></td>
                </tr>
                <tr>
                    <td class="indentasi">Tempat tinggal</td>
                    <td>:</td>
                    <td><?php echo "RT." . $row['rt'] . "/RW." . $row['rw'] . ", Desa " . $row['desa'] . ", Kecamatan " . $row['kecamatan'] . ", Kabupaten " . $row['kota']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="indentasi">Surat bukti diri</td>
                    <td>:</td>
                    <td>NIK. <?php echo $row['nik']; ?>
                    <br>
                    No KK. <?php echo $row['no_kk']; ?>
                    </td>
                </tr>
                
                <tr>
                    <td class="indentasi">Keperluan</td>
                    <td>:</td>
                    <td style="text-transform: capitalize;"><?php echo $row['keperluan']; ?></td>
                </tr>
                <tr>
                    <td class="indentasi">Masa Berlaku</td>
                    <td>:</td>
                    <td><?php echo $row['masa_berlaku']; ?></td>
                </tr>
                <tr>
                    <td class="indentasi">Keterangan Lain</td>
                    <td>:</td>
                    <td><?php echo $row['keterangan']; ?></td>
                </tr>
            </table>
            <br><br>
            <table width="100%">
                <tr>
                    <td class="indentasi">Demikian untuk menjadikan maklum bagi yang berkepentingan.</td>
                </tr>
            </table>
        </div>
        <div class="signature-wrapper">
            <div class="signature-section" style="margin-top: 50px;">
                
                <table style="width: 100%; border: none;">
                    <tr>
                        <td style="width: 10%;">
                        <td style="width: 50%; text-align: center; vertical-align: bottom;">
                            <p>Pemohon,</p>

                            <div style="height: 110px;"></div>

                            <p style="text-decoration: underline; font-weight: bold; margin:0; height: 180px;">
                                <?php echo $row['nama']; ?>
                            </p>
                        </td>

                        <td style="width: 40%; text-align: center; vertical-align: bottom;">
                            <p style="margin-top:-25px; margin-bottom:5px;">
                                <?php echo $rows['nama_desa']; ?>,
                                <?php
                                $ts = strtotime($row['tanggal_dibuat']);

                                $bulanIndo = [
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

                                echo date('d ', $ts) . $bulanIndo[date('F',$ts)] . date(' Y',$ts);
                                ?>
                                <br>
                                <?php echo $rowss['jabatan'] . " " . $rows['nama_desa']; ?>
                            </p>

                            <div style="position: relative; width: 220px; height: 130px; margin: 0 auto;">

                                <img src="../../../../assets/img/cap-desa.png"
                                    style="
                                        position:absolute;
                                        width:150px;
                                        left:-30%;
                                        top:-20px;
                                        transform:translateX(-50%);
                                        opacity:0.8;
                                    ">

                                    <img src="../../../../assets/ttd/<?= $pejabatDesa['ttd']; ?>"
                                    style="
                                        position:absolute;
                                        width:160px;
                                        left:15%;
                                        top:0px;
                                        transform:translateX(-50%);
                                    ">
                            </div>

                            <p style="
                                text-decoration: underline;
                                font-weight: bold;
                                margin: 0;
                                height: 180px;
                            ">
                                <?php echo $rowss['nama_pejabat']; ?>
                            </p>

                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>

<?php
