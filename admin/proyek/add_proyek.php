<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			
			

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Proyek</label>
				<div class="col-sm-6">
					<input type="text" pattern="[A-Za-z ]+" class="form-control" id="alamat_tujuan" name="proyek" placeholder="">
				</div>
			</div>

			<div class="form-group row">
    <label class="col-sm-2 col-form-label">Kontraktor</label>
    <div class="col-sm-6">
        <select name="kontraktor" id="id_barang" class="form-control select2bs4" required>
            <option selected="selected">- Pilih Nama Kontraktor-</option>
            <?php
            // Ambil data dari tabel tb_barang
            $query_kontraktor = "SELECT * FROM tb_kontraktor";
            $hasil_kontraktor = mysqli_query($koneksi, $query_kontraktor);

            while ($row_kontraktor = mysqli_fetch_array($hasil_kontraktor)) {
                // Ganti 'kd_barang' dan 'nama' sesuai dengan struktur tabel tb_barang
                $kd_kontraktor = $row_kontraktor['nama_kontraktor'];
                $nama_kontraktor = $row_kontraktor['nama_kontraktor'];
            ?>
            <option value="<?php echo $kd_kontraktor; ?>">
                <?php echo $nama_kontraktor; ?>
            </option>
            <?php
            }
            ?>
        </select>
    </div>
</div>
			<div class="form-group row">
    <label class="col-sm-2 col-form-label">Pengawas Lapangan</label>
    <div class="col-sm-6">
        <select name="pengawas" id="id_barang" class="form-control select2bs4" required>
            <option selected="selected">- Pilih Nama Pengawas-</option>
            <?php
            // Ambil data dari tabel tb_barang
            $query_barang = "SELECT * FROM tb_pengguna";
            $hasil_barang = mysqli_query($koneksi, $query_barang);

            while ($row_barang = mysqli_fetch_array($hasil_barang)) {
                // Ganti 'kd_barang' dan 'nama' sesuai dengan struktur tabel tb_barang
                $kd_barang = $row_barang['nama_pengguna'];
                $nama_barang = $row_barang['nama_pengguna'];
            ?>
            <option value="<?php echo $kd_barang; ?>">
                <?php echo $nama_barang; ?>
            </option>
            <?php
            }
            ?>
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Admin Lapangan</label>
    <div class="col-sm-6">
        <select name="admin" id="id_barang" class="form-control select2bs4" required>
            <option selected="selected">- Pilih Nama Admin-</option>
            <?php
            // Ambil data dari tabel tb_barang
            $query_barang = "SELECT * FROM tb_pengguna";
            $hasil_barang = mysqli_query($koneksi, $query_barang);

            while ($row_barang = mysqli_fetch_array($hasil_barang)) {
                // Ganti 'kd_barang' dan 'nama' sesuai dengan struktur tabel tb_barang
                $kd_barang = $row_barang['nama_pengguna'];
                $nama_barang = $row_barang['nama_pengguna'];
            ?>
            <option value="<?php echo $kd_barang; ?>">
                <?php echo $nama_barang; ?>
            </option>
            <?php
            }
            ?>
        </select>
    </div>
</div>
<div class="form-group row">
				<label class="col-sm-2 col-form-label">Penganggung Jawab</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="p_jawab" placeholder="">
				</div>
			</div>
	
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Mulai</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="alamat_tujuan" name="mulai" placeholder="" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Selesai</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="alamat_tujuan" name="selesai" placeholder="" required>
				</div>
			</div>
			<div class="form-group row">
    <label class="col-sm-2 col-form-label">Nilai Kontrak</label>
    <div class="col-sm-6">
	<input type="text" class="form-control" id="nilai" name="nilai" placeholder="" oninput="formatCurrency(this)">
    </div>
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

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Upload Dokumen</label>
                <div class="col-sm-6">
				<input type="file" class="form-control" name="file_upload" accept=".jpg, .jpeg, .png, .zip, .docx, .pdf" required>
                </div>
            </div>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="ket" placeholder="">
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-proyek" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
function removeNonNumeric($string) {
	return preg_replace('/[^0-9]/', '', $string);
}
if (isset($_POST['Simpan'])) {
	
    

    $target_dir = "images/"; // Define your upload directory
    $file_name = $_FILES["file_upload"]["name"];
    $file_name_with_timestamp = 'proyek_' . time() . '_' . $file_name; // Add timestamp to file name
    $target_file = $target_dir . basename($file_name_with_timestamp);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is a valid type
    $allowedTypes = array('jpg', 'jpeg', 'png', 'zip', 'docx', 'pdf');
    if (!in_array($fileType, $allowedTypes)) {
        echo "Sorry, only JPG, JPEG, PNG, ZIP, DOCX, and PDF files are allowed.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size (set your own limit)
    if ($_FILES["file_upload"]["size"] > 5000000) { // 5 MB limit
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Upload file if everything is okay
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file)) {
            // The file has been uploaded, now insert into database
            $file_path = $target_file; // Get the file path

            $nama_proyek = $_POST['proyek']; // Assuming you have a field for project name
            $mulai = $_POST['mulai'];
            $selesai = $_POST['selesai'];
           
            $pengawas = $_POST['pengawas'];
            $admin = $_POST['admin'];
            $p_jawab = $_POST['p_jawab'];
            $kontraktor = $_POST['kontraktor']; // Fetch value for contractor from form
            $ket = $_POST['ket'];
			$nilai = preg_replace('/[.,]/', '', $_POST['nilai']); // Remove dots and commas

            // Prepare and execute the SQL query to insert data into the database
            $sql_insert = "INSERT INTO proyek (nama,mulai,selesai,nilai,pengawas,admin,p_jawab,kontraktor,gambar,keterangan) VALUES (?,?,?,?,?,?,?,?,?,?)";
            $stmt = $koneksi->prepare($sql_insert);
            $stmt->bind_param("ssssssssss", $nama_proyek, $mulai, $selesai,  $nilai, $pengawas, $admin, $p_jawab, $kontraktor,  $file_name_with_timestamp, $ket);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "<script>
      Swal.fire({title: 'Simpan Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-proyek';
        }
      })</script>";
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            echo "<script>
      Swal.fire({title: 'Simpan Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-proyek';
        }
      })</script>";
        }
    }
}


?>



