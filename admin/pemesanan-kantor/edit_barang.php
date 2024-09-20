<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from barang,nota WHERE barang.id_barang=nota.id_barang AND nota.id_nota='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Buat Pesanan ke Supplier</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
<div class="form-group row">
				
				<div class="col-sm-6">
					<input name="kode_barang" type="hidden" required class="form-control" id="alasan" placeholder="" value="<?php echo 
					$data_cek['id_barang']; ?>" readonly/>
				</div>
			</div>

			 <div class="form-group row">
				<label class="col-sm-2 col-form-label">ID pemesanan</label>
				<div class="col-sm-6">
					<input name="kode_pemesanan" type="text" required class="form-control" id="alasan" placeholder="" value="<?php echo 
					$data_cek['id_nota']; ?>" readonly/>
				</div>
			</div>

			
		
            
 <div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Barang</label>
				<div class="col-sm-6">
					<input name="nama" type="text" required class="form-control" id="alamat_tujuan" placeholder="" value="<?php echo $data_cek['nama_barang']; ?>"readonly/>
    </div>
</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Satuan</label>
				<div class="col-sm-6">
					<input name="telpon" type="text" required class="form-control" id="alamat_tujuan" placeholder="" value="<?php echo $data_cek['satuan_barang']; ?>"readonly/>
            
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
					<input type="text" class="form-control" id="alamat_tujuan" name="tgl" placeholder="" value="<?php echo $data_cek['tanggal_input']; ?>"readonly/>
					</div>
					</div>
					
				<div class="form-group row">
				<label class="col-sm-2 col-form-label">Supplier</label>
				<div class="col-sm-6">
					<select name="supplier" id="id_kk" class="form-control select2bs4" required>
						<option selected="selected"></option>
						<?php
                        // ambil data dari database
                        $query = "select * from tb_supplier";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
						<option value="<?php echo $row['nama'] ?>">
							<?php echo $row['nama'] ?>
							
						</option>
						<?php
                        }
                        ?>
					</select>
				</div>
					
		</div></div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Buat Pesanan" class="btn btn-success">
			<a href="?page=data-pemesanan-kantor" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
        
$pemohon = $_SESSION["ses_level"];

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE nota SET 
	supplier='".$_POST['supplier']."'
		
	WHERE id_nota='" . $_POST['kode_pemesanan']. "' AND id_barang='" . $_POST['kode_barang']. "'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Pesanan Diajukan ke Supplier',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pemesanan-kantor';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pemesanan-kantor';
        }
      })</script>";
    }}
