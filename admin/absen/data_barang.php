<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Absensi</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-absen" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						 <th>Proyek</th>
						 <th>Progress</th>  
						<th>Tanggal</th>                        
						
                        <th>Nama Karyawan</th>
                        <th>jabatan</th>
						<th>Status</th>
						
                        <th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT pekerjaan.*, tb_absen.*,proyek.*,tb_karyawan.*
    FROM tb_absen
    INNER JOIN pekerjaan ON tb_absen.kd_pekerjaan = pekerjaan.kode_p
    INNER JOIN proyek ON tb_absen.kode_p = proyek.kode
     INNER JOIN tb_karyawan ON tb_absen.kd_karyawan = tb_karyawan.kode");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
                          <?php echo $data['nama']; ?>
						</td>
						<td>
						<?php echo $data['ket']; ?>
						</td>
						<td>
							<?php echo $data['tgl']; ?>
						</td>
						<td>
							
							<?php echo $data['nama_karyawan']; ?>
						</td>
						<td>
							<?php echo $data['jabatan']; ?>
						</td>
						<td>
							<?php echo $data['status']; ?>
						</td>
						<td>
                        
                        
						
							<a href="?page=edit-absen&kode=<?php echo $data['kd_absen']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-absen&kode=<?php echo $data['kd_absen']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
								</>
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->