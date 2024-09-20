<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Penyewaan Alat Berat</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-sewa" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>ID Sewa</th>
						<th>Nama Penyewa</th>
						<th>NO Telpon</th>
						<th>Nama Alat</th>                        						
                        <th>Jenis</th>
						<th>Merk</th>
						<th>Harga Sewa</th>
						<th>Tanggal</th>
						<th>Status</th>
                        <th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT * from tb_alat,sewa where tb_alat.id_alat=sewa.id_alat");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['id_sewa']; ?>
						</td>
						<td>
							<?php echo $data['nama']; ?>
						</td>
						<td>
						
							<?php echo $data['telpon']; ?>
						</td>
						<td>
						<?php echo $data['nama_alat']; ?>
						</td>
						<td>
                        <?php echo $data['jenis']; ?>
						</td>
						<td>
						<?php echo $data['merk']; ?>
						</td>
						<td>
						<?php echo $data['harga']; ?>
						</td>
						<td>
                        <?php echo $data['tgl']; ?>
						</td>
						<td>
                        <?php echo $data['status_sewa']; ?>
						</td>
						<td>
						
							<a href="?page=edit-sewa&kode=<?php echo $data['id_sewa']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-sewa&kode=<?php echo $data['id_sewa']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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