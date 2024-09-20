<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Alat Berat </h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-alat-berat" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>ID Alat</th>
						<th>Nama Alat</th>
                        <th>Jenis</th>
						<th>Merk</th>
					
                        <th>Harga Sewa</th>
						<th>Status</th>
						
                        <th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT * from 
			  tb_alat");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['id_alat']; ?>
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
							<?php echo $data['status']; ?>
						</td>
						<td>
						
                        
                        
						
							<a href="?page=edit-alat-berat&kode=<?php echo $data['id_alat']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-alat-berat&kode=<?php echo $data['id_alat']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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