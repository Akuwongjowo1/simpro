<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Terima Pesanan Barang</h3>
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
						<th>Kode Pesanan</th>
						<th>Proyek</th>
						
						<th>Nama Barang</th>                       				
                       
						<th>Jumlah</th>
						<th>Satuan</th>
						<th>Tanggal</th>
						<th>Pemesan</th>
						
						<th>Catatan</th>
						<th>Status</th>
						<th>Aksi</th>
                        
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
   ");
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
							<?php echo $data['nama']; ?>
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
							<?php echo $data['nama_pengguna']; ?>
						</td>
						<td>
							
							<?php echo $data['catatan']; ?>
						</td>
						<td>
                        <?php echo $data['status']; ?>
						</td>
						<td>
						
 <?php
            if ($data['status'] == 'Disetujui') {
            ?>
                <a data-toggle="tooltip" data-placement="top" title="Kirim Barang" style="margin-right:5px" class="btn btn-warning btn-sm" href="?page=block-pemesanan&kode=<?php echo $data['id_nota']; ?>">
                  <i class="fa fa-car"></i>
                </a>
            <?php
            } else {
            ?>
                <a data-toggle="tooltip" data-placement="top" title="Setujui" style="margin-right:5px" class="btn btn-success btn-sm" href="?page=activate-pemesanan&kode=<?php echo $data['id_nota']; ?>">
                    <i style="color:#fff" class="fa fa-check"></i>
                </a>
            <?php
            }
            ?>
           
            <a href="?page=del-pemesanan&kode=<?php echo $data['id_nota']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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