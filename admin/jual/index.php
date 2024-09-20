 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
<?php 
include 'admin/template/header.php';
	   $hasil = $lihat -> member_edit($id);
?>
	<h4></h4>
	<br>
	<?php if(isset($_GET['success'])){?>
	<div class="alert alert-success">
		<p>Tambah Barang Berhasil !</p>
	</div>
	<?php }?>
	<?php if(isset($_GET['remove'])){?>
	<div class="alert alert-danger">
		<p>Hapus Data Berhasil !</p>
	</div>
	<?php }?>
	<div class="row">
		<div class="col-sm-4">
			<div class="card card-primary mb-3">
				<div class="card-header bg-primary text-white">
					<h5><i class="fa fa-search"></i> Cari Barang</h5>
				</div>
				<div class="card-body">
					<input type="text" id="cari" class="form-control" name="cari" placeholder="Masukan : Kode / Nama Barang  [ENTER]">
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="card card-primary mb-3">
				<div class="card-header bg-primary text-white">
					<h5><i class="fa fa-list"></i> Data Barang</h5>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<div id="hasil_cari"></div>
						<div id="tunggu"></div>
					</div>
				</div>
			</div>
		</div>
		

		<div class="col-sm-12">
			<div class="card card-primary">
				<div class="card-header bg-primary text-white">
					<h5><i class="fa fa-shopping-cart"></i> PEMESANAN
					<a class="btn btn-danger float-right" 
						onclick="javascript:return confirm('Apakah anda ingin reset keranjang ?');" href="fungsi/hapus/hapus.php?penjualan=jual">
						<b>RESET KERANJANG</b></a>
					</h5>
				</div>
				<div class="card-body">
					<div id="keranjang" class="table-responsive">
						<table class="table table-bordered">
							<tr>
								<td><b>Tanggal</b></td>
								<td><input type="text" readonly="readonly" class="form-control" value="<?php echo date("j F Y, G:i");?>" name="tgl"></td>
								

						</table>

				
						
						<table class="table table-bordered w-100" id="example1">
							<thead>
								<tr>
									<td> No</td>
									<td> Nama Barang</td>
									<td style="width:10%;"> Jumlah</td>
									
									<td style="width:20%;"> Total</td>
									
									<td>Catatan</td>
									<td> Aksi</td>
								</tr>
							</thead>
							<tbody>
								<?php $total_bayar=0; $no=1; $hasil_penjualan = $lihat -> penjualan();?>
								<?php foreach($hasil_penjualan  as $isi){?>
								<tr>
									<td><?php echo $no;?></td>
									<td><?php echo $isi['nama_barang'];?></td>

									<td>
										<!-- aksi ke table penjualan -->
										<form method="POST" action="fungsi/edit/edit.php?jual=jual">
												<input type="number" name="jumlah" value="<?php echo $isi['jumlah'];?>" class="form-control">
												<input type="hidden" name="ket" value="<?php echo $isi['catatan'];?>" class="form-control">

												<input type="hidden" name="id" value="<?php echo $isi['id_penjualan'];?>" class="form-control">
												<input type="hidden" name="id_barang" value="<?php echo $isi['id_barang'];?>" class="form-control">
												
											</td>
											<td>Rp.<?php echo number_format($isi['total']);?>,-</td>
											
                                            <td><input type="text" name="ket" value="<?php echo $isi['catatan'];?>" class="form-control"> </td>
                                            
											<td>
											<button type="submit" class="btn btn-warning">Update</button>
										</form>
										<!-- aksi ke table penjualan -->
										<a href="fungsi/hapus/hapus.php?jual=jual&id=<?php echo $isi['id_penjualan'];?>&brg=<?php echo $isi['id_barang'];?>
											&jml=<?php echo $isi['jumlah']; ?>"  class="btn btn-danger"><i class="fa fa-times"></i>
										</a>
									</td>
								</tr>
								<?php $no++; $total_bayar += $isi['total'];}?>
							</tbody>
					</table>
					
							</tr>
					<br/>
					<?php $hasil = $lihat -> jumlah(); ?>
					<div id="kasirnya">
						<table class="table table-stripped">
							<?php
if (isset($_GET['nota']) && $_GET['nota'] == 'yes') {
    $total = isset($_POST['total']) ? $_POST['total'] : 0;

    if ($total > 0) {
        // Ambil nilai proyek yang dipilih
        $proyek = $_POST['proyek'][0]; // Ambil hanya proyek pertama

        // Loop untuk setiap item yang dipilih
        foreach ($_POST['id_barang'] as $key => $id_barang) {
            // Salin nilai proyek ke variabel lain
            $id_member = $_POST['id_member'][$key];
            $jumlah = $_POST['jumlah'][$key];
            $total_item = $_POST['total1'][$key];
            $tgl_input = $_POST['tgl_input'][$key];
            $periode = $_POST['periode'][$key];
            $ket = $_POST['ket'][$key];

            // Prepare and execute the insert query
            $sql = "INSERT INTO nota (id_barang, id_member, jumlah, total, tanggal_input, periode, catatan, proyek) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $row = $config->prepare($sql);
            $row->execute([$id_barang, $id_member, $jumlah, $total_item, $tgl_input, $periode, $ket, $proyek]);

            // Update item stock
            $sql_update = "UPDATE barang SET stok = stok - ? WHERE id_barang = ?";
            $row_update = $config->prepare($sql_update);
            $row_update->execute([$jumlah, $id_barang]);
        }
        
         // Panggil fungsi reset keranjang di sini
        echo '<script>window.onload = function() { resetKeranjang(); }</script>'; // Memanggil fungsi resetKeranjang() setelah alert
        echo '<script>alert("Data Pesanan Berhasil Disimpan !");</script>';
    } else {
        echo '<script>alert("Uang Kurang ! Rp.'.$total.'");</script>';
    }
}
?>


							<!-- aksi ke table nota -->
							<form method="POST" action="index.php?page=add-pemesanan&nota=yes#kasirnya">
								<?php foreach($hasil_penjualan as $isi){;?>
									<input type="hidden" name="id_barang[]" value="<?php echo $isi['id_barang'];?>">
									<input type="hidden" name="id_member[]" value="<?php echo $isi['id_pengguna'];?>">
									<input type="hidden" name="jumlah[]" value="<?php echo $isi['jumlah'];?>">
									<input type="hidden" name="total1[]" value="<?php echo $isi['total'];?>">
									<input type="hidden" name="tgl_input[]" value="<?php echo $isi['tanggal_input'];?>">
									<input type="hidden" name="periode[]" value="<?php echo date('m-Y');?>">
									<input type="hidden" name="ket[]" value="<?php echo $isi['catatan'];?>">
									
								<?php $no++; }?>
								<tr>
									<tr>
    <td>Total Semua</td>

    <td><input type="text" class="form-control" name="total" value="<?php echo $total_bayar;?>" readonly></td>
    
    <td>Nama Proyek</td>
								<div class="form-group row">
    <td>
    <td>
        <select name="proyek[]" class="form-control select2bs4" required>
        	  <option selected="selected"></option>
            <?php
            $query_proyek = "SELECT * FROM proyek";
            $hasil_proyek = mysqli_query($koneksi, $query_proyek);

            while ($row_proyek = mysqli_fetch_array($hasil_proyek)) {
                $kd_proyek = $row_proyek['kode'];
                $nama_proyek = $row_proyek['nama'];
            ?>
            <option value="<?php echo $kd_proyek; ?>"><?php echo $nama_proyek; ?></option>
            <?php } ?>
        </select>
    </td>
    <td>
        <button class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
        <?php if (!empty($_GET['nota'] == 'yes')) {?>
            <a class="btn btn-danger" href="fungsi/hapus/hapus.php?penjualan=jual"><b>RESET</b></a>
        <?php } ?>
    </td>
</tr>

							</form>
							<!-- aksi ke table nota -->
							<tr>
								
								
									
								</td>
							</tr>
						</table>
						<br/>
						<br/>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
    function resetKeranjang() {
        
            // Redirect or perform reset action here
            window.location.href = 'fungsi/hapus/hapus.php?penjualan=jual';
        }
    
</script>


<script>
// AJAX call for autocomplete 
$(document).ready(function(){
    // Function to fetch all product data
    function fetchAllProducts() {
        $.ajax({
            type: "POST",
            url: "fungsi/edit/edit.php?cari_barang=yes",
            data: { keyword: '' }, // Pass an empty keyword to fetch all products
            beforeSend: function(){
                $("#tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
            },
            success: function(html){
                $("#tunggu").html('');
                $("#hasil_cari").show();
                $("#hasil_cari").html(html);
            }
        });
    }

    // Call fetchAllProducts function when the document is ready
    fetchAllProducts();

    // AJAX call for autocomplete 
    $("#cari").change(function(){
        $.ajax({
            type: "POST",
            url: "fungsi/edit/edit.php?cari_barang=yes",
            data: { keyword: $(this).val() }, // Pass the search keyword
            beforeSend: function(){
                $("#hasil_cari").hide();
                $("#tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
            },
            success: function(html){
                $("#tunggu").html('');
                $("#hasil_cari").show();
                $("#hasil_cari").html(html);
            }
        });
    });
});

</script>
