<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Pemesanan Barang</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-pemesanan" class="btn btn-primary">
					<i class="fa fa-edit"></i> Buat Pesanan</a>
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
						<th>Catatan</th>
						<th>Status Pesanan</th>
                        <th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
			  $pemohon = $_SESSION["ses_id"];
              $no = 1;
			  $sql = $koneksi->query("SELECT nota.*, barang.*,proyek.*
    FROM nota
    INNER JOIN barang ON nota.id_barang = barang.id_barang
    INNER JOIN proyek ON nota.proyek = proyek.kode
    WHERE nota.id_member = '$pemohon'");
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
							 <?php echo $data['catatan']; ?>
						</td>
						<td>
                        <?php echo $data['status']; ?>
						</td>
					<td>
							<?php
            if ($data['status'] == 'Dikirim') {
            ?>
                 <a data-toggle="tooltip" data-placement="top" title="Terima Barang" style="margin-right:5px" class="btn btn-success btn-sm" href="?page=activate-pemesanan-lapangan&kode=<?php echo $data['id_nota']; ?>">
                    <i style="color:#fff" class="fa fa-check"></i>
                </a>
            <?php
            } else {

            if ($data['status'] == 'Disetujui') {
            ?>
                
            <?php
             } else {

            if ($data['status'] == 'Diterima') {
            ?>
                
            <?php
            } else {

            if ($data['status'] == 'Baru') {
            ?>
                
            <?php
            } else {
            ?>
                <a data-toggle="tooltip" data-placement="top" title="Terima Barang" style="margin-right:5px" class="btn btn-success btn-sm" href="?page=activate-pemesanan-lapangan&kode=<?php echo $data['id_nota']; ?>">
                    <i style="color:#fff" class="fa fa-check"></i>
                </a>
            <?php
            }
            ?>
           
            
        </td>
    </tr>
<?php }} }}?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->