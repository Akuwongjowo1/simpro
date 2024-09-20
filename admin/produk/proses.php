<?php
    //membuat koneksi
    $con = mysqli_connect("localhost", "jasakodi_user", "Ahmad1231dcc*", "jasakodi_penjualan");

    
    //memasukkan data ke array
        $nama       = $_POST['no'];
        $jk         = $_POST['nama'];
        $alamat     = $_POST['jumlah'];
        

        $total = count($nama);


    //melakukan perulangan input
    for($i=0; $i<$total; $i++){

        mysqli_query($con, "insert into tb_produk set
            no    = '$nama[$i]',
            nama      = '$jk[$i]',
            jumlah  = '$alamat[$i]'
            
        ");
    }

    //kembali ke halaman sebelumnya
    header("location: ../../main.php?module=produk");