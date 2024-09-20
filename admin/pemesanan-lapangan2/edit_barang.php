<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tb_barang,pemesanan WHERE tb_barang.kd_barang=pemesanan.kd_barang AND pemesanan.kd_pemesanan='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Buat Pesanan ke Admin Kantor</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
<div class="form-group row">
				
				<div class="col-sm-6">
					<input name="kode_barang" type="hidden" required class="form-control" id="alasan" placeholder="" value="<?php echo 
					$data_cek['kd_barang']; ?>" readonly/>
				</div>
			</div>

			 <div class="form-group row">
				<label class="col-sm-2 col-form-label">ID pemesanan</label>
				<div class="col-sm-6">
					<input name="kode_pemesanan" type="text" required class="form-control" id="alasan" placeholder="" value="<?php echo 
					$data_cek['kd_pemesanan']; ?>" readonly/>
				</div>
			</div>

			
		
            
 <div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Barang</label>
				<div class="col-sm-6">
					<input name="nama" type="text" required class="form-control" id="alamat_tujuan" placeholder="" value="<?php echo $data_cek['nama']; ?>"readonly/>
    </div>
</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Satuan</label>
				<div class="col-sm-6">
					<input name="telpon" type="text" required class="form-control" id="alamat_tujuan" placeholder="" value="<?php echo $data_cek['satuan']; ?>"readonly/>
            
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah</label>
				<div class="col-sm-6">
					<input name="telpon" type="text" required class="form-control" id="alamat_tujuan" placeholder="" pattern="[0-9]+" value="<?php echo $data_cek['jumlah']; ?>"readonly/>
				</div>
			</div>
			
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="tgl" placeholder="" value="<?php echo $data_cek['tgl']; ?>"readonly/>
					</div>
					</div>
					<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pemohon</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="tgl" placeholder="" value="<?php echo $data_cek['pengawas']; ?>"readonly/>
					</div>
					</div>
				
					
		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Buat Pesanan" class="btn btn-success">
			<a href="?page=data-pemesanan-lapangan" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
        
$pemohon = $_SESSION["ses_level"];

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE pemesanan SET 
	lapangan='".$pemohon."'
		
	WHERE kd_pemesanan='" . $_POST['kode_pemesanan']. "' AND kd_barang='" . $_POST['kode_barang']. "'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Pemesanan Berhasil di Update',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pemesanan-lapangan';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pemesanan-lapangan';
        }
      })</script>";
    }}
