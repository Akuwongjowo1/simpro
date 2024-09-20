<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress Pekerjaan</title>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  
<script>
    

        // Handle file input change and show image preview
        $("#user_image").change(function () {
            var fileInput = this;
            var file = fileInput.files[0];
            var fileName = file ? file.name : '';

            // Display the file name
            $("#file-name").text(fileName);

            // Show image preview
            if (file) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image-preview').attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
                $("#error-message").text(""); // Hide error message if file is selected
            } else {
                $("#image-preview").attr('src', ''); // Clear image preview
                $("#error-message").text("Silakan pilih foto."); // Show error message if no file is selected
            }
        });

    });
</script>

</head>

<body>
    <!-- Your existing HTML code goes here -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">
              
                <i class="fa fa-edit"></i> PROGRESS PEKERJAAN</h3>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
          
<div class="card-body">
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal</label>
				<div class="col-sm-6">
				 <input name="tgl" type="date" required class="form-control" id="alasan" placeholder="">
				</div>
			</div>
            
            	<div class="form-group row">
				<label class="col-sm-2 col-form-label">Proyek</label>
				<div class="col-sm-6">
					<select name="kode" id="id_kk" class="form-control select2bs4" required>
						<option selected="selected">- Pilih Proyek -</option>
						<?php
                        // ambil data dari database
                        $query = "select * from proyek";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
						<option value="<?php echo $row['kode'] ?>">
							<?php echo $row['nama'] ?>
							
						</option>
						<?php
                        }
                        ?>
					</select>
				</div>

			</div>
			 <div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Pekerjaan</label>
				<div class="col-sm-3">
					<select name="status" id="jekel" class="form-control">
						<option>- Pilih -</option>
						<option>Proses</option>
						<option>Selesai</option>
          <option>Tunda</option>
                      
					</select>
				</div>
			</div>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Kegiatan</label>
				<div class="col-sm-6">
                <input type="text" class="form-control" id="alamat_tujuan" name="ket2" required placeholder="">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Progress (%)</label>
				<div class="col-sm-3">
					<input type="text" pattern="[0-9]+" class="form-control" id="alamat_tujuan" name="progress" required placeholder="">
				</div>
			</div>
			</div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="user_image">
                        <span class="fas fa-camera"></span>&nbsp;&nbsp;Foto 1
                    </label>
                    <center>
                    <input type="file" class="form-control" name="user_image" id="user_image" accept="image/*" capture="environment" style="display:yes;" required>
                    <div id="error-message" style="color: red;"></div>
                    <div id="file-name" style="margin-top: 10px;"></div>
                    <!-- Image preview container -->
                    <img id="image-preview" src="" alt="" style="max-width: 100%; max-height: 200px; margin-top: 10px;">
                    </center>
                </div>
          
<div class="input-group mb-3">
                    <label class="input-group-text" for="user_image">
                        <span class="fas fa-camera"></span>&nbsp;&nbsp;Foto 2
                    </label>
                    <center>
                    <input type="file" class="form-control" name="user_image2" id="user_image" accept="image/*" capture="environment" style="display:yes;" required>
                    <div id="error-message" style="color: red;"></div>
                    <div id="file-name" style="margin-top: 10px;"></div>
                    <!-- Image preview container -->
                    <img id="image-preview" src="" alt="" style="max-width: 100%; max-height: 200px; margin-top: 10px;">
                    </center>
                </div>
                
                <div class="input-group mb-3">
                    <label class="input-group-text" for="user_image">
                        <span class="fas fa-camera"></span>&nbsp;&nbsp;Foto 3
                    </label>
                    <center>
                    <input type="file" class="form-control" name="user_image3" id="user_image" accept="image/*" capture="environment" style="display:yes;" required>
                    <div id="error-message" style="color: red;"></div>
                    <div id="file-name" style="margin-top: 10px;"></div>
                    <!-- Image preview container -->
                    <img id="image-preview" src="" alt="" style="max-width: 100%; max-height: 200px; margin-top: 10px;">
                    </center>
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="user_image">
                        <span class="fas fa-camera"></span>&nbsp;&nbsp;Foto 4
                    </label>
                    <center>
                    <input type="file" class="form-control" name="user_image4" id="user_image" accept="image/*" capture="environment" style="display:yes;" required>
                    <div id="error-message" style="color: red;"></div>
                    <div id="file-name" style="margin-top: 10px;"></div>
                    <!-- Image preview container -->
                    <img id="image-preview" src="" alt="" style="max-width: 100%; max-height: 200px; margin-top: 10px;">
                    </center>
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="user_image">
                        <span class="fas fa-camera"></span>&nbsp;&nbsp;Foto 5
                    </label>
                    <center>
                    <input type="file" class="form-control" name="user_image5" id="user_image" accept="image/*" capture="environment" style="display:yes;" required>
                    <div id="error-message" style="color: red;"></div>
                    <div id="file-name" style="margin-top: 10px;"></div>
                    <!-- Image preview container -->
                    <img id="image-preview" src="" alt="" style="max-width: 100%; max-height: 200px; margin-top: 10px;">
                    </center>
                </div>

            </div>
            <div class="card-footer">
                <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
                <span style="margin-left: 200px;"></span> <!-- Add some spacing -->
                <a href="?page=data-pekerjaan" title="Kembali" class="btn btn-secondary"><i class="fa fa-arrow-right"></i></a>
            </div>
        </form>
    </div>
    

    <!-- Your existing HTML code continues... -->

    <?php include('proses.php'); ?>
</body>

</html>

