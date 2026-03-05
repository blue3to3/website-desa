<?php

/* ================= TOTAL ================= */
$total=mysqli_fetch_assoc(mysqli_query($connect,"SELECT COUNT(*) t FROM penduduk"))['t'];

$totalKK = mysqli_fetch_assoc(
    mysqli_query($connect, "SELECT COUNT(DISTINCT no_kk) as total FROM penduduk")
)['total'];

/* ================= JK ================= */
$jk=['Laki-laki'=>0,'Perempuan'=>0];
$q=mysqli_query($connect,"SELECT jenis_kelamin,COUNT(*) t FROM penduduk GROUP BY jenis_kelamin");
while($r=mysqli_fetch_assoc($q))$jk[$r['jenis_kelamin']]=$r['t'];

/* ================= AGAMA ================= */
$agama=[];$agamaVal=[];
$q=mysqli_query($connect,"SELECT agama,COUNT(*) t FROM penduduk GROUP BY agama");
while($r=mysqli_fetch_assoc($q)){ $agama[]=$r['agama'];$agamaVal[]=$r['t']; }

/* ================= PEKERJAAN ================= */
$pek=[];$pekVal=[];
$q=mysqli_query($connect,"SELECT pekerjaan,COUNT(*) t FROM penduduk GROUP BY pekerjaan");
while($r=mysqli_fetch_assoc($q)){ $pek[]=$r['pekerjaan'];$pekVal[]=$r['t']; }

/* ================= UMUR ================= */
$umur=[
'Anak'=>0,
'Remaja'=>0,
'Dewasa'=>0,
'Lansia'=>0
];

$q=mysqli_query($connect,"SELECT tgl_lahir FROM penduduk");

while($r=mysqli_fetch_assoc($q)){
$age=date_diff(date_create($r['tgl_lahir']),date_create('today'))->y;

if($age<=12)$umur['Anak']++;
elseif($age<=17)$umur['Remaja']++;
elseif($age<=59)$umur['Dewasa']++;
else $umur['Lansia']++;
}

/* ================= PERTUMBUHAN ================= */
/* pakai tahun lahir sebagai estimasi sederhana */
$tahun=[];$tahunVal=[];
$q=mysqli_query($connect,"
SELECT YEAR(tgl_lahir) th,COUNT(*) t 
FROM penduduk GROUP BY YEAR(tgl_lahir) ORDER BY th
");
while($r=mysqli_fetch_assoc($q)){ $tahun[]=$r['th'];$tahunVal[]=$r['t']; }
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard Statistik Penduduk</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
body{font-family:system-ui;background:#f5f6fa}
.grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:20px;padding:20px}
.card{background:#fff;padding:20px;border-radius:16px;box-shadow:0 10px 30px rgba(0,0,0,.08)}
.kpi{font-size:48px;font-weight:bold;color:#0d6efd}
</style>
</head>
<body> 

<section style="text-align:center;padding:60px 20px">
    <h1 style="color:#1f6f43;font-weight:700">Statistik Penduduk</h1>
    <p style="color:#6b7280">Data demografi warga Desa Nusajati</p>
    <div style="width:80px;height:4px;background:#f4b400;margin:12px auto;border-radius:4px"></div>
</section>

<div class="grid-kpi text-center">

<div class="kpi-card">
<h5 style="font-size:20px; font-weight:bold; color:#198754;">Total Penduduk</h5>
<div class="kpi-big"><?= number_format($total) ?></div>
<span >Jiwa</span>
</div>

<div class="kpi-card">
<h5 style="font-size:20px; font-weight:bold; color:#198754;">Laki-laki</h5>
<div class="kpi-big"><?= $jk['Laki-laki'] ?></div>
<span>Jiwa</span>
</div>

<div class="kpi-card">
<h5 style="font-size:20px; font-weight:bold; color:#198754;">Perempuan</h5>
<div class="kpi-big"><?= $jk['Perempuan'] ?></div>
<span>Jiwa</span>
</div>

<div class="kpi-card">
<h5 style="font-size:20px; font-weight:bold; color:#198754;">Total Kepala Keluarga</h5>
<div class="kpi-big"><?= $totalKK ?></div>
<span>Jiwa</span>
</div>

</div>

<div class="grid">
<div class="card"><canvas id="jk"></canvas></div>
<div class="card"><canvas id="agama"></canvas></div>
<div class="card"><canvas id="pek"></canvas></div>
<div class="card"><canvas id="umur"></canvas></div>
<div class="card" style="grid-column:span 2"><canvas id="trend"></canvas></div>

<script>
const warna=['#0d6efd','#f06292','#4caf50','#ff9800','#9c27b0','#00bcd4','#ffc107'];

/* JK */
new Chart(jk,{type:'doughnut',
data:{labels:['Laki-laki','Perempuan'],
datasets:[{data:[<?= $jk['Laki-laki']?>,<?= $jk['Perempuan']?>],backgroundColor:warna}]},
options:{plugins:{title:{display:true,text:'Jenis Kelamin'}}}});

/* AGAMA */
new Chart(agama,{type:'bar',
data:{labels:<?=json_encode($agama)?>,
datasets:[{data:<?=json_encode($agamaVal)?>,backgroundColor:warna}]},
options:{plugins:{title:{display:true,text:'Agama'}}}});

/* PEKERJAAN */
new Chart(pek,{type:'bar',
data:{labels:<?=json_encode($pek)?>,
datasets:[{data:<?=json_encode($pekVal)?>,backgroundColor:warna}]},
options:{plugins:{title:{display:true,text:'Pekerjaan'}}}});

/* UMUR */
new Chart(umur,{
type:'pie',
data:{
labels:[
'Anak (0-12)',
'Remaja (13-17)',
'Dewasa (18-59)',
'Lansia (60+)'
],
datasets:[{
data:[
<?= $umur['Anak']?>,
<?= $umur['Remaja']?>,
<?= $umur['Dewasa']?>,
<?= $umur['Lansia']?>
],
backgroundColor:warna
}]
},
options:{
plugins:{
title:{
display:true,
text:'Kategori Umur Penduduk'
}
}
}
});

/* TREND */
new Chart(trend,{type:'line',
data:{labels:<?=json_encode($tahun)?>,
datasets:[{label:'Jumlah Penduduk',
data:<?=json_encode($tahunVal)?>,
borderColor:'#0d6efd',
fill:false}]},
options:{plugins:{title:{display:true,text:'Pertumbuhan Penduduk'}}}});
</script>

<style>
    .grid-kpi{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
gap:20px;
margin:20px;
}

.kpi-card{
background:#fff;
padding:20px;
border-radius:16px;
box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.kpi-big{
font-size:40px;
font-weight:700;
color:#0d6efd;
}
</style>
</div>

</body>
</html>

