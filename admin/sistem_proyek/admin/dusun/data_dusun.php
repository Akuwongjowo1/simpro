<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Wilayah Dusun</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-dusun" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data </a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Dusun</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT d.id_dusun, d.nama_dusun from 
			  tb_dusun d ");
              while ($data= $sql->fetch_assoc()) {
            	?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nama_dusun']; ?>
						</td>
						
						<td>
						<a href="?page=view-dusun&kode=<?php echo $data['id_dusun']; ?>" title="Detail"
							 class="btn btn-success btn-sm">
								<i class="fa fa-user"></i>
							</a>
							<a href="?page=edit-dusun&kode=<?php echo $data['id_dusun']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-dusun&kode=<?php echo $data['id_dusun']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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