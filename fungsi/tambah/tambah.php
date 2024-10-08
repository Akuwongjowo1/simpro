<?php

session_start();

    require '../../config.php';
    if (!empty($_GET['kategori'])) {
        $nama= htmlentities(htmlentities($_POST['kategori']));
        $tgl= date("j F Y, G:i");
        $data[] = $nama;
        $data[] = $tgl;
        $sql = 'INSERT INTO kategori (nama_kategori,tgl_input) VALUES(?,?)';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=kategori&&success=tambah-data"</script>';
    }

    if (!empty($_GET['barang'])) {
        $id = htmlentities($_POST['id']);
        
        $nama = htmlentities($_POST['nama']);
        
        $beli = htmlentities($_POST['beli']);
        $jual = htmlentities($_POST['jual']);
        $satuan = htmlentities($_POST['satuan']);
        $stok = htmlentities($_POST['stok']);
        $tgl = htmlentities($_POST['tgl']);

        $data[] = $id;
        
        $data[] = $nama;
      
        $data[] = $beli;
        $data[] = $jual;
        $data[] = $satuan;
        $data[] = $stok;
        $data[] = $tgl;
        $sql = 'INSERT INTO barang (id_barang,nama_barang,harga_beli,harga_jual,satuan_barang,stok,tgl_input) 
			    VALUES (?,?,?,?,?,?,?) ';
        $row = $config -> prepare($sql);
        $row -> execute($data);
        echo '<script>window.location="../../index.php?page=barang&success=tambah-data"</script>';
    }
    
    if (!empty($_GET['jual'])) {
    $id = $_GET['id'];
    $pemohon = $_SESSION["ses_id"];
    
    // get tabel barang id_barang
    $sql = 'SELECT * FROM barang WHERE id_barang = ?';
    $row = $config->prepare($sql);
    $row->execute(array($id));
    $hsl = $row->fetch();
    $proyek = htmlentities($_POST['proyek']);

    if ($hsl['stok'] > 0) {
        $kasir =  $_GET['id_kasir'];
        $jumlah = 1;
        $total = $hsl['harga_jual'];
        $tgl = date("j F Y, G:i");

        $data1[] = $id;
        $data1[] = $pemohon;
        $data1[] = $jumlah;
        $data1[] = $total;
        $data1[] = $tgl;
      

        $sql1 = 'INSERT INTO penjualan (id_barang,id_member,jumlah,total,tanggal_input) VALUES (?,?,?,?,?)'; // Memperbarui query untuk menyertakan kolom proyek
        $row1 = $config->prepare($sql1);
        $row1->execute($data1);

        echo '<script>window.location="../../index.php?page=add-pemesanan&success=tambah-data"</script>';
    } else {
        echo '<script>alert("Stok Barang Anda Telah Habis !");
                window.location="../../index.php?page=add-pemesanan#keranjang"</script>';
    }
}


