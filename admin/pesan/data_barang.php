<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pesan Masuk</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-pesan" class="btn btn-primary">
					<i class="fa fa-edit"></i> Kirim Pesan</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						
						<th>Tanggal</th>                        
						<th>Pengirim</th>
						 <th>Jabatan</th>
                        <th>Perihal</th>
                        <th>Isi</th>
						
						
                        <th>Balas/Hapus</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT * from tb_pesan,tb_pengguna where tb_pesan.pengirim=tb_pengguna.id_pengguna");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>

						
							<?php echo $data['tgl']; ?>
						</td>
						<td>
							<?php echo $data['nama_pengguna']; ?>
						</td>
						<td>
							<?php echo $data['level']; ?>
						</td>
						<td>
							<?php echo $data['perihal']; ?>
						</td>
						<td>
							<?php echo $data['isi']; ?>
						</td>
						<td>
							
                        
                        
						
							<a href="?page=edit-pesan-masuk&kode=<?php echo $data['id_pesan']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-pesan-masuk&kode=<?php echo $data['id_pesan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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