                                             <script type="text/javascript">
function blah() {
   var a = window.open("admin/lap-karyawan/cetaksemua.php");
}
</script>
<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-file"></i> Laporan Data Karyawan</h3>
	</div>
	<form role="form" class="form-horizontal" method="GET" action="admin/lap-karyawan/cetak.php" target="_blank">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">
				  <input type="radio" name="semua" id="semua" value="semua" onclick="blah()">
				  Semua Data <br>
                   </div>
				
		
			    <label class="col-sm-2 col-form-label">Pilih Karyawan</label>
				<div class="col-sm-6">
					<select name="nama" id="nama" class="form-control select2bs4" required>
						<option selected="selected">- Pilih Data -</option>
						<?php
				// ambil data dari database
				$query = "select * from tb_karyawan";
				$hasil = mysqli_query($koneksi, $query);
				while ($row = mysqli_fetch_array($hasil)) {
				?>
						<option value="<?php echo $row['nama_karyawan'] ?>">
							<?php echo $row['nama_karyawan'] ?>
							
						</option>
						<?php
				}
				?>
				  </select>
                  
			  </div>
		  </div>

		</div>
		<div class="card-footer">

			<button type="submit" class="btn btn-primary btn-social btn-submit">
             <i class="fa fa-print"></i> Cetak
                </button>
		</div>
	</form>
</div>