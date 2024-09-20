<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tb_datang where id_datang ='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-user"></i> Detail Data Pendatang </h3>
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
						<?php echo $data_cek['nama_datang']; ?>
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
						<b>Tanggal Datang</b>
					</td>
					<td>:
						<?php echo $data_cek['tgl_datang']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Alamat Asal</b>
					</td>
					<td>:
						<?php echo $data_cek['alamat_asal']; ?>
					</td>
				</tr>
				
				<tr>
					<td style="width: 150px">
						<b>Alamat Tujuan</b>
					</td>
					<td>:
						<?php echo $data_cek['alamat_tujuan']; ?>, RT
						<?php echo $data_cek['rt_tujuan']; ?>/ RW
						<?php echo $data_cek['rw_tujuan']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Desa</b>
					</td>
					<td>:
						<?php echo $data_cek['desa_tujuan']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Kecamatan</b>
					</td>
					<td>:
						<?php echo $data_cek['kec_tujuan']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Kabupaten</b>
					</td>
					<td>:
						<?php echo $data_cek['kab_tujuan']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Provinsi</b>
					</td>
					<td>:
						<?php echo $data_cek['prov_tujuan']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Kewarganegaraan</b>
					</td>
					<td>:
						<?php echo $data_cek['negara']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Golongan Darah</b>
					</td>
					<td>:
						<?php echo $data_cek['gol_darah']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Agama</b>
					</td>
					<td>:
						<?php echo $data_cek['agama']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Status Kawin</b>
					</td>
					<td>:
						<?php echo $data_cek['kawin']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Pekerjaan</b>
					</td>
					<td>:
						<?php echo $data_cek['pekerjaan']; ?>
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
						<b>File Keterangan</b>
					</td>
					<td>:
						<?php echo $data_cek['file_ket']; ?>
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
			<a href="?page=data-datang" class="btn btn-warning">Kembali</a>
		</div>
	</div>
</div>