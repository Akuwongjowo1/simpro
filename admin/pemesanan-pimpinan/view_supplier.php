<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from  tb_pindah d inner join tb_pdd p on p.id_pend=d.id_pdd ='". $_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-user"></i> Detail Data Pindah </h3>
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
						<b>Tanggal Pindah</b>
					</td>
					<td>:

						<?php echo $data_cek['tgl_pindah']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Alasan</b>
					</td>
					<td>:
						<?php echo $data_cek['alasan']; ?>
					</td>
				</tr>
                <tr>
					<td style="width: 150px">
						<b>Alamat Tujuan</b>
					</td>
					<td>:
						<?php echo $data_cek['alamat_tujuan']; ?>
					</td>
				</tr>
                

			</tbody>
		</table>
		<div class="card-footer">
			<a href="?page=data-pindah" class="btn btn-warning">Kembali</a>
		</div>
	</div>
</div>