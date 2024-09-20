<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tb_pesan WHERE id_pesan='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Balas Pesan</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			 <div class="form-group row">
				
				<div class="col-sm-6">
					<input name="kode" type="hidden" required class="form-control" id="alasan" placeholder="" value="<?php echo 
					$data_cek['id_pesan']; ?>">
				</div>
			</div>

			
		
            
<div class="form-group row">
				<label class="col-sm-2 col-form-label">Penerima</label>
				<div class="col-sm-6">
					<input name="pengirim" type="text" required class="form-control" id="alasan" placeholder="" value="<?php echo $data_cek['pengirim']; ?>" readonly/>
				</div>
			</div>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Pesan</label>
				<div class="col-sm-6">
					<input name="kode" type="text" required class="form-control" id="alasan" placeholder="" value="<?php echo $data_cek['isi']; ?>" readonly/>
				</div>
			</div>
		
		 <div class="form-group row">
				<label class="col-sm-2 col-form-label">Balasan</label>
				<div class="col-sm-6">
				  <textarea name="ket2" id="ket2"></textarea>
				</div>
			</div>
</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-pesan-masuk" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Ubah'])){
         $sql_simpan = "INSERT INTO tb_balasan(id_pesan,balasan) VALUES (
			
            
			'".$_POST['kode']."',
		  
			'".$_POST['ket2']."')";
			
			
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
       

    if ($query_simpan) {
        echo "<script>
      Swal.fire({title: 'Pesan Berhasil Dikirim',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pesan-masuk';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Kirim Pesan Gagal,text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pesan';
        }
      })</script>";
    }}
