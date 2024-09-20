<?php
$username = $_SESSION["ses_username"];
include "inc/koneksi.php";

if (isset ($_POST['Simpan'])){
 
    $kode=$_POST['kode'];
    $status=$_POST['status'];
    $ket2=$_POST['ket2'];
    $tgl=$_POST['tgl'];
    $progress=$_POST['progress'];
    // Separate date and time
    $date = date("Y-m-d"); // Current date
    $time = date("H:i:s"); // Current time
    
    
    // Generate a unique filename (e.g., timestamp)
    $imageFileName = 'dokumentasi_'.time().'.png';  // You can use a different format if needed
    $imageFileName2 = 'dokumentasi2_'.time().'.png';  // You can use a different format if needed
$imageFileName3 = 'dokumentasi3_'.time().'.png';  // You can use a different format if needed
$imageFileName4 = 'dokumentasi4_'.time().'.png';  // You can use a different format if needed
$imageFileName5 = 'dokumentasi5_'.time().'.png';  // You can use a different format if needed

   // Path to the 'images' folder
    $imageFolderPath = './images/';  // Update with your folder path


    // Move the uploaded image file to the 'images' folder
    move_uploaded_file($_FILES['user_image']['tmp_name'], $imageFolderPath . $imageFileName);
    
    move_uploaded_file($_FILES['user_image2']['tmp_name'], $imageFolderPath . $imageFileName2);
move_uploaded_file($_FILES['user_image3']['tmp_name'], $imageFolderPath . $imageFileName3);

move_uploaded_file($_FILES['user_image4']['tmp_name'], $imageFolderPath . $imageFileName4);

move_uploaded_file($_FILES['user_image5']['tmp_name'], $imageFolderPath . $imageFileName5);

   // Check if an image file is uploaded
    if (isset($_FILES['user_image']) && $_FILES['user_image']['error'] === UPLOAD_ERR_OK) {
    
    //mulai proses simpan data
    $sql_simpan = "INSERT INTO pekerjaan (kproyek, status, ket,progres,tgl, foto,foto2,foto3,foto4,foto5)  VALUES ('$kode', '$status', '$ket2', '$progress', '$tgl', '$imageFileName', '$imageFileName2', '$imageFileName3', '$imageFileName4', '$imageFileName5')";

    $query_simpan = mysqli_query($koneksi, $sql_simpan);
    mysqli_close($koneksi);
}

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Input Progress Pekerjaan Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pekerjaan';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Input Progress Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pekerjaan';
          }
      })</script>";
    }
    }
    
    
    
?>
    