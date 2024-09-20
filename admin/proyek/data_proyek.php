<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Proyek</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-proyek" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						
									
						<th>Nama Proyek</th>
						<th>Mulai</th>
                        <th>Selesai</th>						
                        <th>Nilai Kontrak</th>
                        <th>Kontraktor</th>
                        <th>Penanggung Jawab</th>
                        
						<th>Progress</th>
						<th>Dokumen</th>
                        <th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT * from 
			  proyek");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							
                        	
							<?php echo $data['nama']; ?>
						</td>
						<td>
						
					
                        <?php echo $data['mulai']; ?>
						</td>
						<td>
                         <?php echo $data['selesai']; ?>
						</td>
						<td>
                        Rp. <?php echo number_format($data['nilai'], 0, ',', '.'); ?>
						</td>
						<td>
                         <?php echo $data['kontraktor']; ?>
						</td>
						<td>
                        <?php echo $data['p_jawab']; ?>
						</td>
						<td>
							<?php echo $data['progress']; ?> %
						</td>
						<td>
							
							<?php
  
                             $imageFilename = $data['gambar'];
                             $thumbnailPath = "images/" . $imageFilename; // Path to the thumbnail folder
                              ?>
   
                        <!-- Display thumbnail -->
                        <img src="<?php echo $thumbnailPath; ?>" alt="Thumbnail" style="max-width: 100px; max-height: 100px;">
                        <?php
    $imageFilename = $data['gambar'];
    $imagePath = "images/" . $imageFilename;
    
    ?>
    <a href="<?php echo $imagePath; ?>" download>
        Download 
    </a>
                        </td>
						
						<td>
						</a>
						
						<a href="?page=lihat-proyek&kode=<?php echo $data['kode']; ?>" title="Detail"
							 class="btn btn-info btn-sm">
								<i class="fa fa-eye"></i>
							</a>
							<a href="?page=edit-proyek&kode=<?php echo $data['kode']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-proyek&kode=<?php echo $data['kode']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
								
								</>
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->