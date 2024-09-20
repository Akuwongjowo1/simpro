<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from pekerjaan WHERE kode_p='".$_GET['kode']."'";
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
				<div class="col-sm-2">
					<input type="text" class="form-control" id="id_pindah" name="id_pindah" value="<?php echo $data_cek['kode_p']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Proyek</label>
				<div class="col-sm-6">
					<select name="kode" id="id_kk" class="form-control select2bs4" required>
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
				<label class="col-sm-2 col-form-label">Supplier</label>
				<div class="col-sm-6">
					<select name="kategori" id="id_kk" class="form-control select2bs4" required>
						<option selected="selected"><?php echo $data_cek['supplier']; ?></option>
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

			</div>
<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kebutuhan</label>
				<div class="col-sm-6">
					<input name="nama" type="text" class="form-control" id="alamat_tujuan" placeholder="" value="<?php echo $data_cek['kebutuhan']; ?>">
				</div>
		  </div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Material</label>
				<div class="col-sm-6">
					<input name="alamat" type="text" class="form-control" id="alamat_tujuan" placeholder="" value="<?php echo $data_cek['material']; ?>">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Alat Bantu</label>
				<div class="col-sm-6">
					<input name="telpon" type="text" class="form-control" id="alamat_tujuan" placeholder="" value="<?php echo $data_cek['alat']; ?>">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Satuan</label>
				<div class="col-sm-6">
					<input name="pic" type="text" class="form-control" id="alamat_tujuan" placeholder="" value="<?php echo $data_cek['satuan']; ?>">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Qty</label>
				<div class="col-sm-6">
					<input name="bank" type="text" class="form-control" id="alamat_tujuan" placeholder="" pattern="[0-9]+" value="<?php echo $data_cek['qty']; ?>">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Harga</label>
				<div class="col-sm-6">
					<input name="ket" type="text" class="form-control" id="alamat_tujuan" placeholder="" pattern="[0-9]+" value="<?php echo $data_cek['harga']; ?>">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Total</label>
				<div class="col-sm-6">
					<input name="ket1" type="text" class="form-control" id="alamat_tujuan" placeholder="" pattern="[0-9]+" value="<?php echo $data_cek['total']; ?>">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Pekerjaan</label>
				<div class="col-sm-3">
					<select name="status" id="jekel" class="form-control">
						<option><?php echo $data_cek['status']; ?></option>
						<option>PO</option>
						<option>DO</option>
                   
                        <option>Invoice</option>
                      
					</select>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-6">
				  <textarea name="ket2" id="ket2"><?php echo $data_cek['ket']; ?></textarea>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-pekerjaan" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE pekerjaan SET 
	        kproyek='".$_POST['kode']."',
           
			supplier='".$_POST['kategori']."',
			kebutuhan= '".$_POST['nama']."',
			material='".$_POST['alamat']."',
			alat='".$_POST['telpon']."',
			
			satuan='".$_POST['pic']."',
			qty='".$_POST['bank']."',
			harga='".$_POST['ket']."',
			total='".$_POST['ket1']."',
			status='".$_POST['status']."',
			ket='".$_POST['ket2']."'
			
		WHERE kode_p='".$_POST['id_pindah']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pekerjaan';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pekerjaan';
        }
      })</script>";
    }}
