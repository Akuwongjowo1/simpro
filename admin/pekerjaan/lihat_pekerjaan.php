<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from pekerjaan WHERE kode_p='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Detail Progress Pekerjaan</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-pekerjaan" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal Progress</th>
						<th>Nama Proyek</th>
				
                         
                        <th>Kegiatan</th>
                        <th>Progress</th>
                         <th>Foto1</th>
                          <th>Foto2</th>
                           <th>Foto3</th>
                            <th>Foto4</th>
                             <th>Foto5</th>
                        <th>Hapus</th>
					</tr>
				</thead>
				<tbody>

					<?php
$no = 1;
if(isset($_GET['kode'])){
    // Asumsikan $koneksi telah didefinisikan sebelumnya
    $kode = $_GET['kode'];
    $sql = $koneksi->query("SELECT * FROM pekerjaan 
                            INNER JOIN proyek ON pekerjaan.kproyek = proyek.kode 
                            WHERE pekerjaan.kproyek = '$kode'");
    while ($data = $sql->fetch_assoc()) {
?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['tgl']; ?>
						</td>
						<td>
							<?php echo $data['nama']; ?>
						</td>
						<td>
                       
						
							<?php echo $data['ket']; ?>
						</td>
						<td>
                        <?php echo $data['progres']; ?> %
						</td>
						<td>
							<?php
  
                             $imageFilename = $data['foto'];
                             $thumbnailPath = "images/" . $imageFilename; // Path to the thumbnail folder
                              ?>
   
                        <!-- Display thumbnail -->
                        <img src="<?php echo $thumbnailPath; ?>" alt="Thumbnail" style="max-width: 100px; max-height: 100px;">
                        <?php
    $imageFilename = $data['foto'];
    $imagePath = "images/" . $imageFilename;
    
    ?>
    <a href="<?php echo $imagePath; ?>" download>
        Download 
    </a>
                        </td>
						<td>
                        <?php
  
                             $imageFilename2 = $data['foto2'];
                             $thumbnailPath2 = "images/" . $imageFilename2; // Path to the thumbnail folder
                              ?>
   
                        <!-- Display thumbnail -->
                        <img src="<?php echo $thumbnailPath2; ?>" alt="Thumbnail" style="max-width: 100px; max-height: 100px;">
                        <?php
    $imageFilename2 = $data['foto2'];
    $imagePath2 = "images/" . $imageFilename2;
    
    ?>
    <a href="<?php echo $imagePath2; ?>" download>
        Download 
    </a>
					</td>
						<td>	
							<?php
  
                             $imageFilename3 = $data['foto3'];
                             $thumbnailPath3 = "images/" . $imageFilename3; // Path to the thumbnail folder
                              ?>
   
                        <!-- Display thumbnail -->
                        <img src="<?php echo $thumbnailPath3; ?>" alt="Thumbnail" style="max-width: 100px; max-height: 100px;">
                        <?php
    $imageFilename3 = $data['foto3'];
    $imagePath3 = "images/" . $imageFilename3;
    
    ?>
    <a href="<?php echo $imagePath3; ?>" download>
        Download 
    </a>
					</td>
						<td>	
							<?php
  
                             $imageFilename4 = $data['foto4'];
                             $thumbnailPath4 = "images/" . $imageFilename4; // Path to the thumbnail folder
                              ?>
   
                        <!-- Display thumbnail -->
                        <img src="<?php echo $thumbnailPath4; ?>" alt="Thumbnail" style="max-width: 100px; max-height: 100px;">
                        <?php
    $imageFilename4 = $data['foto4'];
    $imagePath4 = "images/" . $imageFilename4;
    
    ?>
    <a href="<?php echo $imagePath4; ?>" download>
        Download 
    </a>
					</td>
						<td>	
							<?php
  
                             $imageFilename5 = $data['foto5'];
                             $thumbnailPath5 = "images/" . $imageFilename5; // Path to the thumbnail folder
                              ?>
   
                        <!-- Display thumbnail -->
                        <img src="<?php echo $thumbnailPath5; ?>" alt="Thumbnail" style="max-width: 100px; max-height: 100px;">
                        <?php
    $imageFilename5 = $data['foto5'];
    $imagePath5 = "images/" . $imageFilename5;
    
    ?>
    <a href="<?php echo $imagePath5; ?>" download>
        Download 
    </a>
					</td>
						<td>	
							<a href="?page=del-pekerjaan&kode=<?php echo $data['kode_p']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
								</>
						</td>
					</tr>

					<?php
              }
          }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->