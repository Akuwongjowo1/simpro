<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Developer</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-developer" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode</th>
					
						<th>Nama</th>
						<th>Aalamat</th>
						<th>Telpon</th>
                        <th>email</th>
                        <th>PIC</th>
						<th>Rek BANK</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT * from 
			  developer");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['kode']; ?>
						</td>
						<td>
						
							<?php echo $data['nama']; ?>
						</td>
						<td>
							<?php echo $data['alamat']; ?>
						</td>
						<td>
							<?php echo $data['telpon']; ?>
						</td>
						<td>
                        <?php echo $data['email']; ?>
						</td>
						<td>
                        <?php echo $data['pic']; ?>
						</td>
						<td>
                        <?php echo $data['bank']; ?>
						</td>
						<td>
                        <?php echo $data['ket']; ?>
						</td>
						<td>
						
							<a href="?page=edit-developer&kode=<?php echo $data['kode']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-developer&kode=<?php echo $data['kode']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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