<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from sewa,tb_alat WHERE sewa.id_alat=tb_alat.id_alat and id_sewa='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Status Sewa</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			 <div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Penyewaan</label>
				<div class="col-sm-6">
					<input name="kode" type="text" required class="form-control" id="alasan" placeholder="" value="<?php echo 
					$data_cek['id_sewa']; ?> " readonly>
				</div>
			</div>
			
		
            
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Penyewa</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="tujuan" placeholder="" required value="<?php echo 
					$data_cek['nama']; ?> " readonly>
				</div>
			</div>
			
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">No Telpon</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="telpon" placeholder="" required value="<?php echo 
					$data_cek['telpon']; ?> " readonly>
				</div>
			</div>			
		
            
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Nama Alat</label>
    <div class="col-sm-6">
        <select name="nama" id="id_alat" class="form-control select2bs4" readonly>
		<option selected="selected"><?php echo $data_cek['nama_alat']; ?>- <?php echo $data_cek['jenis']; ?>-<?php echo $data_cek['merk']; ?> - <?php echo $data_cek['harga']; ?> </option> 
            <?php
            // Ambil data dari tabel tb_alat
            $query_alat = "SELECT * FROM tb_alat";
            $hasil_alat = mysqli_query($koneksi, $query_alat);

            while ($row_alat = mysqli_fetch_array($hasil_alat)) {
                // Ganti 'kd_alat' dan 'nama' sesuai dengan struktur tabel tb_alat
                $kd_alat = $row_alat['id_alat'];
                $nama_alat = $row_alat['nama_alat'];
                $jenis = $row_alat['jenis'];
                $merk = $row_alat['merk'];
				$harga = $row_alat['harga'];
            ?>
            <option value="<?php echo $kd_alat; ?>"> 
                <?php echo $nama_alat; ?> - <?php echo $jenis; ?> - <?php echo $merk; ?> - <?php echo $harga; ?>
            </option>
            <?php
            }
            ?>
        </select>
    </div>
</div>
<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah</label>
				<div class="col-sm-6">
					<input type="text" pattern="[0-9]+" class="form-control" id="jumlah" name="jumlah" placeholder="" required value="<?php echo 
					$data_cek['jumlah']; ?> " readonly>
				</div>
			</div>
    
          
			
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal</label>
				<div class="col-sm-6">
<input type="text" class="form-control" id="alamat_tujuan" name="tgl" value="<?php echo $data_cek['tgl']; ?> " readonly>
				</div>
			</div>
	
	
		<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status</label>
				<div class="col-sm-4">
					<select name="kategori" id="level" class="form-control">
						<option></option>
						<option>Selesai</option>
                        <option>Sewa</option>
                       
						<option selected="selected"><?php echo 
					$data_cek['status_sewa']; ?></option>
					</select>
				</div>
			</div>
			</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-sewa" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE sewa SET 
		
		status_sewa='".$_POST['kategori']."'
	
		
		WHERE id_sewa='".$_POST['kode']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-sewa';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-sewa';
        }
      })</script>";
    }}
