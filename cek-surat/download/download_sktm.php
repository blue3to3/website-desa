<?php
include('../../config/koneksi.php');

if (!isset($_GET['kode']) || empty($_GET['kode'])) {
    die("Kode tracking tidak ditemukan.");
}

$kode = mysqli_real_escape_string($connect, $_GET['kode']);

$q = mysqli_query($connect, "
    SELECT penduduk.*, s.*, t.status_surat
    FROM tracking_surat t 
    JOIN surat_keterangan_tidak_mampu s ON t.id_surat = s.id_sktm 
    JOIN penduduk ON s.nik = penduduk.nik
    WHERE t.kode_tracking='$kode'
");

if (!$q) {
    die("Query Error: " . mysqli_error($connect));
}

$row = mysqli_fetch_assoc($q);

if (!$row) {
    die("Kode tracking tidak valid.");
}

if (strtoupper($row['status_surat']) != 'SELESAI') {
    die("Surat belum selesai diproses.");
}

$qTampilDesa = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id='1'");
$rows = mysqli_fetch_array($qTampilDesa);

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
    <link rel="shortcut icon" href="../../assets/img/logo-desa.png">
    <title>CETAK SURAT</title>
    <link href="../../assets/formsuratCSS/formsurat.css" rel="stylesheet" type="text/css" />
    <style>
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
        <div style="position:relative; text-align:center; border-bottom:3px double #000; padding-bottom:10px; margin-bottom:20px;">

            <!-- logo kiri -->
            <img src="../../assets/img/logo-desa.png"
            style="position:absolute; left:20; top:5; width:110px;">

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
                <?= $rows['alamat']; ?> Telp. <?= $rows['telepon']; ?>
            </div>

            <div style="font-size:13px;">
                Email: <?= $rows['email']; ?> Kode Pos <?= $rows['kode_pos']; ?>
            </div>
        </div>
        <div align="center"><u>
                <h4 class="kop">SURAT KETERANGAN TIDAK MAMPU</h4>
            </u></div>
        <div align="center">
            <h4 class="kop3">Nomor :&nbsp;&nbsp;&nbsp;<?php echo $row['no_surat']; ?></h4>
        </div>
        </table>
        <br>
        <div class="clear"></div>
        <div id="isi3" style="margin-top: 20px;">
            <table width="100%">
                <tr>
                    <td class="indentasi"> <a
                            style="text-transform: capitalize;"><?php echo $rowss['jabatan'] . " " . $rows['nama_desa']; ?>,
                            <?php echo "Kecamatan " . $rows['kecamatan']; ?>,
                            <?php echo "Kabupaten " . $rows['kabupaten']; ?>
                            </a>, dengan ini menerangkan bahwa warga Desa <?php echo $rows['nama_desa']; ?> :
                    </td>
                </tr>
            </table>
            <br><br>
            <table width="100%" style="margin-top: 15px;">
                <tr>
                    <td width="30%" class="indentasi">Nama Lengkap</td>
                    <td width="2%">:</td>
                    <td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nama']; ?>
                    </td>
                </tr>
                 <tr>
                    <td class="indentasi">Jenis Kelamin</td>
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
                    <td class="indentasi">Tempat/Tanggal Lahir</td>
                    <td>:</td>
                    <td><?php echo $row['tempat_lahir'] . ", " . date('d', $timestamp) . " " . $blnIndo[date('F', $timestamp)] . " " . date('Y', $timestamp); ?>
                    </td>
                </tr>
                <tr>
                    <td class="indentasi">Kewarganegaraan/Agama</td>
                    <td>:</td>
                    <td><?php echo $row['kewarganegaraan'] . "/" . $row['agama']; ?></td>
                </tr>
                  <tr>
                    <td class="indentasi">No. KTP/NIK</td>
                    <td>:</td>
                    <td><?php echo $row['nik']; ?></td>
                </tr>
                <tr>
                    <td class="indentasi">Pekerjaan</td>
                    <td>:</td>
                    <td><?php echo $row['pekerjaan']; ?></td>
                </tr>
                <tr>
                    <td class="indentasi">Alamat</td>
                    <td>:</td>
                    <td><?php echo "RT." . $row['rt'] . "/RW." . $row['rw'] . ", Desa " . $row['desa'] . ", Kecamatan " . $row['kecamatan'] . ", Kabupaten " . $row['kota']; ?>
                    </td>
                </tr>
            </table>
            <br>
            <table width="100%">
                <tr>
                    <td class="indentasi">Berdasarkan Surat Keterangan dari Ketua Rukun Tetangga
                        <?php echo $row['rt']; ?>, Bahwa yang bersangkutan betul warga Desa <?php echo $rows['nama_desa']; ?>
                        dan menurut pengakuan yang bersangkutan keadaan ekonominya <strong>TIDAK
                            MAMPU</strong>.
                    </td>
                </tr>
            </table>
            <table width="100%" style="margin-top: 15px;">
                <tr>
                    <td class="indentasi">Surat Keterangan ini diperlukan untuk
                    <span style="text-transform: uppercase;"><?php echo $row['keperluan']; ?></span>
                    </td>
                </tr>
            </table><br>
            <table width="100%">
                <tr>
                    <td class="indentasi">Demikian Surat Keterangan ini kami buat atas permintaan yang bersangkutan dan dapat digunakan
                        sebagaimana mestinya.</td>
                </tr>
            </table>
        </div>
        <br>
        <div class="signature-wrapper">
            <div class="signature-section" style="margin-top: 40px;">
                <table style="width: 100%; border: none;">
                    <tr>
                        <td style="width: 10%"></td>
                        <td style="width: 50%; text-align: center; vertical-align: bottom;">
                            <p style ="margin-top:-25px; margin-bottom:33px;">No. Reg : ..................</p>
                            <p style="margin-top:-25px; margin-bottom:32px;">Tanggal : ..................</p>
                            <p style="margin-top:-25px; margin-bottom:30px;">Mengetahui,</p>
                            <p style="margin-top:-25px; margin-bottom:15px;">Camat Sampang</p>

                            <div style="height: 110px;"></div>

                            <p style="text-decoration: underline; font-weight: bold; margin:0; height: 180px;">
                                (...............................)
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

                                <img src="../../assets/img/cap-desa.png"
                                    style="
                                        position:absolute;
                                        width:150px;
                                        left:-20%;
                                        top:-20px;
                                        transform:translateX(-50%);
                                        opacity:0.8;
                                    ">

                                    <img src="../../assets/ttd/<?= $pejabatDesa['ttd']; ?>"
                                    style="
                                        position:absolute;
                                        width:160px;
                                        left:30%;
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

?>