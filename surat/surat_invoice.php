<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-file"></i> Cetak Invoice</h3>
	</div>
    <form role="form" class="form-horizontal" method="GET" action="./report/lap-invoice/cetaksemua.php" target="_blank">
	
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NO Invoice</label>
				<div class="col-sm-6">
					<select name="no_kk" id="no_kk" class="form-control select2bs4" required>
						<option selected="selected">- Pilih Data Proyek-</option>
						<?php
				// ambil data dari database
				$query = "select * from pekerjaan where status='Invoice'";
				$hasil = mysqli_query($koneksi, $query);
				while ($row = mysqli_fetch_array($hasil)) {
				?>
						<option value="<?php echo $row['kproyek'] ?>">
							<?php echo $row['kproyek'] ?>
							-
							<?php echo $row['supplier'] ?>
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