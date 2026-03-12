<?php
include('../../config/koneksi.php');

$filename = "Data_Penduduk_Nusajati_" . date('d-m-Y') . ".xls";

// Header agar browser mengenali ini sebagai Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Pragma: no-cache");
header("Expires: 0");
?>

<style>
/* CSS khusus agar NIK dan KK dianggap sebagai teks oleh Excel */
.str {
    mso-number-format: "\@";
}
</style>

<table border="1">
    <thead>
        <tr>
            <th bgcolor="#D3D3D3">No</th>
            <th bgcolor="#D3D3D3">NIK</th>
            <th bgcolor="#D3D3D3">Nama</th>
            <th bgcolor="#D3D3D3">No KK</th>
            <th bgcolor="#D3D3D3">Tempat Lahir</th>
            <th bgcolor="#D3D3D3">Tanggal Lahir</th>
            <th bgcolor="#D3D3D3">Jenis Kelamin</th>
            <th bgcolor="#D3D3D3">Agama</th>
            <th bgcolor="#D3D3D3">Pendidikan</th>
            <th bgcolor="#D3D3D3">Pekerjaan</th>
            <th bgcolor="#D3D3D3">Alamat</th>
            <th bgcolor="#D3D3D3">RT</th>
            <th bgcolor="#D3D3D3">RW</th>
            <th bgcolor="#D3D3D3">Desa</th>
            <th bgcolor="#D3D3D3">Kecamatan</th>
            <th bgcolor="#D3D3D3">Kota</th>
            <th bgcolor="#D3D3D3">Status</th>
            <th bgcolor="#D3D3D3">Kewarganegaraan</th>
            <th bgcolor="#D3D3D3">Nama Ayah</th>
            <th bgcolor="#D3D3D3">Nama Ibu</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $qTampil = mysqli_query($connect, "SELECT * FROM penduduk ORDER BY id_penduduk DESC");
        while ($row = mysqli_fetch_array($qTampil)) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <!-- Class "str" memaksa Excel menganggap kolom ini TEXT (NIK AMAN) -->
            <td class="str"><?php echo $row['nik']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td class="str"><?php echo $row['no_kk']; ?></td>
            <td><?php echo $row['tempat_lahir']; ?></td>
            <td><?php echo $row['tgl_lahir']; ?></td>
            <td><?php echo $row['jenis_kelamin']; ?></td>
            <td><?php echo $row['agama']; ?></td>
            <td><?php echo $row['pend_terakhir']; ?></td>
            <td><?php echo $row['pekerjaan']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><?php echo $row['rt']; ?></td>
            <td><?php echo $row['rw']; ?></td>
            <td><?php echo $row['desa']; ?></td>
            <td><?php echo $row['kecamatan']; ?></td>
            <td><?php echo $row['kota']; ?></td>
            <td><?php echo $row['status_perkawinan']; ?></td>
            <td><?php echo $row['kewarganegaraan']; ?></td>
            <td><?php echo $row['nama_ayah']; ?></td>
            <td><?php echo $row['nama_ibu']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>