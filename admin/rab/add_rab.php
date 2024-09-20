<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			
			
<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kode</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alasan" name="kode" placeholder="" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="alamat_tujuan" name="kategori" placeholder="" required>
				</div>
			</div>
            	
			<div class="form-group row">
                <label class="col-sm-2 col-form-label">Proyek</label>
				<div class="col-sm-6">
					<select name="nama" id="no_kk" class="form-control select2bs4" required>
						<option selected="selected">- Pilih Data -</option>
						<?php
				// ambil data dari database
				$query = "select * from proyek";
				$hasil = mysqli_query($koneksi, $query);
				while ($row = mysqli_fetch_array($hasil)) {
				?>
						<option value="<?php echo $row['kode'] ?>">
							<?php echo $row['nama'] ?>
							
						</option>
						<?php
				}
				?>
				  </select>
                  	</div>
			</div>
            	
			
          <div class="form-group row">
                <label class="col-sm-2 col-form-label">Pekerjaan</label>
				<div class="col-sm-6">
					<select name="pekerjaan" id="no_kk" class="form-control select2bs4" required>
						<option selected="selected">- Pilih Data -</option>
						<?php
				// ambil data dari database
				$query = "select * from pekerjaan, proyek where pekerjaan.kproyek=proyek.kode";
				$hasil = mysqli_query($koneksi, $query);
				while ($row = mysqli_fetch_array($hasil)) {
				?>
						<option value="<?php echo $row['kode_p'] ?>">
							<?php echo $row['kode_p'] ?>
							-
                            <?php echo $row['nama'] ?>
						</option>
						<?php
				}
				?>
				  </select>
                  	</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Kode SP</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="telpon" placeholder="">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Kode Satuan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="pic" placeholder="">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Volume</label>
				<div class="col-sm-6">
					<input type="text" pattern="[0-9]+" class="form-control" id="alamat_tujuan" name="bank" placeholder="">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Upah</label>
				<div class="col-sm-6">
					<input type="text" pattern="[0-9]+" class="form-control" id="alamat_tujuan" name="ket" placeholder="">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Material</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="ket1" placeholder="">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah</label>
				<div class="col-sm-6">
					<input type="text" pattern="[0-9]+" class="form-control" id="alamat_tujuan" name="ket2" placeholder="">
				</div>
			</div>
            
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Subtotal</label>
				<div class="col-sm-6">
					<input type="text" pattern="[0-9]+" class="form-control" id="alamat_tujuan" name="ket4" placeholder="">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Fee</label>
				<div class="col-sm-6">
					<input type="text" pattern="[0-9]+" class="form-control" id="alamat_tujuan" name="ket5" placeholder="">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Total</label>
				<div class="col-sm-6">
					<input type="text" pattern="[0-9]+" class="form-control" id="alamat_tujuan" name="ket6" placeholder="">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">PPN</label>
				<div class="col-sm-6">
					<input type="text" pattern="[0-9]+" class="form-control" id="alamat_tujuan" name="ket7" placeholder="">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Seluruh</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="ket8" placeholder="">
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-rab" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO rab (no,tgl,kproyek ,kpekerjaan,	kodeSP,	ksatuan,	volume,upah,material,	jumlah,subtotal,	fee,total,ppn,	seluruh) VALUES (
			'".$_POST['kode']."',
           
			'".$_POST['kategori']."',
			 '".$_POST['nama']."',
			'".$_POST['pekerjaan']."',
			'".$_POST['telpon']."',
			
			'".$_POST['pic']."',
			'".$_POST['bank']."',
			'".$_POST['ket']."',
			'".$_POST['ket1']."',
			'".$_POST['ket2']."',
			
			'".$_POST['ket4']."',
			'".$_POST['ket5']."',
			'".$_POST['ket6']."',
			'".$_POST['ket7']."',
			'".$_POST['ket8']."')";
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
		
		
    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-rab';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-rab';
          }
      })</script>";
    }}
     //selesai proses simpan data
