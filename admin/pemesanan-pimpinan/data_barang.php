<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Pesanan Material/Alat</h3>
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
						<th>Kode Barang</th>
						<th>Nama Barang</th>                       				
                       
						<th>Jumlah</th>
						<th>Satuan</th>
						<th>Tanggal</th>
						<th>Pemohon</th>
						<th>Status</th>
						<th>Supplier</th>
						<th>Aksi</th>
                        
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT * from tb_barang,pemesanan where tb_barang.kd_barang=pemesanan.kd_barang");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['kd_barang']; ?>
						</td>
						<td>
							<?php echo $data['nama']; ?>
						</td>
						<td>
						
							<?php echo $data['jumlah']; ?>
						</td>
						<td>
							<?php echo $data['satuan']; ?>
						</td>
						<td>
                       
                        <?php echo $data['tgl']; ?>
						</td>
						<td>
							<?php echo $data['lapangan']; ?>
						</td>
						<td>
                        <?php echo $data['status_admin']; ?>
						</td>
						<td>
						<?php echo $data['supplier']; ?>
						</td>
						<td>
 
           
            <a href="?page=del-pemesanan&kode=<?php echo $data['kd_pemesanan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
                <i class="fa fa-trash"></i>
            </a>
        </td>
    </tr>
<?php } ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->