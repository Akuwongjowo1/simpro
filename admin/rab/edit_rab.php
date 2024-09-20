<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from rab WHERE no='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kode</label>
				<div class="col-sm-6">
					<input name="kode" type="text" required class="form-control" id="alasan" placeholder="" value="<?php echo $data_cek['no']; ?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal</label>
				<div class="col-sm-6">
					<input name="kategori" type="date" required class="form-control" id="alamat_tujuan" placeholder="" value="<?php echo $data_cek['tgl']; ?>">
				</div>
			</div>
            	
			<div class="form-group row">
                <label class="col-sm-2 col-form-label">Proyek</label>
				<div class="col-sm-6">
					<select name="nama" id="no_kk" class="form-control select2bs4" required>
						<option selected="selected"><?php echo $data_cek['kproyek']; ?></option>
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
						<option selected="selected"><?php echo $data_cek['kpekerjaan']; ?></option>
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
					<input name="telpon" type="text" class="form-control" id="alamat_tujuan" placeholder="" value="<?php echo $data_cek['kodeSP']; ?>">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Kode Satuan</label>
				<div class="col-sm-6">
					<input name="pic" type="text" class="form-control" id="alamat_tujuan" placeholder="" value="<?php echo $data_cek['ksatuan']; ?>">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Volume</label>
				<div class="col-sm-6">
					<input name="bank" type="text" class="form-control" id="alamat_tujuan" placeholder="" pattern="[0-9]+" value="<?php echo $data_cek['volume']; ?>">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Upah</label>
				<div class="col-sm-6">
					<input name="ket" type="text" class="form-control" id="alamat_tujuan" placeholder="" pattern="[0-9]+" value="<?php echo $data_cek['upah']; ?>">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Material</label>
				<div class="col-sm-6">
					<input name="ket1" type="text" class="form-control" id="alamat_tujuan" placeholder="" value="<?php echo $data_cek['material']; ?>">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah</label>
				<div class="col-sm-6">
					<input name="ket2" type="text" class="form-control" id="alamat_tujuan" placeholder="" pattern="[0-9]+" value="<?php echo $data_cek['jumlah']; ?>">
				</div>
			</div>
            
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Subtotal</label>
				<div class="col-sm-6">
					<input name="ket4" type="text" class="form-control" id="alamat_tujuan" placeholder="" pattern="[0-9]+" value="<?php echo $data_cek['subtotal']; ?>">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Fee</label>
				<div class="col-sm-6">
					<input name="ket5" type="text" class="form-control" id="alamat_tujuan" placeholder="" pattern="[0-9]+" value="<?php echo $data_cek['fee']; ?>">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Total</label>
				<div class="col-sm-6">
					<input name="ket6" type="text" class="form-control" id="alamat_tujuan" placeholder="" pattern="[0-9]+" value="<?php echo $data_cek['total']; ?>">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">PPN</label>
				<div class="col-sm-6">
					<input name="ket7" type="text" class="form-control" id="alamat_tujuan" placeholder="" pattern="[0-9]+" value="<?php echo $data_cek['ppn']; ?>">
				</div>
			</div>
          <div class="form-group row">
				<label class="col-sm-2 col-form-label">Seluruh</label>
				<div class="col-sm-6">
					<input name="ket8" type="text" class="form-control" id="alamat_tujuan" placeholder="" value="<?php echo $data_cek['seluruh']; ?>">
			  </div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-rab" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE rab SET 
	
           
			tgl='".$_POST['kategori']."',
			kproyek= '".$_POST['nama']."',
			kpekerjaan='".$_POST['pekerjaan']."',
			kodeSP='".$_POST['telpon']."',
			
			ksatuan='".$_POST['pic']."',
			volume='".$_POST['bank']."',
			upah='".$_POST['ket']."',
			material='".$_POST['ket1']."',
			jumlah='".$_POST['ket2']."',
			
			subtotal='".$_POST['ket4']."',
			fee='".$_POST['ket5']."',
			total='".$_POST['ket6']."',
			ppn='".$_POST['ket7']."',
			seluruh='".$_POST['ket8']."'
		
		WHERE no='".$_POST['kode']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-rab';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-rab';
        }
      })</script>";
    }}
