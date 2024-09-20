<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pekerjaan</h3>
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
						<th>No</th>
						
						<th>Nama Proyek</th>
						<th>Tanggal Mulai</th>
						
                         <th>Status Proyek</th>
                         
                       
                         
                        <th>Detail</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT * from 
			  proyek ");
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
                       <?php echo $data['mulai']; ?>
						</td>
						<td>
						<?php echo $data['keterangan']; ?>
						</td>
						<td>
							
                        <a href="?page=lihat-pekerjaan&kode=<?php echo $data['kode']; ?>" title="Lihat"
							 class="btn btn-success btn-sm">
								<i class="fa fa-eye"></i>
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