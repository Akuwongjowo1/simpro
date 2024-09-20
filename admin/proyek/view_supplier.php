<?php
if(isset($_GET['kode'])){
    $sql_cek = "SELECT * FROM proyek WHERE kode ='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-info"></i> Detail Proyek
        </h3>
        <div class="card-tools">
        </div>
    </div>
    <div class="card-body p-0">
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width: 150px">
                                <b>Kode Proyek</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['kode']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Nama Proyek</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['nama']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Tanggal Mulai</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['mulai']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Tanggal Selesai</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['selesai']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Kontraktor</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['kontraktor']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Nilai Kontrak</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['nilai']; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width: 150px">
                                <b>Pengawas Lapangan</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['pengawas']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Admin Lapangan</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['admin']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Penanggung Jawab</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['p_jawab']; ?>
                            </td>
                        </tr>
                        <tr>
						<td style="width: 150px">
                                <b>Progress</b>
                            </td>
                            <td>:
							
                                <div class="progress">
									
                                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?php echo $data_cek['progress']; ?>%" aria-valuenow="<?php echo $data_cek['progress']; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $data_cek['progress']; ?>%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Dokumen</b>
                            </td>
                            <td>:
                                <?php
                                if (!empty($data_cek['gambar'])) {
                                    $imagePath = "images/" . $data_cek['gambar'];
                                    echo '<img src="' . $imagePath . '" alt="Thumbnail" style="max-width: 100px; max-height: 100px;">';
                                    echo '<a href="' . $imagePath . '" download>Download</a>';
                                } else {
                                    echo "Tidak ada gambar";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px">
                                <b>Keterangan</b>
                            </td>
                            <td>:
                                <?php echo $data_cek['keterangan']; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="?page=data-proyek" class="btn btn-warning">Kembali</a>
        </div>
    </div>
</div>
