<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			
			
                 <div class="form-group row">
				<label class="col-sm-2 col-form-label">Kode Barang</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alasan" name="kode" placeholder="" required>
				</div>
			</div>

			
		
            
<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Barang</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="nama" placeholder="">
				</div>
			</div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="harga" name="alamat" placeholder="" oninput="formatCurrency(this)">
                </div>
            </div>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Satuan</label>
				<div class="col-sm-4">
					<select name="kategori" id="level" class="form-control">
						<option>- Pilih -</option>
						<option>Pcs</option>
                        <option>Unit</option>
                        <option>Box</option>
                        <option>Botol</option>
                        <option>Kotak</option>
						<option selected="selected">Pcs</option>
					</select>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Stok</label>
				<div class="col-sm-6">
					<input type="text" pattern="[0-9]+" class="form-control" id="alamat_tujuan" name="telpon" placeholder="" required>
				</div>
			</div>
           
            
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-barang" title="Kembali" class="btn btn-secondary">Batal</a>
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
    // Mulai proses cek kode barang
    $kode_barang = $_POST['kode'];
     $harga = preg_replace('/[.,]/', '', $_POST['alamat']); // Remove dots and commas
    $sql_cek_kode = "SELECT * FROM barang WHERE id_barang = '$kode_barang'";
    $query_cek_kode = mysqli_query($koneksi, $sql_cek_kode);

    if (mysqli_num_rows($query_cek_kode) > 0) {
        // Kode barang sudah ada
        echo "<script>
            Swal.fire({
                title: 'Kode Barang Sudah Ada',
                text: 'Silakan gunakan kode barang yang berbeda.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
        </script>";
    } else {
        // Kode barang belum ada, lanjutkan proses simpan data
        $sql_simpan = "INSERT INTO barang (id_barang, nama_barang, harga_jual, satuan_barang, stok) VALUES (
            '" . $_POST['kode'] . "',
            '" . $_POST['nama'] . "',
           '$harga',
            '" . $_POST['kategori'] . "',
            '" . $_POST['telpon'] . "'
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
                        window.location = 'index.php?page=data-barang';
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
                        window.location = 'index.php?page=add-barang';
                    }
                });
            </script>";
        }
    }
}
// Selesai proses simpan data
?>
