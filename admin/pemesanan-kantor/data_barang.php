<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Buat Pesanan ke Supplier</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Pesanan</th>
						<th>Kode Barang</th>
						<th>Nama Barang</th>                       				
                       
						<th>Jumlah</th>
						<th>Satuan</th>
						<th>Tanggal</th>
						
						<th>Supplier</th>
                        <th>Buat Pesanan</th>
                        <th>Hapus</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT nota.*, barang.*,proyek.*,tb_pengguna.*
    FROM nota
    INNER JOIN barang ON nota.id_barang = barang.id_barang
    INNER JOIN proyek ON nota.proyek = proyek.kode
     INNER JOIN tb_pengguna ON nota.id_member = tb_pengguna.id_pengguna
     where nota.status='Diterima'");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['id_nota']; ?>
						</td>
						<td>
							<?php echo $data['id_barang']; ?>
						</td>
						<td>
							<?php echo $data['nama_barang']; ?>
						</td>
						<td>
						
							<?php echo $data['jumlah']; ?>
						</td>
						<td>
							<?php echo $data['satuan_barang']; ?>
						</td>
						<td>
                       
                        <?php echo $data['tanggal_input']; ?>
						</td>
						<td>
							
                        <?php echo $data['supplier']; ?>
						</td>
						<td>
						
							<a href="?page=edit-pemesanan-kantor&kode=<?php echo $data['id_nota']; ?>" title="Setujui"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
						<td>

							<a href="?page=del-pemesanan-kantor&kode=<?php echo $data['id_nota']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
							
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