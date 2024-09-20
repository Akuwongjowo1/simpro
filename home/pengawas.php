
        <?php
		

  $sql = $koneksi->query("SELECT COUNT(kd_inventaris) as proyek  from inventaris ");
  while ($data= $sql->fetch_assoc()) {
    $pend=$data['proyek'];
  }

  $sql = $koneksi->query("SELECT COUNT(kode_p) as pekerjaan  from pekerjaan");
  while ($data= $sql->fetch_assoc()) {
    $kartu=$data['pekerjaan'];
  }

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
    <div class="small-box bg-success">
        <div class="inner">
            <h3>
                <?php echo $kartu; ?>
            </h3>

            <p>Progres Pekerjaan</p>
        </div>
        <div class="icon">
            <i class="fas fa-clock"></i> <!-- Changed icon class to represent a group of people -->
        </div>
        <a href="index.php?page=data-pekerjaan" class="small-box-footer">Selengkapnya
            <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>

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
			<a href="index.php?page=data-pemesanan-pengawas2" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	


</div>
