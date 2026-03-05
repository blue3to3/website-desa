<?php
include('../../config/koneksi.php');

// ob_start() digunakan untuk mencegah iklan/HTML dari InfinityFree merusak JSON
ob_start();

// Tangkap parameter dari DataTables
$draw   = isset($_POST['draw']) ? intval($_POST['draw']) : 1;
$start  = isset($_POST['start']) ? intval($_POST['start']) : 0;
$length = isset($_POST['length']) ? intval($_POST['length']) : 10;
$search = isset($_POST['search']['value']) ? $_POST['search']['value'] : '';

// 1. Hitung total data asli
$qTotal = mysqli_query($connect, "SELECT COUNT(*) as total FROM penduduk");
$rTotal = mysqli_fetch_assoc($qTotal);
$totalData = $rTotal['total'];

// 2. Query dasar
$sql = "SELECT * FROM penduduk WHERE 1=1";

// 3. Logika Pencarian (Search)
if (!empty($search)) {
    $sql .= " AND (nama LIKE '%$search%' OR nik LIKE '%$search%' OR no_kk LIKE '%$search%')";
}

// 4. Hitung total setelah difilter
$qFilter = mysqli_query($connect, $sql);
$totalFiltered = mysqli_num_rows($qFilter);

// 5. Ambil data dengan LIMIT (Paging)
$sql .= " ORDER BY id_penduduk DESC LIMIT $start, $length";
$qData = mysqli_query($connect, $sql);

$data = array();
$bulanIndo = array(
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

while ($row = mysqli_fetch_assoc($qData)) {
    $tgl = date('d', strtotime($row['tgl_lahir']));
    $bln = date('F', strtotime($row['tgl_lahir']));
    $thn = date('Y', strtotime($row['tgl_lahir']));
    $ttl = ucwords($row['tempat_lahir']) . ", " . $tgl . " " . $bulanIndo[$bln] . " " . $thn;
    $alamat = "RT." . $row['rt'] . "/RW." . $row['rw'];

    $aksi = "<a class='btn btn-success btn-xs' href='edit-penduduk.php?id=" . $row['id_penduduk'] . "'><i class='fa fa-edit'></i></a>
             <a class='btn btn-danger btn-xs' href='hapus-penduduk.php?id=" . $row['id_penduduk'] . "' onclick='return confirm(\"Hapus?\")'><i class='fa fa-trash'></i></a>";

    // Susun baris tabel sesuai urutan <th> di HTML
    $data[] = array(
        "", // Kolom Nomor (diisi otomatis oleh JS)
        $row['nik'],
        $row['nama'],
        $row['no_kk'],
        $ttl,
        $row['jenis_kelamin'],
        $row['agama'],
        $row['pend_terakhir'],
        $row['pekerjaan'],
        $alamat,
        $row['status_perkawinan'],
        $row['kewarganegaraan'],
        $row['no_hp'],
        $aksi
    );
}

// Selesai, kirim JSON murni
ob_end_clean();
header('Content-Type: application/json');
echo json_encode(array(
    "draw"            => $draw,
    "recordsTotal"    => intval($totalData),
    "recordsFiltered" => intval($totalFiltered),
    "data"            => $data
));
exit();