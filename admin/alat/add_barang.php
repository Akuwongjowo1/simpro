<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			
			
                 <div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Alat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alasan" name="kode" placeholder="" required>
				</div>
			</div>

			
		
            
              <div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Alat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="nama" placeholder="">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="jenis" placeholder="">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Merk</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="merk" placeholder="">
				</div>
			</div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Harga Sewa</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="harga" name="alamat" placeholder="" oninput="formatCurrency(this)">
                </div>
            </div>

           
            
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-alat" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<script>
    function formatCurrency(input) {
        // Remove non-numeric characters
        const numericValue = input.value.replace(/[^0-9]/g, '');

        // Format with commas
        const formattedValue = new Intl.NumberFormat('id-ID').format(numericValue);

        // Update input value
        input.value = formattedValue;
    }
</script>

<?php

if (isset($_POST['Simpan'])) {
    // Mulai proses cek kode alat
    $kode_alat = $_POST['kode'];
     $harga = preg_replace('/[.,]/', '', $_POST['alamat']); // Remove dots and commas
    $sql_cek_kode = "SELECT * FROM tb_alat WHERE id_alat = '$kode_alat'";
    $query_cek_kode = mysqli_query($koneksi, $sql_cek_kode);

    if (mysqli_num_rows($query_cek_kode) > 0) {
        // Kode alat sudah ada
        echo "<script>
            Swal.fire({
                title: 'Kode alat Sudah Ada',
                text: 'Silakan gunakan kode alat yang berbeda.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
        </script>";
    } else {
        // Kode alat belum ada, lanjutkan proses simpan data
        $sql_simpan = "INSERT INTO tb_alat (id_alat, nama_alat,jenis,merk, harga) VALUES (
            '" . $_POST['kode'] . "',
            '" . $_POST['nama'] . "',
            '" . $_POST['jenis'] . "',
            '" . $_POST['merk'] . "',
           '$harga'
           
        )";

        $query_simpan = mysqli_query($koneksi, $sql_simpan);

        if ($query_simpan) {
            echo "<script>
                Swal.fire({
                    title: 'Tambah Data Berhasil',
                    text: '',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=data-alat-berat';
                    }
                });
            </script>";
        } else {
            echo "<script>
                Swal.fire({
                    title: 'Tambah Data Gagal',
                    text: '',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=add-alat-berat';
                    }
                });
            </script>";
        }
    }
}
// Selesai proses simpan data
?>
