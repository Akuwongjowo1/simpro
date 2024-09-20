<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			
			
                 <div class="form-group row">
				<label class="col-sm-2 col-form-label">Supir</label>
				<div class="col-sm-6">
					<input type="text" pattern="[A-Za-z ]+" class="form-control" id="alasan" name="supir" placeholder="" required>
				</div>
			</div>

			
		
            
<div class="form-group row">
				<label class="col-sm-2 col-form-label">NO HP</label>
				<div class="col-sm-6">
					<input type="text" pattern="[0-9]+" class="form-control" id="alamat_tujuan" name="hp" placeholder="">
				</div>
			</div>
             <div class="form-group row">
				<label class="col-sm-2 col-form-label">Muatan</label>
				<div class="col-sm-6">
					<select name="muatan" id="id_kk" class="form-control select2bs4" required>
						<option selected="selected">- Pilih Muatan -</option>
						<?php
                        // ambil data dari database
                        $query = "select * from tb_barang";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
						<option value="<?php echo $row['kd_barang'] ?>">
							<?php echo $row['nama'] ?>
							
						</option>
						<?php
                        }
                        ?>
					</select>
				</div>
                	</div>
 <div class="form-group row">
				<label class="col-sm-2 col-form-label">Muatan Awal</label>
				<div class="col-sm-6">
					<input type="text" pattern="[0-9]+" class="form-control" id="awal" name="awal" placeholder="">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Bongkar</label>
				<div class="col-sm-6">
					<input type="text"  pattern="[0-9]+" class="form-control" id="alamat_tujuan" name="bongkar" placeholder="">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Selisih</label>
				<div class="col-sm-6">
					<input type="text" pattern="[0-9]+" class="form-control" id="alamat_tujuan" name="selisih" placeholder="" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Total</label>
				<div class="col-sm-6">
					<input type="text" pattern="[0-9]+" class="form-control" id="alamat_tujuan" name="total" placeholder="" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Panjar</label>
				<div class="col-sm-6">
					<input type="text" pattern="[0-9]+" class="form-control" id="alamat_tujuan" name="panjar" placeholder="" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Sisa</label>
				<div class="col-sm-6">
					<input type="text" pattern="[0-9]+" class="form-control" id="alamat_tujuan" name="sisa" placeholder="" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Tujuan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="tujuan" placeholder="">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
			  <div class="col-sm-6">
			    <textarea name="ket" id="textarea"></textarea>
				</div>
			</div>
           
            
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-muatan" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_muatan (kode,supir,no_hp,kd_barang,awal,bongkar,selisih,total,panjar,sisa,tujuan,ket) VALUES (
			'".$_POST['']."',
            
			'".$_POST['supir']."',
			'".$_POST['hp']."',
			'".$_POST['muatan']."',
			'".$_POST['awal']."',
			'".$_POST['bongkar']."',
			'".$_POST['selisih']."',
			'".$_POST['total']."',
			'".$_POST['panjar']."',
			
			'".$_POST['sisa']."',
			'".$_POST['tujuan']."',
			
			'".$_POST['ket']."')";
			
			
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
	
		
      if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-muatan';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-muatan';
          }
      })</script>";
    }}
     //selesai proses simpan data
