<?php
include('../part/akses.php');
include('../../../../../config/koneksi.php');
include('../part/header.php');

$id = $_GET['id'];
$qCek = mysqli_query($connect, "SELECT penduduk.*, surat_pengantar_catatan_kepolisian.* FROM penduduk LEFT JOIN surat_pengantar_catatan_kepolisian ON surat_pengantar_catatan_kepolisian.nik = penduduk.nik WHERE surat_pengantar_catatan_kepolisian.id_spck='$id'");
while ($row = mysqli_fetch_array($qCek)) {
?>

  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <?php
          if (isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')) {
            echo '<img src="../../../../../assets/img/ava-admin-female.png" class="img-circle" alt="User Image">';
          } else if (isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Kepala Desa')) {
            echo '<img src="../../../../../assets/img/ava-kades.png" class="img-circle" alt="User Image">';
          }
          ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['lvl']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="../../../../dashboard/">
            <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp; Dashboard</span>
          </a>
        </li>
        <li>
                <a href="../../../../profil_desa/">
                    <i class="fa fa-users"></i><span>&nbsp; Profil Desa</span>
                </a>
            </li>
          
            <li>
                <a href="../../../../pejabat/">
                    <i class="fa fa-users"></i><span>&nbsp; Data Pejabat</span>
                </a>
            </li>
            <li>
                <a href="../../../../struktur/">
                <i class="fa fa-sitemap"></i> <span>&nbsp;Struktur Organisasi</span>
                </a>
                </li>
        <li>
          <a href="../../../../penduduk/">
            <i class="fa fa-users"></i><span>&nbsp; Data Penduduk</span>
          </a>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fas fa-envelope-open-text"></i> <span>&nbsp;&nbsp; Layanan Surat</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="../../../permintaan_surat/">
                <i class="fa fa-circle-notch"></i> Permintaan Surat
              </a>
            </li>
            <li>
              <a href="../../../surat_selesai/"><i class="fa fa-circle-notch"></i> Surat Selesai
              </a>
            </li>
          </ul>
        </li>
        <li>
        <a href="../../../../apbdes/">
        <i class="fa fa-chart-pie"></i>
        <span>&nbsp;Info Grafis APBDes</span>
        </a>
        </li>
        <li><a href="../../../../berita/"><i class="fas fa-newspaper"></i> <span>&nbsp; Berita Desa</span></a></li>
        <li><a href="../../../../pengaduan/"><i class="fas fa-clipboard-list"></i> <span>&nbsp; Kritik & Saran</span></a></li>
        <li>
          <a href="../../../../laporan/">
            <i class="fas fa-chart-line"></i> <span>&nbsp;&nbsp; Laporan</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>&nbsp;</h1>
      <ol class="breadcrumb">
        <li><a href="../../../../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
        <li class="active"> Permintaan Surat</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h2 class="box-title"><i class="fas fa-envelope"></i> Konfirmasi Surat Pengantar Catatan
                Kepolisian</h2>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                    class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                    class="fa fa-remove"></i></button>
              </div>
            </div>
            <div class="box-body">
              <form class="form-horizontal" method="post" action="update-konfirmasi.php">
                <div class="row">
                  <div class="col-md-6">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Tanda Tangan</label>
                        <div class="col-sm-9">
                          <select name="ft_tangan" class="form-control"
                              style="text-transform: uppercase;" required>

                              <option value="">-- Pilih Tanda Tangan --</option>

                              <?php
                              $currentPejabatID = $row['id_pejabat_desa'];

                              $qTampilPejabat = "
                              SELECT * FROM pejabat_desa 
                              WHERE status='aktif' 
                              AND (
                                  LOWER(jabatan) LIKE '%kepala desa%' 
                                  OR LOWER(jabatan) LIKE '%sekretaris desa%'
                              )
                              ORDER BY jabatan ASC
                              ";

                              $tampilPejabat = mysqli_query($connect, $qTampilPejabat);

                              while ($rows = mysqli_fetch_assoc($tampilPejabat)) {

                                  $selected = ($rows['id_pejabat_desa'] == $currentPejabatID) ? "selected" : "";
                              ?>
                                  <option value="<?php echo $rows['id_pejabat_desa']; ?>" <?php echo $selected; ?>>
                                      <?php echo strtoupper($rows['jabatan']) . " (" . $rows['nama_pejabat'] . ")"; ?>
                                  </option>
                              <?php
                              }
                              ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">No. Surat</label>
                        <div class="col-sm-9">
                          <input type="text" name="fno_surat"
                            value="<?php echo $row['no_surat']; ?>" class="form-control"
                            placeholder="Masukkan No. Surat" required>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <h5 class="box-title pull-right" style="color: #696969;"><i class="fas fa-info-circle"></i>
                  <b>Informasi Penduduk</b>
                </h5>
                <br>
                <hr style="border-bottom: 1px solid #DCDCDC;">
                <div class="row">
                  <div class="col-md-6">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Lengkap</label>
                        <div class="col-sm-9">
                          <input type="text" name="fnama" style="text-transform: uppercase;"
                            value="<?php echo $row['nama']; ?>" class="form-control" readonly>
                        </div>
                      </div>
                      <?php
                      $tgl_lhr = date($row['tgl_lahir']);
                      $tgl = date('d ', strtotime($tgl_lhr));
                      $bln = date('F', strtotime($tgl_lhr));
                      $thn = date(' Y', strtotime($tgl_lhr));
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
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Tempat, Tgl Lahir</label>
                        <div class="col-sm-9">
                          <input type="text" name="ft_lahir" style="text-transform: capitalize;"
                            value="<?php echo $row['tempat_lahir'] . ", " . $tgl . $blnIndo[$bln] . $thn; ?>"
                            class="form-control" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Pekerjaan</label>
                        <div class="col-sm-9">
                          <input type="text" name="fpekerjaan" style="text-transform: capitalize;"
                            value="<?php echo $row['pekerjaan']; ?>" class="form-control"
                            readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Alamat</label>
                        <div class="col-sm-9">
                          <textarea rows="3" name="falamat" class="form-control"
                            style="text-transform: capitalize;"
                            readonly><?php echo "RT" . $row['rt'] . "/RW" . $row['rw'] . ", Desa " . $row['desa'] . ", Kecamatan " . $row['kecamatan'] . ", Kabupaten " . $row['kota']; ?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">Bukti KTP</label>
                          <div class="col-sm-9">
                              <?php if (!empty($row['bukti_ktp'])) { ?>
                                  <img src="<?php echo $uploadPath . $row['bukti_ktp']; ?>"
                                      style="width:100%; max-height:250px; object-fit:contain; border:1px solid #ddd; padding:5px;">

                                  <br><br>
                                  <a href="<?php echo $uploadPath . $row['bukti_ktp']; ?>"
                                  target="_blank"
                                  class="btn btn-primary btn-sm">
                                  <i class="fa fa-eye"></i> Lihat Full
                                  </a>
                              <?php } else { echo "Tidak ada file"; } ?>
                          </div>
                      </div>
                      <div>
                        <input type="hidden" name="id" value="<?php echo $row['id_spck']; ?>"
                          class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                          <input type="text" name="fj_kelamin"
                            value="<?php echo $row['jenis_kelamin']; ?>" class="form-control"
                            readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Agama</label>
                        <div class="col-sm-9">
                          <input type="text" name="fagama" style="text-transform: capitalize;"
                            value="<?php echo $row['agama']; ?>" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">NIK</label>
                        <div class="col-sm-9">
                          <input type="text" name="fnik" value="<?php echo $row['nik']; ?>"
                            class="form-control" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Kewarganegaraan</label>
                        <div class="col-sm-9">
                          <input type="text" name="fkewarganegaraan"
                            style="text-transform: uppercase;"
                            value="<?php echo $row['kewarganegaraan']; ?>" class="form-control"
                            readonly>
                        </div>
                      </div>
                      <br><br>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Bukti KK</label>
                        <div class="col-sm-9">
                            <?php if (!empty($row['bukti_kk'])) { ?>
                                <img src="<?php echo $uploadPath . $row['bukti_kk']; ?>"
                                    style="width:100%; max-height:250px; object-fit:contain; border:1px solid #ddd; padding:5px;">

                                <br><br>
                                <a href="<?php echo $uploadPath . $row['bukti_kk']; ?>"
                                target="_blank"
                                class="btn btn-primary btn-sm">
                                <i class="fa fa-eye"></i> Lihat Full
                                </a>
                            <?php } else { echo "Tidak ada file"; } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Surat RT</label>
                        <div class="col-sm-9">
                            <?php if (!empty($row['surat_rt'])) { ?>
                                <a href="<?php echo $uploadPath . $row['surat_rt']; ?>"
                                target="_blank"
                                class="btn btn-warning btn-sm">
                                <i class="fa fa-file"></i> Lihat / Download
                                </a>
                            <?php } else { echo "Tidak ada file"; } ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Surat RW</label>
                        <div class="col-sm-9">
                            <?php if (!empty($row['surat_rw'])) { ?>
                                <a href="<?php echo $uploadPath . $row['surat_rw']; ?>"
                                target="_blank"
                                class="btn btn-warning btn-sm">
                                <i class="fa fa-file"></i> Lihat / Download
                                </a>
                            <?php } else { echo "Tidak ada file"; } ?>
                        </div>
                    </div>
                    </div>
                  </div>
                </div>
                <h5 class="box-title pull-right" style="color: #696969;"><i class="fas fa-info-circle"></i>
                  <b>Informasi Surat</b>
                </h5>
                <br>
                <hr style="border-bottom: 1px solid #DCDCDC;">
                <div class="row">
                  <div class="col-md-6">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Keperluan</label>
                        <div class="col-sm-9">
                          <input type="text" name="fkeperluan" style="text-transform: uppercase;"
                            value="<?php echo $row['keperluan']; ?>" class="form-control"
                            readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Masa Berlaku</label>
                        <div class="col-sm-8">
                          <select name="fmasa_berlaku" class="form-control" required>
                            <option value="">-- Masa Berlaku--</option>
                            <option value="-">-</option>
                            <option value="1 Hari">1 Hari</option>
                            <option value="3 Hari">3 Hari</option>
                            <option value="7 Hari">7 Hari</option>
                            <option value="30 Hari">30 Hari</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Keterangan</label>
                        <div class="col-sm-9">
                          <input type="text" name="fketerangan" style="text-transform: uppercase;"
                            value="<?php echo $row['keterangan']; ?>" class="form-control"
                            readonly>
                        </div>
                      </div>
                    </div>
                    <div class="box-body pull-right">

                        <button type="submit" name="aksi" value="approve" 
                            class="btn btn-success">
                            <i class="fa fa-check"></i> Setujui
                        </button>

                        <button type="button" 
                            class="btn btn-danger"
                            onclick="showRejectModal()">
                            <i class="fa fa-times"></i> Tolak
                        </button>

                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="box-footer">
            </div>
          </div>
        </div>
      </div>
    </section>
    <div id="rejectModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5);">

            <div style="background:white; width:400px; padding:20px; margin:150px auto; border-radius:10px;">
                
                <h4>Alasan Penolakan</h4>

                <textarea name="alasan_tolak" 
                        form="formKonfirmasi"
                        class="form-control"
                        rows="4"
                        placeholder="Masukkan alasan penolakan..."
                        required></textarea>

                <br>

                <button type="submit" 
                        name="aksi" 
                        value="reject"
                        form="formKonfirmasi"
                        class="btn btn-danger">
                    Kirim Penolakan
                </button>

                <button type="button" 
                        onclick="closeRejectModal()" 
                        class="btn btn-secondary">
                    Batal
                </button>

            </div>
        </div>

        <script>
        function showRejectModal(){
            document.getElementById('rejectModal').style.display = 'block';
        }
        function closeRejectModal(){
            document.getElementById('rejectModal').style.display = 'none';
        }
        </script>
  </div>

<?php
}

include('../part/footer.php');
?>