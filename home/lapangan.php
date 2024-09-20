
        <?php
		

  $sql = $koneksi->query("SELECT COUNT(kd_inventaris) as proyek  from inventaris ");
  while ($data= $sql->fetch_assoc()) {
    $pend=$data['proyek'];
  }

  // Persiapkan pernyataan SQL dengan parameter
$stmt = $koneksi->prepare("SELECT COUNT(id_nota) as pekerjaan FROM nota WHERE id_member = ?");
$stmt->bind_param("i", $_SESSION["ses_id"]);

// Eksekusi pernyataan SQL
$stmt->execute();

// Ambil hasil dari pernyataan SQL
$result = $stmt->get_result();

// Fetch hasil query menjadi array asosiatif
$data = $result->fetch_assoc();

// Ambil nilai 'pekerjaan1' dari array
$kartu = $data['pekerjaan'];

// Tutup statement
$stmt->close();


  // Persiapkan pernyataan SQL dengan parameter
$stmt = $koneksi->prepare("SELECT COUNT(id_nota) as pekerjaan1 FROM nota WHERE id_member = ?");
$stmt->bind_param("i", $_SESSION["ses_id"]);

// Eksekusi pernyataan SQL
$stmt->execute();

// Ambil hasil dari pernyataan SQL
$result = $stmt->get_result();

// Fetch hasil query menjadi array asosiatif
$data = $result->fetch_assoc();

// Ambil nilai 'pekerjaan1' dari array
$laki = $data['pekerjaan1'];

// Tutup statement
$stmt->close();


 
  
?>

<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3>
					<?php echo $pend;  ?>
				</h3>

				<p>Data Inventaris</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-list"></i>
                
			</a>
			</div>
			<a href="index.php?page=data-inventaris" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	
	<!-- ./col -->
	<!--<div class="col-lg-3 col-6">
		<!-- small box -->
		<!--<div class="small-box bg-red">
			<div class="inner">
				<h3>
				<?php echo $laki;  ?>
				</h3>

				<p>Purchase Order (PO)</p>
			</div>
			<div class="icon">
				<i class="ion ion-male"></i>
			</div>
			<a href="index.php?page=data-izin" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>-->
	<!-- ./col -->
	<!--<div class="col-lg-3 col-6">
		<!-- small box -->
		<!--<div class="small-box bg-warning">
			<div class="inner">
				<h3>
					<?php echo $prem;  ?>
				</h3>

				<p>Delivery Order</p>
			</div>
			<div class="icon">
				<i class="ion ion-female"></i>
			</div>
			<a href="index.php?page=log-izin" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>-->

	
	<!-- ./col -->
	
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>
					<?php echo $laki;  ?>
				</h3>

				<p>Pesanan Dibuat</p>
			</div>
			<div class="icon">
				<i class="ion ion-edit"></i>
			</div>
			<a href="index.php?page=data-pemesanan-lapangan" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	


</div>
