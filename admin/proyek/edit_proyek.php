<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from proyek WHERE kode='".$_GET['kode']."'";
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
				<label class="col-sm-2 col-form-label">Kode Proyek</label>
				<div class="col-sm-6">
					<input name="kode" type="text" required class="form-control" id="alasan" placeholder="" value="<?php echo $data_cek['kode']; ?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Proyek</label>
				<div class="col-sm-6">
					<input type="text" pattern="[A-Za-z ]+" class="form-control" id="alamat_tujuan" name="proyek" placeholder="" value="<?php echo $data_cek['nama']; ?>"
				</div>
			</div>
			</div>
			<div class="form-group row">
    <label class="col-sm-2 col-form-label">Kontraktor</label>
    <div class="col-sm-6">
        <select name="kontraktor" id="id_barang" class="form-control select2bs4" required>
            <option selected="selected"><?php echo $data_cek['kontraktor']; ?></option>
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
		<option selected="selected"><?php echo $data_cek['pengawas']; ?></option>
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
		<option selected="selected"><?php echo $data_cek['admin']; ?></option>
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
					<input type="text" class="form-control" id="alamat_tujuan" name="p_jawab" placeholder="" value="<?php echo $data_cek['p_jawab']; ?>"
				</div>
			</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Mulai</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="alamat_tujuan" name="mulai" placeholder="" value="<?php echo $data_cek['mulai']; ?>"
				</div>
			</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Selesai</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="alamat_tujuan" name="selesai" placeholder="" value="<?php echo $data_cek['selesai']; ?>"
				</div>
			</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Nilai Kontrak</label>
				<div class="col-sm-6">
					<input type="text" pattern="[0-9]+" class="form-control" id="alamat_tujuan" name="nilai" placeholder=""value="<?php echo $data_cek['nilai']; ?>"
				</div>
			</div>
			</div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Upload Dokumen</label>
                <div class="col-sm-6">
				<input type="file" class="form-control" name="file_upload" accept=".jpg, .jpeg, .png, .zip, .docx, .pdf" >
                </div>
            </div>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="ket" placeholder=""value="<?php echo $data_cek['keterangan']; ?>"
				</div>
			</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-proyek" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
if (isset($_POST['Ubah'])) {
    // Proses upload gambar jika dipilih
    $file_upload = $_FILES['file_upload'];
    $file_name = $file_upload['name'];
    $file_tmp = $file_upload['tmp_name'];
    $file_size = $file_upload['size'];
    $file_error = $file_upload['error'];

    if ($file_error === 0) {
        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION); // Mendapatkan ekstensi file
        $file_new_name = time() . '_' . uniqid() . '.' . $file_extension; // Menambahkan time stamp pada nama file
        $file_destination = 'images/' . $file_new_name; // Sesuaikan dengan direktori penyimpanan gambar Anda
        move_uploaded_file($file_tmp, $file_destination);
    } else {
        $file_new_name = ''; // Jika tidak ada gambar yang dipilih, set nama file kosong
    }

    // Update data proyek
    $sql_ubah = "UPDATE proyek SET 
        nama='" . $_POST['proyek'] . "',
        mulai='" . $_POST['mulai'] . "',
        selesai='" . $_POST['selesai'] . "',
        nilai='" . $_POST['nilai'] . "',
        pengawas='" . $_POST['pengawas'] . "',
        admin='" . $_POST['admin'] . "',
        p_jawab='" . $_POST['p_jawab'] . "',
        kontraktor='" . $_POST['kontraktor'] . "',";

    // Tambahkan kondisi untuk nama file gambar
    if ($file_new_name !== '') {
        $sql_ubah .= "gambar='" . $file_new_name . "',"; // Simpan nama file gambar ke database jika ada gambar yang diunggah
    }

    $sql_ubah .= "keterangan='" . $_POST['ket'] . "'
        WHERE kode='" . $_POST['kode'] . "'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
            Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
            {window.location = 'index.php?page=data-proyek';
            }
            })</script>";
    } else {
        echo "<script>
            Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
            {window.location = 'index.php?page=data-proyek';
            }
            })</script>";
    }
}
?>

