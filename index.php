<?php
    //Mulai Sesion
    session_start();
    if (isset($_SESSION["ses_username"])==""){
	header("location: login.php");
    
    }else{
      $data_id = $_SESSION["ses_id"];
      $data_nama = $_SESSION["ses_nama"];
      $data_user = $_SESSION["ses_username"];
	    $data_level = $_SESSION["ses_level"];
    }

    //KONEKSI DB
    include "inc/koneksi.php";
    require 'config.php';
		include $view;
		$lihat = new view($config);
	
		
				if(!empty($_GET['page'])){
					include 'admin/module/'.$_GET['page'].'/index.php';
				}else{
				
				}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SISTEM INFORMASI PROYEK</title>
	<link rel="icon" href="dist/img/izin.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
	
	


<nav class="main-header navbar navbar-expand navbar-red navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#">
                <i class="fas fa-bars text-white"></i>
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Lonceng Notifikasi -->
        <?php
// Inisialisasi variabel jumlah pesan lonceng yang belum dibaca
$jumlahUnreadLonceng = 0;

// Jika pengguna adalah "Admin Kantor", ambil dari kolom tujuan
if ($data_level == "Admin Kantor") {
    $queryUnreadMessages = "SELECT sum(tujuan) AS jumlah_unread FROM nota";
    $resultUnreadMessages = mysqli_query($koneksi, $queryUnreadMessages);
    $rowUnreadMessages = mysqli_fetch_assoc($resultUnreadMessages);
    $jumlahUnreadLonceng = $rowUnreadMessages['jumlah_unread'];
} else {
    // Jika bukan "Admin Kantor", ambil dari kolom pesan
    $queryUnreadLonceng = "SELECT SUM(pesan) AS jumlah_unread FROM nota WHERE id_member = ?";
    $stmtLonceng = $koneksi->prepare($queryUnreadLonceng);
    $stmtLonceng->bind_param("s", $data_id);
    $stmtLonceng->execute();
    $resultUnreadLonceng = $stmtLonceng->get_result();
    $rowUnreadLonceng = $resultUnreadLonceng->fetch_assoc();
    $jumlahUnreadLonceng = $rowUnreadLonceng['jumlah_unread'];
    $stmtLonceng->close();
}
?>

        <li class="nav-item">
            <a class="nav-link nav-link-notification" href="#">
                <i class="fas fa-bell text-white"></i>
                <?php if ($jumlahUnreadLonceng > 0): ?>
                    <span class="badge badge-danger right"><?php echo $jumlahUnreadLonceng; ?></span>
                <?php endif; ?>
            </a>
        </li>

        <!-- Ikon Pesan Masuk -->
        <?php
        // Query untuk mengambil jumlah pesan masuk berdasarkan status pesan dari tabel chat_message
        $queryUnreadMessages = "SELECT SUM(status) AS jumlah_unread FROM chat_message WHERE to_user_id = ?";
        $stmtMessages = $koneksi->prepare($queryUnreadMessages);
        $stmtMessages->bind_param("s", $data_id);
        $stmtMessages->execute();
        $resultUnreadMessages = $stmtMessages->get_result();
        $rowUnreadMessages = $resultUnreadMessages->fetch_assoc();
        $jumlahUnreadMessages = $rowUnreadMessages['jumlah_unread'];
        $stmtMessages->close();
        ?>
        <li class="nav-item">
            <a class="nav-link nav-link-message" href="?page=data-pesan-masuk">
                <i class="fas fa-envelope text-white"></i>
                <?php if ($jumlahUnreadMessages > 0): ?>
                    <span class="badge badge-danger right"><?php echo $jumlahUnreadMessages; ?></span>
                <?php endif; ?>
            </a>
        </li>
    </ul>
</nav>





		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-2 pb-2 mb-2 d-flex">
					<div class="image">
						<img src="dist/img/admin.ico">
					</div>
					<div class="info">
						<a href="index.php" class="d-block">
							<?php echo $data_nama; ?>
						</a>
						<span class="badge badge-success">
							<?php echo $data_level; ?>
						</span>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<!-- Level  -->
						<?php
          if ($data_level=="Pimpinan"){
        ?>
						<li class="nav-item">
							<a href="index.php" class="nav-link">
								<i class="nav-icon fas fa-home"></i>
								<p>
									Home
								</p>
							</a>
						</li>



						<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
					       <i class="nav-icon fas fa-list"></i>
								<p>
									Master
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">

								<li class="nav-item">
									<a href="?page=data-kas" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Kas</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=data-supplier" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Supplier</p>
									</a>
								</li>
								
								<li class="nav-item">
									<a href="?page=data-barang" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Barang</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=data-alat-berat" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Alat Berat</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=data-karyawan" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Karyawan</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=data-kontraktor" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Kontraktor</p>
									</a>
								</li>
							</ul>
						</li>

             <li class="nav-item has-treeview">
							<a href="#" class="nav-link">
						        <i class="nav-icon fas fa-shopping-cart"></i>
								<p>
									Pemesanan
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">

								<li class="nav-item">
									<a href="?page=data-barang-masuk" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Barang Masuk</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=data-barang-keluar" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Barang Keluar</p>
									</a>
								</li>
                 
								 <li class="nav-item">
									<a href="?page=data-pemesanan-pimpinan" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Meterial</p>
									</a>
							
								</li>
								<li class="nav-item">
									<a href="?page=data-sewa" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Penyewaan Alat Berat</p>
									</a>
								</li>
							</ul>
						</li>
               <li class="nav-item has-treeview">
							<a href="#" class="nav-link">
						        <i class="nav-icon fas fa-building"></i>
								<p>
									Proyek
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
                 <li class="nav-item">
									<a href="?page=data-absen" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Absensi</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=data-proyek" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Proyek</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=data-inventaris" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Inventaris </p>
									</a>
								</li>
								
								
								<li class="nav-item">
									<a href="?page=data-pekerjaan" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Progres Pekerjaan</p>
									</a>
								</li>
								
								
							</ul>
						</li>

              <li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-coins"></i>
								<p>
									Keuangan
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">

								<li class="nav-item">
									<a href="?page=data-kap" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Kas Anggaran Perusahaan</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=data-pengeluaran" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Pengeluaran Operasional</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=data-hs" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Hutang Supplier</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=data-hb" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Hutang Bank DLL</p>
									</a>
								</li>
                                                               <li class="nav-item">
									<a href="?page=data-piutang" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Piutang Proyek</p>
									</a>
								</li>
                                                               <li class="nav-item">
									<a href="?page=data-pproyek" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Pengeluaran Proyek</p>
									</a>
								</li>
								
							</ul>
						</li>

 <li class="nav-item has-treeview">
    <?php
        // Query untuk mengambil jumlah pesan yang belum dibaca (status = 0) berdasarkan from_user_id
        $queryUnreadMessages = "SELECT sum(status) as jumlah_unread FROM chat_message WHERE to_user_id = $data_id";
        $resultUnreadMessages = mysqli_query($koneksi, $queryUnreadMessages);
        $rowUnreadMessages = mysqli_fetch_assoc($resultUnreadMessages);
        $jumlahUnread = $rowUnreadMessages['jumlah_unread'];

        // Menampilkan jumlah pesan yang belum dibaca di samping menu "Chatting"
        echo '<a href="?page=data-pesan-masuk" class="nav-link">';
        echo '<i class="nav-icon fas fa-envelope"></i>';
        echo '<p>';
        echo 'Chatting';

        // Menampilkan jumlah pesan yang belum dibaca jika lebih dari 0
        if ($jumlahUnread > 0) {
            echo '<span class="badge badge-danger right">' . $jumlahUnread . '</span>';
        }

        echo '<i class="fas fa-angle-left right"></i>';
        echo '</p>';
        echo '</a>';
    ?>
</li>


						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-print"></i>
								<p>
									Kelola Laporan
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
                                                  <ul class="nav nav-treeview">
               <li class="nav-item">
									<a href="?page=lap-stok" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Stok Barang</p>
									</a>
								
								</li>
                
                                                  
								<li class="nav-item">
									<a href="?page=lap-masuk" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Barang Masuk</p>
									</a>
								
								</li>
                                                                        <li class="nav-item">
									<a href="?page=lap-keluar" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Barang Keluar</p>
									</a>
								
								</li>
								<li class="nav-item">
									<a href="?page=lap-material" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Pemesanan Material</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=lap-sewa" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Penyewaan Alat Berat</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=lap-progres" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Progres Pekerjaan</p>
									</a>
								
								</li>
								<li class="nav-item">
									<a href="?page=lap-karyawan" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Karyawan</p>
									</a>
								
								</li>
								<li class="nav-item">
									<a href="?page=lap-kontraktor" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Kontraktor</p>
									</a>
								
								</li>
								<li class="nav-item">
									<a href="?page=lap-proyek" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Proyek</p>
									</a>
								
								</li>
                                <li class="nav-item">
									
							</ul>
						</li>


						<li class="nav-header">Setting</li>
						<li class="nav-item">
							<a href="?page=data-pengguna" class="nav-link">
								<i class="nav-icon fas fa-user"></i>
								<p>
									Pengguna Sistem
								</p>
							</a>
						</li>
                                                <li class="nav-item">
							<a href="admin/backup/brd/indexv2.php" target="_blank"  class="nav-link">
								<i class="nav-icon fas fa-database"></i>
								<p>
									Backup Restore Database
								</p>
							</a>
						</li>
<li class="nav-item">
							<a href="?page=data-profile" class="nav-link">
								<i class="nav-icon fas fa-info"></i>
								<p>
									Profile Perusahaan
								</p>
							</a>
						</li>



						<?php
          				} elseif($data_level=="Admin Lapangan"){
          				?>

						<li class="nav-item">
							<a href="index.php" class="nav-link">
								<i class="nav-icon fas fa-home"></i>
								<p>
									Home
								</p>
							</a>
						</li>
<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
						        <i class="nav-icon fas fa-building"></i>
								<p>
									Proyek
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
                 <li class="nav-item">
									<a href="?page=data-absen" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Absensi</p>
									</a>
								</li>
								
								<li class="nav-item">
									<a href="?page=data-inventaris" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Inventaris </p>
									</a>
								</li>
								
							
								
							</ul>
						</li>
						<li class="nav-item has-treeview">
							<a href="?page=data-pemesanan-lapangan" class="nav-link">
						        <i class="nav-icon fas fa-shopping-cart"></i>
								<p>
									Pemesanan
									<i class="fas fa-angle-left right"></i>
								</p>
							
									</a>
								
						</li>

<li class="nav-item has-treeview">
    <?php
        // Query untuk mengambil jumlah pesan yang belum dibaca (status = 0) berdasarkan from_user_id
        $queryUnreadMessages = "SELECT sum(status) as jumlah_unread FROM chat_message WHERE to_user_id = $data_id";
        $resultUnreadMessages = mysqli_query($koneksi, $queryUnreadMessages);
        $rowUnreadMessages = mysqli_fetch_assoc($resultUnreadMessages);
        $jumlahUnread = $rowUnreadMessages['jumlah_unread'];

        // Menampilkan jumlah pesan yang belum dibaca di samping menu "Chatting"
        echo '<a href="?page=data-pesan-masuk" class="nav-link">';
        echo '<i class="nav-icon fas fa-envelope"></i>';
        echo '<p>';
        echo 'Chatting';

        // Menampilkan jumlah pesan yang belum dibaca jika lebih dari 0
        if ($jumlahUnread > 0) {
            echo '<span class="badge badge-danger right">' . $jumlahUnread . '</span>';
        }

        echo '<i class="fas fa-angle-left right"></i>';
        echo '</p>';
        echo '</a>';
    ?>
</li>


<?php
          				} elseif($data_level=="Pengawas"){
          				?>

						<li class="nav-item">
							<a href="index.php" class="nav-link">
								<i class="nav-icon fas fa-home"></i>
								<p>
									Home
								</p>
							</a>
						</li>
<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
						        <i class="nav-icon fas fa-building"></i>
								<p>
									Proyek
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">

                 <li class="nav-item">
									<a href="?page=data-absen" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Absensi</p>
									</a>
								</li>
                <li class="nav-item">
									<a href="?page=data-pekerjaan" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Progres Pekerjaan</p>
									</a>
								</li>
								
								
							</ul>
						</li>
						<li class="nav-item has-treeview">
							<a href="?page=data-pemesanan-pengawas2" class="nav-link">
						        <i class="nav-icon fas fa-shopping-cart"></i>
								<p>
									Pemesanan
									<i class="fas fa-angle-left right"></i>
								</p>
							
									</a>
								
						</li>
<!-- ... (kode sebelumnya) -->

<!-- ... (kode sebelumnya) -->

<li class="nav-item has-treeview">
    <?php
        // Query untuk mengambil jumlah pesan yang belum dibaca (status = 0) berdasarkan from_user_id
        $queryUnreadMessages = "SELECT sum(status) as jumlah_unread FROM chat_message WHERE to_user_id = $data_id";
        $resultUnreadMessages = mysqli_query($koneksi, $queryUnreadMessages);
        $rowUnreadMessages = mysqli_fetch_assoc($resultUnreadMessages);
        $jumlahUnread = $rowUnreadMessages['jumlah_unread'];

        // Menampilkan jumlah pesan yang belum dibaca di samping menu "Chatting"
        echo '<a href="?page=data-pesan-masuk" class="nav-link">';
        echo '<i class="nav-icon fas fa-envelope"></i>';
        echo '<p>';
        echo 'Chatting';

        // Menampilkan jumlah pesan yang belum dibaca jika lebih dari 0
        if ($jumlahUnread > 0) {
            echo '<span class="badge badge-danger right">' . $jumlahUnread . '</span>';
        }

        echo '<i class="fas fa-angle-left right"></i>';
        echo '</p>';
        echo '</a>';
    ?>
</li>

<!-- ... (kode setelahnya) -->


<!-- ... (kode setelahnya) -->

						<?php
          				} elseif($data_level=="Admin Kantor"){
          				?>

						<li class="nav-item">
							<a href="index.php" class="nav-link">
								<i class="nav-icon fas fa-home"></i>
								<p>
									Home
								</p>
							</a>
						</li>
           <li class="nav-item has-treeview">
						<a href="#" class="nav-link">
					       <i class="nav-icon fas fa-list"></i>
								<p>
									Master
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">

								
								<li class="nav-item">
									<a href="?page=data-supplier" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Supplier</p>
									</a>
								</li>
								
								<li class="nav-item">
									<a href="?page=data-barang" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Barang</p>
									</a>
								</li>
								
							</ul>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
						        <i class="nav-icon fas fa-building"></i>
								<p>
									Proyek
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
                 
								<li class="nav-item">
									<a href="?page=data-proyek" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Proyek</p>
									</a>
								</li>
								
							</ul>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
						        <i class="nav-icon fas fa-shopping-cart"></i>
								<p>
									Pemesanan
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">

								<li class="nav-item">
									<a href="?page=data-barang-masuk" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Barang Masuk</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=data-barang-keluar" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Barang Keluar</p>
									</a>
								</li>
                 
								 <li class="nav-item">
									<a href="?page=data-pemesanan" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Terima Pesanan </p>
									</a>
							
								</li>
								<li class="nav-item">
									<a href="?page=data-pemesanan-kantor" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Buat Pesanan </p>
									</a>
							
								</li>
							</ul>
						</li>
<li class="nav-item has-treeview">
    <?php
        // Query untuk mengambil jumlah pesan yang belum dibaca (status = 0) berdasarkan from_user_id
        $queryUnreadMessages = "SELECT sum(status) as jumlah_unread FROM chat_message WHERE to_user_id = $data_id";
        $resultUnreadMessages = mysqli_query($koneksi, $queryUnreadMessages);
        $rowUnreadMessages = mysqli_fetch_assoc($resultUnreadMessages);
        $jumlahUnread = $rowUnreadMessages['jumlah_unread'];

        // Menampilkan jumlah pesan yang belum dibaca di samping menu "Chatting"
        echo '<a href="?page=data-pesan-masuk" class="nav-link">';
        echo '<i class="nav-icon fas fa-envelope"></i>';
        echo '<p>';
        echo 'Chatting';

        // Menampilkan jumlah pesan yang belum dibaca jika lebih dari 0
        if ($jumlahUnread > 0) {
            echo '<span class="badge badge-danger right">' . $jumlahUnread . '</span>';
        }

        echo '<i class="fas fa-angle-left right"></i>';
        echo '</p>';
        echo '</a>';
    ?>
</li>
<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-print"></i>
								<p>
									Kelola Laporan
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
                                                  <ul class="nav nav-treeview">
               <li class="nav-item">
									<a href="?page=lap-stok" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Stok Barang</p>
									</a>
								
								</li>
                
                                                  
								<li class="nav-item">
									<a href="?page=lap-masuk" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Barang Masuk</p>
									</a>
								
								</li>
                                                                        <li class="nav-item">
									<a href="?page=lap-keluar" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Barang Keluar</p>
									</a>
								
								</li>
								<li class="nav-item">
									<a href="?page=lap-material" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Pemesanan Material</p>
									</a>
								</li>
								
								
                                                               <li class="nav-item">
									
							</ul>
						</li>
						<li class="nav-header">Setting</li>

						<?php
							}
						?>

						<li class="nav-item">
							<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
								<i class="nav-icon fas fa-arrow-circle-right"></i>
								<p>
									Logout
								</p>
							</a>
						</li>

				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>

			<!-- Main content -->
			<section class="content">
				<!-- /. WEB DINAMIS DISINI ############################################################################### -->
				<div class="container-fluid">

					<?php 
      if(isset($_GET['page'])){
          $hal = $_GET['page'];
  
          switch ($hal) {
              
				//Pengguna
				case 'data-pengguna':
					include "admin/pengguna/data_pengguna.php";
					break;
				case 'add-pengguna':
					include "admin/pengguna/add_pengguna.php";
					break;
				case 'edit-pengguna':
					include "admin/pengguna/edit_pengguna.php";
					break;
				case 'del-pengguna':
					include "admin/pengguna/del_pengguna.php";
					break;
       
       case 'data-pesan-masuk':
					include "admin/chat/home.php";
					break;
				case 'add-pesan':
					include "admin/pesan/add_pesan.php";
					break;
				case 'edit-pesan-masuk':
					include "admin/pesan/edit_barang.php";
					break;
				case 'del-pesan':
					include "admin/pesan/del_barang.php";
					break;
				
				//Master
				case 'data-kas':
					include "admin/kas/data_kas.php";
					break;
				case 'add-kas':
					include "admin/kas/add_kas.php";
					break;
				case 'edit-kas':
					include "admin/kas/edit_kas.php";
					break;
				
				case 'del-kas':
					include "admin/kas/del_kas.php";
					break;
				
				case 'view-kas':
						include "kas/kas/view_kas.php";
						break;

				//penduduk
				case 'data-supplier':
					include "admin/supplier/data_supplier.php";
					break;
				case 'add-supplier':
					include "admin/supplier/add_supplier.php";
					break;
				case 'edit-supplier':
					include "admin/supplier/edit_supplier.php";
					break;
				case 'del-supplier':
					include "admin/supplier/del_supplier.php";
					break;
				case 'view-supplier':
					include "admin/supplier/view_supplier.php";
					break;
         
         case 'data-karyawan':
					include "admin/karyawan/data_supplier.php";
					break;
				case 'add-karyawan':
					include "admin/karyawan/add_supplier.php";
					break;
				case 'edit-karyawan':
					include "admin/karyawan/edit_supplier.php";
					break;
				case 'del-karyawan':
					include "admin/karyawan/del_supplier.php";
					break;
				case 'view-karyawan':
					include "admin/karyawan/view_supplier.php";
					break;

					case 'data-kontraktor':
						include "admin/kontraktor/data_supplier.php";
						break;
					case 'add-kontraktor':
						include "admin/kontraktor/add_supplier.php";
						break;
					case 'edit-kontraktor':
						include "admin/kontraktor/edit_supplier.php";
						break;
					case 'del-kontraktor':
						include "admin/kontraktor/del_supplier.php";
						break;
					case 'view-karyawan':
						include "admin/karyawan/view_supplier.php";
						break;

				//lahir
				case 'data-developer':
					include "admin/developer/data_developer.php";
					break;
				case 'add-developer':
					include "admin/developer/add_developer.php";
					break;
				case 'edit-developer':
					include "admin/developer/edit_developer.php";
					break;
				case 'del-developer':
					include "admin/developer/del_developer.php";
					break;
				case 'view-lahir':
						include "admin/lahir/view_lahir.php";
						break;

          case 'data-barang':
					include "admin/barang/data_barang.php";
					break;
				case 'add-barang':
					include "admin/barang/add_barang.php";
					break;
				case 'edit-barang':
					include "admin/barang/edit_barang.php";
					break;
				case 'del-barang':
					include "admin/barang/del_barang.php";
					break;
				case 'view-barang':
					include "admin/barang/view_barang.php";
					break;

					case 'data-alat-berat':
						include "admin/alat/data_barang.php";
						break;
					case 'add-alat-berat':
						include "admin/alat/add_barang.php";
						break;
					case 'edit-alat-berat':
						include "admin/alat/edit_barang.php";
						break;
					case 'del-alat-berat':
						include "admin/alat/del_barang.php";
						break;
					case 'view-alat-berat':
						include "admin/alat/view_barang.php";
						break;

						case 'data-sewa':
							include "admin/sewa/data_barang.php";
							break;
						case 'add-sewa':
							include "admin/sewa/add_barang.php";
							break;
						case 'edit-sewa':
							include "admin/sewa/edit_barang.php";
							break;
						case 'del-sewa':
							include "admin/sewa/del_barang.php";
							break;
						case 'view-sewa':
							include "admin/sewa/view_barang.php";
							break;

       case 'data-barang-masuk':
					include "admin/barang-masuk/data_barang.php";
					break;
				case 'add-barang-masuk':
					include "admin/barang-masuk/add_barang.php";
					break;
				case 'edit-barang-masuk':
					include "admin/barang-masuk/edit_barang.php";
					break;
				case 'del-barang-masuk':
					include "admin/barang-masuk/del_barang.php";
					break;
				case 'view-barang-masuk':
					include "admin/barang-masuk/view_barang.php";
					break;

					case 'data-pemesanan':
					include "admin/pemesanan/data_barang.php";
					break;
				case 'add-pemesanan':
					include "admin/jual/index.php";
					break;
				case 'edit-pemesanan':
					include "admin/pemesanan/edit_barang.php";
					break;
				case 'del-pemesanan':
					include "admin/pemesanan/del_barang.php";
					break;
				case 'view-barang-masuk':
					include "admin/barang-masuk/view_barang.php";
					break;
       case 'data-pemesanan-pimpinan':
					include "admin/pemesanan-pimpinan/data_barang.php";
					break;

        case 'data-lapangan':
					include "admin/pemesanan-lapangan/data_barang.php";
					break;
				case 'add-pemesanan-lapangan':
					include "admin/pemesanan-lapangan/index.php";
					break;
				case 'edit-pemesanan-lapangan':
					include "admin/pemesanan-lapangan/edit_barang.php";
					break;
				case 'del-pemesanan-lapangan':
					include "admin/pemesanan-lapangan/del_barang.php";
					break;
				case 'view-barang-masuk':
					include "admin/barang-masuk/view_barang.php";
					break;

					 case 'data-pemesanan-lapangan':
					include "admin/pemesanan-lapangan2/data_barang.php";
					break;
				case 'add-pemesanan-lapangan2':
					include "admin/pemesanan-lapangan2/index.php";
					break;
				case 'edit-pemesanan-lapangan2':
					include "admin/pemesanan-lapangan2/edit_barang.php";
					break;
				case 'del-pemesanan-lapangan2':
					include "admin/pemesanan-lapangan2/del_barang.php";
					break;
				case 'view-barang-masuk':
					include "admin/barang-masuk/view_barang.php";
					break;

        case 'data-pemesanan-kantor':
					include "admin/pemesanan-kantor/data_barang.php";
					break;
				case 'add-pemesanan-lapangan2':
					include "admin/pemesanan-lapangan2/index.php";
					break;
				case 'edit-pemesanan-kantor':
					include "admin/pemesanan-kantor/edit_barang.php";
					break;
				case 'del-pemesanan-lapangan2':
					include "admin/pemesanan-lapangan2/del_barang.php";
					break;
				
				case 'activate-pemesanan':
					include "admin/pemesanan/proses_update2.php";
					break;

					case 'activate-pemesanan-lapangan':
					include "admin/pemesanan-lapangan2/proses_update.php";
					break;

       case 'block-pemesanan':
					include "admin/pemesanan/proses_update.php";
					break;
       case 'activate-lapangan':
					include "admin/pemesanan-lapangan/proses_update2.php";
					break;
       case 'block-lapangan':
					include "admin/pemesanan-lapangan/proses_update.php";
					break;

case 'data-pemesanan-pengawas':
					include "admin/pemesanan-pengawas/data_barang.php";
					break;
case 'data-pemesanan-pengawas2':
					include "admin/pemesanan-pengawas2/data_barang.php";
					break;
case 'activate-pengawas':
					include "admin/pemesanan-pengawas/proses_update2.php";
					break;
 case 'block-pengawas':
					include "admin/pemesanan-pengawas/proses_update.php";
					break;
case 'edit-pemesanan-pengawas2':
					include "admin/pemesanan-pengawas2/edit_barang.php";
					break;
case 'del-pemesanan-pengawas2':
					include "admin/pemesanan-pengawas2/del_barang.php";
					break;

case 'data-absen':
					include "admin/absen/data_barang.php";
					break;
				case 'add-absen':
					include "admin/absen/add_barang.php";
					break;
				case 'edit-absen':
					include "admin/absen/edit_barang.php";
					break;
				case 'del-absen':
					include "admin/absen/del_barang.php";
					break;
				case 'view-absen':
					include "admin/absen/view_barang.php";
					break;

case 'data-barang-keluar':
					include "admin/barang-keluar/data_barang.php";
					break;
				case 'add-barang-keluar':
					include "admin/barang-keluar/add_barang.php";
					break;
				case 'edit-barang-keluar':
					include "admin/barang-keluar/edit_barang.php";
					break;
				case 'del-barang-keluar':
					include "admin/barang-keluar/del_barang.php";
					break;
				case 'view-barang-keluar':
					include "admin/barang-keluar/view_barang.php";
					break;

					case 'data-inventaris':
					include "admin/inventaris/data_barang.php";
					break;
				case 'add-inventaris':
					include "admin/inventaris/add_barang.php";
					break;
				case 'edit-inventaris':
					include "admin/inventaris/edit_barang.php";
					break;
				case 'del-inventaris':
					include "admin/inventaris/del_barang.php";
					break;
				case 'view-inventaris':
					include "admin/inventaris/view_barang.php";
					break;

				//mendu
				case 'data-akun':
					include "admin/akun/data_akun.php";
					break;
				case 'add-akun':
					include "admin/akun/add_akun.php";
					break;
				case 'edit-akun':
					include "admin/akun/edit_akun.php";
					break;
				case 'del-akun':
					include "admin/akun/del_akun.php";
					break;
				case 'view-mendu':
						include "admin/mendu/view_mendu.php";
						break;

				//Proyek
				case 'data-proyek':
					include "admin/proyek/data_proyek.php";
					break;
				case 'add-proyek':
					include "admin/proyek/add_proyek.php";
					break;
				case 'edit-proyek':
					include "admin/proyek/edit_proyek.php";
					break;
				case 'del-proyek':
					include "admin/proyek/del_proyek.php";
					break;
				case 'view-proyek':
						include "admin/proyek/view_proyek.php";
						break;

				//RAB
				case 'data-rab':
					include "admin/rab/data_rab.php";
					break;
				case 'add-rab':
					include "admin/rab/add_rab.php";
					break;
				case 'edit-rab':
					include "admin/rab/edit_rab.php";
					break;
				case 'del-rab':
					include "admin/rab/del_rab.php";
					break;
				case 'view-rab':
						include "admin/rab/view_rab.php";
						break;
				
                                  case 'data-pekerjaan':
					include "admin/pekerjaan/data_pekerjaan.php";
					break;
				case 'add-pekerjaan':
					include "admin/pekerjaan/add_pekerjaan.php";
					break;
				case 'edit-pekerjaan':
					include "admin/pekerjaan/edit_pekerjaan.php";
					break;
				case 'del-pekerjaan':
					include "admin/pekerjaan/del_pekerjaan.php";
					break;
				case 'lihat-pekerjaan':
						include "admin/pekerjaan/lihat_pekerjaan.php";
						break;

                                //status
				case 'data-status':
					include "admin/status/data_status.php";
					break;
				case 'add-status':
					include "admin/status/add_status.php";
					break;
				case 'edit-status':
					include "admin/status/edit_status.php";
					break;
				case 'del-status':
					include "admin/status/del_status.php";
					break;
				case 'view-status':
						include "status/status/view_status.php";
						break;

					//Panjar
				case 'data-panjar':
					include "admin/panjar/data_panjar.php";
					break;
				case 'add-panjar':
					include "admin/panjar/add_panjar.php";
					break;
				case 'edit-panjar':
					include "admin/panjar/edit_panjar.php";
					break;
				case 'del-panjar':
					include "admin/panjar/del_panjar.php";
					break;
				case 'view-panjar':
						include "admin/panjar/view_panjar.php";
						break;

                                case 'data-po':
					include "admin/po/data_po.php";
					break;
				case 'add-po':
					include "admin/po/add_po.php";
					break;
				case 'edit-po':
					include "admin/po/edit_po.php";
					break;
				case 'del-po':
					include "admin/po/del_po.php";
					break;
				
                                case 'data-do':
					include "admin/do/data_do.php";
					break;
				case 'add-do':
					include "admin/do/add_do.php";
					break;
				case 'edit-do':
					include "admin/do/edit_do.php";
					break;
				case 'del-do':
					include "admin/do/del_do.php";
					break;

                                case 'data-invoice':
					include "admin/invoice/data_invoice.php";
					break;
				case 'add-invoice':
					include "admin/invoice/add_invoice.php";
					break;
				case 'edit-invoice':
					include "admin/invoice/edit_invoice.php";
					break;
				case 'del-invoice':
					include "admin/invoice/del_invoice.php";
					break;

                                case 'data-kap':
					include "admin/kap/data_kap.php";
					break;
				case 'add-kap':
					include "admin/kap/add_kap.php";
					break;
				case 'edit-kap':
					include "admin/kap/edit_kap.php";
					break;
				case 'del-kap':
					include "admin/kap/del_kap.php";
					break;

                               case 'data-pengeluaran':
					include "admin/pengeluaran/data_pengeluaran.php";
					break;
				case 'add-pengeluaran':
					include "admin/pengeluaran/add_pengeluaran.php";
					break;
				case 'edit-pengeluaran':
					include "admin/pengeluaran/edit_pengeluaran.php";
					break;
				case 'del-pengeluaran':
					include "admin/pengeluaran/del_pengeluaran.php";
					break;


                                case 'data-hs':
					include "admin/hs/data_hs.php";
					break;
				case 'add-hs':
					include "admin/hs/add_hs.php";
					break;
				case 'edit-hs':
					include "admin/hs/edit_hs.php";
					break;
				case 'del-hs':
					include "admin/hs/del_hs.php";
					break;

                                case 'data-piutang':
					include "admin/piutang/data_piutang.php";
					break;
				case 'add-piutang':
					include "admin/piutang/add_piutang.php";
					break;
				case 'edit-piutang':
					include "admin/piutang/edit_piutang.php";
					break;
				case 'del-piutang':
					include "admin/piutang/del_piutang.php";
					break;


                                case 'data-hb':
					include "admin/hb/data_hb.php";
					break;
				case 'add-hb':
					include "admin/hb/add_hb.php";
					break;
				case 'edit-hb':
					include "admin/hb/edit_hb.php";
					break;
				case 'del-hb':
					include "admin/hb/del_hb.php";
					break;

                                case 'data-pproyek':
					include "admin/pproyek/data_pproyek.php";
					break;
				case 'add-pproyek':
					include "admin/pproyek/add_pproyek.php";
					break;
				case 'edit-pproyek':
					include "admin/pproyek/edit_pproyek.php";
					break;
				case 'del-pproyek':
					include "admin/pproyek/del_pproyek.php";
					break;

                               case 'data-muatan':
					include "admin/muatan/data_muatan.php";
					break;
				case 'add-muatan':
					include "admin/muatan/add_muatan.php";
					break;
				case 'edit-muatan':
					include "admin/muatan/edit_muatan.php";
					break;
				case 'del-muatan':
					include "admin/muatan/del_muatan.php";
					break;



                                //laporan
				case 'lap-kas':
					include "admin/lap-kas/laporan.php";
					break;

					case 'lap-proyek':
						include "admin/lap-proyek/laporan.php";
						break;

                                case 'lap-operasional':
					include "admin/lap-operasional/laporan.php";
					break;
				case 'lap-proyek':
					include "admin/lap-proyek/laporan.php";
                                        break;
				case 'lap-supplier':
					include "admin/lap-supplier/laporan.php";
                                        break;
					
				case 'lap-piutang':
					include "admin/lap-piutang/laporan.php";
                                        break;
                                case 'lap-piutang':
					include "admin/lap-piutang/laporan.php";
                                        break;

										case 'lap-sewa':
											include "admin/lap-sewa/laporan.php";
																break;
                                //Cetak
				case 'lap-po':
					include "surat/surat_po.php";
					break;
                                       case 'lap-do':
					include "surat/surat_do.php";
					break;
                                 case 'lap-invoice':
					include "surat/surat_invoice.php";
					break;
                                case 'lap-operasional':
					include "admin/lap-operasional/laporan.php";
					break;
				case 'lap-proyek':
					include "admin/lap-proyek/laporan.php";
                                        break;
				case 'lap-supplier':
					include "admin/lap-supplier/laporan.php";
                                        break;
					
				case 'lap-piutang':
					include "admin/lap-piutang/laporan.php";
                                        break;
	
				case 'lap-stok':
					include "admin/lap-stok/laporan.php";
                                        break;
	
				case 'lap-progres':
					include "admin/lap-progres/laporan.php";
                                        break;
                    case 'lap-masuk':
					include "admin/lap-masuk/laporan.php";
                    break;
					case 'lap-karyawan':
						include "admin/lap-karyawan/laporan.php";
						break;
						case 'lap-kontraktor':
							include "admin/lap-kontraktor/laporan.php";
							break;
          case 'lap-keluar':
					include "admin/lap-keluar/laporan.php";
                                        break;
                                        case 'lap-material':
					include "admin/lap-material/laporan.php";
                                        break;
case 'data-backup':
					include "admin/backup/php-mysql-backup-master/indexv2.php";
                                        break;
case 'data-restore':
					include "admin/backup/restore-data.php";
                                        break;
case 'data-profile':
					include "admin/profil/edit_profil.php";
					break;
case 'edit-profil':
					include "admin/profil/edit_profil.php";
					break;

case 'lihat-proyek':
						include "admin/proyek/view_supplier.php";
						break;
          
              //default
              default:
                  echo "<center><h1> ERROR !</h1></center>";
                  break;    
          }
      }else{
        // Auto Halaman Home Pengguna
          if($data_level=="Pimpinan"){
              include "home/pimpinan.php";
              }
          elseif($data_level=="Admin Kantor"){
              include "home/admin.php";
              }
           elseif($data_level=="Admin Lapangan"){
              include "home/lapangan.php";
              }
              elseif($data_level=="Pengawas"){
              include "home/pengawas.php";
              }
          }
    ?>

				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<!--<div class="float-right d-none d-sm-block">
				
			</div>-->
			<center><b>SISTEM PROYEK 2024</b>
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- page script -->
	<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

	<script>
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

	<script>
$(document).ready(function(){
    // Event click pada logo notifikasi
    $('.nav-link-notification').click(function(e){
        e.preventDefault(); // Mencegah perilaku default link
        
        // Kirim permintaan Ajax untuk memperbarui status data
        var dataLevel = '<?php echo $data_level; ?>';
        var ajaxUrl = '';
        if (dataLevel == "Admin Kantor") {
            ajaxUrl = 'update_status.php';
        } else if (dataLevel == "Admin Lapangan") {
            ajaxUrl = 'update_status2.php';
        } else if (dataLevel == "Pengawas") {
            ajaxUrl = 'update_status3.php';
        }

        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: { id_member: '<?php echo $data_id; ?>' },
            success: function(response) {
                // Arahkan halaman sesuai dengan level pengguna
                if (dataLevel == "Admin Kantor") {
                    window.location.href = 'index.php?page=data-pemesanan';
                } else if (dataLevel == "Admin Lapangan") {
                    window.location.href = 'index.php?page=data-pemesanan-lapangan';
                } else if (dataLevel == "Pengawas") {
                    window.location.href = 'index.php?page=data-pemesanan-pengawas2';
                }
            }
        });
    });

    // Event click pada ikon pesan masuk
    $('.nav-link-message').click(function(e){
        e.preventDefault(); // Mencegah perilaku default link
        
        // Kirim permintaan Ajax untuk memperbarui status data
        $.ajax({
            url: '',
            type: 'POST',
            data: { id_member: '<?php echo $data_id; ?>' },
            success: function(response) {
                // Arahkan halaman sesuai dengan level pengguna
                <?php if ($data_level == "Admin Kantor" || $data_level == "Pengawas" || $data_level == "Admin Lapangan"): ?>
                    window.location.href = 'index.php?page=data-pesan-masuk';
                <?php endif; ?>
            }
        });
    });
});
</script>



</body>

</html>