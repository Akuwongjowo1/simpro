<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from barang,barang_keluar WHERE barang.id_barang=barang_keluar.kd_barang AND barang_keluar.id_keluar='".$_GET['kode']."'";
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
				<label class="col-sm-2 col-form-label">ID Transaksi</label>
				<div class="col-sm-6">
					<input name="kode" type="text" required class="form-control" id="alasan" placeholder="" value="<?php echo 
					$data_cek['id_keluar']; ?> " readonly>
				</div>
			</div>

			
		
            
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Nama Barang</label>
    <div class="col-sm-6">
        <select name="nama" id="id_barang" class="form-control select2bs4" required>
            <?php
            // Ambil data dari tabel tb_barang
            $query_barang = "SELECT * FROM barang";
            $hasil_barang = mysqli_query($koneksi, $query_barang);

            while ($row_barang = mysqli_fetch_array($hasil_barang)) {
                $kd_barang = $row_barang['id_barang'];
                $nama_barang = $row_barang['nama_barang'];
                
                // Check if the current item is the one being edited
                $selected = ($kd_barang == $data_cek['id_barang']) ? 'selected' : '';

                echo "<option value=\"$kd_barang\" $selected>$nama_barang</option>";
            }
            ?>
        </select>
    </div>
</div>
            
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Satuan</label>
				<div class="col-sm-4">
					<select name="kategori" id="level" class="form-control">
						<option selected="selected"><?php echo $data_cek['satuan']; ?></option>
						<option>Pcs</option>
                        <option>Unit</option>
                        <option>Box</option>
                        <option>Botol</option>
                        <option>Kotak</option>
						
					</select>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah</label>
				<div class="col-sm-6">
					<input name="telpon" type="text" required class="form-control" id="alamat_tujuan" placeholder="" pattern="[0-9]+" value="<?php echo $data_cek['jumlah']; ?>">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Tujuan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="tujuan" placeholder="" value="<?php echo $data_cek['tujuan']; ?>">
				</div>
			</div>
				
		  <div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="alamat_tujuan" name="tgl" placeholder="" value="<?php echo $data_cek['tgl']; ?>">
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-barang-keluar" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE barang_keluar SET 
		kd_barang='".$_POST['nama']."',
		jumlah='".$_POST['telpon']."',
		satuan='".$_POST['kategori']."',
		tujuan='".$_POST['tujuan']."',
		tgl='".$_POST['tgl']."'
		
		WHERE id_keluar='".$_POST['kode']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-barang-keluar';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-barang-keluar';
        }
      })</script>";
    }}
