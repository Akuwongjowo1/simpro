<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pembongkaran Muatan</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-muatan" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Supir</th>
						<th>No HP</th>                     
						<th>Muatan</th>
                        <th>Muatan Awal</th>
                        <th>Bongkar</th>
						<th>Selisih Bongkar</th>
						<th>Total Harga</th>
                        <th>Panjar</th>
                        <th>Sisa</th>
                        <th>Tujuan</th>
                        <th>Ket.</th>
                        <th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT a.kd_barang,a.nama,a.supplier,b.kode,b.supir,b.no_hp,b.kd_barang,b.awal,b.bongkar,b.selisih,b.total,b.panjar,b.sisa,b.tujuan,b.ket
                 FROM tb_barang as a INNER JOIN tb_muatan as b ON a.kd_barang=b.kd_barang");
              while ($data= $sql->fetch_assoc()) {
            ?>
					<tr>
						<td>
							<?php echo $no++; ?>
						
						</td>
						<td>
							<?php echo $data['supir']; ?>
						</td>
						<td>
							<?php echo $data['no_hp']; ?>
						</td>
						<td>
							<?php echo $data['nama']; ?>
						</td>
						<td>
                        <?php echo $data['awal']; ?>
						</td>
						<td>
							<?php echo $data['bongkar']; ?>
						</td>
						<td>
                        <?php echo $data['selisih']; ?>
						</td>
                        
						<td>
                        <?php echo $data['total']; ?>
						</td>
                        
						<td>
                        <?php echo $data['panjar']; ?>
						</td>
                        
						<td>
                        <?php echo $data['sisa']; ?>
						</td>
                        
						<td>
						<?php echo $data['tujuan']; ?>
						</td>
                        
						<td>
                        <?php echo $data['ket']; ?>
						</td>
                        
						<td>
                        
							<a href="?page=del-muatan&kode=<?php echo $data['kode']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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