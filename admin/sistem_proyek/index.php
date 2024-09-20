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

			<!-- SEARCH FORM -->
			<ul class="navbar-nav ml-auto">

				<li class="nav-item d-none d-sm-inline-block">
					<a href="index.php" class="nav-link">
						<font color="white">
							<b>SISTEM INFORMASI PROYEK</b>
						</font>
					</a>
				</li>
			</ul>

		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index.php" class="brand-link">
				<img src="dist/img/izin.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
				<span class="brand-text"> Sistem Proyek</span>
			</a>

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
          if ($data_level=="Administrator"){
        ?>
						<li class="nav-item">
							<a href="index.php" class="nav-link">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>



						<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
					       <i class="nav-icon fas fa-file"></i>
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
								
							</ul>
						</li>


                                                        <li class="nav-item has-treeview">
							<a href="#" class="nav-link">
						        <i class="nav-icon fas fa-file"></i>
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
								<li class="nav-item">
									<a href="?page=data-rab" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>RAB Proyek</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=data-pekerjaan" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Pekerjaan</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=data-status" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Status Proyek</p>
									</a>
								</li>
                                                                        <li class="nav-item">
									<a href="?page=data-panjar" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Panjar Proyek</p>
									</a>
								</li>
								
 <li class="nav-item">
									<a href="?page=data-muatan" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Bongkar Muatan</p>
									</a>
								</li>
								
							</ul>
						</li>

                                                        <li class="nav-item has-treeview">
							<a href="#" class="nav-link">
							<i class="nav-icon fas fa-file"></i>
								<p>
									Berita Acara
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">

								<li class="nav-item">
									<a href="?page=data-po" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Purchase Order (PO)</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=data-do" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Delivery Order (DO)</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=data-invoice" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Invoice Proyek</p>
									</a>
								</li>
								
								
							</ul>
						</li>
                                                         <li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-file"></i>
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
									<a href="?page=lap-muatan" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Pembongkaran Muatan</p>
									</a>
								
								</li>
                                                  
								<li class="nav-item">
									<a href="?page=lap-kas" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Kas Anggaran</p>
									</a>
								
								</li>
                                                                        <li class="nav-item">
									<a href="?page=lap-operasional" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Pengeluaran Operasional</p>
									</a>
								
								</li>
								<li class="nav-item">
									<a href="?page=lap-proyek" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Pengeluaran Proyek</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=lap-supplier" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Hutang Supplier</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="admin/lap-bank/view.php" target="_blank" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Hutang BANK DLL</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=lap-piutang"class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Piutang Proyek</p>
									</a>
								</li>
                                                               <li class="nav-item">
									<a href="admin/lap-laba" target="_blank" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Laba Rugi</p>
									</a>
								</li>
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
									Profile Aplikasi
								</p>
							</a>
						</li>







						<?php
          				} elseif($data_level=="Kaur Pemerintah"){
          				?>

						<li class="nav-item">
							<a href="index.php" class="nav-link">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>

						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-table"></i>
								<p>
									Kelola Data
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="?page=data-pend" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Penduduk</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=data-kartu" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Kartu Keluarga</p>
									</a>
								</li>
							</ul>
						</li>

						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-cogs"></i>
								<p>
									Sirkulasi Penduduk
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="?page=data-lahir" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Lahir</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=data-mendu" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Meninggal</p>
									</a>
								</li>

								<li class="nav-item">
									<a href="?page=data-datang" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Pendatang</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=data-pindah" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Pindah</p>
									</a>
								</li>
							</ul>
						</li>

						<!--<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-file"></i>
								<p>
									Kelola Surat
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">

								<li class="nav-item">
									<a href="suket-domisili" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Su-Ket Domisili</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Su-Ket Kelahiran</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Su-Ket Kematian</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Su-Ket Pendatang</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Su-Ket Pindah</p>
									</a>
								</li>
							</ul>
						</li>-->

						<!--<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-print"></i>
								<p>
									Kelola Laporan
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">

								<li class="nav-item">
									<a href="http://localhost/sistem_penduduk/lap-kedantangan.php" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Penduduk</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Kartu Keluarga</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Lahir</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Meninggal</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Pendatang</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Pindah</p>
									</a>
								</li>
							</ul>
						</li>-->

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
				case 'view-pekerjaan':
						include "admin/pekerjaan/view_pekerjaan.php";
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
	
				case 'lap-muatan':
					include "admin/lap-muatan/laporan.php";
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

          
              //default
              default:
                  echo "<center><h1> ERROR !</h1></center>";
                  break;    
          }
      }else{
        // Auto Halaman Home Pengguna
          if($data_level=="Administrator"){
              include "home/admin.php";
              }
          elseif($data_level=="User"){
              include "home/kaur.php";
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
			<center><b>SISTEM PROYEK 2022</b>
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

</body>

</html>