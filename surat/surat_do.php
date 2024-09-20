<script type="text/javascript">
function blah() {
   var a = window.open("admin/lap-kas/cetaksemua.php");
}
</script>

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-file"></i> Cetak DO</h3>
	</div>
    <form role="form" class="form-horizontal" method="GET" action="./report/lap-do/cetaksemua.php" target="_blank">
	
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NO DO</label>
				<div class="col-sm-6">
					<select name="no_kk" id="no_kk" class="form-control select2bs4" required>
						<option selected="selected">- Pilih Data -</option>
						<?php
				// ambil data dari database
				$query = "select * from pekerjaan,proyek where pekerjaan.kproyek=proyek.kode and pekerjaan.status='DO'";
				$hasil = mysqli_query($koneksi, $query);
				while ($row = mysqli_fetch_array($hasil)) {
				?>
						<option value="<?php echo $row['kproyek'] ?>">
							<?php echo $row['nama'] ?>
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