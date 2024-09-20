<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tb_lahir where id_lahir ='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-user"></i> Detail Data Kelahiran</h3>
		</h3>
		<div class="card-tools">
		</div>
	</div>
	<div class="card-body p-0">
		<table class="table">
			<tbody>
				<tr>
					<td style="width: 150px">
						<b>NIK</b>
					</td>
					<td>:
						<?php echo $data_cek['nik']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Nama</b>
					</td>
					<td>:
						<?php echo $data_cek['nama']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>TTL</b>
					</td>
					<td>:
						<?php echo $data_cek['tempat_lh']; ?>
						/
						<?php echo $data_cek['tgl_lh']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Jenis Kelamin</b>
					</td>
					<td>:
						<?php echo $data_cek['jekel']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Nama Ayah</b>
					</td>
					<td>:
						<?php echo $data_cek['nama_ayah']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Nama Ibu</b>
					</td>
					<td>:
						<?php echo $data_cek['nama_ibu']; ?>
					</td>
				</tr>
				
				<tr>
					<td style="width: 150px">
						<b>File Surat Nikah</b>
					</td>
					<td>:
						<?php echo $data_cek['file_nikah']; ?>
					</td>
				</tr>

                <tr>
					<td style="width: 150px">
						<b>File Kelahiran</b>
					</td>
					<td>:
						<?php echo $data_cek['file_lahir']; ?>
					</td>
				</tr>

                <tr>
					<td style="width: 150px">
						<b>File KK</b>
					</td>
					<td>:
						<?php echo $data_cek['file_kk']; ?>
					</td>
				</tr>

                <tr>
					<td style="width: 150px">
						<b>File KTP</b>
					</td>
					<td>:
						<?php echo $data_cek['file_ktp']; ?>
					</td>
				</tr>


			</tbody>
		</table>
		<div class="card-footer">
			<a href="?page=data-pend" class="btn btn-warning">Kembali</a>
		</div>
	</div>
</div>