<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Kelahiran</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-lahir" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>NIK</th>
						<th>Tempat Lahir</th>
						<th>Tgl Lahir</th>
						<th>Jekel</th>
						<th>Keluarga</th>
						<th>Aksi</th>
                        <th>Download</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT l.id_lahir, l.nama,l.file_lahir,l.file_nikah,l.file_kk,l.file_ktp, l.tempat_lh, l.tgl_lh, l.jekel, k.no_kk, k.kepala, l.nik from 
			  tb_lahir l inner join tb_kk k on k.id_kk=l.id_kk");
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
							<?php echo $data['nik']; ?>
						</td>
						<td>
							<?php echo $data['tempat_lh']; ?>
						</td>
						<td>
							<?php echo $data['tgl_lh']; ?>
						</td>
						<td>
							<?php echo $data['jekel']; ?>
						</td>
						
						<td>
							<?php echo $data['no_kk']; ?>-
							<?php echo $data['kepala']; ?>
						</td>
						<td>
						<a href="?page=view-lahir&kode=<?php echo $data['id_lahir']; ?>" title="Detail"
							 class="btn btn-info btn-sm">
								<i class="fa fa-user"></i>
							</a>
							<a href="?page=edit-lahir&kode=<?php echo $data['id_lahir']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-lahir&kode=<?php echo $data['id_lahir']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
								</>
						</td>
                        <td>
                         <a href="downloadlahir.php?filename=<?=$data['file_nikah']?>" title="Download File Nikah"
							 class="btn btn-info btn-sm">
								<i class="fa fa-download"></i>
							</a>
                            <a href="downloadlahir.php?filename=<?=$data['file_lahir']?>" title="Download File Lahir"
							 class="btn btn-info btn-sm">
								<i class="fa fa-download"></i>
                                </a>
                                <a href="downloadlahir.php?filename=<?=$data['file_kk']?>" title="Download File KK"
							 class="btn btn-info btn-sm">
								<i class="fa fa-download"></i>
                                </a>
                                <a href="downloadlahir.php?filename=<?=$data['file_ktp']?>" title="Download File KTP"
							 class="btn btn-info btn-sm">
								<i class="fa fa-download"></i>
                                </a>
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