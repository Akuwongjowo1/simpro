<?php
	include "../inc/koneksi.php";
	
	if (isset ($_POST['btnCetak'])){
	$id = $_POST['id_pend'];
	}

	$tanggal = date("m/y");
	$tgl = date("d/m/y");
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>CETAK SURAT</title>
</head>

<body>
	<center>

		<h2>PEMERINTAH KABUPATEN PONOROGO</h2>
		<h3>KECAMATAN SLAHUNG
			<br>DESA JEBENG</h3>
		<p>________________________________________________________________________</p>

		<?php
			$sql_tampil = "select * from tb_pdd
			where id_pend ='$id'";
			
			$query_tampil = mysqli_query($koneksi, $sql_tampil);
			$no=1;
			while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
		?>
	</center>

	<center>
		<h4>
			<u>SURAT KETARANGAN DOMISILI</u>
		</h4>
		<h4>No Surat :
			<?php echo $data['id_pend']; ?>/Ket.Domisili/
			<?php echo $tanggal; ?>
		</h4>
	</center>
	<p>Yang bertandatangan dibawah ini Kepala Desa Jebeng, Kecamatan Slahung, Kabupaten Ponorogo, dengan ini menerangkan
		bahawa :</P>
	<table>
		<tbody>
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td>
					<?php echo $data['nik']; ?>
				</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>
					<?php echo $data['nama']; ?>
				</td>
			</tr>
			<tr>
				<td>TTL</td>
				<td>:</td>
				<td>
					<?php echo $data['tempat_lh']; ?>/
					<?php echo $data['tgl_lh']; ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<p>Adalah benar-benar warga Desa Jebeng, Kecamatan Slahung, Kabupuaten Ponorogo.</P>
	<p>Demikian Surat ini dibuat, agar dapat digunakan sebagai mana mestinya.</P>
	<br>
	<br>
	<br>
	<br>
	<br>
	<table width="100%" border="1">
	  <tr>
	    <td><p align="left">Jebeng, </p>
        <p><?php echo $tgl; ?></p></td>
	    <td><p align="right">Jebeng, </p>
        <p><?php echo $tgl; ?></p></td>
      </tr>
</table>
	<p align="left">
<p align="left">&nbsp;</p>
		<p align="right" >                              aaaaaaaaaaaaaaasasas <br> 
        KEPALA DESA 
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>(Budiyono)
</p>


	<script>
		window.print();
	</script>

</body>

</html>