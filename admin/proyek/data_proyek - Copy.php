<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Proyek</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-proyek" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Proyek</th>
						<th>Kategori</th>
						
						<th>Nama</th>
						<th>NO SPK</th>
                        <th>NO PO</th>
                        <th>Bowheer</th>
						<th>Lama</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Nilai Kontrak</th>
                        <th>PPH</th>
                        <th>Ket.</th>
                        <th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT * from 
			  proyek");
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
                        	<?php echo $data['kategori']; ?>
						</td>
						<td>
							
							<?php echo $data['nama']; ?>
						</td>
						<td>
							<?php echo $data['spk']; ?>
						</td>
						<td>
							<?php echo $data['po']; ?>
						</td>
						<td>
                        <?php echo $data['bo']; ?>
						</td>
						<td>
                        <?php echo $data['lama']; ?>
						</td>
						<td>
                        <?php echo $data['mulai']; ?>
						</td>
						<td>
                         <?php echo $data['selesai']; ?>
						</td>
						<td>
                         <?php echo $data['nilai']; ?>
						</td>
						<td>
                         <?php echo $data['pph']; ?>
						</td>
						<td>
                        <?php echo $data['keterangan']; ?>
						</td>
						<td>
						
							<a href="?page=edit-proyek&kode=<?php echo $data['kode']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-proyek&kode=<?php echo $data['kode']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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