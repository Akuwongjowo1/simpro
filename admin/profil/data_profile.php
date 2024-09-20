<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-info"></i> Profil Perusahaan</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
           
                            
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>NAMA Perusahaan</th>
						<th>ALamat</th>
						<th>Direktur</th>
						<th>NO Telpon</th>
                        <th>Email</th>
						<th>No Rek</th>
						<th>NPWP</th>
                        <th></th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
              $sql = $koneksi->query("select * from profil");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							
							<?php echo $data['nama']; ?>
						</td>
						<td>
							<?php echo $data['alamat']; ?>
						</td>
						<td>
							<?php echo $data['direktur']; ?>
							</td>
						<td>
							<?php echo $data['telpon']; ?>
                            </td>
						<td>
                        <?php echo $data['email']; ?>
                            </td>
						<td>
                        <?php echo $data['rek']; ?>
                            </td>
						<td>
							<?php echo $data['npwp']; ?>.
						</td>
						<td>
							
						
		<a href="?page=edit-profil&kode=<?php echo $data['kode']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit">Ubah</i>
							
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