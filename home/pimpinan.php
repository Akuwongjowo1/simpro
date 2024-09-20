
        <?php
		

  $sql = $koneksi->query("SELECT COUNT(kode) as proyek  from proyek ");
  while ($data= $sql->fetch_assoc()) {
    $pend=$data['proyek'];
  }

  $sql = $koneksi->query("SELECT COUNT(kode_p) as pekerjaan  from pekerjaan");
  while ($data= $sql->fetch_assoc()) {
    $kartu=$data['pekerjaan'];
  }

  $sql = $koneksi->query("SELECT COUNT(kode) as po  from tb_supplier ");
  while ($data= $sql->fetch_assoc()) {
    $laki=$data['po'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_barang) as do  from barang ");
  while ($data= $sql->fetch_assoc()) {
    $prem=$data['do'];
  }

  $sql = $koneksi->query("SELECT COUNT(kode) as invoice from tb_karyawan ");
  while ($data= $sql->fetch_assoc()) {
    $lahir=$data['invoice'];
  }

  $sql = $koneksi->query("SELECT COUNT(kode) as pindah  from tb_supplier");
  while ($data= $sql->fetch_assoc()) {
    $pindah=$data['pindah'];
  }
$sql = $koneksi->query("SELECT count(kd_barang) as masuk  from barang_masuk");
  while ($data= $sql->fetch_assoc()) {
    $masuk=$data['masuk'];
  }
  $sql = $koneksi->query("SELECT count(kd_barang) as keluar  from barang_keluar");
  while ($data= $sql->fetch_assoc()) {
    $keluar=$data['keluar'];
  }
  $sql = $koneksi->query("SELECT count(id_nota) as pemesanan  from nota");
  while ($data= $sql->fetch_assoc()) {
    $pemesanan=$data['pemesanan'];
  }
?>

<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3>
					<?php echo $pend;  ?>
				</h3>

				<p>Jumlah Proyek</p>
			</div>
			<div class="icon">
				<i class="ion ion-home"></i>
                
			</a>
			</div>
			<a href="index.php?page=data-proyek" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>
					<?php echo $kartu;  ?>
				</h3>

				<p>Progress Pekerjaan</p>
			</div>
			<div class="icon">
            <i class="far fa-clock"></i> <!-- Changed icon class to represent a clock -->
        </div>
			<a href="index.php?page=data-pekerjaan" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
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

	<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3>
                <?php echo $pindah; ?>
            </h3>

            <p>Jumlah Supplier</p>
        </div>
        <div class="icon">
            <i class="fas fa-users"></i> <!-- Changed icon class to represent a group of people -->
        </div>
        <a href="index.php?page=data-supplier" class="small-box-footer">Selengkapnya
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
					<?php echo $prem;  ?>
				</h3>

				<p>Data Stok Barang</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-list"></i>
			</div>
			<a href="index.php?page=data-barang" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>
					<?php echo $masuk;  ?>
				</h3>

				<p>Barang Masuk</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-download"></i>
			</div>
			<a href="index.php?page=data-barang-masuk" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>

<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3>
					<?php echo $keluar;  ?>
				</h3>

				<p>Barang Keluar</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-upload"></i>
			</div>
			<a href="index.php?page=data-barang-keluar" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>
					<?php echo $prem;  ?>
				</h3>

				<p>Jumlah Karyawan</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-person"></i>
			</div>
			<a href="index.php?page=data-karyawan" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3>
					<?php echo $pemesanan;  ?>
				</h3>

				<p>Pemesanan Material</p>
			</div>
			<div class="icon">
            <i class="fas fa-shopping-cart"></i> <!-- Changed icon class to represent a shopping cart -->
        </div>
			<a href="index.php?page=data-pemesanan-pimpinan" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>


</div>
