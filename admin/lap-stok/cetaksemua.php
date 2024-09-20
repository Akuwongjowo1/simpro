<?php
session_start();
ob_start();
require_once "../../config/database.php";
include "../../config/fungsi_tanggal.php";
include "../../config/fungsi_rupiah.php";

$hari_ini = date("d-m-Y");


$rowNumber = 1;

    $query = mysqli_query($mysqli, "SELECT * FROM barang ") or die('Ada kesalahan pada query tampil  : ' . mysqli_error($mysqli));
    $count = mysqli_num_rows($query);

?>
<html>
<head>
    <title>LAPORAN STOK BARANG</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        div.header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }

        /* Define A4 size for printing */
        @page {
            size: A4;
            margin: 0;
        }

        .signature {
            position: fixed;
            bottom: 30px; /* Adjusted from 20px to move the signature higher */
            right: 0;
            margin: 20px;
            text-align: right;
            border-bottom: 1px solid #000;
        }

        .print-date {
            position: fixed;
            bottom: 30px; /* Adjusted from 20px to move it higher */
            left: 0;
            margin: 20px;
            text-align: left;
        }
        
        .signature-column {
            width: 100px; /* Adjust the width of the signature column */
        }
    </style>
    <script>
        // Trigger print preview when the page loads
        window.onload = function() {
            window.print();
        };
    </script>
</head>
<body>
    <div class="header">
        LAPORAN DATA STOK BARANG
    </div>
    <hr><br>
    <div>
        <table border="1">
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>KODE BARANG</th>
                    <th>NAMA BARANG</th>
                    <th>HARGA</th>
                    <th>SATUAN</th>
                    <th>STOK</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                if ($count == 0) {
                    echo "<tr><td colspan='7'>No data available</td></tr>";
                } else {
                    while ($data = mysqli_fetch_assoc($query)) {
                        echo "<tr>
                                <td>$rowNumber</td>
                               <td>$data[id_barang]</td>
                                <td>$data[nama_barang]</td>
                                <td>$data[harga_jual]</td>
                                <td>$data[satuan_barang]</td>
                                <td>$data[stok]</td>
                                
                            </tr>";
                        $rowNumber++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
   <p align="right">
        Jakarta,
        <?php echo $hari_ini; ?>
        <br>
        Admin 
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>(...........)
    </p>

</body>
</html>
